<?php
session_start();
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $aptdate = $_POST["aptdate"];
    $apttype = $_POST["apttype"];
    $doctorid = $_POST["doctorid"];
    $receptionistID = $_POST["receptionistID"];
    $patientid = $_POST["patientid"];

    echo '<script>';
    echo 'if(confirm("You are about to REQUEST an appointment, are you sure you want to do so?")) {';
    $appointmentid = rand(1, 100);
    $insertAppointmentQuery = "INSERT INTO Appointments (PatientID, DoctorsID, AppointmentDate, AppointmentType, AppointmentID) VALUES ($patientid, $doctorid, '$aptdate', '$apttype', $appointmentid)";
    $updateResult = mysqli_query($con, $insertAppointmentQuery);

    if ($updateResult) {
        $procedureQuery = "SELECT * FROM Procedures WHERE AppointmentID=$appointmentid";
        $updatedResult = mysqli_query($con, $procedureQuery);

        if ($updatedResult->num_rows > 0) {
            // Patient already has a procedure
            echo 'alert("Appointment Made. Your Appointment ID is: ' . $appointmentid . '");';
        } else {
            // Patient doesn't have a procedure
            echo 'alert("Appointment Made. Your Appointment ID is: ' . $appointmentid . '. Redirecting to Schedule a Procedure Form.");';
            echo 'window.location.href = "scheduleprocedureform.php?receptionistID=' . $receptionistID . '";';
        }
    } else {
        // Update failed
        echo 'alert("Failed to update patient records. Please try again.");';
        echo 'window.location.href = "createappointmentform.php?receptionistID=' . $receptionistID . '";';

    }
    echo '} else {';
    // Redirect to createappointmentform.php in case the user cancels the confirmation
    echo 'window.location.href = "createappointmentform.php?receptionistID=' . $receptionistID . '";';
    echo '}';
    echo '</script>';

    mysqli_close($con);
}
?>