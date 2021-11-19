<?php 

//inheriting the methods from connection
require('../Settings/db_class.php');



class Cart extends Connection {

    //add to cart 
    function add_to_cart($p_id, $ip_add, $c_id, $qty){
        //returns true or false
        return $this->query("insert into cart (p_id, ip_add, c_id, qty) values('$p_id','$ip_add', '$c_id', '$qty')");
    }


    // remove from cart
    function remove_from_cart($p_id, $c_id){
        return $this->query("delete from cart where p_id = '$p_id' and c_id = '$c_id'");
    }

   

    function select_all_cart_products($c_id){
        return $this->fetch("select * from cart inner join products on p_id = product_id where c_id = '$c_id'");
    }

    function select_one_cart_product($c_id, $p_id){
        return $this->fetchOne("select * from cart where c_id = '$c_id' and  p_id = '$p_id'");
    }

    function update_product_quantity($p_id, $c_id, $qty){
        return $this->query("update cart set qty = '$qty' where p_id = '$p_id' and c_id = '$c_id'");
    }

    
  // get the total amount for items in the cart
    function total_amount ($c_id){
        return $this->fetchOne("SELECT SUM(products.product_price *cart.qty) as Amount FROM cart join products on (products.product_id = cart.p_id) where cart.c_id = '$c_id'");
    }


    function add_order($customer_id, $invoice_no, $order_date, $order_status){
        return $this->query("insert into orders (customer_id, invoice_no, order_date, order_status) values('$customer_id','$invoice_no', '$order_date', '$order_status')");
    }
   
    			
    function add_order_details($order_id, $product_id, $qty){
        return $this->query("insert into orderdetails (order_id,product_id,	qty) values('$order_id','$product_id', '$qty')");
    }
        
    function get_last_order(){
        return $this ->fetchOne("SELECT MAX(order_id) as last_order from orders");
    }

    function add_payment ($amount, $c_id, $order_id, $currency, $payment_date){
        return $this->query("insert into payment(amt, customer_id, order_id, currency, payment_date) values('$amount', '$c_id', '$order_id', '$currency', '$payment_date')");
    }


   


   

    









}




?>