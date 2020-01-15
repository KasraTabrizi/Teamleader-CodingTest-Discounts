<?php

    require "classes/customer.php";
    require "classes/product.php";
    require "classes/order.php";
    require "classes/discount.php";

    //read json of all orders

    $string = file_get_contents("../../json/order1.json");
    $order1_decode = json_decode($string);
    $string = file_get_contents("../../json/order2.json");
    $order2_decode = json_decode($string);
    $string = file_get_contents("../../json/order3.json");
    $order3_decode = json_decode($string);

    // var_dump($order1_decode);
    // var_dump($order2_decode);
    // var_dump($order3_decode);

    

?>