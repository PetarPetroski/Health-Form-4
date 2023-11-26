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
    <title>House of Health Schedule Procedure Form</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php include 'navigation.php'; ?>

    <div class="container">
        <h1>House of Health Form</h1>
        <form id="scheduleProcedure" name="scheduleProcedure" action="scheduleprocedure.php" method="post"
            onsubmit="return validate()">
            <div class="formgrid">
                <label class="grid-item" for="prodate">Procedure Date:</label>
                <input class="grid-item" type="text" id="prodate" name="prodate" placeholder="Ex: November 5, 2023">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="protype">Procedure Type:</label>
                <input class="grid-item" type="text" id="protype" name="protype" placeholder="Ex: Well Visit">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="aptid">Appointment ID:</label>
                <input class="grid-item" type="number" id="aptid" name="aptid" placeholder="Ex: 1">
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