<?php
session_start();
require './class/db.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <!-- Twitter meta-->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:site" content="@pratikborsadiya">
        <meta property="twitter:creator" content="@pratikborsadiya">
        <!-- Open Graph Meta-->
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="Vali Admin">
        <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
        <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
        <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
        <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
        <title>View Banner</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <h1><i class="fa fa-th-list"></i>Banner &nbsp;&nbsp;&nbsp;&nbsp;<a href="insert_banner_new.php">
                      <button class="btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Banner</button>
                    </a></h1>

                </div>
                <!-- <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home fa-lg"></i></a></li>

                    <li class="breadcrumb-item"><a href="add-state.php">Add State</a></li>
                    <li class="breadcrumb-item" active>View State</li>
                </ul> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>

                                      <!-- <th>Category Name</th>
                                      <th>City</th> -->
                                      <th>Image</th>
                                 <th>Action</th>
                                 </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['did'])) {
                                        $did = $_GET['did'];

                                        $deleteq = mysqli_query($connection, "delete from banner where id ='{$did}'") or die(mysqli_error($connection));

                                        if ($deleteq) {
                                            echo "<script>alert('Record Deleted');</script>";
                                        }
                                    }

                                    $selectq = mysqli_query($connection, "select * from banner") or die(mysqli_error($connection));
                                    $count = mysqli_num_rows($selectq);
                                    echo $count . " Records Found";

                                    while ($productrow = mysqli_fetch_array($selectq)) {
                                        echo "<tr>";
                                          //
                                          // echo "<td>{$productrow['cat_name']}</td>";
                                          //   echo "<td>{$productrow['cat_city']}</td>";
                                            echo "<td> <img src='{$productrow['img']}'height=70 width=70/></td>";
                                              // echo "<td>{$productrow['cat_ratePerMin']}</td>";

                                        echo "<td> <a href='view_banner.php?did=" . $productrow['id'] . "' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\"><img style='width:16px;' src='myimages/delete-icon.png'> Delete</a>   </td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Essential javascripts for application to work-->
        <script>
            function deleletconfig() {

                var del = confirm("Are you sure you want to delete this record?");
                if (del == true) {
                    alert("record deleted")
                }
                return del;
            }
        </script>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="js/plugins/pace.min.js"></script>
        <!-- Page specific javascripts-->
        <!-- Data table plugin-->
        <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
        <!-- Google analytics script-->

    </body>
</html>
