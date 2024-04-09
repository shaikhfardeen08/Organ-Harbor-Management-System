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
  <title>Donor Registration</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
require 'Partial/_nav.php'
?>
  <style>
    .center-text {
      text-align: center
    }

    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
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
      font-size: 24px;
      color: #333;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

        .btn-register {
            background-color: #333;
            color:#fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-register:hover {
            background-color: #555;
        }
      
  </style>
  <script>
    
    function handleDonorStatusChange() {
      const donorStatus = document.getElementById("donorStatus");
      const organToDonate = document.getElementById("organToDonate");
      const causeOfDeath = document.getElementById("causeOfDeath");

      if (donorStatus.value === "Alive") {
        organToDonate.querySelector('[value="Heart"]').disabled = true;
        organToDonate.querySelector('[value="Eyes"]').disabled = true;
        causeOfDeath.disabled = true; // Disable the causeOfDeath input field
      } else {
        organToDonate.querySelector('[value="Heart"]').disabled = false;
        organToDonate.querySelector('[value="Eyes"]').disabled = false;
        causeOfDeath.disabled = false; // Enable the causeOfDeath input field
      }
    }
    
    function handleCauseOfDeathChange() {
      const causeOfDeath = document.getElementById("causeOfDeath");
      const messageElement = document.getElementById("causeOfDeathMessage");
      
      if (causeOfDeath.value !== "") {
        messageElement.style.display = "block"; // Show the message if a cause of death is selected
      } else {
        messageElement.style.display = "none"; // Hide the message if no cause of death is selected
      }
    }
    document.addEventListener('DOMContentLoaded', function() {
      const emailInput = document.getElementById('emailInput');

      emailInput.addEventListener('input', function() {
        const emailValue = emailInput.value.trim();
        if (emailValue.includes('@') && !emailValue.endsWith('gmail.com')) {
          emailInput.value = emailValue + 'gmail.com';
        }
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
      const ageInput = document.getElementById('ageInput');
      ageInput.addEventListener('blur', function() {
        const age = parseInt(ageInput.value.trim());
        if (age < 18) {
          alert('You must be 18+ to donate an organ.');
          ageInput.value = ''; // Clear the input field
          ageInput.focus(); // Bring focus back to the input field
        }
      });
    });
    document.addEventListener('DOMContentLoaded', function() {
    const contactInput = document.getElementById('contactInput');
    contactInput.addEventListener('blur', function() {
      const contactValue = contactInput.value.toString().trim();
      if (contactValue.length !== 10) {
        alert('Contact Number Must Be 10 Digits.');
        contactInput.value = ''; // Clear the input field
        Input.focus(); // Bring focus back to the input field
      }
    });
  });
  </script>
</head>

<body>
  <div class="container">
    <div class="registration-container">
      <h2 class="center-text">Donor Registration</h2>
      <form action="Donorcon.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" name="age" id="ageInput" placeholder="Age" required>
        </div>
        <div class="form-group">
          <select class="form-control" name="gender" required>
            <option value="" selected disabled>Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="address" placeholder="Address" required>
        </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="number" class="form-control" name="contactNumber" id="contactInput" placeholder="Contact Number" required>
        </div>
        <div class="form-group">
          <select class="form-control" name="bloodGroup" required>
            <option value="" selected disabled>Select Blood Group</option>
            <option value="O">O</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="donorStatus" id="donorStatus" onchange="handleDonorStatusChange()" required>
            <option value="" selected disabled>Donor Status</option>
            <option value="Alive">Alive</option>
            <option value="Deceased">Deceased</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" name="organToDonate" id="organToDonate" required>
            <option value="" selected disabled>Select Organ to Donate</option>
            <option value="Kidney">Kidney</option>
            <option value="Liver">Liver</option>
            <option value="Intestine">Intestine</option>
            <option value="Pancreas">Pancreas</option>
            <option value="Lung">Lung</option>
            <option value="Heart">Heart</option>
            <option value="Eyes">Eyes</option>
          </select>
        </div>
        <select class="form-control" name="causeOfDeath" id="causeOfDeath" onchange="handleCauseOfDeathChange()">
          <option value="" selected disabled>Cause of Death (if Deceased)</option>
          <option value="Normal">Normal</option>
          <option value="Accident">Accident</option>
          <option value="Other">Other</option>
        </select>
        
        <br>
        <!-- Add file inputs for medical reports -->
        <div class="form-group">
          <input type="file" class="form-control" name="imagingStudies" accept="image/*" required>
          <small>Upload Imaging Studies Report</small>
        </div>
        <div class="form-group">
          <input type="file" class="form-control" name="bloodTest" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
          <small>Upload Blood Test Report</small>
        </div>
        <div class="form-group" style="color:red">
          <small>*NOTE: Only register if you are not suffering from any disease</small></div>
        <button class="btn btn-register" type="submit">Register</button>
      </form>
    </div>
  </div>
</body>

</html>
