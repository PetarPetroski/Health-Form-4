<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["first"];
    $lastName = $_POST["last"];
    $patientid = $_POST["patientid"];
    $receptionistID = $_POST["receptionistID"];

    // Check if patient already exists
    $checkPatientQuery = "SELECT * FROM Patients WHERE PatientID = '$patientid'";
    $checkPatientResult = mysqli_query($con, $checkPatientQuery);

    if ($checkPatientResult->num_rows > 0) {
        echo '<script>';
        echo 'window.location.href = "createappointmentform.php?receptionistID=' . $receptionistID . '&patientid=' . $patientid . '";';
        echo '</script>';
    } else {
        echo '<script>alert("Patient does not exist, you will be redirected to create an account.");';
        echo 'window.location.href = "newpatientform.php?receptionistID=' . $receptionistID . '"; </script>';

    }

    mysqli_close($con);
}
?>