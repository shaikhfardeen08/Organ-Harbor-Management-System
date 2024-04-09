<?php
// Include the database connection file
include "ORGDONATEPROCES.php";

// Fetch donated patient records from the database
$query = "SELECT * FROM donated_patients";
$result = mysqli_query($conn, $query);

// Function to delete a donated patient record
function deleteDonatedPatient($conn, $deleteId) {
    $deleteQuery = "DELETE FROM donated_patients WHERE id = $deleteId";
    if (mysqli_query($conn, $deleteQuery)) {
        return true;
    } else {
        return false;
    }
}

// Example usage of the delete function
if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
}

// Example usage of adding a new donated patient record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Extract data from the form
    $PatientName = $_POST['patient_name'];
    $PatientAge = $_POST['patient_age'];
    $PatientGender = $_POST['patient_gender'];
    $PatientAddress = $_POST['patient_address'];
    $PatientEmail = $_POST['patient_email'];
    $PatientNumber = $_POST['patient_number'];
    $Datetime = $_POST['date_time'];
    $PatientBloodGrp = $_POST['patient_bloodgrp'];

    // Insert data into the donated_patients table
    $insertQuery = "INSERT INTO donated_patients (PatientName, PatientAge, PatientGender,PatientAddress, PatientEmail, PatientNumber, Datetime, PatientBloodGrp ) 
                    VALUES ('$PatientName', '$PatientAge', '$PatientGender', $PatientAddress, $PatientEmail, $PatientNumber, $Datetime, $PatientBloodGrp )";
    
    if (mysqli_query($conn, $insertQuery)) {
        echo "New patient record added!";
    } else {
        echo "Error adding patient record: " . mysqli_error($conn);
    }
}
?>
