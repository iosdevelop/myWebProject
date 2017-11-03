<?php
    if(isset($_POST['email'])) {

    

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you
       submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

   // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phoneNumber']) ||
        died('We are sorry, but there appears to be a problem with the form you 
    submitted.');      
    }

    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $emailAddress = $_POST['email']; // required
    $phoneNumber = $_POST['phoneNumber']; // required
    $registrationNumber = mysqli_real_escape_string($conn, $_POST['registrationNumber']);

    $error_message = "";
    $string_exp = "/^[A-Za-z0-9 .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }  
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$emailAddress)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
  
  if(strlen($error_message) > 0) {
    died($error_message);
  }
   

<!-- include your own success html here -->

echo 'Thanks for subscribing to our mailing list';


?>
