<?php

    require "classes/customer.php";
    require "classes/product.php";
    require "classes/order.php";
    require "classes/discount.php";

    //READ JSON OF ALL ORDERS

    $string = file_get_contents("../../json/order1.json");
    $order1_decode = json_decode($string);
    $string = file_get_contents("../../json/order2.json");
    $order2_decode = json_decode($string);
    $string = file_get_contents("../../json/order3.json");
    $order3_decode = json_decode($string);

    //READ JSON OF CUSTOMERS
    $string = file_get_contents("../../json/customers.json");
    $customers = json_decode($string, true);

    // var_dump($order1_decode);
    // var_dump($order2_decode);
    // var_dump($order3_decode);

    //var_dump($customers);
    //$countOfCustomers = count($customers);
    
    //create customer Objects  
    foreach($customers as $customer){
        ${"customer" . $customer['id']} = new Customer($customer['id'],$customer['name'],$customer['since'],$customer['revenue']);
    }
    //$discountObj = new Discount();

    //FUNCTION THAT GENERATES TAKES THE DATA AND GENERATES THE HTML
    function generateDataToHTML(){

    }

?>