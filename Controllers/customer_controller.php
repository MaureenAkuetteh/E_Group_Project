<?php

require('../Classes/customer_class.php');



function add_customer_controller($username, $email, $password, $country, $city, $contact){
    //create an instance of the Customer class
    $customer_instance = new Customer();
    //call a method from the product class
    return $customer_instance->add_customer($username, $email, $password, $country, $city, $contact);
}

function select_one_customer_data_controller($email){

    $customer_instance = new Customer();

    return $customer_instance->select_one_customer($email);
}



// var_dump(select_customer_data_controller('june@gmail.com'));


?>