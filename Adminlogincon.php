<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted username and password
    $submittedUsername = $_POST["username"];
    $submittedPassword = $_POST["password"];

    // Hardcoded admin credentials for demonstration purposes
    $adminUsername = "admin";
    $adminPassword = "admin";

    // Check if the submitted credentials match the admin credentials
    if ($submittedUsername === $adminUsername && $submittedPassword === $adminPassword) {
        // Successful login, redirect to admin panel or dashboard
        header("Location: Adminpanel.php");
        exit;
    } else {
        // Incorrect credentials, display an error message
        $errorMessage = "Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Result</title>
</head>
<body>
    <?php if (isset($errorMessage)) { ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php } ?>
</body>
</html>
