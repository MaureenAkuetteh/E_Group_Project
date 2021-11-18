<?php
require("../Controllers/product_controller.php");
require('../Settings/core.php');
check_login();
// update brand

if(isset($_POST['updateBrandButton'])){
 
    // retreive the data
    $id = $_POST['brand_id'];
    $brandname = $_POST['brandname'];
   
    
    $result = update_one_brand_controller($id, $brandname);
    // var_dump($result);

    if($result) {

        header('Location: ../Admin/brands.php');

    }
        

}