# Teamleader-CodingTest-Discounts
Teamleader CodingTest Discounts

## Problem  : Discounts

We need you to build us a small (micro)service that calculates discounts for orders.

## Approach

After analyzing the problem, I came up with the following solution:

I would create 4 classes:
1. Customer
2. Product
3. Order
4. Discount

The first three classes are pretty straight-forward, you only need properties, getters and setters.
The discount class is where all the calculations are done.
The idea is to have different methods for each type of discount calculation and as parameter we pass an Order object and Customer.
We need the Customer object for the revenue and the Order object(obviously)
If you want to add a new type of discount method, you just add it in the Discount class. 
If you want to change Discount value, you can adjust that in the properties

In the above solution, every class is a different entity but it is perfectly feasible to make the Discount class **extend** the Order class because they are related to each other. 

## MVC

I would use the MVC model to even though it is a Monolithic approach. But due the time constraint and lack of experience, I didn't have the time/opportunity to approach this problem with the micro service approach. I would definately like to learn the latter approach as well.

The only place no code would be implemented, is the controller part.
The model contains all the classes and the model.php

In the model.php, all the json files are handles, objects are created and the function that generates the data to HTML.

## Discount Class

### Properties
1. private $id;
2. public $customer_id;
3. public $items;
4. public $total;

#### properties for categorie 1
5. public $buyThreshold = 5; //if 5 products are bought
6. public $freeAmount = 1; //give 1 free

#### properties for revenue discount
7. public $revenueThreshold = 1000;
8. public $revenueDiscount = 0.1;

#### properties for categorie 2
9. public $productAmount = 2;
10. public $normalDiscount = 0.2;

### Methods
1. public function calculateDiscount($order)
2. private function getFree($quantity)
3. private function revenueDiscount($revenue, $total)
4. private function normalDiscount($totalQuantity, $order, $cheapest)



