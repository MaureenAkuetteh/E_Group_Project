<?php
require("../Controllers/product_controller.php");
require('../Settings/core.php');
check_login();

if(isset($_POST['addCategoryButton'])){

    //get brand name from form
    $categoryname = $_POST['category_name'];
    

    $result = add_category_controller($categoryname);
    // var_dump($result); 

    header("Location: ../Admin/categories.php");

}