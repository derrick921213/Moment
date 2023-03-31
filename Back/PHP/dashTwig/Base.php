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
    //定義網站URL
    "dashboard" => $_SESSION["dashboard"], 
    "customers" => $_SESSION["customers"],
    //End
);

function Base(callable $fn){
    require_once(ROOT_PATH.'config.php');
    require_once(Core_PATH.'controller.Class.php');
    if (isset($_SESSION['ucode'])) {
        $Controller = new Controller($user, $passwd);
        if($_COOKIE['id']!=$_SESSION['id']){
            header('location:'.Web_Root_Path."logout.php"); 
            exit();
        }
        if ($Controller->checkUserStatus($_COOKIE["id"], $_COOKIE["sss"])) {
            return $fn();
        } else {
            header('location:'.Web_Root_Path."index.php");
        }
    } else {
        header('location:'.Web_Root_Path."index.php");
        die();
    }
}
?>