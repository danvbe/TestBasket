# TestBasket
For this test I have considered several classes to work with. They all have a basic description in the actual code, but I will mention them here too:

[**Product**](https://github.com/danvbe/TestBasket/blob/master/Product.php) - we have product related info - Code and Price

[**Catalog**](https://github.com/danvbe/TestBasket/blob/master/Catalog.php) - contains only an array of products. It has the ability to not allow duplicate codes. 

[**Offer**](https://github.com/danvbe/TestBasket/blob/master/Offer.php) - contains the definition of an offer. It has the Code of the product, the Quantity and the priceChanger.

As an example: 
 - 'buy 1 get second at half price' means if you buy 2 products you get them at 0.75 of original price
 - So, we will have an Offer with the proper Product Code, Quantity set to 2 and the priceChanger set to 0.75

[**DeliveryChargeRules**](https://github.com/danvbe/TestBasket/blob/master/DeliveryChargeRules.php) - this is mostly a dummy class to simply hold the limits within we change the deliver price based on the given basket total. It contains a plain function to return the result based on the given basket total.

[**BasketElement**](https://github.com/danvbe/TestBasket/blob/master/BasketElement.php) - contains a product code and a quantity

[**Basket**](https://github.com/danvbe/TestBasket/blob/master/Basket.php) - contains all the initialization data (Catalog, Offers - as an array of Offer, DeliveryChargeRules) and also an array of BasketElement entities. 

Logic on calculating:
- when adding up the total, we simply parse the BasketElements one by one.
- for each of them, we check to see if for the give code we have an existing offer
- if no offer exists, we add up the BaketElement quantity multiplied with the coresponding Product price (we get it from the Catalog)
- if an offer exists, we need to see how many of the existing products "qualify" for the priceChanger and how many will be calculated with original price (EX: having 3 products in the basket with the Offer described above, willl result in 2 of them being discounted and one of them being payed in original price).

There is a [Test.php](https://github.com/danvbe/TestBasket/blob/master/Test.php) file where we have a simulation of a Catalog setup (with the products from the example) and a Basket initialization and testing.
