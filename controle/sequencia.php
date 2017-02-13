<?php
$file = (isset($_GET['file']) ? $_GET['file'] : "");

if(!empty($file)){
    if(file_exists($file)){
        include_once $file;
    }
    else{
        include_once "404.php";
    }
}
else{
    include_once "inicio.php";
}
?>