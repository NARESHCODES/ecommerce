<?php 
include_once "../config.php"; 
$user=new \Lib\Models\User();
$users=$user->all();
?>
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
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php if(count($users)):?>
                                        		<?php $counter=1;?>
                                        		<?php foreach ($users as $user):?>
                                            <tr>
                                                <td><?php echo $counter;?></td>
                                                <td><?php echo $user['full_name'];?></td>
                                                <td><?php echo $user['email'];?></td>
                                                <td><?php echo $user['username'];?></td>
                                                <td class="">
                                                	<?php if($user['status']==1):?><span class="badge badge-success">Active</span></td>
                                                	<?php else:?>
                                                	<span class="badge badge-danger">Inactive</span>
                                                <?php endif;?>
                                                </td>
                                                <td class="text-left"><a href="">Edit</a><br><a href="">Delete</a></td>
                                            </tr>
                                            <?php $counter++;?>
                                        <?php endforeach;?>
                                            <?php else:?>
                                            	<p>no data found</p>
  											<?php endif;?>
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
