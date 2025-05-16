<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'config.php';
require 'logging.php';

$host = HOST;
$db = DB_NAME;
$user = USER;
$pass = PASSWORD;

$filename = basename(__FILE__, ".php");

//echo "/n/n" . $host . "   " . $user . "   " . $pass . "   " . $db . "/n/n";

try
{

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        update_log($filename, "Connection failed: " . print_r($conn->connect_error));
        die("Connection failed: " . $conn->connect_error);
    }
}
catch(Exception $exception)
{
    $message = "ERROR: " . $exception->getMessage();
    update_log($filename, "Connection failed: " . $conn->connect_error);
}



?>