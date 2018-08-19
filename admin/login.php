<?php
include_once "../config.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new \Lib\Models\User();
    $username = $_POST['username'];
    $password = $_POST['password'];

    /**
     * $loginResult variable will either contain false (if login failed)
     * Or user's data in associative array if successful login
     */try{
    $loginResult = $user->checkLogin($username, $password);

    if($loginResult) {
        header("Location: index.php");
        die;
    }
    else {
        $_SESSION['error']= 'Login Details incorrect. please try again!';
         header("Location: login.php");;
    }
    die;
}
catch(\Lib\Core\errorException $Exception){
    $_SESSION['error']=$Exception->getMessage();
    header('Location:login.php');
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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                           <a href="#">
                                <img src="images/icon/logo.png" alt="Nareshcodes">
                            </a>
                            
                            <p style="margin-top: 10px;">
                            <?php if(isset($_SESSION['error'])) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                </div>
                            <?php endif; ?>
                            </p>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                            <!-- <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div> -->
                        </div>
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