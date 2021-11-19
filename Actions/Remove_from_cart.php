<?php

require("../Controllers/cart_controller.php");
require('../Settings/core.php');

if(isset($_GET['id'])){
    $p_id = $_GET['id'];
    $c_id = $_SESSION['user_id'];

    echo $c_id;
    echo $p_id;
   
   

    // call the remove cart controller function
    $result = remove_from_cart_controller($p_id, $c_id);

    if($result){
        header('Location: ../View/cart.php');

    }
     else {
         echo "failed";
     }

}
?>