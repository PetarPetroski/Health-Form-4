<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $shots = $_POST["shots"];
    $illness = $_POST["illness"];
    $patientid = $_POST["patientid"];
    $receptionistID = $_POST["receptionistID"];

    // Check if patient already exists
    $checkPatientQuery = "SELECT * FROM Patients WHERE PatientID = '$patientid'";
    $checkPatientResult = mysqli_query($con, $checkPatientQuery);

    if ($checkPatientResult->num_rows > 0) {
        echo '<script>';
        echo 'if(confirm("Are you sure you want to update patient records?")) {';
        // Perform the update here (I assume you want to update the shots and illness columns)
        $updatePatientQuery = "UPDATE MedicalRecords SET ShotsGiven = '$shots', Illnesses = '$illness' WHERE PatientID = '$patientid'";
        $updateResult = mysqli_query($con, $updatePatientQuery);

        if ($updateResult) {
            // Update successful
            echo 'alert("Shots and Illnesses Updated.");';
        } else {
            // Update failed
            echo 'alert("Failed to update patient records. Please try again.");';
        }
        echo '}';
        echo 'window.location.href = "updatepatientform.php?receptionistID=' . $receptionistID . '";';
        echo '</script>';
    } else {
        // Insert new patient record
        echo '<script>alert("Patient does not exist, please re-type.");';
        echo 'window.location.href = "updatepatientform.php?receptionistID=' . $receptionistID . '";</script>';

    }

    mysqli_close($con);
}
?>