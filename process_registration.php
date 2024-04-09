<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "organdonation";
    $registrationSuccessful=false;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $PatientName = $_POST['PatientName'];
    $PatientAge = $_POST['PatientAge'];
    $PatientGender = $_POST['PatientGender'];
    $PatientAddress = $_POST['PatientAddress'];
    $PatientEmail = $_POST['PatientEmail'];
    $PatientNumber = $_POST['PatientNumber'];
    $DateTime = $_POST['DateTime'];
    $NeededOrgan = $_POST['NeededOrgan'];
    $PatientBloodGrp = $_POST['PatientBloodGrp'];

    // Prepare and execute SQL query to insert data into the patientreg table
    $sqlPatientReg = "INSERT INTO patientreg (PatientName, PatientAge, PatientGender, PatientAddress, PatientEmail, PatientNumber, DateTime, NeededOrgan, PatientBloodGrp) VALUES ('$PatientName', '$PatientAge', '$PatientGender', '$PatientAddress', '$PatientEmail', '$PatientNumber', '$DateTime', '$NeededOrgan', '$PatientBloodGrp')";

    // Prepare and execute SQL query to insert data into the notdonated_patient table
    $sqlNotDonatedPatient = "INSERT INTO notdonated_patient (PatientName, PatientAge, PatientGender, PatientAddress, PatientEmail, PatientNumber, DateTime , NeededOrgan, PatientBloodGrp) VALUES ('$PatientName','$PatientAge', '$PatientGender', '$PatientAddress', '$PatientEmail', '$PatientNumber', '$DateTime' ,'$NeededOrgan','$PatientBloodGrp')";

    // Insert data into patientreg table
    $resultPatientReg = mysqli_query($conn, $sqlPatientReg);

    // Insert data into notdonated_patient table
    $resultNotDonatedPatient = mysqli_query($conn, $sqlNotDonatedPatient);

    if ($resultPatientReg && $resultNotDonatedPatient) {
      $registrationSuccessful=true;
    
    } else {
        // Show error message
        echo "Error: " . mysqli_error($conn);
    }       if ($registrationSuccessful) {
        echo "<script>alert('Registration successful');</script>";
        echo '<script>window.location.href = "patientsignup.php";</script>';
        exit();
    }
    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- your head content here -->
</head>
<body>
    <div class="registration-container">
        <h2>Organ Donor Registration</h2>
        <?php
        if ($registrationSuccessful) {
            echo "<script>alert('Registration successful');</script>";
            echo '<script>window.location.href = "patientsignup.php";</script>';
        }
        ?>
    </div>
</body>
</html>