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

        <h1>
            House of Health Form
        </h1>


        <?php
        require 'connect.php';
        $query = "SELECT * FROM Receptionists";
        $result = mysqli_query($con, $query);

        echo "<table border='1'>
    <tr>
    <th>Receptionist First Name</th>
    <th>Receptionist Last Name</th>
    <th>Receptionist Password</th>
    <th>Receptionist ID</th>
    <th>Receptionist Phone</th>
    <th>Receptionist Email</th>
    </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['ReceptionistID'] . "</td>";
            echo "<td>" . $row['PhoneNumber'] . "</td>";
            echo "<td>" . $row['EmailAddress'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Close the database connection
        mysqli_close($con);
        ?>
    </div>
    <section class="buttons">
        <button id="homeButton">Home</button>
    </section>
    <script src="script.js"></script>
</body>

</html>