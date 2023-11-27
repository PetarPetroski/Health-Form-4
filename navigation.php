<?php
session_start(); // Make sure to start the session

// Check if receptionistID is set in the URL
if (isset($_GET['receptionistID'])) {
    $_SESSION['identification'] = $_GET['receptionistID'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="script2.php?receptionistID=<?php echo $_SESSION['identification']; ?>">Search a Receptionist's
                    Account</a></li>
            <li><a href="verifypatientform.php?receptionistID=<?php echo $_SESSION['identification']; ?>">Create
                    Appointment</a></li>
            <li><a href="scheduleprocedureform.php?receptionistID=<?php echo $_SESSION['identification']; ?>">Schedule
                    Procedure</a></li>
            <li><a href="cancelappointmentform.php?receptionistID=<?php echo $_SESSION['identification']; ?>">Cancel
                    Appointment</a></li>
            <li><a href="cancelprocedureform.php?receptionistID=<?php echo $_SESSION['identification']; ?>">Cancel
                    Procedure</a></li>
            <li><a href="updatepatientform.php?receptionistID=<?php echo $_SESSION['identification']; ?>">Update
                    Patient</a></li>
            <li><a href="newpatientform.php?receptionistID=<?php echo $_SESSION['identification']; ?>">New
                    Patient</a></li>

            <!-- Add more links as needed -->
        </ul>
    </nav>
</body>

</html>