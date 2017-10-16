<?php include_once "header.php";
				include_once "config.php";
				require_once __DIR__ . "/lib/random.php";
			
			//This is our registration number
			
			$random = new \PHP\Random(true);
			//$registrationNumber=$random->int(0, 10000);
			$registrationNumber=mt_rand(1, 100000000);
	

			$selectOption = $_POST['eventId'];

			$selectValueQuery = "SELECT woodstock.events.date FROM woodstock.events WHERE woodstock.events.id = $selectOption";
			$selectValue =  mysqli_query($conn, $selectValueQuery );
			$selectionCurrent = mysqli_fetch_array($selectValue, MYSQLI_ASSOC);

			//var_dump($selectValue->fetch_all());


			
?>


						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a aria-label="The home page link" href="index.php">Confirmation</a></h2>
									</div>
								</header>
								<form class="pure-form" action="print.php?eventId=<?php echo $selectOption?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" name="confirmationForm">
									<div class="pure-control-group">
										<label>Registration Number: </label><div class="error"></div>
										<input type="text" name="registrationNumber" value="<?php echo $registrationNumber;?>" readonly>
									</div>
									<div class="pure-control-group">
										<label>First Name: </label>
										<input type="text" name="firstName" value = "<?php echo $_POST['firstName'];?>" required>
									</div>
									<div class="pure-control-group">
										<label>Last Name:</label>
										<input type="text" name="lastName" value="<?php echo $_POST['lastName'];?>" required>
									</div>
									<div class="pure-control-group">
										<label>Event Date: </label>
										<select name="" >
											<option value="<?php echo $_POST['eventId'];?>"><?php echo $selectionCurrent['date'];?></option>
											
										</select>
											
											
										</div>
										<div class="pure-control-group">
											<label>Email Address</label>
											<input type="email" name="emailAddress" value="<?php echo $_POST['emailAddress'];?>">
										</div>
										<div class="pure-control-group">
											<label>Phone Number</label>
											<input type="tel" name="phoneNumber" value="<?php echo $_POST['phoneNumber'];?>" >
										</div>
										<br>
										<input type="submit" name="submit" id="submit" value="Submit Registration Form">
									
								</form>
							</article>
<?php include_once "footer.php"; ?>
