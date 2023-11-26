<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $prodate = $_POST["prodate"];
    $protype = $_POST["protype"];
    $appointmentid = $_POST["aptid"];
    $receptionistID = $_POST["receptionistID"];

    echo '<script>';
    echo 'if(confirm("You are about to REQUEST a Procedure, are you sure you want to do so?")) {';
    $appointmentQuery = "SELECT * FROM Appointments WHERE AppointmentID=$appointmentid";
    $appointmentResult = mysqli_query($con, $appointmentQuery);

    if ($appointmentResult->num_rows > 0) {
        $appointmentData = $appointmentResult->fetch_assoc();
        $patientid = $appointmentData["PatientID"];
        $doctorid = $appointmentData["DoctorsID"];
        echo 'console.log("Patient ID: ' . $patientid . '");';
        echo 'console.log("Doctor ID: ' . $doctorid . '");';
        // Generate Procedure ID
        $procedureid = rand(1, 100);

        // Insert into Procedures table
        $insertProcedureQuery = "INSERT INTO Procedures (PatientsID, DoctorsID, ProcedureDate, ProcedureType, ProcedureID, AppointmentID) VALUES ($patientid, $doctorid, '$prodate', '$protype', $procedureid, $appointmentid)";
        $insertResult = mysqli_query($con, $insertProcedureQuery);

        if ($insertResult) {
            echo 'alert("Procedure Made. Your Procedure ID is: ' . $procedureid . '");';
            echo 'window.location.href = "scheduleprocedureform.php?receptionistID=' . $receptionistID . '";';
        } else {
            echo 'alert("Failed to schedule the procedure. Please try again.");';
            echo 'window.location.href = "scheduleprocedureform.php?receptionistID=' . $receptionistID . '";';
        }
    } else {
        // Patient doesn't have a valid appointment
        echo 'alert("Please make sure a valid appointment exists before scheduling a procedure.");';
        echo 'window.location.href = "createappointmentform.php?receptionistID=' . $receptionistID . '";';
    }

    echo '} else {';
    // Redirect to scheduleprocedure.php in case the user cancels the confirmation
    echo 'window.location.href = "scheduleprocedureform.php?receptionistID=' . $receptionistID . '";';
    echo '}';
    echo '</script>';

    mysqli_close($con);
}
?>