<?php include_once "header.php";
include_once "config.php";


//This is the registration number
$registrationNumber = mt_rand(1, 100000000);
//Get the user option and display
$selectOption = $_POST['eventId'];
$selectValueQuery = "SELECT DATE_FORMAT(woodstock.events.date,'%b %e, %Y')date FROM woodstock.events WHERE woodstock.events.id = $selectOption";
$selectValue = mysqli_query($conn, $selectValueQuery);
$selectionCurrent = mysqli_fetch_array($selectValue, MYSQLI_ASSOC);
?>

<article class="post">
    <header>
        <div class="title">
            <h2><a aria-label="The home page link"
                   href="index.php">Confirmation</a></h2>
        </div>
    </header>
    <form class="pure-form"
          action="print.php?eventId=<?php echo $selectOption ?>" method="post"
          enctype="multipart/form-data" accept-charset="utf-8"
          name="registrationForm">
        <div class="pure-control-group">
            <label>Registration Number: </label>
            <input type="text" name="registrationNumber"
                   value="<?php echo $registrationNumber; ?>" readonly>
        </div>
        <div class="pure-control-group">
            <label>First Name: </label>
            <input type="text" name="firstName" pattern="[A-Za-z]+"
                   id="firstName" value="<?php echo $_POST['firstName']; ?>"
                   required><span
                    class="error"><?php echo '&nbsp;' . $nameERR; ?></span>
        </div>
        <div class="pure-control-group">
            <label>Last Name:</label>
            <input type="text" name="lastName" pattern="[A-Za-z]+"
                   value="<?php echo $_POST['lastName']; ?>" required>
        </div>
        <div class="pure-control-group">
            <label>Event Date: </label>
            <select name="">
                <option value="<?php echo $_POST['eventId']; ?>"
                        required><?php echo $selectionCurrent['date']; ?></option>
            </select>
        </div>
        <div class="pure-control-group">
            <label>Email Address:</label>
            <input type="email" name="emailAddress"
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                   value="<?php echo $_POST['emailAddress']; ?>" required>
        </div>
        <div class="pure-control-group">
            <label>Phone Number:</label>
            <input type="tel" name="phoneNumber" pattern="^\d{10}$"
                   value="<?php echo $_POST['phoneNumber']; ?>"
                   placeholdertitle="Telephone Number - 10 numeric characters only - no dash"
                   required>
        </div>
        <br>
        <input type="submit" name="submit" id="submit"
               value="Submit Registration Form">
    </form>
</article>
<?php include_once "footer.php"; ?>
