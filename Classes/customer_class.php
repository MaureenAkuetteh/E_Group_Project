<?php

require('../Settings/db_class.php');

//inheriting the methods from connection

class Customer extends Connection {


    
    function add_customer($username, $email, $password, $country, $city, $contact){
        //returns true or false
        return $this->query("INSERT into customer(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact) values('$username', '$email', '$password','$country', '$city','$contact')");
    }

  
    function select_one_customer($email){
        return $this->fetchOne("Select * from customer where customer_email = '$email'");
    }


    function delete_customer($id){
		// return true or false
		return $this->query("delete from customer where id = '$id'");
	}

	function update_customer($id, $username, $email, $password, $country, $city, $contact){
		// return true or false
		return $this->query("update customer set customer_name='$username', customer_email='$email', customer_pass='$password', customer_country ='$country', customer_city = '$city', customer-contact = '$contact' where id = '$id'");
	}


}


?>