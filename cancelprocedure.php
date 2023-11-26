<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $procedureid = $_POST["proid"];
    $receptionistID = $_POST["receptionistID"];

    echo '<script>';
    $deleteProcedureQuery = "SELECT * FROM Procedures WHERE ProcedureID=$procedureid";
    $updateResult = mysqli_query($con, $deleteProcedureQuery);

    if ($updateResult->num_rows > 0) {
        echo 'if(confirm("You are about to CANCEL this procedure. Are you sure you want to do so?")) {';
        // Delete the main appointment
        $deleteAppointmentQuery = "DELETE FROM Procedures WHERE ProcedureID=$procedureid";
        $deleteResult = mysqli_query($con, $deleteAppointmentQuery);

        if ($deleteResult) {
            echo 'alert("Procedure Deleted.");';
            echo 'window.location.href = "index.php?receptionistID=' . $receptionistID . '";';

        } else {
            echo 'alert("Failed to cancel appointment. Please try again.");';
            echo 'window.location.href = "cancelprocedureform.php?receptionistID=' . $receptionistID . '";';
        }
        echo '}';
    } else {
        // Appointment doesn't exist
        echo 'alert("Procedure ID does not exist for the patient. Please check and re-enter Procedure ID");';
        echo 'window.location.href = "cancelprocedureform.php?receptionistID=' . $receptionistID . '";';
    }

    echo '</script>';
    mysqli_close($con);
}
?>