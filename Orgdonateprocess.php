<?php
session_start(); // Start the session
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
include "ORGDONATEPROCES.php";

// Fetch data from transplanted_pair table to get the IDs of transplanted pairs
$query = "SELECT Donor_Id, Patient_Id FROM transplanted_pairs";
$result = mysqli_query($conn, $query);

// Store transplanted pairs in an array
$transplanted_pairs = [];
while ($row = mysqli_fetch_assoc($result)) {
    $transplanted_pairs[] = "(" . $row['Donor_Id'] . ", " . $row['Patient_Id'] . ")";
}

// Convert the array to a string to use in the query
$transplantedPairsString = !empty($transplanted_pairs) ? implode(",", $transplanted_pairs) : '';

// Check if ID is set and valid
if (isset($_POST['transplant_successful'])) {
    $id = $_POST['transplant_successful'];

    // Fetch the donor and patient IDs from the orgdonateprocess table
    $query = "SELECT donor_id, patient_id FROM orgdonateprocess WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $donor_id = $row['donor_id'];
        $patient_id = $row['patient_id'];

        // Move patient record to donated_patients table
        $insertQuery = "INSERT INTO donated_patients (PatientName, PatientAge, PatientGender, PatientAddress, PatientEmail, PatientNumber, DateTime, NeededOrgan, PatientBloodGrp)
                        SELECT PatientName, PatientAge, PatientGender, PatientAddress, PatientEmail, PatientNumber, DateTime, NeededOrgan, PatientBloodGrp
                        FROM patientreg WHERE id = $patient_id";
        mysqli_query($conn, $insertQuery);

        // Delete the record from orgdonateprocess table
        $deleteQuery = "DELETE FROM orgdonateprocess WHERE id = $id";
        mysqli_query($conn, $deleteQuery);

        // Delete the record from notdonated_patient table
        $deletePatientQuery = "DELETE FROM notdonated_patient WHERE id = $patient_id";
        mysqli_query($conn, $deletePatientQuery);

        // Move donor and patient IDs along with names to transplanted_pairs table
        $insertTransplantedPairQuery = "INSERT INTO transplanted_pairs (Donor_Id, Donor_Name, Patient_Id, Patient_Name)
                SELECT dr.id, dr.name, pr.id, pr.PatientName
                FROM donorreg dr
                JOIN patientreg pr ON dr.id = $donor_id AND pr.id = $patient_id";
        mysqli_query($conn, $insertTransplantedPairQuery);

        // Display a success message
        echo "<script>alert('Transplant Successful for ID: $id');</script>";
    }
}

// Fetch data from donorreg and patientreg tables based on compatibility conditions and exclude transplanted pairs
$query = "
    SELECT 
        dr.id AS donor_id, 
        dr.name AS donor_name, 
        pr.id AS patient_id, 
        pr.PatientName AS patient_name, 
        dr.organToDonate AS donated_organ
    FROM 
        donorreg dr 
    JOIN 
        patientreg pr 
    ON 
        pr.PatientBloodGrp IN ('A', 'AB', 'B', 'O') 
        AND dr.bloodGroup IN ('A', 'AB', 'B', 'O') 
        AND pr.NeededOrgan = dr.organToDonate
    WHERE 
        NOT EXISTS (
            SELECT 1 
            FROM orgdonateprocess odp 
            WHERE odp.donor_id = dr.id 
            OR odp.patient_id = pr.id
        )
        AND NOT EXISTS (
            SELECT 1
            FROM transplanted_pairs tp
            WHERE (dr.id = tp.Donor_Id AND pr.id = tp.Patient_Id)
        )
";
// If there are transplanted pairs, add them to the exclusion criteria
if (!empty($transplantedPairsString)) {
    $query .= " AND (dr.id, pr.id) NOT IN ($transplantedPairsString)";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed:" . mysqli_error($conn));
}

// Insert data into the orgdonateprocess table
while ($row = mysqli_fetch_assoc($result)) {
    $donor_id = $row["donor_id"];
    $donor_name = $row["donor_name"];
    $patient_id = $row["patient_id"];
    $patient_name = $row["patient_name"];
    $organ = $row["donated_organ"];

    $insertQuery = "
        INSERT INTO orgdonateprocess (donor_id, donor_name, patient_id, patient_name, donated_organ, match_time)
        VALUES ('$donor_id', '$donor_name', '$patient_id', '$patient_name', '$organ', NOW())
    ";
    mysqli_query($conn, $insertQuery);
}

// Fetch data from orgdonateprocess table
$query = "SELECT * FROM orgdonateprocess";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="Partial/Images/harborLogo.png" type="image/png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Admin Panel</title>

    <style>
        /* Add this style for the close button */
        #close-sidebar {
            color: red;
            cursor: pointer;
            font-size: 30px;
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

        /* Add this style for the hand icon */
        .hand-icon {
            font-size: 24px;
            cursor: pointer;
        }

        .center-heading {
            text-align: center;
        }

        .toggle-sidebar {
            font-size: 30px;
        }
        
        /* Add this style for the button */
        .btn-success-button {
            background-color: white !important; /* Set background color to black */
            color: white !important; /* Set text color to black */
            border: none;
            border-radius: 5px;
            padding: 6px 12px;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-success-button:hover {
            background-color: green !important; /* Change background color to green on hover */
        }
    </style>
</head>

<body>
    <div id="toggle-sidebar">&#9776;
    </div>

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
        <h1 class="center-heading">Welcome to the Admin Panel</h1>

        <!-- Organ Donate Process Panel -->
        <div class="panel">
            <h2>Organ Donate Process</h2>
            <?php
            // Display the results
            echo "<table class='table'>";
            echo "<thead><tr><th>ID</th><th>Donor ID</th><th>Donor Name</th><th>Patient ID</th><th>Patient Name</th><th>Donated Organ</th><th>Match Time</th><th>Action</th></tr></thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['donor_id']}</td>";
                echo "<td>{$row['donor_name']}</td>";
                echo "<td>{$row['patient_id']}</td>";
                echo "<td>{$row['patient_name']}</td>";
                echo "<td>{$row['donated_organ']}</td>";
                echo "<td>{$row['match_time']}</td>";
                echo "<td>
                <form method='POST'>
                    <button type='submit' name='transplant_successful' value='{$row['id']}' class='btn btn-success'>Record Matched </button>
                </form>
              </td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            ?>
        </div>
    </div>

    <script>
        const sidebar = document.querySelector('.sidebar');
        const toggleSidebar = document.getElementById('toggle-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const contentPanel = document.querySelector('.content');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            contentPanel.classList.toggle('collapsed');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('active');
            contentPanel.classList.add('collapsed');
        });
    </script>
</body>

</html>