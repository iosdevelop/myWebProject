<?php include_once "header.php";
			include_once "config.php";
			/**
			 * This function prints the error message associated with webform
			 *
			 * @param      <string>  $bug    Text of error message
			 */
			function notworking($bug) {
			    // your error code can go here
			    echo "<script>alert('Please correct errors with webform. ";
			    echo "Here are the errors below.";
			    echo $bug;
			    echo "');location.href = 'registration.php'</script>";
			    //die();
			}
			
			//Here I am seeing if the user hits the submit button
			//Then I am saving all the post data to variables being sure to escape string.
			if(isset($_POST['submit'])) {   
			    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
			    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
			    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
			    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
			    $eventId =mysqli_real_escape_string($conn, $_GET['eventId']);
			    $registrationNumber = mysqli_real_escape_string($conn, $_POST['registrationNumber']);



			    // validation expected data exists
			     if(!isset($_POST['firstName']) ||
			         !isset($_POST['lastName']) ||
			         !isset($_POST['emailAddress']) ||
			         !isset($_POST['phoneNumber']));      
			     

			     // $firstName = $_POST['firstName']; // required
			     // $lastName = $_POST['lastName']; // required
			     // $emailAddress = $_POST['emailAddress']; // required
			     // $phoneNumber = $_POST['phoneNumber']; // required
			     // //$registrationNumber = mysqli_real_escape_string($conn, $_POST['registrationNumber']);

			     $bug_message = "";
			     $string_exp = "/^[A-Za-z.'-]+$/";

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
			         Header("Location: registration.php");
			       }

			    
			    //SQL query to insert values into database
	        $result = "INSERT INTO woodstock.users(firstName, lastName, emailAddress, phoneNumber, eventId, registrationNumber) VALUES('$firstName','$lastName', '$emailAddress', '$phoneNumber', $eventId,$registrationNumber)";
	        
	       
	        
	        if ($conn->query($result) === TRUE) {
	            //echo '<h3 class="header">New record created successfully</h3>';
	        }
	        else{
	        		echo "Error: " . $result. "<br>" . $conn->error;
	        	}
	    }
?>
<article class="post">
	<header>
		<div class="title">
			<h2><a aria-label="The home page link" href="index.php">Printed Ticket</a></h2>
		</div>
	</header>
	<div class="ticket">
		<div class="reigstrationNumber">
			<h2>Registration Number: <?php echo $registrationNumber; ?></h2>
			<img class="free" src="images/free.jpg" alt="Free Concert">
		</div>
		<div class="userInfo">
			<h3><?php echo 'Name: &nbsp;'.$firstName.' '.$lastName; ?></h3>
			<h4><?php echo 'Telephone: &nbsp;'.$phoneNumber; ?></h4>
			<h5><?php echo 'Email Address: &nbsp;'.$emailAddress	; ?></h5>
			<h3>Date:  <?php 
			 $selectValueQuery = "SELECT DATE_FORMAT(woodstock.events.date,'%b %e, %Y')date FROM woodstock.events WHERE woodstock.events.id = $eventId";
			 $selectValue =  mysqli_query($conn, $selectValueQuery );
			 $selectionCurrent = mysqli_fetch_array($selectValue, MYSQLI_ASSOC);
			 echo $selectionCurrent['date'];
			 ?>
			</h3>
		</div>
	</div>
	<a class="button" href="javascript:window.print();">Print Confirmaton</a>
</article>
						
<?php include_once "footer.php"; ?>
