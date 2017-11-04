<?php
    if(isset($_POST['submit'])) {
    function notworking($bug) {
        // your error code can go here
        echo "<script>alert('Please correct errors with webform. ";
        echo "Here are the errors below.";
        echo $bug;
        echo "')</script>";
        //die();
    }

   // validation expected data exists
    if(!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['emailAddress']) ||
        !isset($_POST['phoneNumber']));      
    

    $firstName = $_POST['firstName']; // required
    $lastName = $_POST['lastName']; // required
    $emailAddress = $_POST['emailAddress']; // required
    $phoneNumber = $_POST['phoneNumber']; // required
    //$registrationNumber = mysqli_real_escape_string($conn, $_POST['registrationNumber']);

    $bug_message = "";
    $string_exp = "/^[A-Za-z0-9 .'-]+$/";

      if(!preg_match($string_exp,$firstName)) {
        $bug_message .= '\n * The first name you entered does not appear to be valid.';
      }
      if(!preg_match($string_exp,$lastName)) {
        $bug_message .= '\n * The last name you entered does not appear to be valid.';
      }  
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
      if(!preg_match($email_exp,$emailAddress)) {
        $bug_message .= '\n * The email Address you entered does not appear to be valid.';
      }
      $phone_exp = "/^\d{3}[ -]?\d{3}[ -]?\d{4}$/";
      if(!preg_match($phone_exp, $phoneNumber)){
        $bug_message .= '\n * The phone number you enter does not appear valid.';
        
      }
      
      if(strlen($bug_message) > 0) {
        notworking($bug_message);
      }
    }
   


//echo 'Thanks for subscribing to our mailing list';


?>
<!-- <form action="validate-test.php" method="post" accept-charset="utf-8">

  <label for="firstName"><input type="text" name="firstName" value="<?php echo $_POST['firstName'];?>" placeholder="First Name" maxlength="40"></label><br>
  <label for="lastName"><input type="text" name="lastName" value="<?php echo $_POST['lastName'];?>" placeholder="Last Name" maxlength="40"></label><br>
  <label for="email"><input type="email" name="emailAddress" value="<?php echo $_POST['emailAddress'];?>" placeholder="Email" maxlength="40"></label><br>
  <label for="phoneNumber"><input type="tel" name="phoneNumber" value="<?php echo $_POST['phoneNumber'];?>" placeholder="Telephone" maxlength="12"></label><br>
  <input type="submit" name="submit" value="Submit"><br>
</form>
 -->