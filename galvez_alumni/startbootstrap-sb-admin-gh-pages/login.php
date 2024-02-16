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

// Check if the email address and password exist in the database
$query = "SELECT * FROM login_db WHERE emailaddress = '$emailaddress' AND password = '$password'";
$result = mysqli_query($con, $query);

if ($result) {
    // Check if a user with the provided email address and password exists
    if (mysqli_num_rows($result) > 0) {
        // Email address and password match, redirect to index.html
        header("Location: alumni_view.php");
        exit();
    } else {
        // No user with the provided email address and password found
        // You may want to handle this case as needed (e.g., show an error message)
        header("Location: 500.html");
        exit();
    }
} else {
    // Database query error
    // Instead of echoing the error, you might want to log it for debugging purposes
    error_log("ERROR: Could not execute query. " . mysqli_error($con));
    
    // You may want to handle this case as needed (e.g., show an error message)
}

// Close connection
mysqli_close($con);
?>
