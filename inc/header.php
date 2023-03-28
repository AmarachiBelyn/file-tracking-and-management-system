<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" name="search" action="search-visitor.php" method="post">

                </form>
                <div class="header-button">
                    <div class="noti-wrap">
                        <?php
                        $role = $_SESSION['role'];
                        $ret = mysqli_query($con, "select fullName from user where role='$role'");
                        $row = mysqli_fetch_array($ret);
                        $name = $row['fullName'];

                        ?>

                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="./images/logo.jpg" alt="FTS" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><b> Welcome: &nbsp;</b><?php echo $name; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <div class="image">
                                            <img src="./images/logo.jpg" alt="FTS" />
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><b> Welcome: &nbsp;</b><?php echo $name; ?></a>
                                        </h5>

                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="profile.php">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="change-password.php">
                                            <i class="zmdi zmdi-settings"></i>Change Password</a>
                                    </div>

                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>