<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:28 PM
 */

include_once 'include.php';

/**
 * Class Basket
 * A Basket is initialized with a Catalog of products, an array of Offer and a class that holds the DeliveryChargeRules
 */
class Basket
{
    /**
     * @var Catalog The Catalog of products
     */
    protected $catalog;

    /**
     * @var array The active offers
     */
    protected $offers;

    /**
     * @var DeliveryChargeRules The Delivery Charge Rules
     */
    protected $deliveryChargeRules;

    public function __construct(Catalog $catalog, array $offers, DeliveryChargeRules $chargeRules)
    {
        $this->catalog = $catalog;
        $this->offers = $offers;
        $this->deliveryChargeRules = $chargeRules;
    }

    /**
     * @var array $basketElements The BasketElements
     */
    protected $basketElements;

    /**
     * Add a product based on its code
     * @param $code
     */
    public function addProduct($code){
        $count  = count($this->basketElements);
        $i=0;
        $found = false;
        //check if we have the product already in the basket - if so... update the quantity
        while(($i<$count)&&(!$found)){
            $be = $this->basketElements[$i];
            if($code == $be->getCode()){
              $be->setQuantity($be->getQuantity() + 1);
              $found = true;
            }
            $i++;
        }
        //the product was not found in the basket - create a new BasketElement to hold this product
        if(!$found){
            $be = new BasketElement();
            $be->setCode($code);
            $be->setQuantity(1);
            $this->basketElements[] = $be;
        }
    }

    /**
     * Get Total
     * @return float|int
     */
    public function getTotal(){
        $total = 0;
        $count  = count($this->basketElements);
        $i=0;
        //we process each BasketElement
        while($i<$count){
            $be = $this->basketElements[$i];
            $offer = $this->getOffer($be->getCode());
            $product = $this->catalog->getProduct($be->getCode());
            //we have an offer for this product
            if(null !== $offer){
                //the offer refers to a certain number of products ... we see how many products remain outside that offer
                /**
                 * EX: "buy 2 have one for free' means an offer with 2 products at 0.75 price each
                 * So, if you buy 5 such products, 4 of them will be at 0.75%, and the fifth one will be at regular price
                 * We compute here how many products are at regular price and how many are getting the offer
                 */
                $nonOfferQantity = $be->getQuantity() % $offer->getQuantity();
                $offerQuantity = $be->getQuantity() - $nonOfferQantity;

                //add up the total for products that get the offer
                $total += $offerQuantity*$product->getPrice()*$offer->getPriceChanger();
                //add up the total for products that DO NOT get the offer
                $total += $nonOfferQantity*$product->getPrice();
            } else {
                //no offer - simply compute add quantity*price
                $total += $be->getQuantity()*$product->getPrice();
            }
            $i++;
        }

        $total += $this->deliveryChargeRules->getDeliveryCost($total);

        return $total;
    }

    /**
     * We get the Offer available for given product code
     * @param $code
     * @return mixed|null
     */
    public function getOffer($code){
        foreach ($this->offers as $offer){
            if($offer->getCode() == $code){
                return $offer;
            }
        }

        return null;
    }
}