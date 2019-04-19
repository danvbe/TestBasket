<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:53 PM
 */

include_once 'include.php';

class DeliveryChargeRules
{
    public function getDeliveryCost($basketCost){
        if($basketCost<50){
            return 4.95;
        }
        else if($basketCost<90){
            return 2.95;
        }
        else {
            return 0;
        }
    }

}