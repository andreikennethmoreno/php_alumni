<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'alumni');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Ensure the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Get the value of 'id' from the URL
    $id = $_GET['id'];
} else {
}



if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Alumni Tracker</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >More Information</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="alumni_view.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Alumni list
                            </a>

                            <a class="nav-link" href="register.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Add User
                            </a>

                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Alumni Info</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">More Info</li>
                        </ol>
                        
                        <?php
                        $sql = "SELECT * FROM alumni_list WHERE id = '$id'";
                        $result = mysqli_query($con, $sql);

                        
                            if (!$result) {
                                die("Error: " . mysqli_error($con));
                            }



                        while ($row = mysqli_fetch_assoc($result)) {
                                            $studentnumber =  $row['studentnumber'];
                                            $lastname =  $row['lastname'];
                                            $firstname = $row['firstname'];
                                            $middlename = $row['middlename'];
                                            $contactnumber = $row['contactnumber'];
                                            $course = $row['course'];
                                            $employmentstatus   = $row['employmentstatus'];
                                            $id = $row['id'];
                                            $birthdate = $row['birthdate'];
                                            $batch = $row['batch'];
                                            $gender = $row['gender'];


                        
                                            
                                            echo '
                                                <form action="alumni_edit.php" method="post">
                                                    <div class="row mb-3">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label for="alumniID" class="form-label">Alumni ID</label>
                                                            <input type="number" class="form-control" id="alumniID" name="id" value="' . $id . '" readonly>
                                                        </div>
                                                        </div>
                                                
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="studentnumber" class="form-label">Student Number</label>
                                                                <input type="text" class="form-control" id="studentnumber" name="studentnumber" value="' . $studentnumber . '"  readonly>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="lastname" class="form-label">Last Name</label>
                                                                <input type="text" class="form-control" id="lastname" name="lastname" value="' . $lastname . '"  readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="firstname" class="form-label">First Name</label>
                                                                <input type="text" class="form-control" id="firstname" name="firstname" value="' . $firstname . '"  readonly>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label for="middlename" class="form-label">Middle Name</label>
                                                                <input type="text" class="form-control" id="middlename" name="middlename" value="' . $middlename . '"  readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                            <div class="col">
                                                            <label for="gender" class="form-label">Gender</label>
                                                            <input type="text" class="form-control" id="gender" name="gender" value="' . $gender . '" readonly>
                                                        </div>
                                                
                                                        <div class="col">
                                                            <label for="birthdate" class="form-label">Birthdate</label>
                                                            <input type="text" class="form-control" id="birthdate" name="birthdate" value="' . $birthdate . '" readonly>
                                                        </div>
                                                
                                                        <div class="col">
                                                            <label for="contactNumber" class="form-label">Contact Number</label>
                                                            <input type="text" class="form-control" id="contactnumber" name="contactnumber" value="' . $contactnumber . '" readonly>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label for="batch" class="form-label">Batch</label>
                                                            <input type="text" class="form-control" id="batch" name="batch" value="' . $batch . '" readonly>
                                                        </div>
                                                
                                                        <div class="col">
                                                            <label for="course" class="form-label">Course Graduated</label>
                                                            <input type="text" class="form-control" id="batch" name="course" value="' . $course . '" readonly>

                                                        </div>
                                                
                                                        <div class="col">
                                                            <label for="employmentStatus" class="form-label">Employment Status</label>
                                                            <input type="text" class="form-control" id="batch" name="employmentstatus" value="' . $employmentstatus . '" readonly>

                                                        </div>
                                                    </div>
                                                
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                        </div>
                                                    </div>

                                                    <a href="alumni_view.php" class="btn btn-primary">Alumni List</a>

                                                </form>';       

                                        }
                                        ?>  







                        <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div></div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

