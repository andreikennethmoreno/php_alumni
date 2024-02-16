<?php
/* Database credentials. Assuming you are running MySQL
   server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'alumni');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    echo "Database connected successfully!";
}

// Escape user inputs for security
$emailaddress = mysqli_real_escape_string($con, $_REQUEST['emailaddress']);
$password = mysqli_real_escape_string($con, $_REQUEST['password']);
$confirmpassword = mysqli_real_escape_string($con, $_REQUEST['confirmpassword']);

// Check if password and confirmpassword match
if ($password !== $confirmpassword) {
    // Open the modal if passwords do not match
    header("Location: 500.html");
    exit();
}

// Attempt insert query execution
$sql = "INSERT INTO login_db (emailaddress, password)
VALUES ('$emailaddress','$password')";

if (mysqli_query($con, $sql)) {
    header("Location: login.html");
    exit();

} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>
