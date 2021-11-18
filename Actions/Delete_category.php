<?php

require("../Controllers/product_controller.php");
require('../Settings/core.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    

    // call the delete category controller
    $result = delete_one_category_controller($id);

    if($result){
        header('Location: ../Admin/brands.php');

    }
     else {
         echo "failed";
     }

}
?>