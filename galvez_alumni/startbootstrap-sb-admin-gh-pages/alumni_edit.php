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
$id = mysqli_real_escape_string($con, $_REQUEST['id']);
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




$sql = "UPDATE alumni_list SET 
        studentnumber = '$studentnumber',
        lastname = '$lastname',
        firstname = '$firstname',
        middlename = '$middlename',
        gender = '$gender',
        birthdate = '$birthdate',
        contactnumber = '$contactnumber',
        batch = '$batch',
        course = '$course',
        employmentstatus = '$employmentstatus'
        WHERE id = '$id'";

if (mysqli_query($con, $sql)) {
    header("Location: alumni_view.php");
    exit();
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}






// Close connection
mysqli_close($con);
?>
