<?php
include("menu.php");

require('../Settings/core.php');
require('../Controllers/cart_controller.php');
check_login();

$amount = total_amount_controller($_SESSION['user_id']);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class = container>
    <form id = "paymentForm">
    <div class="mb-3">
        <label for="email address" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email-address" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="First name" class="form-label">First name</label>
        <input type="text" class="form-control" id="first-name" name = "firstname">
    </div>
    <div class="mb-3">
        <label for="last name" class="form-label">Last name</label>
        <input type="text" class="form-control" id="last-tname" name = "lastname">
    </div>

    <div class="mb-3">
        <label for="Total Amount" class="form-label">Amount</label>
        <input type="text" class="form-control" id="amount" name = "amount" value= "<?php echo $amount['Amount'] ?>"  readonly required />
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="button" class="btn btn-primary" onclick = "payWithPaystack()">Pay</button>
    </form>
</div>


	<!-- PAYSTACK INLINE SCRIPT -->
    <script src="https://js.paystack.co/v1/inline.js"></script> 

    <script>
  const paymentForm = document.getElementById('paymentForm');
  paymentForm.addEventListener("submit", payWithPaystack, false);

  // PAYMENT FUNCTION
  function payWithPaystack() {

      console.log('payment started')
       
    let handler = PaystackPop.setup({
      key: 'pk_test_50c6e003e8cab489ed11fbc43763318aa8d15ec1', // Replace with your public key
      email: document.getElementById("email-address").value,
      amount: document.getElementById("amount").value * 100,
      currency:'GHS',
      onClose: function(){
      alert('Window closed.');
      },
      callback: function(response){

          console.log(response.reference)

        // send email, amount and reference to our server using AJAX
         $.ajax({
          url: "../Actions/process_payment.php", 
          type:"get",
          data:{'email':document.getElementById("email-address").value, 'amount':document.getElementById("amount").value, 'reference':response.reference},
          success: function(response){
            alert(response)
          },
          error: function(error){
            alert('error')
          }
        });

      }
    });
    handler.openIframe();
  }

</script>


</body>
</html>