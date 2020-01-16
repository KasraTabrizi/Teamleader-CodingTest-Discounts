<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Discount Orders</title>
    <style>
    #wrapper{
        display: flex;
        border: 2px solid black;
        width: 50%;
        margin: 0 auto;
    }
    .box{
        display: flex;
        border: 2px solid black;
    }
    table {
        border-collapse: collapse;
        margin: 10px;
    }

    table, th, td {
        border: 1px solid black;
    }
    </style>
</head>

<?php
    require "../model/model.php";
?>

<body>
    <div id="wrapper">
        <?php
            generateDataToHTML($customer1, $order1, $result1);
            generateDataToHTML($customer2, $order2, $result2);
            generateDataToHTML($customer3, $order3, $result3);
        ?>
    </div>
</body>
</html>