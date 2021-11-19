<?php
 
require ('../controllers/cart_controller.php');  
require ('../Settings/core.php');   


// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();


// set options for the curl session insluding the url, headers, timeout, etc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_f3c6b4a448fcf655d5d2d7b6a57b2fae8b5f3a8c", // repleace with your private key on paystack(Don't clean the Bearer ohh, just replace from sk_test)
    "Cache-Control: no-cache",
),
));

// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);

// check if the object has a status property and if its equal to 'success' ie. if verification was successful
if(isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success'){
    // get form values
    $email = $_GET['email'];
    $amount = $_GET['amount'];
    $reference = $_GET['reference'];

    $c_id = $_SESSION['user_id'];
    $invoice_no = mt_rand(100, 1000);
    $order_date = date('Y/m/d');
    $order_status = 'pending';

   


    $addorder = add_order_controller($c_id, $invoice_no, $order_date, $order_status);
  

    if($addorder){
// get the most recent order id
        $lastorder = get_last_order_controller();
     

        // call a function that stores an array of the customer's details
        $products = select_all_cart_products_contoller($c_id);
     
     
        foreach($products as $x){ 	
            $addOrderDetails = add_order_details_controller($lastorder['last_order'], $x['p_id'], $x['qty']);
        }


    
    }



         $amount = total_amount_controller($c_id);
        // call controller function to insert into the payment table
        $result = add_payment_controller($amount['Amount'], $c_id, $lastorder['last_order'], "GHC", $order_date);

        if($result) {
            echo "payment verified successfully and insertion complete";
            $cart = select_all_cart_products_contoller($c_id);
            // var_dump($cart);

            foreach ($cart as $x) {
                remove_from_cart_controller($x['p_id'], $c_id);
            }

      

        }else {
            echo "insertion failed";
        }

    

    }else{
    // if verification failed
        echo $response;
}






?>