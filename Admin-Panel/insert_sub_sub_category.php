<?php
session_start();

require './class/db.php';

if ($_POST) {
  // $agreement =  "uploads/" . $_FILES['agreement']['name'];

    $subsubcategory_image =  "uploads/" . $_FILES['subsubcategory_image']['name'];
    $SubSubCat_Name = $_POST['SubSubCat_Name'];
    $SubSubCat_price = $_POST['SubSubCat_price'];
    $SubSubCat_timeInMin = $_POST['SubSubCat_timeInMin'];
    $SubSubCat_discount = $_POST['SubSubCat_discount'];
    $SubSubCat_features = $_POST['SubSubCat_features'];
    $cat = $_POST['cat'];

    $SubSubCatProductCost = 0;
    $SubSubCatThingsToKnow = '';
    $SubSubuCatSuggestions = '';
    // $cat = $_POST['cat'];

    // $fileupload = move_uploaded_file($_FILES['agreement']['tmp_name'], $agreement);

    $query = mysqli_query($connection, "INSERT INTO `subsubcategory`(`SubSubCat_Name`, `SubSubCat_price`,`SubSubCatProductCost` ,`SubSubCat_timeInMin`, `SubSubCat_discount`, `SubSubCat_features`,`SubSubCatThingsToKnow`,`SubSubuCatSuggestions`,`subsubcategory_image`) VALUES ('{$SubSubCat_Name}','{$SubSubCat_price}','{$SubSubCatProductCost}'  ,'{$SubSubCat_timeInMin}','{$SubSubCat_discount}','{$SubSubCat_features}','{$SubSubCatThingsToKnow}','{$SubSubuCatSuggestions}','{$subsubcategory_image}')") or die(mysqli_error($connection));
    $fileupload = move_uploaded_file($_FILES['subsubcategory_image']['tmp_name'], $subsubcategory_image);

    if ($query) {
        echo "<script>alert('Record Inserted');</script>";
    }

    $q = mysqli_query($connection, "select SubSubCat_ID from subsubcategory where SubSubCat_Name = '{$SubSubCat_Name}';") or die(mysqli_error($connection));

    $value;
    while ($categoryrow = mysqli_fetch_array($q)) {
            $value = $categoryrow['SubSubCat_ID'];
        }
    $state = mysqli_query($connection, "INSERT INTO `sub_to_subsub`(`sub_cat_id`, `SubSubCat_ID`) VALUES ('{$cat}','{$value}')") or die(mysqli_error($connection));
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

                    <li class="breadcrumb-item"><a href="view-user-master.php">Package</a></li>
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
                                  <label class="control-label col-md-3">Select Sub Category Name</label>
                                  <div class="col-md-8">
                                    <?php
                                         $selectquery = mysqli_query($connection, "select * from  subcategory") or die(mysqli_error($connection));
                                         echo "<select class='form-control' name='cat' >";
                                         echo "<option>Select Sub Category</option>";
                                         while ($categoryrow = mysqli_fetch_array($selectquery)) {
                                             echo "<option value='{$categoryrow['sub_cat_id']}'>{$categoryrow['sub_cat_name']} </option>";
                                         }
                                         echo "</select>";
                                        ?>
                                  </div>


                              </div>

                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Name</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="SubSubCat_Name" placeholder="Enter Package name">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Service Cost</label>
                                    <div class="col-md-8">
                                        <input  class="form-control" name="SubSubCat_price" placeholder="Enter Package Service Cost"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package time in Minute</label>
                                    <div class="col-md-8">
                                        <input  class="form-control" name="SubSubCat_timeInMin" placeholder="Enter Package Time in Minute"></textarea>
                                        <label class="control-label col-md-6" style="color:red;">Enter with "Min" in postfix</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Discount</label>
                                    <div class="col-md-8">
                                      <input  class="form-control" name="SubSubCat_discount" placeholder="Enter Package Discount">
                                      <label class="control-label col-md-6" style="color:red;">Enter with "%" in postfix</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3"> Package Features</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="4" cols="50" placeholder="Enter Features / Description"  name="SubSubCat_features" >
                                        </textarea>
                                        <label class="control-label col-md-6" style="color:red;">Deffrentiate with "," all Features</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-3">Package Image</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="file" name="subsubcategory_image">
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
