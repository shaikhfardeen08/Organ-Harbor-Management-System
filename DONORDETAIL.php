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
$sql = "SELECT * FROM donorreg"; // Replace 'donor_table' with your actual table name
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
    <!-- Include any necessary stylesheets or scripts here -->
</head>
<body>
    <div class="content">
        <h1>Donor Details</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Blood Group</th>
                <th>Donor Status</th>
                <th>Organ to Donate</th>
                <th>Cause of Death</th>
                <!-- Include other column headers here -->
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["contactNumber"] . "</td>";
                    echo "<td>" . $row["bloodGroup"] . "</td>";
                    echo "<td>" . $row["donorStatus"] . "</td>";
                    echo "<td>" . $row["organToDonate"] . "</td>";
                    echo "<td>" . $row["causeOfDeath"] . "</td>";
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
