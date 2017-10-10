<?php include_once "header.php";?>
<?php
$servername = "localhost";
$username = "codio";
$password = "woodstock";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>
						<!-- Post -->
							<article class="post">
								<header>
									<div class="title">
										<h2><a aria-label="The home page link" href="index.php">SNHU-a-palooza The Concert</a></h2>
										<p>Register and print your tickets today.</p>
									</div>
								</header>
								<a aria-label="Featurd Image Advertising the Free Concert" href="#" class="image featured"><img src="images/Pic01Main.jpg" alt="SNHU-a-Palooza the Concert" /></a>
								<p>SNHU is hosting a Concert series in Woodstock, NY.  Use the calendar to see the next available concert dates and location.&nbsp;&nbsp;Use this website to get details and register for each event.</p>
								<footer>
									<ul class="actions">
										<li><a aria-label="continue reading link" href="details.php" class="button big">Continue Reading</a></li>
									</ul>
								</footer>
							</article>
<?php include_once "footer.php"; ?>
