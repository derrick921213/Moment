<?php

require_once('../vendor/autoload.php');

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

$users = [ 
    ['name' => 'John Doe', 'active' => true],
    ['name' => 'Lucy Smith', 'active' => false],
    ['name' => 'Peter Holcombe', 'active' => false],
    ['name' => 'Barry Collins', 'active' => false]
];

echo $twig->render('activeusers.html', ['users' => $users]);

?>