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
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Perform delete operation
    $deleteQuery = "DELETE FROM alumni_list WHERE id = '$id'";
    
    if (mysqli_query($con, $deleteQuery)) {
        header("Location: alumni_view.php");
    exit();
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "No record ID specified for deletion.";
}




// Close connection
mysqli_close($con);
?>
