<?php include_once "header.php";
include_once "config.php";
?>


<!-- Post -->
<article class="post">
    <header>
        <div class="title">
            <h2><a aria-label="The home page link" href="index.php">Registration
                    Form</a></h2>
        </div>
    </header>

    <form class="pure-form pure-form-aligned" action="confirmation.php"
          onsubmit="return validateForm()" method="post" accept-charset="utf-8"
          name="registrationForm">
        <fieldset>
            <div class="pure-control-group">
                <label for="firstName">First Name: </label><span
                        class="error"></span>
                <input type="text" name="firstName" id="firstName"
                       value="<?php echo $_POST['firstName']; ?>"
                       pattern="[A-Za-z]+" placeholder="First Name"
                       maxlength="30" required>
            </div>
            <div class="pure-control-group">
                <label>Last Name: </label>
                <input type="text" name="lastName"
                       value="<?php echo $_POST['lastName']; ?>"
                       pattern="[A-Za-z]+" placeholder="Last Name"
                       maxlength="30" required="">
            </div>
            <div class="pure-control-group" required>
                <label>Event Date: </label>
              <?php
              //Query for getting event count for day at 50000
              $eventCount = "SELECT eventid, count(*) FROM woodstock.users GROUP BY eventID HAVING count(*) = 50000";
              $eventSold = mysqli_query($conn, $eventCount);
              $soldEventOut = mysqli_fetch_array($eventSold, MYSQLI_ASSOC);

              //Pulling all events from the events table
              //I find this is safer to have user select valid concert dates.
              $dateChecklist = $conn->query("SELECT woodstock.events.id, woodstock.events.location, DATE_FORMAT(woodstock.events.date,'%b %e, %Y')date FROM woodstock.events WHERE date >= CURDATE()");
              if ($dateChecklist->num_rows) {
                $select = '<select name="eventId">';
                while ($event = $dateChecklist->fetch_array()) {
                  //If event is selected from details screen select in option list
                  if ($event['id'] === $_GET['eventID']) {
                    $select .= '<option value="' . $event['id'] . '" selected>' . $event['date'] . '&nbsp;&nbsp;' . $event['location'] . '</option>';
                  }
                  else {
                    //Display all events from database
                    //If event is soldout then disable option
                    if ($event['id'] == $soldEventOut['eventid']) {
                      $select .= '<option value="' . $event['id'] . '" disabled>' . $event['date'] . '&nbsp;&nbsp;' . $event['location'] . '&nbsp;SOLD OUT</option>';
                    }
                    else {
                      $select .= '<option value="' . $event['id'] . '">' . $event['date'] . '&nbsp;&nbsp;' . $event['location'] . '</option>';
                    }
                  }
                }
              }
              $select .= '</select>';
              echo $select;
              ?>
            </div>

            <div class="pure-control-group">
                <label>Email Address:</label>
                <input type="email" name="emailAddress"
                       value="<?php echo $_POST['emailAddress']; ?>"
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                       placeholder="Email Address" maxlength="40" required="">
            </div>
            <div class="pure-control-group">
                <label>Phone Number:</label>
                <input type="tel" name="phoneNumber"
                       value="<?php echo $_POST['phoneNumber']; ?>"
                       pattern="^\d{10}$"
                       placeholdertitle="Telephone Number - 10 numeric characters only - no dash"
                       maxlength="10" required="">
            </div>
            <br>
            <input type="submit" id="submit" name="confirmation" value="Next">
        </fieldset>
    </form>
</article>
<?php include_once "footer.php"; ?>
