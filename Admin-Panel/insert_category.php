<?php
session_start();

require './class/db.php';

if ($_POST) {
    $cat_img = "uploads/" . $_FILES['cat_img']['name'];
    $cat_name = $_POST['cat_name'];
    $cat_city = $_POST['cat_city'];
    $cat_ratePerMin = $_POST['cat_ratePerMin'];
    $fileupload = move_uploaded_file($_FILES['cat_img']['tmp_name'], $cat_img);
    $query = mysqli_query($connection, "INSERT INTO `category`( `cat_name`, `cat_city`, `cat_img`, `cat_ratePerMin`) VALUES ('{$cat_name}','{$cat_city}','{$cat_img}','{$cat_ratePerMin}')") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Record Inserted');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Category </title>
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
                    <h1><i class="fa fa-edit"></i> Add Category &nbsp; &nbsp; &nbsp;<a href="view_category.php"><button class="btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>View Category</button></a></h1>

                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>

                    <!-- <li class="breadcrumb-item"><a href="view-user-master.php">Category</a></li> -->
                    <li class="breadcrumb-item" active>Add Category</li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-8">
                    <div class="tile">
                        <h3 class="tile-title">Category</h3>
                        <div class="tile-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="myform">

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Category Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="cat_name" placeholder="Enter Category name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Category City</label>
                                    <div class="col-md-8">
                                        <textarea  class="form-control" name="cat_city" placeholder="Enter Category City"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3">Category Image</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="file" name="cat_img">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Category rate per Minute</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="cat_ratePerMin" placeholder="Enter Rate Per Minute">
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-3">
                                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="clearix"></div>

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
