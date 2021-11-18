<?php

 require('../Controllers/customer_controller.php');


 //check if there is a post variable
if (isset($_POST['addCustomerButton'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$unhashed_password = $_POST['password'];
	$password = password_hash($unhashed_password, PASSWORD_DEFAULT);
	$country = $_POST['country'];
	$city = $_POST['city'];
	$contact = $_POST['contact-number'];
	 
	  
	

    $customerDetails = select_one_customer_data_controller($email);

	$emailExists = $customerDetails['customer_email'];

	if ($emailExists) {
			echo ("<script>alert('This email address already exists. Please enter a new one :)'); window.location.href = 'signup.php';</script>");
		
	}
	else{
		//call the add_customer_controller function
		$result = add_customer_controller($username, $email, $password, $country, $city, $contact);
		
		if ($result) {
			// echo ("<script>alert('Account created :)'); window.location.href = 'login.php';</script>");
			header('location:login.php'); 
		}
		else{
			echo "insertion failed";
		}
	}
    
  	
}

?>