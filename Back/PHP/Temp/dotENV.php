<?php
require_once('../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$s3_bucket = $_ENV['S3_BUCKET'];
$ss3_bucket = $_SERVER['S3_BUCKET'];
echo $s3_bucket.PHP_EOL.$ss3_bucket.PHP_EOL.$sss3_bucket;

?>