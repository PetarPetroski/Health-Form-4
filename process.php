<?php
require 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receptionistID = $_POST["identification"];
    $selectedTransaction = $_POST["transaction"];

    if ($selectedTransaction == "Search A Receptionist’s Account") {
        $query = $query = "SELECT
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
            AppointmentsProcedures.AppointmentDate,
            AppointmentsProcedures.AppointmentType,
            AppointmentsProcedures.ProcedureDate,
            AppointmentsProcedures.ProcedureType,
            AppointmentsProcedures.DoctorsName
        FROM
            Receptionists
        JOIN Patients ON Receptionists.ReceptionistID = Patients.receptionist_id
        LEFT JOIN MedicalRecords ON Patients.PatientID = MedicalRecords.PatientID
        LEFT JOIN AppointmentsProcedures ON MedicalRecords.PatientID = AppointmentsProcedures.PatientID
        WHERE
            Receptionists.ReceptionistID = $receptionistID;";
        $result = mysqli_query($con, $query);

        if ($result->num_rows > 0) {
            $_SESSION["identification"] = $receptionistID;
            header("Location: script2.php");
            exit();
        } else {
            echo '<script>alert("STUDENT ID NOT FOUND. Please re-enter");';
            echo 'window.location.href = "index.php";</script>';
        }
    }
    mysqli_close($con);
}
?>