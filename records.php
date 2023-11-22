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

        $query = "SELECT MedicalRecords.PatientID, MedicalRecords.DateOfBirth, MedicalRecords.Age, MedicalRecords.Address, 
                 MedicalRecords.PhoneNumber, MedicalRecords.ShotsGiven, MedicalRecords.Illnesses, 
                 Patients.FirstName AS PatientFirstName, Patients.LastName AS PatientLastName,
                 AppointmentsProcedures.AppointmentDate, AppointmentsProcedures.AppointmentType,
                 AppointmentsProcedures.ProcedureDate, AppointmentsProcedures.ProcedureType,
                 AppointmentsProcedures.DoctorsName
          FROM MedicalRecords
          LEFT JOIN Patients ON MedicalRecords.PatientID = Patients.PatientID
          LEFT JOIN AppointmentsProcedures ON MedicalRecords.PatientID = AppointmentsProcedures.PatientID";

        $result = mysqli_query($con, $query);

        echo "<table border='1'>
    <tr>
    <th>Patient First Name</th>
    <th>Patient Last Name</th>
    <th>Patient Address & Phone</th>
    <th>Patient ID</th>
    <th>Date of Birth</th>
    <th>Age</th>
    <th>Shots Given</th>
    <th>Illnesses</th>
    <th>Appointment Date</th>
    <th>Appointment Type</th>
    <th>Procedure Date</th>
    <th>Procedure Type</th>
    <th>Doctor Name</th>
    </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['PatientFirstName'] . "</td>";
            echo "<td>" . $row['PatientLastName'] . "</td>";
            echo "<td>" . $row['Address'] . ", " . $row['PhoneNumber'] . "</td>";
            echo "<td>" . $row['PatientID'] . "</td>";
            echo "<td>" . $row['DateOfBirth'] . "</td>";
            echo "<td>" . $row['Age'] . "</td>";
            echo "<td>" . $row['ShotsGiven'] . "</td>";
            echo "<td>" . $row['Illnesses'] . "</td>";
            echo "<td>" . $row['AppointmentDate'] . "</td>";
            echo "<td>" . $row['AppointmentType'] . "</td>";
            echo "<td>" . $row['ProcedureDate'] . "</td>";
            echo "<td>" . $row['ProcedureType'] . "</td>";
            echo "<td>" . $row['DoctorsName'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        // Close the database connection
        mysqli_close($con);
        ?>
    </div>
    <section class="buttons">
        <button id="homeButtonRecords">Home</button>
    </section>
    <script src="script.js"></script>
</body>

</html>