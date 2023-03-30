<?php
require_once('FileRoute.php');
require_once(Vendor_PATH.'autoload.php');

session_start();
static $Dark_Mode = false;
$URLS = array(
    "avatar" => $_SESSION["userData"]["avatar"],
    "givenName" => $_SESSION['userData']['givenName'],
    "logout" => Logout,
    "session" => $_SESSION,
    "dashboard" => dashboard, //這個是使用foreach定義常數所以會抓不到定義，但是他是對的
    "customers" => customers,
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