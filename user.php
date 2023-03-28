<?php
session_start();
error_reporting(0);
include('inc/config.php');
include 'inc/functions.php';
error_reporting(0);

//file upload script
if (isset($_POST['go'])) {
    $name = $_POST['name'];
    $fileNo = mt_rand(100000000, 999999999);
    $description = $_POST['description'];
    $department = $_POST['department'];

    //File
    $file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $file_name = addslashes($_FILES['file']['name']);
    $file_size = getimagesize($_FILES['file']['tmp_name']);

    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
    $fileUrl = "upload/" . $_FILES["file"]["name"];

    $sql = mysqli_query($con, "insert into files (name,fileNo,description,department,fileUrl,insertedBy)
                            	values ('$name','$fileNo','$description','$department','$fileUrl','$fullName')
                                ");
    $msg = "File Upload Successful!!";

    header('location:files.php');
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
    <title>User |Dashboard</title>

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
                                    <p style="padding-left: 1%; color: green">
                                        <?php if ($msg) {
                                            echo htmlentities($msg);
                                        } ?>
                                    </p>

                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 offset-md-0">
                                <div class="card">
                                    <p style="padding-left: 1%; color: green">
                                        <?php if ($msg) {
                                            echo htmlentities($msg);
                                        } ?>
                                    </p>
                                    <div class="card-header">Upload Files</div>
                                    <div class="card-body card-block">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="control-group">
                                                <label class="control-label">File Name:</label>
                                                <input type="text" name="name" class="form-control" placeholder="File Name">
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Description:</label>
                                                <input type="text" name="description" class="form-control" placeholder="Description">
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Department:</label>
                                                <div class="controls">
                                                    <select type="text" name="department" class="form-control">
                                                        <option>ICT</option>
                                                        <option>Finance</option>
                                                        <option>Registry</option>
                                                        <option>Human Resource</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">File:</label>
                                                <div class="controls">
                                                    <input type="file" name="file">
                                                </div>
                                            </div><br>
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" name="go" class="btn btn-success">Save</button>
                                        </form>
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
<!-- end document-->