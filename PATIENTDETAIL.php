<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "organdonation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve donor details
$sql = "SELECT * FROM patientreg"; // Replace 'donor_table' with your actual table name
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <!-- Include any necessary stylesheets or scripts here -->
</head>
<body>
    <div class="content">
        <h1>Patient Details</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Required Date and Time</th>
                <th>Organ Needed</th>
                <th>Blood Group</th>
                <!-- Include other column headers here -->
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["PatientName"] . "</td>";
                    echo "<td>" . $row["PatientAge"] . "</td>";
                    echo "<td>" . $row["PatientGender"] . "</td>";
                    echo "<td>" . $row["PatientAddress"] . "</td>";
                    echo "<td>" . $row["PatientEmail"] . "</td>";
                    echo "<td>" . $row["PatientNumber"] . "</td>";
                    echo "<td>" . $row["DateTime"] . "</td>";
                    echo "<td>" . $row["NeededOrgan"] . "</td>";
                    echo "<td>" . $row["PatientBloodGrp"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No records found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
