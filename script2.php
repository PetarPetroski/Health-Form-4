<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 11</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>
    <?php include 'navigation.php'; ?>

    <div class="data-table-container">
        <?php
        session_start();
        require 'connect.php';
        if (!isset($_SESSION["identification"])) {
            header("Location: index.php");
            exit();
        }
        $receptionistID = $_SESSION["identification"];
        $query = "SELECT
            Receptionists.ReceptionistID,
            Receptionists.FirstName,
            Receptionists.LastName,
            Receptionists.Password,
            Receptionists.PhoneNumber,
            Receptionists.EmailAddress,
            MedicalRecords.PatientID,
            MedicalRecords.DateOfBirth,
            MedicalRecords.Age,
            MedicalRecords.Address,
            MedicalRecords.PhoneNumber AS MedicalRecordsPhoneNumber,
            MedicalRecords.ShotsGiven,
            MedicalRecords.Illnesses,
            Patients.FirstName AS PatientFirstName,
            Patients.LastName AS PatientLastName,
            Appointments.AppointmentDate,
            Appointments.AppointmentType,
            Procedures.ProcedureDate,
            Procedures.ProcedureType,
            Doctors.DoctorName,
            Doctors.DoctorID
        FROM
            Receptionists
        JOIN Patients ON Receptionists.ReceptionistID = Patients.receptionist_id
        LEFT JOIN MedicalRecords ON Patients.PatientID = MedicalRecords.PatientID
        LEFT JOIN Appointments ON MedicalRecords.PatientID = Appointments.PatientID
        LEFT JOIN Procedures ON Appointments.AppointmentID = Procedures.AppointmentID
        LEFT JOIN Doctors ON Appointments.DoctorsID = Doctors.DoctorID
        WHERE
            Receptionists.ReceptionistID = $receptionistID";

        $result = mysqli_query($con, $query);
        echo "<table class='data-table'>
            <tr>
                <th>Receptionist First Name</th>
                <th>Receptionist Last Name</th>
                <th>Receptionist Password</th>
                <th>Receptionist ID</th>
                <th>Receptionist Phone</th>
                <th>Receptionist Email</th>
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
                <th>Doctor ID</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['Password'] . "</td>";
            echo "<td>" . $row['ReceptionistID'] . "</td>";
            echo "<td>" . $row['PhoneNumber'] . "</td>";
            echo "<td>" . $row['EmailAddress'] . "</td>";
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
            echo "<td>" . $row['DoctorID'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        ?>

    </div>

</body>

</html>