<?php
session_start();
error_reporting(0);
include('inc/config.php');
include 'inc/functions.php';
error_reporting(0);
// if (strlen($_SESSION['ftsid'] == 0)) {
//     header('location:logout.php');
// } else {
//User Registration
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $department= $_POST[department];
    $status = 1;
    $query = mysqli_query($con, "insert into user(fullName,userEmail,password,role,department,user_status) 
         values('$fullname','$email','$password','$role','$department','$status')");
    $msg = "Registration Succesfull!!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/custom.css" rel="stylesheet" media="all">
    <!--add icon link -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo.jpg">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->


        <!-- MENU SIDEBAR-->
        <?php include_once('inc/sidebar.php'); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('inc/header.php'); ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <p style="padding-left: 1%; color: green">
                                        <?php if ($msg) {
                                            echo htmlentities($msg);
                                        } ?>
                                    </p>
                                    <a href="#" data-toggle="modal" data-target="#register"><button class="au-btn au-btn-icon au-btn--blue2">

                                            <i class="zmdi zmdi-plus"></i>add user
                                        </button></a>
                                </div>
                            </div>
                        </div>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div><br>
                                            <div class="text">
                                                <h2>
                                                    <?php
                                                    //users
                                                    $query = mysqli_query($con, "SELECT * FROM user");
                                                    $count = mysqli_num_rows($query);
                                                    ?><br>
                                                    <?php echo $count; ?></h2>
                                                <span>Total Users</span><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-file"></i>
                                            </div><br>
                                            <div class="text">
                                                <h2>
                                                    <?php
                                                    //files
                                                    $files = mysqli_query($con, "SELECT * FROM files");
                                                    $count = mysqli_num_rows($files);
                                                    ?><br>
                                                    <?php echo $count; ?></h2>
                                                <span> Total Uploaded Files</span><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-file"></i>
                                            </div><br>
                                            <div class="text">
                                                <h2>

                                                    <?php ?><br><br>
                                                    <?php ?>
                                                </h2>
                                                <span>Pending</span><br>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-home"></i>
                                            </div><br>
                                            <div class="text">
                                                <h2>
                                                    <?php
                                                    $dept = mysqli_query($con, "SELECT * FROM departments");
                                                    $count = mysqli_num_rows($dept);

                                                    ?><br>
                                                    <?php echo $count; ?></h2>
                                                <span>Departments</span><br>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include_once('inc/footer.php'); ?>

                    </div>
                </div>
            </div>
            <!-- ADD USER MODAL -->
            <div class="modal fade" id="register" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">Register User
                            <button type="button" data-dismiss="modal" type="button">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="login-wrap">
                                    <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required" autofocus>
                                    <br>
                                    <input type="email" class="form-control" placeholder="Email ID" id="email" onBlur="userAvailability()" name="email" required="required">
                                    <span id="user-availability-status1" style="font-size:12px;"></span>
                                    <br>
                                    <input type="password" class="form-control" placeholder="Password" required="required" name="password"><br>
                                    <!-- <br> -->
                                    <div class="form-group">
                                        <!-- <label>Role:</label> -->
                                        <select name="role" class="form-control">
                                            <option value="">Select Your Role</option>
                                            <option value="super admin">Super Admin</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->