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
    <title>B/w Dates Report |Dashboard</title>

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
        <?php include_once('inc/sidebar.php'); ?>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Between dates | reports</h2>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 offset-md-0">
                                <div class="card">
                                    <div class="card-header">Between Dates Reports</div>
                                    <div class="card-body card-block">
                                        <?php
                                        $fdate = $_POST['fromdate'];
                                        $tdate = $_POST['todate'];

                                        ?>
                                        <h5 align="center" style="color:green">Report from <?php echo $fdate ?> to <?php echo $tdate ?></h5>
                                        <table class="table table-hover" id="sample-table-1">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>File Name</th>
                                                    <th>Description</th>
                                                    <th>Department</th>
                                                    <th>File Url</th>
                                                    <th>Inserted By</th>
                                                    <th>Time Inserted</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <tbody>
                                            <?php
                                            $sql = mysqli_query($con, "SELECT * FROM files WHERE date(timeInserted) between '$fdate' and '$tdate'");

                                            $id = 1;
                                            while ($a = mysqli_fetch_array($sql)) {

                                            ?>
                                                <tr>
                                                    <td class="center"><?php echo $id; ?>.</td>
                                                    <td><?php echo $a['name']; ?></td>
                                                    <td><?php echo $a['description']; ?></td>
                                                    <td><?php echo $a['department']; ?></td>
                                                    <td><?php echo $a['fileUrl']; ?></td>
                                                    <td><?php echo $a['insertedBy']; ?></td>
                                                    <td><?php echo $a['timeInserted']; ?></td>
                                                    <td>
                                                        <a href="#"><i class="fas fa-print"></i></a>
                                                    </td>
                                                </tr>
                                            <?php $id = $id + 1;
                                            } ?>
                                        </tbody>
                                    </div>
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