<?php include_once "header.php";?>
<article class="post">
	<header>
		<div class="title">
			<h2><a aria-label="The home page link" href="index.php">Event Details</a></h2>
			<p>Register and print your tickets today.</p>
		</div>
	</header>
	<p>Southern New Hampshire University is hosting a concert series in Woodstock, NY.&nbsp;&nbsp;The next available concert dates and location will be displayed on the calendar.&nbsp;&nbsp;Bookmark this website to get current details and complete registration for each event.</p>
	<!-- Event Details -->
	<div class="event-details">
	<img aria-label="Check the calendar for details" src="images/when.jpg" alt="When Image"> <h2>First Friday of every month.</h2>
	<img aria-label="concert is in Woodstock NY" src="images/where.jpg" alt="Where"><h2>Farmers Field in City of Woodstock, NY.</h2>
	<img aria-label="This concert is free of charge but registration is required" src="images/free.jpg" alt="The concert is Free of charge"><h2>Admission is free but registration is required.</h2>
	</div>
	<!-- Google Calendar -->
	<div class="google-calendar">
	<iframe src="GoogleCalendarWidget/calendar.html"></iframe>
	</div>
	<br>
	<p>After registering, you will have the option to print tickets for the event.&nbsp;&nbsp;Concert staff will check attendant's ticket at park entrance.</p>
	<footer>		
		<a aria-label="register for event" href="registration.php" class="button big">Register Now For Concert</a>
	</footer>
</article>					
<?php include_once "footer.php"; ?>