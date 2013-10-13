<?php

$server = "localhost";
$username = "root";
$password = "";
$dbconnection = mysql_connect($server, $username, $password);

$dataBase = mysql_select_db("cademeuhospital");

try {
    (!$dbconnection) == TRUE;
} catch (Exception $e) {
    echo ($e->getMessage());
}
?>
