<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "organdonation";
    $registrationSuccessful = false;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $bloodGroup = $_POST['bloodGroup'];
    $donorStatus = $_POST['donorStatus'];
    $organToDonate = $_POST['organToDonate'];
    $causeOfDeath = isset($_POST['causeOfDeath']) ? $_POST['causeOfDeath'] : "";

    // Perform any necessary validation and sanitization

    // Insert the data into your database
    $insertQuery = "INSERT INTO donorreg (name, age, gender, address, email, contactNumber, bloodGroup, donorStatus, organToDonate, causeOfDeath)
                    VALUES ('$name', '$age', '$gender', '$address', '$email', '$contactNumber', '$bloodGroup', '$donorStatus', '$organToDonate', '$causeOfDeath')";

    if ($conn->query($insertQuery) === TRUE) {
        $registrationSuccessful = true;
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
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
        <h2>Donor Registration</h2>
        <?php
        if ($registrationSuccessful) {
            echo "<script>alert('Registration successful');</script>";
            echo '<script>window.location.href = "Donor.php";</script>';
        }
        ?>
    </div>
</body>
</html>