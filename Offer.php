<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:55 PM
 */

include_once 'include.php';

/**
 * Class Offer
 * An offer consists of a product code, a required quantity and the priceChanger applied to that quantity
 * EX: "Buy 1 get second at half price" means an Offer with quantity 2 and priceChanger set to 0.75 for each of the 2 product
 */
class Offer
{
    protected $code;

    protected $quantity;

    protected $priceChanger;

    public function getCode(){
        return $this->code;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function getPriceChanger(){
        return $this->priceChanger;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function setPriceChanger($priceChanger){
        $this->priceChanger = $priceChanger;
    }
}