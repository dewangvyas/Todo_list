<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define("LOG_PATH","logs/");


function update_log(string $filename, string $message){
    
    $myfile = LOG_PATH . $filename . ".log";

    $message = date("Y-m-d H:i:s") . " || " . $filename . " || " . $message . "\n";
    file_put_contents($myfile, $message, FILE_APPEND);
}

?>