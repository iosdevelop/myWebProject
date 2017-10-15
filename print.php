<?php include_once "header.php";
				include_once "config.php";
			


			if(isset($_POST['submit'])) {   
			    $firstName = $conn->real_escape_string($_POST['firstName']);
			    $lastName = $conn->real_escape_string($_POST['lastName']);
			    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
			    $emailAddress = $conn->real_escape_string($_POST['emailAddress']);
			    $eventId = $conn->real_escape_string($_GET['eventId']);
			    $registrationNumber = $conn->real_escape_string($_POST['registrationNumber']);

			    // checking empty fields
			     
			        // if all the fields are filled (not empty)             
			        //insert data to database
			        //
			        //print('We are here');
			        

			        $result = "INSERT INTO woodstock.users(firstName, lastName, emailAddress, phoneNumber, eventId, registrationNumber) VALUES('$firstName','$lastName', '$emailAddress', '$phoneNumber', '$eventId','$registrationNumber')";
			        
			        //display success message
			        // echo "<font color='green'>Data added successfully.";
			        // echo "<br/><a href='index.php'>View Result</a>";
			        if ($conn->query($result) === TRUE) {
			            //echo "New record created successfully";
			        } else {
			            //echo "Error: " . $result. "<br>" . $conn->error;
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
		</div>
		<div class="userInfo">
			<h3><?php echo $firstName.' '.$lastName; ?></h3>
			<h3>Date:  <?php 
							 
							 $selectValueQuery = "SELECT woodstock.events.date FROM woodstock.events WHERE woodstock.events.id = $eventId";
							 $selectValue =  mysqli_query($conn, $selectValueQuery );
							 $selectionCurrent = mysqli_fetch_array($selectValue, MYSQLI_ASSOC);
							 echo $selectionCurrent['date'];
							 ?>
							
			</h3>
		</div>
	</div>
</article>
						
<?php include_once "footer.php"; ?>
