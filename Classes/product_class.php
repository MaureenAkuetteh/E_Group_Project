<?php

require('../Settings/db_class.php');

//inheriting the methods from connection

class Product extends Connection {

//brand
    
//add brand
    function add_product_brand($brandname){
        //returns true or false
        return $this->query("INSERT into brands(brand_name) values('$brandname')");
    }

    function select_all_brands(){
        //returns true or false
        return $this->fetch("select * from brands");
    }

    function update_one_brand($id, $brandname){
        // return true or false
        return $this->query("update brands set brand_name='$brandname' where brand_id = '$id'");
    
    }

    function select_one_brand($id){
        //returns true or false
        return $this->fetchOne("select * from brands where brand_id = '$id'");
    }

//Category

    function add_category($categoryname){
        //returns true or false
        return $this->query("INSERT into categories(cat_name) values('$categoryname')");
    }

    function select_all_categories(){
        //returns true or false
        return $this->fetch("select * from categories");
    }


    function select_one_category($id){
        //returns true or false
        return $this->fetchOne("select * from categories where cat_id = '$id'");
    }

    function update_one_category($id, $categoryname){
        // return true or false
        return $this->query("update categories set cat_name='$categoryname' where cat_id = '$id'");
    
    }


// products

// add product
    function add_product($product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords){
        return $this->query("INSERT into products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')");
    }


// update one product
    function update_one_product ($id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $product_image, $product_keywords) {
        // return true or false
        return $this->query("update products set product_cat = '$product_cat', product_brand = '$product_brand', product_title = '$product_title', product_price = '$product_price', product_desc = '$product_desc', product_image = '$product_image', product_keywords = '$product_keywords' where product_id = '$id'");

    }

//select all products and inner joins the product_brand on the brand_id in the brands table, same for categories.
    function select_all_products (){
        //returns true or false
        return $this->fetch("select * from products inner join brands on product_brand = brand_id inner join categories on product_cat = cat_id");
    }

//select one row from the products column inner join brand table and category table.

    function select_one_product($id){
        return $this->fetchOne("select * from products inner join brands on product_brand = brand_id inner join categories on product_cat = cat_id where product_id = '$id'");
    }

    
    function delete_one_brand($id){
        //returns true or false
        return $this->query("delete from brands where brand_id = '$id'");
    }

    function delete_one_category($id){
        //returns true or false
        return $this->query("delete from categories where cat_id = '$id'");
    }

    function delete_one_product($id){
        //returns true or false
        return $this->query("delete from products where product_id = '$id'");
    }

    //trending products

    
}



?>