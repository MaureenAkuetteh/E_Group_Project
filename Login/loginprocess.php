<?php
require("../Controllers/customer_controller.php");
require('../Settings/core.php');

$errors = array();


//check if submit button was clicked
if(isset($_POST['customerLogin'])){

    //get email and password from the form
    $loginEmail = $_POST['loginEmail'];
    $loginPassword = $_POST['loginPassword'];

 
        //store login information a variable
        $loginInfo = select_one_customer_data_controller($loginEmail);
     

        //if login information exists
        if($loginInfo){

            //check if the password entered in the form matches with the hashed password
            if(password_verify($loginPassword, $loginInfo['customer_pass'])){
                $_SESSION['user_role'] = $loginInfo['user_role'];
                $_SESSION['user_id'] = $loginInfo['customer_email'];
                $_SESSION['user_id'] = $loginInfo['customer_id'];

                // var_dump($_SESSION['user_role']);
                // var_dump($_SESSION['user_id']);


                if ($_SESSION['user_role'] == 1){
                    // header("Location:../admin/dasboard.php");
                    echo ("<script>alert('Welcome :)'); window.location.href = '../admin/dashboard.php';</script>"); 
                    
                }if ($_SESSION['user_role'] == 2){

                    // header("Location:../index.php");
                    echo ("<script>alert('Welcome :)'); window.location.href = '../index.php';</script>");
                }
                
               
            }else{
              
                // header("Location:login.php"); 
                echo ("<script>alert('Your email or password is incorrect :)'); window.location.href = 'login.php';</script>");
            }

        }else{
            echo ("<script>alert('Your email or password is incorrect :)'); window.location.href = 'login.php';</script>");
        }
    

}