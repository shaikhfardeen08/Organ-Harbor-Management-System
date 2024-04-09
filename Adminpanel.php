<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
// Replace these with your actual database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "organdonation";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="Partial/Images/harborLogo.png" type="image/png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <title>Admin Panel</title>

    <style>
        /* Add this style for the close button */
        #close-sidebar {
            font-size: 30px;
            color: red;
            cursor: pointer;
        }

        /* Add this style for the panel */
        .panel {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            transition: margin-left 0.5s;
        }

        .centered-panel {
            margin-left: 250px;
            transition: margin-left 0.5s;
        }

        .centered-panel.collapsed {
            margin-left: 0;
        }

        .center-heading {
            text-align: center;
        }

        .delete-button {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 6px 12px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .delete-button:hover {
            background-color: red;
        }
    </style>
</head>

<body>
    <div id="toggle-sidebar">&#9776;</div>

    <div class="sidebar active">
        <div id="close-sidebar">&times;</div>
        <link rel="stylesheet" href="Adminpanelbar.css">
        <ul>
            <li><a href="Adminpanel.php">Donor Details</a></li>
            <li><a href="Patientdetailpanel.php">Patient Details</a></li>
            <li><a href="Searchdonorpanel.php">Search Donor</a></li>
            <li><a href="Searchpatientpanel.php">Search Patient</a></li>
            <li><a href="Donatedptpanel.php">Donated Patients</a></li>
            <li><a href="Ntdonatedptpanel.php">Not Donated Patients</a></li>
            <li><a href="Orgdonateprocess.php">Organ Donate Process</a></li>
            <li><a href="Adminlogin.php" style="color: white;" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">Log Out</a></li>

        </ul>
    </div>

    <div class="content centered-panel">
        <h1 class="center-heading"> Welcome to the Admin Panel</h1>

        <!-- Donor Details Panel -->
        <div class="panel">
            <h2>Donor Details</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Blood Group</th>
                        <th>Donor Status</th>
                        <th>Organ Willing to Donate</th>
                        <th>Cause of Death</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connect to your database here (similar to the code you provided earlier)

                    // Query to fetch donor details
                    $query = "SELECT * FROM donorreg"; // Replace with your actual table name
                    $result = mysqli_query($conn, $query);

                    // Loop through the results and populate the table rows
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['age']}</td>";
                        echo "<td>{$row['gender']}</td>";
                        echo "<td>{$row['address']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['contactNumber']}</td>";
                        echo "<td>{$row['bloodGroup']}</td>";
                        echo "<td>{$row['donorStatus']}</td>";
                        echo "<td>{$row['organToDonate']}</td>";
                        echo "<td>{$row['causeOfDeath']}</td>";
                        echo "<td><button type='submit'  class='delete-button' name='delete' value='{$row['id']}'>Delete</button></td>"; // Add a delete button here

                        echo "</td>";
                        echo "</tr>";
                    }

                    // Handle record deletion
                    if (isset($_GET['delete'])) {
                        $deleteId = $_GET['delete'];
                        $deleteQuery = "DELETE FROM donorreg WHERE id = $deleteId";
                        if (mysqli_query($conn, $deleteQuery)) {
                            echo "<script>alert('Record deleted successfully');</script>";
                            header("Location: Adminpanel.php"); // Redirect back to the same page to refresh the table
                            exit();
                        } else {
                            echo "Error deleting record: " . mysqli_error($conn);
                        }
                    }

                    // Close the database connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <script>
        const sidebar = document.querySelector('.sidebar');
        const toggleSidebar = document.getElementById('toggle-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const contentPanel = document.querySelector('.content');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            contentPanel.classList.toggle('collapsed'); // Toggle the collapsed class
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('active');
            contentPanel.classList.add('collapsed'); // Add the collapsed class when sidebar is closed
        });
        
    </script>
</body>

</html>