<?php
require_once('../vendor/autoload.php');
session_start();

$URLS = array(
    "avatar" => $_SESSION["userData"]["avatar"],
    "givenName" => $_SESSION['userData']['givenName'],
    "dashboard" => "dashboard.php",
    "customers" => "customers.php"
);

function Base(callable $fn){
    require_once('config.php');
    require_once('core/controller.Class.php');
    if (isset($_SESSION['ucode'])) {
        $Controller = new Controller($user, $passwd);
        if($_COOKIE['id']!=$_SESSION['id']){
            header('location:logout.php'); 
            exit();
        }
        if ($Controller->checkUserStatus($_COOKIE["id"], $_COOKIE["sss"])) {
            return $fn();
        } else {
            header('location:index.php');
        }
    } else {
        header('location:index.php');
        die();
    }
}
?>