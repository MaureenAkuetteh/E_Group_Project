<?php 

require('../Classes/cart_class.php');


function add_to_cart_controller($p_id, $ip_add, $c_id, $qty) {
    //create an instance of the cart class
    $cart_instance = new Cart();
    // call a method from the cart class
    return $cart_instance->add_to_cart($p_id, $ip_add, $c_id, $qty);
}


function remove_from_cart_controller($p_id, $c_id){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call a method from the cart class
    return $cart_instance->remove_from_cart($p_id, $c_id);

}

function select_all_cart_products_contoller($c_id){
     //create an instance of the cart class
     $cart_instance = new Cart();
     //call a method from the cart class
     return $cart_instance->select_all_cart_products($c_id);

}

function select_one_cart_product_controller($c_id, $p_id){
      //create an instance of the cart class
      $cart_instance = new Cart();
      //call a method from the cart class
      return $cart_instance->select_one_cart_product($c_id, $p_id);
}

//update the quantity of one product 
function  update_product_quantity_controller($p_id, $c_id, $qty){
     //create an instance of the cart class
     $cart_instance = new Cart();
     //call a method from the cart class
     return $cart_instance->update_product_quantity($p_id, $c_id, $qty);
}


function  total_amount_controller($c_id){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call a method from the cart class
    return $cart_instance->total_amount ($c_id);
}


function  add_order_controller($customer_id, $invoice_no, $order_date, $order_status){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call a method from the cart class
    return $cart_instance->add_order($customer_id, $invoice_no, $order_date, $order_status);

}


function add_order_details_controller($order_id, $product_id, $qty){
    //create an instance of the cart class
    $cart_instance = new Cart();
    //call a method from the cart class
    return $cart_instance->add_order_details($order_id, $product_id, $qty);

}


function get_last_order_controller(){
      //create an instance of the cart class
      $cart_instance = new Cart();
      //call a method from the cart class
      return $cart_instance->get_last_order();

}

function add_payment_controller($amount, $c_id, $order_id, $currency, $payment_date){
      //create an instance of the cart class
    $payment_instance = new Cart();
     //call a method from the cart class
    return $payment_instance-> add_payment($amount, $c_id, $order_id, $currency, $payment_date);
}











?>