<?php

require("../Controllers/product_controller.php");
require('../Settings/core.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    

    // call the remove cart controller function
    $result = delete_one_brand_controller($id);

    if($result){
        header('Location: ../Admin/brands.php');

    }
     else {
         echo "failed";
     }

}
?>