

function validate() {
    const firstName = document.getElementById("first").value;
    const lastName = document.getElementById("last").value;
    const password = document.getElementById("password").value;
    const id = document.getElementById("identification").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("tel").value;
    const isEmailConfirmationRequested = document.getElementById("confirmation").checked;

    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{1,16}$/;
    const idRegex = /^\d{1,2}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{3,5}$/;
    //const phoneRegex = /^\d{3}[-\s]\d{3}[-\s]\d{4}$/;

    let errorMessage = null;

    if (!firstName) {
        errorMessage = "Receptionist's First Name is missing. Please enter:";
        document.getElementById("first").focus();
    } else if (!lastName) {
        errorMessage = "Receptionist's Last Name is missing. Please enter:";
        document.getElementById("last").focus();
    } else if (!password) {
        errorMessage = "Receptionist's Password is missing. Please enter:";
        document.getElementById("password").focus();
    } else if (!id) {
        errorMessage = "Receptionist's ID is missing. Please enter:";
        document.getElementById("identification").focus();
    } else if (!phone) {
        errorMessage = "Receptionist's Number is missing. Please enter:";
        document.getElementById("tel").focus();
    } else if (!passwordRegex.test(password)) {
        errorMessage = "Password must contain at least 1 uppercase letter, 1 special character, 1 numeric character, and be at most 16 characters long.";
        document.getElementById("password").focus();
    } else if (!idRegex.test(id)) {
        errorMessage = "ID must be a between 1 to 2 digits.";
        document.getElementById("identification").focus();
    } else if (!phoneRegex.test(phone)) {
        errorMessage = "Invalid phone number format. Please enter a 10-digit phone number separated by spaces or dashes.";
        document.getElementById("tel").focus();
    } else if (!isEmailConfirmationRequested && email) {
        errorMessage = "Email confirmation is not requested, please remove the email address.";
        document.getElementById("email").focus();
    } else if ((isEmailConfirmationRequested && !email)) {
        errorMessage = "Email confirmation is requested. Please enter an email address:";
        document.getElementById("email").focus();
    } else if (isEmailConfirmationRequested && !emailRegex.test(email)) {
        errorMessage = "Invalid email address format. Please enter a valid email address:";
        document.getElementById("email").focus();
    }

    if (errorMessage) {
        console.log(errorMessage);
        alert(errorMessage);
        return false;

    } else {
        console.log("Hello");
        return true;
    }
}



document.getElementById("healthForm").addEventListener("submit", function (event) {
    if (!validate()) {
        event.preventDefault(); // Prevent the default form submission
    }// Call your validation function
});
document.getElementById("confirmation").addEventListener("change", function () {
    const emailRequiredMessage = document.getElementById("email-required");

    if (this.checked) {
        emailRequiredMessage.textContent = "REQUIRED";
    } else {
        emailRequiredMessage.textContent = "";
    }
});

document.getElementById("reset").addEventListener("click", function () {
    document.getElementById("first").value = "";
    document.getElementById("last").value = "";
    document.getElementById("password").value = "";
    document.getElementById("identification").value = "";
    document.getElementById("email").value = "";
    document.getElementById("tel").value = "";
    document.getElementById("confirmation").checked = false;
    document.getElementById("transaction").selectedIndex = 0;
    document.getElementById("email-required").textContent = "";
});
