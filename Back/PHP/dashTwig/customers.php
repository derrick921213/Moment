<?php

require_once('Base.php');
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
$url = $URLS;
Base(function() use ($url,&$Dark){
    $loader = new FilesystemLoader(__DIR__ . '/templates');
    $twig = new Environment($loader);
    if (basename($_SERVER["REQUEST_URI"]) == basename(__FILE__)){
        $url["customers_active"] = "active";
        echo $twig->render('customers.twig',$url);
    }
    
});
?>