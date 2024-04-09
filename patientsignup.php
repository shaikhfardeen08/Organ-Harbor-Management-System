<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="Partial/Images/harborLogo.png" type="image/png" />
    <!-- Add custom styles for the logo -->
    <style>
        .navbar-brand img {
            width: 90px; /* Adjust the width as needed */
            height: auto;
            margin-right: 10px; /* Add spacing between logo and text */
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Patient Registration</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .registration-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 500px;
            margin: 50px auto;
            text-align: center;
        }
        .registration-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .input-field {
            margin-bottom: 20px;
        }
        .input-field label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .input-field input,
        .input-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .register-button {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .register-button:hover {
            background-color: #555;
        }
        .nav-link.myHover{
            color: #a3ed86 ;
        }
        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
            display: none; /* Initially hide the error message */
        }
    </style>
</head>
<body>

<?php require 'Partial/_nav.php'?>

<div class="registration-container">
    <h2>Patient Registration</h2>
    <form action="process_registration.php" method="post">
        <div class="input-field">
            <label for="PatientName">Name:</label>
            <input type="text" id="PatientName" name="PatientName" required>
            <div class="error-message" id="nameErrorMessage">Please Enter Your Full Name</div>
        </div>
        <div class="input-field">
            <label for="PatientAge">Age:</label>
            <input type="number" id="PatientAge" name="PatientAge" required>
        </div>
        <div class="input-field">
            <label for="PatientGender">Gender:</label>
            <select id="PatientGender" name="PatientGender" required>
                <option value="" selected hidden>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="input-field">
            <label for="PatientAddress">Address:</label>
            <input type="text" id="PatientAddress" name="PatientAddress" required>
        </div>
        <div class="input-field">
            <label for="PatientEmail">Email:</label>
            <input type="email" id="PatientEmail" name="PatientEmail" required>
        </div>
        <div class="input-field">
            <label for="PatientNumber">Contact Number:</label>
            <input type="tel" id="PatientNumber" name="PatientNumber" required>
        </div>
        <div class="input-field">
            <label for="DateTime">Required Date and Time:</label>
            <input type="datetime-local" id="DateTime" name="DateTime" required>
        </div>
        <div class="input-field">
            <label for="NeededOrgan">Select Organ:</label>
            <select id="NeededOrgan" name="NeededOrgan" required>
                <option value="" selected hidden>Select Organ</option>
                <option value="Kidney">Kidney</option>
                <option value="Liver">Liver</option>
                <option value="Eyes">Eyes</option>
                <option value="Intestine">Intestine</option>
                <option value="Pancreas">Pancreas</option>
                <option value="Heart">Heart</option>
            </select>
        </div>
        <div class="input-field">
            <label for="PatientBloodGrp">Blood Group:</label>
            <select id="PatientBloodGrp" name="PatientBloodGrp" required>
                <option value="" selected hidden>Select Blood Group</option>
                <option value="O">O</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
            </select>
        </div>
        <button class="register-button" type="submit">Register</button>
    </form>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
    const PatientNumber = document.getElementById('PatientNumber');
    PatientNumber.addEventListener('blur', function() {
      const contactValue = PatientNumber.value.toString().trim();
      if (contactValue.length !== 10) {
        alert('Contact Number Must Be 10 Digits.');
        PatientNumber.value = ''; // Clear the input field
        Input.focus(); // Bring focus back to the input field
      }
    });
  });
  document.addEventListener('DOMContentLoaded', function() {
      const PatientEmail = document.getElementById('PatientEmail');

      PatientEmail.addEventListener('input', function() {
        const emailValue = PatientEmail.value.trim();
        if (emailValue.includes('@') && !emailValue.endsWith('gmail.com')) {
            PatientEmail.value = emailValue + 'gmail.com';
        }
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
      const PatientAge = document.getElementById('PatientAge');
      PatientAge.addEventListener('blur', function() {
        const age = parseInt(PatientAge.value.trim());
        if (age < 0) {
          alert('Enter an valid age.');
          PatientAge.value = ''; // Clear the input field
          PatientAge.focus(); // Bring focus back to the input field
        }
      });
    });
</script>

</body>
</html>
