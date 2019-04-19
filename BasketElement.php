<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:37 PM
 */

include_once 'include.php';

/**
 * Class BasketElement
 * Each basket element has a code (the product code) and a quantity
 */
class BasketElement
{
    protected $code;

    protected $quantity;

    public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        return $this->code = $code;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($qty){
        return $this->quantity = $qty;
    }
}