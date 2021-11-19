<?php
require("../Controllers/product_controller.php");
require('../Settings/core.php');
check_login();
// update product

if(isset($_POST['updateProductButton'])){
 
    // retreive the data
    $id = $_POST['product_id'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_FILES['product_image']['name'];
    move_uploaded_file($_FILES["product_image"]["tmp_name"],"../images/products/".$_FILES["product_image"]["name"]);
    $product_keywords = $_POST['product_keywords'];

    
//check if the user uploaded an image to the form
    if (empty($product_image)){
        // select the existing image for that product from the database
        $product = select_one_product_controller($id);
        $previous_image = $product['product_image'];
        //if the user did not update the image, insert the previous image along with all the other updated fields
        $result = update_one_product_controller($id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $previous_image, $product_keywords);

        
        if($result) {
        
            header('Location: ../Admin/products.php');

        }

    } 


    else{
        // if the user upladed a new image, insert it along with every field that was updated

        $result = update_one_product_controller($id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);

        if($result) {
        
            header('Location: ../Admin/products.php');

        }

    }

    
        

}