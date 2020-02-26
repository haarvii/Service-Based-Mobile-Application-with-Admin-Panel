<?php
session_start();

require './class/db.php';

if ($_POST) {
    $photo = "uploads/" . $_FILES['package_img']['name'];
    $tourname = $_POST['tour_title'];
    $tourdetails = $_POST['tour_details'];
    $price = $_POST['price'];
    $guidename = $_POST['guide_name'];
    $guidemobileno = $_POST['guide_mobileno'];
    $person = $_POST['no_of_person'];
     $stateid = $_POST['state_id'];
    $startingdate = $_POST['starting_date'];
   $endingdate = $_POST['ending_date'];


    $query = mysqli_query($connection, "insert into  tbl_tour_packages (tour_title,tour_details,price,guide_name,guide_mobileno,no_of_person,state_id,starting_date,ending_date) values('{$tourname}','{$tourdetails}','{$price}','{$guidename}','{$guidemobileno}','{$person}','{$stateid}','{$startingdate}','{$endingdate}')") or die(mysqli_error($connection));

    if ($query) {
        echo "<script>alert('Record Inserted');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Package </title>
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
                    <h1><i class="fa fa-edit"></i> Add Package &nbsp; &nbsp; &nbsp;<a href="view_subsub_category.php"><button class="btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>View Package</button></a></h1>

                </div>
                <ul class="app-breadcrumb breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>

                    <!-- <li class="breadcrumb-item"><a href="view-user-master.php">Package</a></li> -->
                    <li class="breadcrumb-item" active>Add Package</li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-8">
                    <div class="tile">
                        <h3 class="tile-title">Package</h3>
                        <div class="tile-body">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" id="myform">

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Image</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="tour_title" placeholder="Enter Tour name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Name</label>
                                    <div class="col-md-8">

                                        <textarea  class="form-control" name="tour_details" placeholder="Enter Tour Details"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Price</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="price" placeholder="Enter Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Description</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="guide_name" placeholder="Enter Guide Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Things To Know</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="guide_mobileno" placeholder="Enter Guide mobile number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Offers</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="no_of_person" placeholder="Enter number of person">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Suggestion</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="number" name="no_of_person" placeholder="Enter number of person">
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
