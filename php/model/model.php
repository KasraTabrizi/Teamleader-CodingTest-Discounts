<?php

    require "classes/customer.php";
    require "classes/product.php";
    require "classes/order.php";
    require "classes/discount.php";

    //READ JSON OF ALL ORDERS
    $string = file_get_contents("../../json/order1.json");
    $order1_decode = json_decode($string, true);
    $string = file_get_contents("../../json/order2.json");
    $order2_decode = json_decode($string, true);
    $string = file_get_contents("../../json/order3.json");
    $order3_decode = json_decode($string, true);

    //READ JSON OF CUSTOMERS
    $string = file_get_contents("../../json/customers.json");
    $customers = json_decode($string, true);

    //CREATE CUSTOMER OBJECTS 
    foreach($customers as $customer){
        ${"customer" . $customer['id']} = new Customer($customer['id'],$customer['name'],$customer['since'],$customer['revenue']);
    }

    //CREATE ORDER OBJECTS
    $order1 = new Order($order1_decode['id'],$order1_decode['customer-id'],$order1_decode['items'],$order1_decode['total']);
    $order2 = new Order($order2_decode['id'],$order2_decode['customer-id'],$order2_decode['items'],$order2_decode['total']);
    $order3 = new Order($order3_decode['id'],$order3_decode['customer-id'],$order3_decode['items'],$order3_decode['total']);

    //CREATE DISCOUNT OBJECT
    $discountObj = new Discount();

    //CALCULATE DISCOUNT FOR EVERY ORDER
    $result1 = $discountObj->calculateDiscount($order1, $customer1);
    $result2 = $discountObj->calculateDiscount($order2, $customer2);
    $result3 = $discountObj->calculateDiscount($order3, $customer3);

    //FUNCTION THAT TAKES THE DATA AND GENERATES IN HTML TABLES 
    function generateDataToHTML($customers, $orders, $results){
       echo '<div class="box">'; 
       echo '<div class="customer-container">';
       echo  '<table>';
       foreach($customers as $key=>$value){
           echo '<tr>';
           echo "<td><b>".$key."</b></td>";
           echo "<td>".$value."</td>";
           echo '</tr>';
       }
       echo '</table>';
       echo '</div>';

       echo '<div class="order-container">';
       echo  '<table>';
       foreach($orders as $key=>$value){
            if($key === "items"){
                foreach($orders->items as $item){
                    foreach($item as $key=>$value){
                        echo '<tr>';
                        echo "<td><b>".$key."</b></td>";
                        echo "<td>".$value."</td>";
                        echo '</tr>';
                    }
                }
            }
            else{
                echo '<tr>';
                echo "<td><b>".$key."</b></td>";
                echo "<td>".$value."</td>";
                echo '</tr>';
            }
       }
       echo '</table>';
       echo '</div>';

       echo '<div class="discount-container">';
       echo  '<table>';
       foreach($results as $key=>$value){
            echo '<tr>';
            echo "<td><b>".$key."</b></td>";
            echo "<td>".$value."</td>";
            echo '</tr>';
       }
       echo '</table>';
       echo '</div>';

       echo '</div>';
    }
?>