<?php 
require_once('../vendor/autoload.php');
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$words = ['sky','mountain','falcon','forest','rock','blue','solid','book','tree'];
$sentence = 'todat is a windy day';


// echo $twig->render('first.html', ['name' => 'John Doe', 'occupation' => 'gardener']);
echo $twig->render('filters.html',['words' => $words,'sentence'=> $sentence]);
?>