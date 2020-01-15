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

The first two classes are pretty straight-forward, you only need properties, getters and setters.
The discount class is where all the calculations are done.
The idea is to have different methods for each type of discount calculation and as parameter we pass an order object (which
contains info about the customer and the products it ordered).
If you want to add a new type of discount method, you just add it in the Discount class. 

In the above solution, every class is a different entity but it is perfectly feasible to make the Discount class **extend** the Order class because they are related to each other. 

