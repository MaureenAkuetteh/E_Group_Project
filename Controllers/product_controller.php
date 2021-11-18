<?php
require('../Classes/product_class.php');


//brands
function add_brand_controller($brandname){
    //create an instance of the Customer class
    $customer_instance = new Product();
    //call a method from the product class
    return $customer_instance->add_product_brand($brandname);
}

function select_all_brands_controller(){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_all_brands();

}

function select_one_brand_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_brand($id);

}

function update_one_brand_controller($id,$brandname){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_brand($id,$brandname);

}

//categories
function add_category_controller($categoryname){
    //create an instance of the Customer class
    $customer_instance = new Product();
    //call a method from the product class
    return $customer_instance->add_category($categoryname);
}

function select_all_categories_controller(){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_all_categories();

}

function select_one_category_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_category($id);

}

function update_one_category_contoller($id, $categoryname){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_one_category($id, $categoryname);

}

//products
function add_product_controller($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords){
    // create an instance of the product class
    $product_instance = new Product();
    // call the method form the product class
    return $product_instance->add_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);
}

function select_all_products_controller(){
    // create an instance of the product class
    $product_instance = new Product();
    //call the method from the class
    return $product_instance->select_all_products();
}

function select_one_product_controller($id){
    //create an instance of the product class
    $product_instance = new Product();
    //call the method from the class
    return $product_instance->select_one_product($id);
}

function update_one_product_controller($id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords){
    //create an instance of the producr class
    $product_instance = new Product();
    //call the method from the class
    return $product_instance-> update_one_product($id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords);
}

// var_dump(select_one_product_controller('13'));