<?php
require("../Controllers/cart_controller.php");
require('../Settings/core.php');
check_login();


if(isset($_POST['manageQuantity'])){

    $p_id = $_POST['p_id'];
    $c_id = $_SESSION['user_id'];
    $qty = $_POST['qty'];

    
   // find that particular product in the database
    $existingproduct = select_one_cart_product_controller($c_id, $p_id);
    var_dump($existingproduct);


    if ($existingproduct){
       
        //update the quantity by adding the quantity entered in the form to the quantity existing in the database
        $new_qty =  $qty;
        // echo $new_qty;
        $newquantity = update_product_quantity_controller($p_id, $c_id, $new_qty);
            
        if($newquantity){
        echo "sucess";
        header("Location:../View/cart.php");

        }else{
        echo "failed";
        }

    }

}





?>