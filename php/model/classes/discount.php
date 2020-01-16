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

        //METHODS
        //function that gives a discount according to how many of a product in a certain category is ordered (Category 1)
        private function normalDiscount($totalQuantity, $order, $cheapest){ 
            $totalPrice = 0;
            //if the total purchase of a category 1 product is more or equal to 2 then add a discount
            //else just return the unchanged totalprice
            if($totalQuantity >= $this->productAmount){
                foreach($order->items as $item){
                    //check which price unit is the cheapest
                    if($item['unit-price'] === $cheapest){
                        $totalPrice += $item['total'] * (1 - $this->normalDiscount);
                    }
                    else{
                        $totalPrice += $item['total'];
                    }
                }
            }
            else{
                return $order->total;
            }
            return $totalPrice;
        }

        //function that gives X amount of a product for free according to how many of that product was ordered (Category 2)
        private function getFree($quantity){
            $quotient = $quantity / $this->buyThreshold; 
            return $quotient * $this->freeAmount;
        }

        //function that gives a discount according to how much revenue a customer/company has
        private function revenueDiscount($revenue, $total){
            if($revenue > $this->revenueThreshold){
                return $total * (1 - $this->revenueDiscount);
            }
            else{
                return $total;
            }
        }

        //calculates the discount of the $order and returns the result. it uses all the other private functions to do so
        public function calculateDiscount($order, $customer){
            $discountStatus = array("freeAmount" => 0, "totalPriceDiscount" => 0, "discountReason" => ""); 
            $cheapest = $order->items[0]['unit-price'];
            $totalQuantity = 0;
            
            //loop through each item of the order
            foreach($order->items as $item){
                //check to which categorie the item belongs
                if(strpos($item['product-id'], "A") !== false){ //Categorie 1
                    //check which price unit is the cheapest
                    if($item['unit-price'] < $cheapest){
                        $cheapest = $item['unit-price'];
                    }
                    //count how many items of category 1 is purchased
                    $totalQuantity += $item['quantity'];
                } 
                elseif(strpos($item['product-id'], "B") !== false){ //Categorie 2
                    $discountStatus['freeAmount'] = $this->getFree($item['quantity']);
                }
            }

            //perform a normal discount
            $discountStatus['totalPriceDiscount'] = $this->normalDiscount($totalQuantity, $order, $cheapest);

            //check if revenue is greater than the threshold
            $discountStatus['totalPriceDiscount'] = $this->revenueDiscount($customer->revenue, $discountStatus['totalPriceDiscount']);

            return $discountStatus;
        }
    }
?>