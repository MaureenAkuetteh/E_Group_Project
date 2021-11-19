<?php

require("../Controllers/cart_controller.php");
require('../Settings/core.php');
check_login();


if(isset($_POST['addToCart'])){

    $p_id = $_POST['p_id'];
    $ip_add = $_SERVER['REMOTE_ADDR']; 
    $c_id = $_SESSION['user_id'];
    $qty = $_POST['qty'];

    //check if a product is already in the cart and assign the value to a variable
    $existingproduct = select_one_cart_product_controller($c_id, $p_id);


    // var_dump(select_one_cart_product_controller(37, 14));

    //use ternary operator to set default quantity to 1 if the field is empty
    $qty = $_POST['qty'] ? : 1;
    // echo $qty;

    if ($existingproduct){
       
        echo "product is already in cart";
        //update the quantity by adding the quantity entered in the form to the quantity existing in the database
        $new_qty = $existingproduct['qty'] + $qty;
        // echo $new_qty;
        $newquantity = update_product_quantity_controller($p_id, $c_id, $new_qty);
            
        if($newquantity){
        echo "sucess";
        header("Location:../View/cart.php");

        }else{
        echo "failed";
        }

    }
    else{
        //if the prodcut does not already exist in the cart, add it
        $result = add_to_cart_controller($p_id, $ip_add, $c_id, $qty);

         if ($result){
             header("Location:../View/cart.php"); 
        
         }else {
             echo 'failed';
         } 

    }

    
}



   
?>