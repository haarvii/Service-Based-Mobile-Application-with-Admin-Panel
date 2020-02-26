<?php
session_start();

require './class/db.php';

if (!isset($_SESSION["username"])) {
    ?>
    <script>
        alert("Please! login first.");
        window.location = "login.php";
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Salon Admin Dashboard</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <?php
        include './themepart/my-header-script.php';
        ?>
    </head>
    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <?php
        include './themepart/header.php';

        include './themepart/sidebar.php';
        ?>
        <!-- Sidebar menu-->

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-dashboard"></i> Admin Dashboard</h1>
                    <!-- <p>Welcome <?php echo $_SESSION['name']; ?></p> -->
                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"> <a href="view-tie-up.php"> <i class="icon fa fa-check-square-o fa-3x"></i></a>
                        <div class="info">
                            <?php
                            $selectq = mysqli_query($connection, "select * from tie_up") or die(mysqli_error($connection));

                            $count = mysqli_num_rows($selectq);
                            ?>
                            <h4>TIE UP</h4>
                            <p><b><?php echo $count; ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"> <a href="view_user.php"> <i class="icon fa fa-users fa-3x"></i></a>
                        <div class="info">
                            <?php
                            $selectq = mysqli_query($connection, "select * from user") or die(mysqli_error($connection));

                            $count = mysqli_num_rows($selectq);
                            ?>
                            <h4>User</h4>
                            <p><b><?php echo $count; ?></b></p>
                        </div>
                    </div>
                </div>






                        <div class="col-md-6 col-lg-3">
                                    <div class="widget-small primary coloured-icon"> <a href="view-franchise.php"> <i class="icon fa fa fa-heart fa-3x"></i></a>
                                        <div class="info">
                                            <?php
                                            $selectq = mysqli_query($connection, "select * from franchise") or die(mysqli_error($connection));

                                            $count = mysqli_num_rows($selectq);
                                            ?>
                                            <h4>Franchise</h4>
                                            <p><b><?php echo $count; ?></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                            <div class="widget-small primary coloured-icon"> <a href="view_feedback.php"> <i class="icon fa fa-comments fa-3x"></i></a>
                                                <div class="info">
                                                    <?php
                                                    $selectq = mysqli_query($connection, "select * from feed_back") or die(mysqli_error($connection));

                                                    $count = mysqli_num_rows($selectq);
                                                    ?>
                                                    <h4>FeedBack</h4>
                                                    <p><b><?php echo $count; ?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                                    <div class="widget-small primary coloured-icon"> <a href="view_booking.php"> <i class="icon fa  fa-hand-o-right fa-3x"></i></a>
                                                        <div class="info">
                                                            <?php
                                                            $selectq = mysqli_query($connection, "select * from booking") or die(mysqli_error($connection));

                                                            $count = mysqli_num_rows($selectq);
                                                            ?>
                                                            <h4>Booking</h4>
                                                            <p><b><?php echo $count; ?></b></p>
                                                        </div>
                                                    </div>
                                                </div>
                <!-- <div class="col-md-6 col-lg-3">
                    <div class="widget-small info coloured-icon"><a href="view-tie-up.php"><i class="icon fa fa-users fa-3x"></i></a>
                        <div class="info">
                            <?php
                            $selectq = mysqli_query($connection, "select * from  tie_up") or die(mysqli_error($connection));

                            $count = mysqli_num_rows($selectq);
                            ?>
                            <h4>Package</h4>
                            <p><b><?php echo $count; ?></b></p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-6 col-lg-3">
                    <div class="widget-small warning coloured-icon"><a href="view-tour-hotel.php"><i class="icon fa fa-files-o fa-3x"></i></a>
                        <div class="info">
                            <?php
                            $selectq = mysqli_query($connection, "select * from  tbl_tour_hotel") or die(mysqli_error($connection));

                            $count = mysqli_num_rows($selectq);
                            ?>
                            <h4>Hotel</h4>
                            <p><b><?php echo $count; ?></b></p>
                        </div>
                    </div>
                </div> -->
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><a href="view-feedback.php"><i class="icon fa fa-star fa-3x"></i></a>
                        <div class="info">
                            <?php
                            $selectq = mysqli_query($connection, "select * from  tbl_feedback") or die(mysqli_error($connection));

                            $count = mysqli_num_rows($selectq);
                            ?>
                            <h4>Feedback</h4>
                            <p><b><?php echo $count; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- Essential javascripts for application to work-->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->

        <?php
        include './themepart/my-footer-script.php';
        ?>
    </body>
</html>
