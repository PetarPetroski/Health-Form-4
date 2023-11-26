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
    <title>House of Health Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <h1>House of Health Form</h1>
        <form id="newPatient" name="newPatient" action="createpatient.php" method="post" onsubmit="return validate()">
            <div class="formgrid">
                <label class="grid-item" for="first">Patient's First Name:</label>
                <input class="grid-item" type="text" id="patientfirst" name="patientfirst" placeholder="Ex: John">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="last">Patient's Last Name:</label>
                <input class="grid-item" type="text" id="patientlast" name="patientlast" placeholder="Ex: Petroski">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="patientid">Patient's ID Number:</label>
                <input class="grid-item" type="number" id="patientid" name="patientid" placeholder="Ex: 1">
                <p class="grid-item">REQUIRED</p>
                <input type="hidden" name="receptionistID" value="<?php echo $receptionistID; ?>">
                <input type="hidden" name="receptionistID" value="<?php echo $_SESSION['identification']; ?>">

            </div>
            <div class="bottom-buttons">
                <input type="submit" id="submit" name="submit" value="submit">
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>