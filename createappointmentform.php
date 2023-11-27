<?php
session_start();

// Check if receptionistID is set in the URL
if (isset($_GET['receptionistID'])) {
    $_SESSION['identification'] = $_GET['receptionistID'];
}

// rest of your PHP code...
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House of Health Create Appointment Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'navigation.php'; ?>

    <div class="container">
        <h1>House of Health Create Appointment Form</h1>
        <form id="createAppointment" name="createAppointment" action="createappointment.php" method="post"
            onsubmit="return validate()">
            <div class="formgrid">
                <label class="grid-item" for="aptdate">Appointment Date:</label>
                <input class="grid-item" type="text" id="aptdate" name="aptdate" placeholder="Ex: November 5, 2023">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="apttype">Appointment Type:</label>
                <input class="grid-item" type="text" id="apttype" name="apttype" placeholder="Ex: Well Visit">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="doctorid">Doctor ID:</label>
                <input class="grid-item" type="number" id="doctorid" name="doctorid" placeholder="Ex: 1">
                <p class="grid-item">REQUIRED</p>
                <input type="hidden" name="receptionistID" value="<?php echo $_SESSION['identification']; ?>">
                <input type="hidden" name="patientid" value="<?php echo $_GET['patientid']; ?>">

            </div>
            <div class="bottom-buttons">
                <input type="submit" id="submit" name="submit" value="submit">
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>