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
$studentnumber = mysqli_real_escape_string($con, $_REQUEST['studentnumber']);
$lastname = mysqli_real_escape_string($con, $_REQUEST['lastname']);
$firstname = mysqli_real_escape_string($con, $_REQUEST['firstname']);
$middlename = mysqli_real_escape_string($con, $_REQUEST['middlename']);
$gender = mysqli_real_escape_string($con, $_REQUEST['gender']);
$birthdate = mysqli_real_escape_string($con, $_REQUEST['birthdate']);
$contactnumber = mysqli_real_escape_string($con, $_REQUEST['contactnumber']);
$batch = mysqli_real_escape_string($con, $_REQUEST['batch']);
$course = mysqli_real_escape_string($con, $_REQUEST['course']);
$employmentstatus = mysqli_real_escape_string($con, $_REQUEST['employmentstatus']);




// Attempt insert query execution
$sql = "INSERT INTO alumni_list (studentnumber, lastname, firstname, middlename, gender, birthdate, contactnumber, batch, course, employmentstatus)
VALUES ('$studentnumber','$lastname', '$firstname', '$middlename', '$gender', '$birthdate', '$contactnumber', '$batch', '$course', '$employmentstatus')";

if (mysqli_query($con, $sql)) {
    header("Location: alumni_view.php");
    exit();

} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}






// Close connection
mysqli_close($con);
?>
