<?php
    class Customer{

        //PROPERTIES
        private $id;
        public $name;
        public $since;
        public $revenue;

        //CONSTRUCTOR
        public function __construct($id, $name, $since, $revenue){
            $this->id = $id;
            $this->name = $name;
            $this->since = $since;
            $this->revenue = $revenue;
        }

        //METHODS
        //SETTERS
        public function setId(){
            $this->id = $id;
        }
        public function setName(){
            $this->name = $name;
        }
        public function setSince(){
            $this->since = $since;
        }
        public function setRevenue(){
            $this->revenue = $revenue;
        }

        //GETTERS
        public function getId(){
            return $this->id; 
        }
        public function getName(){
            return $this->name; 
        }
        public function getSince(){
            return $this->since; 
        }
        public function getRevenue(){
            return $this->revenue; 
        }
    }
?>