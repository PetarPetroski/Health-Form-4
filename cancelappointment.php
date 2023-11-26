<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $appointmentid = $_POST["aptid"];
    $receptionistID = $_POST["receptionistID"];

    echo '<script>';
    $deleteAppointmentQuery = "SELECT * FROM Appointments WHERE AppointmentID=$appointmentid";
    $updateResult = mysqli_query($con, $deleteAppointmentQuery);

    if ($updateResult->num_rows > 0) {
        $procedureQuery = "SELECT * FROM Procedures WHERE AppointmentID=$appointmentid";
        $procedureResult = mysqli_query($con, $procedureQuery);

        echo 'if(confirm("You are about to CANCEL this appointment. If this is a pre-surgerical appointment cancelling it will cancel your procedure. Are you sure you want to do so?")) {';

        // Delete procedure appointment if it exists
        if ($procedureResult->num_rows > 0) {
            $deleteProcedureQuery = "DELETE FROM Procedures WHERE AppointmentID=$appointmentid";
            mysqli_query($con, $deleteProcedureQuery);
        }

        // Delete the main appointment
        $deleteAppointmentQuery = "DELETE FROM Appointments WHERE AppointmentID=$appointmentid";
        $deleteResult = mysqli_query($con, $deleteAppointmentQuery);

        if ($deleteResult) {
            echo 'alert("Appointment Deleted. If This Is a Pre-surgical Appoinment your Procedure Was Also Cancelled");';
            echo 'window.location.href = "cancelappointmentform.php?receptionistID=' . $receptionistID . '";';

        } else {
            echo 'alert("Failed to cancel appointment. Please try again.");';
            echo 'window.location.href = "cancelappointmentform.php?receptionistID=' . $receptionistID . '";';
        }
        echo '}';
    } else {
        // Appointment doesn't exist
        echo 'alert("Appointment ID does not exist for the patient. Please check and re-enter Appointment ID");';
        echo 'window.location.href = "cancelappointmentform.php?receptionistID=' . $receptionistID . '";';
    }

    echo '</script>';
    mysqli_close($con);
}
?>