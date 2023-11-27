<?php
require 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receptionistID = $_POST["identification"];
    $selectedTransaction = $_POST["transaction"];

    if ($selectedTransaction == "Search A Receptionist’s Account") {
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

        if ($result->num_rows > 0) {
            $_SESSION["identification"] = $receptionistID;
            header("Location: script2.php");
            exit();
        } else {
            echo '<script>alert("RECEPTIONIST NOT FOUND. Please re-enter");';
            echo 'window.location.href = "index.php";</script>';
        }

    } else if ($selectedTransaction == "Update a Patient’s Record") {
        $_SESSION["identification"] = $receptionistID;
        header("Location: updatepatientform.php");
        exit();
    } else if ($selectedTransaction == "Schedule An Appointment") {
        $_SESSION["identification"] = $receptionistID;
        header("Location: verifypatientform.php");
        exit();
    } else if ($selectedTransaction == "Cancel Appointment") {
        $_SESSION["identification"] = $receptionistID;
        header("Location: cancelappointmentform.php");
        exit();
    } else if ($selectedTransaction == "Schedule A Procedure") {
        $_SESSION["identification"] = $receptionistID;
        header("Location: scheduleprocedureform.php");
        exit();
    } else if ($selectedTransaction == "Cancel Procedure") {
        $_SESSION["identification"] = $receptionistID;
        header("Location: cancelprocedureform.php");
        exit();
    } else if ($selectedTransaction == "Create New Patient Account") {
        $_SESSION["identification"] = $receptionistID;
        header("Location: newpatientform.php");
        exit();
    }
    mysqli_close($con);
}
?>