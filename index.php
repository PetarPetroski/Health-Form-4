<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House of Health Form</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="container">
        <h1>
            House of Health Form
        </h1>
        <form id="healthForm" name="healthForm" action="process.php" method="post">
            <div class="formgrid">
                <label class="grid-item" for="first">First Name:</label>
                <input class="grid-item" type="text" id="first" name="first" placeholder="Ex: John">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="last">Last Name:</label>
                <input class="grid-item" type="text" id="last" name="last" placeholder="Ex: Petroski">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="password">Password:</label>
                <input class="grid-item" type="password" id="password" name="password" placeholder="Ex: Ehdl49$">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="phone">Number:</label>
                <input class="grid-item" type="tel" id="tel" name="phone" placeholder="Ex: 201-699-6969">
                <p class="grid-item">REQUIRED</p>
                <label class="grid-item" for="email">Email:</label>
                <input class="grid-item" type="text" id="email" name="email" placeholder="Ex: jk87@njit.edu">
                <p id="email-required"></p>
                <label class="grid-item" for="identification">Receptionist ID:</label>
                <input class="grid-item" type="number" id="identification" name="identification" placeholder="Ex: 12">
                <p class="grid-item">REQUIRED</p>
            </div>
            <div>
                <input type="checkbox" id="confirmation" name="confirmation" value="confirmation">
                <label for="confirmation"> Check the box to request an email confirmation</label>
            </div>
            <div>
                <label for="transaction">Select a transaction:</label>
                <select name="transaction" id="transaction">
                    <option value="Search A Receptionist’s Account">Search A Receptionist’s Account</option>
                    <option value="Update a Patient’s Record">Update a Patient’s Record</option>
                    <option value="Schedule An Appointment">Book Appointment</option>
                    <option value="Cancel Appointment">Schedule An Appointment</option>
                    <option value="Schedule A Procedure">Schedule A Procedure</option>
                    <option value="Cancel Procedure">Cancel Procedure</option>
                    <option value="Create New Patient Account">Create New Patient Account</option>
                </select>
            </div>
            <div class="bottom-buttons">
                <input type="button" id="reset" name="reset" value="reset">
                <input type="submit" id="submit" name="submit" value="submit">

            </div>
        </form>




    </div>
</body>
<script src="script.js"></script>

</html>