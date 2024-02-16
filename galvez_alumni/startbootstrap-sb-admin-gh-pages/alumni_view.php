<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'alumni');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Fetch alumni data
$sql = "SELECT * FROM alumni_list";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error: " . mysqli_error($con));
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
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Alumni Tracker</a>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Alumni List
                            </a>
                            <a class="nav-link" href="register.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Add User
                            </a>
                            <a class="nav-link" href="login.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Log Out
                            </a>
                           
                           
                           
                           
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">

                        

                        <h1 class="mt-4">Alumni List</h1>
                       
                     
                        <div class="card mb-4">
                            <div class="card-header">

                                <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Alumni</button>


                                
                            <!-- Add Student Modal -->
                            <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addStudentModalLabel">Add Alumni</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add your form or content for adding a student here -->
                                            <form action="alumni_add.php" method="get">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="studentnumber" class="form-label">Student Number</label>
                                                            <input type="text" class="form-control" id="studentnumber" name="studentnumber">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="firstname" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label for="lastname" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="middlename" class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" id="middlename" name="middlename">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="gender" class="form-label">Gender</label>
                                                        <select class="form-select" id="gender" name="gender" required>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <!-- Add other gender options as needed -->
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="birthdate" class="form-label">Birthdate</label>
                                                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="contactNumber" class="form-label">Contact Number</label>
                                                        <input type="tel" class="form-control" id="contactnumber" name="contactnumber" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="batch" class="form-label">Batch</label>
                                                        <input type="text" class="form-control" id="batch" name="batch" required>
                                                    </div>
                                                    <div class="col">
                                                        <label for="course" class="form-label">Course Graduated</label>
                                                        <select class="form-select" id="course" name="course" required>
                                                            <option value="computer-science">Computer Science</option>
                                                            <option value="information-technology">Information Technology</option>
                                                            <!-- Add other course options as needed -->
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="employmentStatus" class="form-label">Employment Status</label>
                                                        <select class="form-select" id="employmentStatus" name="employmentstatus" required>
                                                            <option value="employed">Employed</option>
                                                            <option value="unemployed">Unemployed</option>
                                                            <!-- Add other employment status options as needed -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Submit">
                                        </div>
                                            </form>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>




                                
        
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                            <th>Alumni ID</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>Course Graduated</th>
                                            <th>Batch</th>
                                            <th>Employment Status</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    
                                    <tbody>


                                
                                    <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $studentnumber =  $row['studentnumber'];
                                            $lastname =  $row['lastname'];
                                            $firstname = $row['firstname'];
                                            $middlename = $row['middlename'];
                                            $contactnumber = $row['contactnumber'];
                                            $course = $row['course'];
                                            $employmentstatus   = $row['employmentstatus'];
                                            $id = $row['id'];
                                            $batch = $row['batch'];

                                            echo "
                                                <tr>
                                                <td>$id</td>
                                                <td>$lastname, $firstname</td>
                                                <td>$contactnumber</td>
                                                <td>$course</td>
                                                <td>$batch</td>
                                                <td>$employmentstatus</td>
                                              
                                                


                                  
                                               
                                    
                                                    <td>    


                                                    <button type='button' class='btn btn-secondary ms-auto' data-bs-toggle='modal' data-bs-target='#editStudentModal'>Edit</button>

                                                    </td>


                                                    <td>    

                                                    <a href='view_more.php?id=$id>' class='btn btn-warning'>info</a>

                                                    </td>

                                                    <td>
                                                    <!-- DELETE Button -->
                                                    <a href='alumni_delete.php?deleteid=$id>' class='btn btn-danger'>Delete</a>


                                                    </td>
                                                

                                                        </tr>

                                                        
                                                    
                                                    ";
                                      
                                        }
                                        ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>


                <!-- Edit Student Modal -->
                <div class="modal fade" id="editStudentModal" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editStudentModalLabel">Edit Alumni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                            <form action="alumni_edit.php" method="post">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="alumniID" class="form-label">Alumni ID</label>
                                        <input type="number" class="form-control" id="alumniID" name="id" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="studentnumber" class="form-label">Student Number</label>
                                        <input type="text" class="form-control" id="studentnumber" name="studentnumber">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="lastname" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                                    </div>
                                </div>
                            </div>




                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="middlename" class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" id="middlename" name="middlename">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <!-- Add other gender options as needed -->
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                                    </div>

                                    <div class="col">
                                        <label for="contactNumber" class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control" id="contactnumber" name="contactnumber" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="batch" class="form-label">Batch</label>
                                        <input type="text" class="form-control" id="batch" name="batch" required>
                                    </div>

                                    <div class="col">
                                        <label for="course" class="form-label">Course Graduated</label>
                                        <select class="form-select" id="course" name="course" required>
                                            <option value="computer-science">Computer Science</option>
                                            <option value="information-technology">Information Technology</option>
                                            <!-- Add other course options as needed -->
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="employmentStatus" class="form-label">Employment Status</label>
                                        <select class="form-select" id="employmentStatus" name="employmentstatus" required>
                                            <option value="employed">Employed</option>
                                            <option value="unemployed">Unemployed</option>
                                            <!-- Add other employment status options as needed -->
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="Update">
                                </div>
                            </form>

                               
                            </div>
                        
                        </div>
                    </div>
                </div>







              



                                    
                                        



                                    
                                   
              





                

                
                
                
                


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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
