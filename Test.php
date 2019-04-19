<?php
/**
 * Created by PhpStorm.
 * User: danvbe
 * Date: 4/19/2019
 * Time: 5:36 PM
 */

include_once 'include.php';

//we create the Catalog
$catalog  = new Catalog();

//Red Widget
$r01 = new Product();
$r01->setPrice(32.95);
$r01->setCode('R01');
$catalog->addProduct($r01);

//Green Widget
$g01 = new Product();
$g01->setPrice(24.95);
$g01->setCode('G01');
$catalog->addProduct($g01);

//Blue Widget
$b01 = new Product();
$b01->setPrice(7.95);
$b01->setCode('B01');
$catalog->addProduct($b01);

//Offer - buy 2 Red and get 75% off of each one (or get the second one at half price)
$offer = new Offer();
$offer->setCode('R01');
$offer->setQuantity(2);
$offer->setPriceChanger('0.75');

$offers[] = $offer;

$deliveryChargeRules = new DeliveryChargeRules();

//init the basket
$basket = new Basket($catalog,$offers,$deliveryChargeRules);

//add some products
$basket->addProduct('B01');
$basket->addProduct('B01');
$basket->addProduct('G01');
$basket->addProduct('G01');
$basket->addProduct('R01');
$basket->addProduct('R01');
$basket->addProduct('R01');
$basket->addProduct('R01');
$basket->addProduct('R01');

//display total
echo $basket->getTotal();