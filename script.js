function attachEventListeners() {
    var receptionistsButton = document.getElementById("receptionistsButton");
    if (receptionistsButton) {
        receptionistsButton.addEventListener("click", function () {
            window.location.href = "receptionist.php";
        });
    }

    var patientsButton = document.getElementById("patientsButton");
    if (patientsButton) {
        patientsButton.addEventListener("click", function () {
            window.location.href = "patients.php";
        });
    }

    var medicalRecordsButton = document.getElementById("medicalRecordsButton");
    if (medicalRecordsButton) {
        medicalRecordsButton.addEventListener("click", function () {
            window.location.href = "records.php";
        });
    }

    var appointmentsButton = document.getElementById("appointmentsButton");
    if (appointmentsButton) {
        appointmentsButton.addEventListener("click", function () {
            window.location.href = "appointments.php";
        });
    }

    var homeButton = document.getElementById("homeButton");
    if (homeButton) {
        homeButton.addEventListener("click", function () {
            window.location.href = "process.php";
        });
    }

    var homeButtonRecords = document.getElementById("homeButtonRecords");
    if (homeButtonRecords) {
        homeButtonRecords.addEventListener("click", function () {
            window.location.href = "process.php";
        });
    }

    var homeButtonPatients = document.getElementById("homeButtonPatients");
    if (homeButtonPatients) {
        homeButtonPatients.addEventListener("click", function () {
            window.location.href = "process.php";
        });
    }

    var homeButtonAppointment = document.getElementById("homeButtonAppointment");
    if (homeButtonAppointment) {
        homeButtonAppointment.addEventListener("click", function () {
            window.location.href = "process.php";
        });
    }
}

document.addEventListener("DOMContentLoaded", attachEventListeners);
