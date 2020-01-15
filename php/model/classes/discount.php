<?php
    class Discount{

        //PROPERTIES
        private $id;
        public $customer_id;
        public $items;
        public $total;
        private $discountTarget = array("lowest", "highest", "all");

        //CONSTRUCTOR
        // public function __construct($id, $customer_id, $items, $total){
        //     $this->id = $id;
        //     $this->customer_id = $customer_id;
        //     $this->items = $items;
        //     $this->total = $total;
        // }

        //METHODS
        //calculates the discount of the $order and returns the result. it uses all the other private functions to do so
        public function calculcateDiscount($order, $customer){
            $priceDiscount = 0;
            //loop through each item of the order
            foreach($order->items as $item){
                //check to which categorie the item belongs
                $item->product-id;
                
            }
            //check if revenue is greater than 1000 euro
        }
        //function that gives X amount of a product for free according to how many of that product was ordered
        private function getFree($buyThreshold, $freeAmount){

        }

        //function that gives a discount according to how much revenue a customer/company has
        private function revenueDiscount($revenueThreshold, $discount){

        }

        //function that gives a discount according to how many of a product in a certain category is ordered
        //There is also an option to chose to give a discount to the cheapest, most expensive or all of them
        private function normalDiscount($productAmount, $discount, $discountTarget){

        }
    }
?>