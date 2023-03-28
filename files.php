<?php
session_start();
error_reporting(0);
include('inc/config.php');
include 'inc/functions.php';

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
    <title> Uploaded Files</title>

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
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">

                <h2>FTS</h2>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="user.php" style="color: blue">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="user.php" style="color: blue">
                                <i class="fa fa-file"></i>Add Files</a>
                        </li>

                        <li>
                            <a href="files.php" style="color: blue">
                                <i class="fa fa-file"></i>View Files</a>
                        </li>

                        <li>
                            <a href="search.php" style="color: blue">
                                <i class="fas fa-search"></i>Search</a>
                        </li>
                        <li>
                            <a href="logout.php" style="color: blue">
                                <i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->

        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('inc/header.php'); ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <p style="padding-left: 1%; color: green">
                            <?php if ($msg) {
                                echo htmlentities($msg);
                            } ?>
                        </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>#</th>
                                                <th>File Name</th>
                                                <th>File No</th>
                                                <th>Description</th>
                                                <th>Department</th>
                                                <th>File Url</th>
                                                <th>Inserted By</th>
                                                <th>Time Inserted</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "select * from files where insertedBy = '$fullName'");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>

                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['fileNo']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['department']; ?></td>
                                                <td><?php echo $row['fileUrl']; ?></td>
                                                <td><?php echo $row['insertedBy']; ?></td>
                                                <td><?php echo $row['timeInserted']; ?></td>
                                                <td>
                                                    <a href="<?php echo $row['fileUrl']; ?>" target="_blank">
                                                        <img src="upload/<?php echo $row['fileUrl']; ?>" class="img-rounded" width="50" height="40"></a>
                                                    <a href="<?php echo $row['fileUrl']; ?>" target="_blank" title="download"><i class="fa fa-download"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $cnt = $cnt + 1;
                                        } ?>
                                    </table>
                                </div>
                            </div>

                        </div>



                        <?php include_once('inc/footer.php'); ?>
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