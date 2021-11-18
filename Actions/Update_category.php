<?php
require("../Controllers/product_controller.php");
require('../Settings/core.php');
check_login();
// update brand

if(isset($_POST['updateCategoryButton'])){
 
    // retreive the data
    $id = $_POST['category_id'];
    $categoryname = $_POST['categoryname'];
   
    
    $result = update_one_category_contoller($id, $categoryname);
    // var_dump($result);

    if($result) {

        header('Location: ../Admin/categories.php');

    }
        

}