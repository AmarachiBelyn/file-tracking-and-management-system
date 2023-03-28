<?php
session_start();
error_reporting(0);
include('inc/config.php');
include 'inc/functions.php';

if (isset($_GET['uid']) && $_GET['action'] == 'del') {
    $deptid = $_GET['uid'];
    $query = mysqli_query($con, "delete from departments where deptid='$deptid'");
    header('location:manage-dept.php');
}
//add department code
if (isset($_POST['submit'])) {
    $deptname = $_POST['deptname'];

    $query = mysqli_query($con, "insert into departments(deptName) values('$deptname')");
    $msg = "Department added Succesfull!!";
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
    <title>Manage Departments</title>

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
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <!-- <h2 class="title-1">overview</h2> -->
                                    <p style="padding-left: 1%; color: green">
                                        <?php if ($msg) {
                                            echo htmlentities($msg);
                                        } ?>
                                    </p>
                                    <a href="#" data-toggle="modal" data-target="#department"><button class="au-btn au-btn-icon au-btn--blue2">

                                            <i class="zmdi zmdi-plus"></i>add department
                                        </button></a>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Department Name</th>
                                                <th>Creation Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        <?php
                                        $ret = mysqli_query($con, "select * from departments");
                                        $cnt = 1;
                                        while ($row = mysqli_fetch_array($ret)) {

                                        ?>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>
                                                <td><?php echo $row['deptName']; ?></td>
                                                <td><?php echo $row['creationDate']; ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#details" title="View Details">
                                                        <i class="fa fa-edit fa-1x"></i>
                                                    </a>&nbsp;&nbsp;

                                                    <a href="manage-dept.php?uid=<?php echo $row['deptid']; ?>&&action=del" title="Delete" onClick="return confirm('Do you really want to delete ?')">
                                                        <i class="fa fa-trash"></i></a>
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
                <!-- ADD DEPARTMENT MODAL -->
                <div class="modal fade" id="department" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">Add Department
                                <button type="button" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="login-wrap">
                                        <input type="text" class="form-control" placeholder="Department Name" name="deptname" required="required" autofocus>
                                        <br>
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
                <!-- DETAILS MODAL -->
                <div class="modal fade" id="details" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">Department Details
                                <button type="button" data-dismiss="modal">&times</button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="">
                                    <input type="text" class="form-control" placeholder="DeptId" name="<?php echo $deptid; ?>" required="required" autofocus>
                                    <br>
                                    <input type="text" class="form-control" placeholder="Department Name" name="<?php echo $row['deptName']; ?>" required="required" autofocus>
                                    <br>
                                    <input type="date" class="form-control" placeholder="Date" name="<?php echo $cnt; ?>" required="required" autofocus>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="submit" name="submit" id="submit" class="btn btn-success">Save</button>
                                    </div>
                                </form>
                            </div>
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