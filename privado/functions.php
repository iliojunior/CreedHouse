<?php
function include_all_php($folder)
{
    foreach (glob("{$folder}/*.php") as $filename) {
        include_once $filename;
    }
}

?>