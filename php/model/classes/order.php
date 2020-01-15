<?php
    class Order{

        //PROPERTIES
        private $id;
        public $customer_id;
        public $items;
        public $total;

        //CONSTRUCTOR
        public function __construct($id, $customer_id, $items, $total){
            $this->id = $id;
            $this->customer_id = $customer_id;
            $this->items = $items;
            $this->total = $total;
        }

        //METHODS
        //SETTERS
        public function setId(){
            $this->id = $id;
        }
        public function setCustomerId(){
            $this->customer_id = $customer_id;
        }
        public function setItems(){
            $this->items = $items;
        }
        public function setTotal(){
            $this->total = $total;
        }

        //GETTERS
        public function getId(){
            return $this->id; 
        }
        public function getCustomerId(){
            return $this->customer_id; 
        }
        public function getItems(){
            return $this->items; 
        }
        public function getTotal(){
            return $this->total; 
        }
    }
?>