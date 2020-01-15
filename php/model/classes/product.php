<?php

class Product{

    //PROPERTIES
    private $id;
    public $description;
    public $category;
    public $price;

    //CONSTRUCTOR
    public function __construct($id, $description, $category, $price){
        $this->id = $id;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
    }

    //METHODS
    //SETTERS
    public function setId(){
        $this->id = $id;
    }
    public function setDescription(){
        $this->description = $description;
    }
    public function setCategory(){
        $this->category = $category;
    }
    public function setPrice(){
        $this->price = $price;
    }

    //GETTERS
    public function getId(){
        return $this->id; 
    }
    public function getDescription(){
        return $this->description; 
    }
    public function getCategory(){
        return $this->category; 
    }
    public function getPrice(){
        return $this->price; 
    }
}


?>