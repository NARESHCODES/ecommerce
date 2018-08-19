<?php
include_once "../config.php";

$user = new \Lib\Models\User();

$id = (int) $_GET['id'];

$user->delete($id);
$_SESSION['success'] = "User has been deleted successfully!";
header("Location: users.php");
die;