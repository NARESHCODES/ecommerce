<?php
include_once "../config.php";

$user = new \Lib\Models\User();

$id = (int) $_GET['id'];
$userInfo = $user->getSingle($id);
$user->delete($id);
$_SESSION['success'] = "User <span style='color:red;'>".$userInfo['username']."</span> has been deleted successfully!";
header("Location: users.php");
die;