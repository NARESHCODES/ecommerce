<?php
include_once "../config.php";

$user = new \Lib\Models\User();

$id = (int) $_GET['id'];
$userInfo = $user->getSingle($id);

if(!$userInfo) {
    $_SESSION['error'] = "User with ID $id not found!";
    header("Location: users.php");
    die();
}
$error = null;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = new \Lib\Models\User();

    try { 

        $userPhotos = _ADMIN_PATH . "/uploads/users";
        $postData = $_POST;
        $postData['photo_name'] = $postData['photo_name_old'];
        if(is_uploaded_file($_FILES['photo_name']['tmp_name'])) {
            $fileName = basename($_FILES['photo_name']['name']);
            move_uploaded_file($_FILES['photo_name']['tmp_name'], $userPhotos . "/" . $fileName);
            $postData['photo_name'] = $fileName;

            /**
             * Delete old file if the user has already
             */
            if(file_exists($userPhotos . "/" . $postData['photo_name_old'])) {
                unlink($userPhotos . "/" . $postData['photo_name_old']);
            }
        }
        $user->update($postData,$id);
        $_SESSION['success'] = "User <span style='color:red;'>".$_POST['username']."</span> has been edited successfully!";
        header("Location: users.php");
        die();
    }
    catch(\Lib\Core\errorException $exception) {
        $error = $exception->getMessage();
    }
    catch(\Exception $exception) {
        $error = $exception->getMessage();
    }
}
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
                        <div class="row">
                        	<div class="col-lg-6" style="margin: auto;">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add</strong> Users
                                    </div>
                                     <?php if(isset($error)) : ?>
                      <div class="alert alert-danger">
                          <?php echo $error; ?>
                      </div>
                      <?php endif; ?>
                                    <div class="card-body card-block">
                                        <form enctype="multipart/form-data" method="post" id="user_edit" name="user_edit" action="" class="form-horizontal form-label-left">
                                        	<div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="full_name" class=" form-control-label">Full Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input value="<?php echo $userInfo['full_name']; ?>" type="text" id="full_name" name="full_name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input value="<?php echo $userInfo['email']; ?>" type="text" id="email" name="email" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="username" class=" form-control-label">Username</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input value="<?php echo $userInfo['username']; ?>" type="text" id="username" name="username" class="form-control">
                                                 </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" minlength="5" autocomplete="off" id="password" name="password" placeholder="*****" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="status" class=" form-control-label">status</label>
                                                    
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <label class="">
                                                   <input type="radio"<?php echo $userInfo['status'] == 1 ? ' checked' : null; ?> name="status" value="1"> Active
                                                    </label>
                                                    <label class="">
                                                   <input type="radio"<?php echo $userInfo['status'] == 0 ? ' checked' : null; ?> name="status" value="0"> Inactive
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="hidden" name="photo_name_old" value="<?php echo $userInfo['photo_name']; ?>">
                                                    <?php if(!empty($userInfo['photo_name'])): ?>
                                                        <p> <img width="200" src="<?php echo _ADMIN_URL . "/uploads/users/" . $userInfo['photo_name']; ?>" class="img-thumbnail">
                                                        </p>
                                                        <br>
                                                    <?php endif; ?>
                                                    <p>
                                                    <input type="file" id="photo_name" name="photo_name" placeholder="Upload photo..." >
                                                </p>
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
