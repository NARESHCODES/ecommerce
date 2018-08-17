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
                        <div class="row">
                        	<div class="col-lg-6" style="margin: auto;">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add</strong> Users
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="users.php" method="post" class="form-horizontal" enctype="multipart-form data">
                                        	<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-full_name" class=" form-control-label">Full Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-full_name" name="hf-full_name" placeholder="Enter Full Name..." class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="email" id="hf-email" name="hf-email" placeholder="Enter Email..." class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-username" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="hf-username" name="hf-username" placeholder="Enter username..." class="form-control" required="">
                                                 </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="hf-email" name="hf-password" placeholder="Enter password..." class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-status" class=" form-control-label">status</label>
                                                    
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <label class="switch switch-text switch-primary switch-pill" size="lg">
                      								<input type="checkbox" class="switch-input" checked="true">
                      								<span data-on="On" data-off="Off" class="switch-label"></span>
                      								<span class="switch-handle"></span>
                    								</label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="hf-photo" class=" form-control-label">photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="hf-photo" name="hf-photo" placeholder="Upload photo..." class="form-control">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <a href="user_add.php"><button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
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
