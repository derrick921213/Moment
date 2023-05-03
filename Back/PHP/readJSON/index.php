<?php
require_once('./config.php');
$table = 'Menu';
class Connect extends PDO{
    public function __construct($user,$passwd){
        parent::__construct("mysql:host=localhost;dbname=Moment",$user,$passwd,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}

$db = new Connect($user,$passwd);

$filename = "menu.json";
$data = file_get_contents($filename); 
$array = json_decode($data, true); 
$sql = sprintf("CREATE TABLE if not exists `%s` (`id` int(11) unsigned NOT NULL AUTO_INCREMENT,`title` varchar(50) NOT NULL DEFAULT '',`price` int(5) unsigned NOT NULL,`description` varchar(1000) DEFAULT '',`category` varchar(30) DEFAULT NULL,`image` varchar(300) DEFAULT NULL,PRIMARY KEY (`id`),UNIQUE KEY `title` (`title`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;",
    "$table"
);
$query = $db->prepare($sql);
$query->execute();
foreach($array as $row) {
    $sql = sprintf('INSERT INTO `%s` (`title`,`price`,`description`,`category`,`image`) VALUES ("%s",%d,"%s","%s","%s");',
    "$table",$row['title'],$row['price'],$row['description'],$row['category'],$row['image']);
    $query = $db->prepare($sql);
    $query->execute();
}
?>