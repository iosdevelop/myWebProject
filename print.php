<?php include_once "header.php";
			include_once "config.php";
			
			//Here I am seeing if the user hits the submit button
			//Then I am saving all the post data to variables being sure to escape string.
			if(isset($_POST['submit'])) {   
			    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
			    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
			    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
			    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
			    $eventId =mysqli_real_escape_string($conn, $_GET['eventId']);
			    $registrationNumber = mysqli_real_escape_string($conn, $_POST['registrationNumber']);

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
