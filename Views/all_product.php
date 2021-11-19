<?php

include("menu.php");

require('../Settings/core.php');
require('../Controllers/product_controller.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
<body>

<br>
<div class="container">
    <div class="row">
    <?php  $products = select_all_products_controller();
 
 foreach($products as $x){
    echo 
    "
    <div class='card col-md-4' style='width: 18rem;'>
        <img src='../images/products/{$x["product_image"]}' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>{$x['product_title']}</h5>
            <p class='card-text'>GHC: {$x['product_price']}</p>
            <a href='../View/single-product.php?id={$x['product_id']}' class='btn btn-primary'>Add to cart</a>
            <a href='../View/single-product.php?id={$x['product_id']}' class='btn btn-primary'>View More</a>
        </div>
    </div>
    
    
    ";

 }

 ?>

    </div>
</div>
 
    
    
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src= "../JS/product_search.js"></script> 


</body>
</html>


