<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $firstName = $_POST["patientfirst"];
    $lastName = $_POST["patientlast"];
    $patientid = $_POST["patientid"];
    $receptionistID = $_POST["receptionistID"];

    // Check if patient already exists
    $checkPatientQuery = "SELECT * FROM Patients WHERE PatientID = '$patientid'";
    $checkPatientResult = mysqli_query($con, $checkPatientQuery);

    if ($checkPatientResult->num_rows > 0) {
        // Patient already exists
        echo '<script>alert("Patient already exists in the system.");';
        echo 'window.location.href = "newpatientform.php?receptionistID=' . $receptionistID . '";</script>';
    } else {
        // Insert new patient record
        $insertPatientQuery = "INSERT INTO Patients (FirstName, LastName, PatientID, receptionist_id) VALUES ('$firstName', '$lastName', '$patientid', $receptionistID)";
        $result = mysqli_query($con, $insertPatientQuery);

        if ($result) {
            // Insertion successful
            echo '<script>alert("New patient account created successfully.");';
            echo 'window.location.href = "newpatientform.php?receptionistID=' . $receptionistID . '";</script>';
        } else {
            // Insertion failed
            echo '<script>alert("Failed to create new patient account. Please try again.");';
            echo 'window.location.href = "newpatientform.php?receptionistID=' . $receptionistID . '";</script>';
        }
    }

    mysqli_close($con);
}
?>