<?php
$filename = '菜單.json';
if(file_exists($filename)){
    $data = file_get_contents($filename);
    // print_r($data);
    $json = json_decode($data);
    print_r($json);
    echo '<h3>Json file is success loaded.</h3>';
}
else{
    echo '<h3>Json file is NOT loaded.</h3>';
}

?>