<?php
    class Discount{

        //PROPERTIES
        private $id;
        public $customer_id;
        public $items;
        public $total;

        //properties for categorie 1
        public $buyThreshold = 5; //if 5 products are bought
        public $freeAmount = 1; //give 1 free

        //properties for revenue discount
        public $revenueThreshold = 1000;
        public $revenueDiscount = 0.1;

        //properties for categorie 2
        public $productAmount = 2;
        public $normalDiscount = 0.2;
        public $discountTarget = array("lowest", "highest", "all");

        //METHODS
        //calculates the discount of the $order and returns the result. it uses all the other private functions to do so
        public function calculcateDiscount($order, $customer){
            $priceDiscount = 0;
            $cheapest = $order->items[0]->unit-price;
            $totalQuantity = 0;
            $catTwoAmount = 0;
            //loop through each item of the order
            foreach($order->items as $item){
                //check to which categorie the item belongs
                if(strpos($item->product-id, "A") !== false){ //Categorie 1
                    if($item->unit-price < $cheapest){
                        $cheapest = $item->unit-price;
                    }
                    $totalQuantity += $item->quantity;
                } 
                elseif(strpos($item->product-id, "B") !== false){ //Categorie 2
                    $priceDiscount = getFree($item->quantity);
                }
            }

            $priceDiscount = normalDiscount($totalQuantity, $order->items, $cheapest);

            //check if revenue is greater than the threshold
            $priceDiscount = revenueDiscount($customer->revenue, $order->total);

            return $priceDiscount;
        }

        //function that gives a discount according to how many of a product in a certain category is ordered (Categorie 1)
        private function normalDiscount($totalQuantity, $order, $cheapest){
            $totalPrice = 0;
            if($totalQuantity >= $this->productAmount){
                foreach($order->items as $item){
                    if($item->unit-price === $cheapest){
                        $totalPrice += $item->total * (1 - $this->normalDiscount);
                    }
                    else{
                        $totalPrice += $item->total;
                    }
                }
            }
            else{
                return $order->total;
            }
            return $totalPrice;
        }

        //function that gives X amount of a product for free according to how many of that product was ordered (Categorie 2)
        private function getFree($quantity){
            $quotient = $quantity / $this->buyThreshold; 
            return $quotient * $this->freeAmount;
        }

        //function that gives a discount according to how much revenue a customer/company has
        private function revenueDiscount($revenue, $total){
            if($revenue > $this->$revenueThreshold){
                return $total * (1 - $this->revenueDiscount);
            }
            else{
                return $total;
            }
        }
    }
?>