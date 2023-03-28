<?php
require_once('../vendor/autoload.php');
require_once('Base.php');
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
session_start();
$url = $URLS;
$Dark = &$Dark_Mode;
Base(function() use ($url,&$Dark){
    $loader = new FilesystemLoader(__DIR__ . '/templates');
    $twig = new Environment($loader);
    if (basename($_SERVER["REQUEST_URI"]) == basename(__FILE__)){
        $url["dashboard_active"] = "active";
        echo $twig->render('dashboard.twig',$url);
    }
    
});
?>