<?php
session_start();
error_reporting(0);
include('inc/config.php');
require_once 'inc/functions.php';
//login
if (isset($_POST['login'])) {
    $userEmail = $_POST['userEmail'];
    $password = md5($_POST['password']);
    //check input fields
    if (empty($userEmail) || empty($password)) {
        $errormsg = "All fields are required.";
    } else {

        $query = "SELECT id,role,user_status FROM user WHERE userEmail='$userEmail' && password='$password'";

        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        if ($row['user_status'] == 0) {
            $errormsg = "Your account is Inactive";
        } elseif (mysqli_num_rows($result)) {
            $val3 = date("Y/m/d");
            date_default_timezone_set("Africa/Nairobi");
            $time = date("h:i:sa");
            $tim = $time;
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip_address;
            $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
            ob_start();
            system('ipconfig /all');
            $mycom = ob_get_contents();
            ob_clean();
            $findme = "Physical";
            $pmac = strpos($mycom, $findme);
            $mac = substr($mycom, ($pmac + 36), 17);
            $sql = mysqli_query($con, "INSERT INTO userlog(logindate,logintime,user_id,username,email,ip,mac) VALUES('" . $val3 . "','" . $tim . "','" . $_SESSION['id'] . "','" . $_SESSION['userEmail'] . "','" . $_SESSION['login'] . "','$ip_address','$mac')");


            if ($row['role'] == "super admin") {
                $_SESSION['super admin'] = $userEmail;
                echo "<script>
                    alert('Login successful. Welcome.');
                 </script>";
                header('location:dashboard.php');
            } elseif ($row['role'] == "user") {
                $_SESSION['user'] = $userEmail;
                echo "<script>
                  alert('Login successful. Welcome.');
                 </script>";
                header('location:user.php');
            }
        } else {
            $errormsg = "kindly contact administration for registration";

        }
        //else {
            //$errormsg = "kindly contact administration for registration";
            
        // $ret = mysqli_fetch_array($query);
        // if ($row > 0) {
        //     $_SESSION['ftsid'] = $row['id'];

        //     header('location:dashboard.php');
        // } else {
        //     $msg = "Invalid Details!!";
        // }
    }
}
//Change Password
if (isset($_POST['change'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM user WHERE userEmail='$email'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        mysqli_query($con, "update user set password='$password' WHERE userEmail='$email'");
        $msg = "Password Change Successful!!";
    } else {
        $errormsg = "Invalid Details!!!";
    }
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
    <title>FTS | Login</title>

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
    <!-- add icon link -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/logo.jpg">

    <script type="text/javascript">
        function valid() {
            if (document.forgot.password.value != document.forgot.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.forgot.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container-fluid">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#" style="font-size: 26px;">
                                File Tracking System
                            </a>
                        </div>
                        <p style="padding-left:4%; padding-top:2%;  color:red">
                            <?php if ($errormsg) {
                                echo $errormsg;
                            } ?></p>
                        <p style="font-size: 16px; color:green" align="center">
                            <?php if ($msg) {
                                echo $msg;
                            } ?></p>
                        <div class="login-form">
                            <form action="" method="post" name="login">
                                <div class="form-group">
                                    <label>User Name:</label>
                                    <input class="au-input au-input--full" type="text" name="userEmail" placeholder="User Email">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a data-toggle="modal" href="#myModal">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="login">sign in</button>
                                <div class="social-login-content">

                                </div>
                            </form>
                        </div>
                        <!-- Modal forgot password -->
                        <form class="login-form" name="forgot" method="post">
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                <div class="modal-dialog modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">Forgot Password?
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                        </div>
                                        <div class="modal-body">
                                            <p>Enter your details below to reset your password.</p>&nbsp;
                                            <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control" required><br>
                                            <input type="password" class="form-control" placeholder="New Password" id="password" name="password" required><br />
                                            <input type="password" class="form-control unicase-form-control text-input" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword" required>
                                        </div>&nbsp;
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="submit" name="change" id="submit" class="btn btn-success">Save</button>
                                            <!-- <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="change" onclick="return valid();">Submit</button> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                        </form>
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