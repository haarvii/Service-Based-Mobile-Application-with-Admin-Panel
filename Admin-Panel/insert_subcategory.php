<?php
session_start();

require './class/db.php';

if ($_POST) {
    // $cat_img = "uploads/" . $_FILES['cat_img']['name'];
    $sub_cat_name = $_POST['sub_cat_name'];
    $cat = $_POST['cat'];

    // $fileupload = move_uploaded_file($_FILES['cat_img']['tmp_name'], $cat_img);

    $query = mysqli_query($connection, "INSERT INTO `subcategory`( `sub_cat_name`) VALUES ('{$sub_cat_name}')") or die(mysqli_error($connection));
    if ($query) {
        echo "<script>alert('Record Inserted');</script>";
    }

    $q = mysqli_query($connection, "select sub_cat_id from subcategory where sub_cat_name = '{$sub_cat_name}';") or die(mysqli_error($connection));

    $value;
    while ($categoryrow = mysqli_fetch_array($q)) {
            $value = $categoryrow['sub_cat_id'];
        }


    $state = mysqli_query($connection, "INSERT INTO `cat_to_subcat`(`catID`, `sub_cat_id`) VALUES ('{$cat}','{$value}')") or die(mysqli_error($connection));

}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Sub Category </title>
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
                    <h1><i class="fa fa-edit"></i> Add Sub Category &nbsp; &nbsp; &nbsp;<a href="view_subcategory.php"><button class="btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>View Sub Category</button></a></h1>

                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>

                    <li class="breadcrumb-item"><a href="view-user-master.php">Sub Category</a></li>
                    <li class="breadcrumb-item" active>Add Sub Category</li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-8">
                    <div class="tile">
                        <h3 class="tile-title"> Sub Category</h3>
                        <div class="tile-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="myform">



                                <div class="form-group row">
                                    <label class="control-label col-md-3">Select Category Name</label>
                                    <div class="col-md-8">
                                      <?php
                       $selectquery = mysqli_query($connection, "select * from  category") or die(mysqli_error($connection));
                       echo "<select class='form-control' name='cat' >";
                       echo "<option>Select Category</option>";
                       while ($categoryrow = mysqli_fetch_array($selectquery)) {
                           echo "<option value='{$categoryrow['catID']}'>{$categoryrow['cat_name']} </option>";
                       }
                       echo "</select>";
                       ?>
                                    </div>


                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Sub Category Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="sub_cat_name" placeholder="Enter Sub Category name">
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
