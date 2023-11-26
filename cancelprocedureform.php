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
    <title>House of Health Cancel Appointment Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'navigation.php'; ?>

    <div class="container">
        <h1>House of Health Form</h1>
        <form id="cancelProcedure" name="cancelProcedure" action="cancelprocedure.php" method="post"
            onsubmit="return validate()">
            <div class="formgrid">
                <label class="grid-item" for="proid">Patient's Procedure ID:</label>
                <input class="grid-item" type="text" id="proid" name="proid" placeholder="Ex: 23">
                <p class="grid-item">REQUIRED</p>
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