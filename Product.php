<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:30 PM
 */

include_once 'include.php';

/**
 * Class Product
 * A Product consists of a code and a price
 */
class Product
{
    protected $code;

    protected $price;

    public function getCode(){
        return $this->code;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function setPrice($price){
        $this->price = $price;
    }
}