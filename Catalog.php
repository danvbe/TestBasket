<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:48 PM
 */

include_once 'include.php';

class Catalog
{
    protected $products;

    public function addProduct(Product $product){
        if(null === $this->getProduct($product->getCode())){
            $this->products[] = $product;
        }
    }

    public function getProduct($code){
        $count  = count($this->products);

        $i=0;
        while($i<$count){
            $p = $this->products[$i];
            if($p->getCode() == $code){
                return $p;
            }
            $i++;
        }

        return null;
    }

}