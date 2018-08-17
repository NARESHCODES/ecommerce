<?php include_once "../config.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php include_once "includes/head.php";?>
</head>

<body class="animsition">
    <div class="page-wrapper">
         <!-- HEADER MOBILE-->
        <?php include_once "includes/header_mobile.php"; ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include_once "includes/menu_sidebar.php"; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once "includes/header_desktop.php"; ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Full Name</th>
                                                <th>Photo</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Naresh</td>
                                                <td><img src=""></td>
                                                <td>nareshcodes@gmail.com</td>
                                                <td>Nareshcodes</td>
                                                <td class="process">Active</td>
                                                <td class="text-left"><a href="">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Naresh</td>
                                                <td><img src=""></td>
                                                <td>nareshcodes@gmail.com</td>
                                                <td>Nareshcodes</td>
                                                <td class="process">Active</td>
                                                <td class="text-left"><a href="">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Naresh</td>
                                                <td><img src=""></td>
                                                <td>nareshcodes@gmail.com</td>
                                                <td>Nareshcodes</td>
                                                <td class="process">Active</td>
                                                <td class="text-left"><a href="">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                           <tr>
                                                <td>4</td>
                                                <td>Naresh</td>
                                                <td><img src=""></td>
                                                <td>nareshcodes@gmail.com</td>
                                                <td>Nareshcodes</td>
                                                <td class="process">Active</td>
                                                <td class="text-left"><a href="">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Naresh</td>
                                                <td><img src=""></td>
                                                <td>nareshcodes@gmail.com</td>
                                                <td>Nareshcodes</td>
                                                <td class="process">Active</td>
                                                <td class="text-left"><a href="">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Naresh</td>
                                                <td><img src=""></td>
                                                <td>nareshcodes@gmail.com</td>
                                                <td>Nareshcodes</td>
                                                <td class="denied">Inactive</td>
                                                <td class="text-left"><a href="user_add.php">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <?php include_once "includes/copyright.php";?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Before_body_scripts -->

  <?php include_once "includes/Before_body_scripts.php"; ?>

</body>

</html>
<!-- end document-->
