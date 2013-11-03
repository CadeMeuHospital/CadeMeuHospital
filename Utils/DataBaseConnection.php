<?php

$server = "localhost";
$username = "root";
$password = "";

//add an @ sign to suppress warning / error messages
$db_connection = @mysql_connect($server, $username, $password);
if (!$db_connection) {
    print"<script>alert('Falha na conexão ao SGBD.')</script>
    <script> window.location='http://localhost/CadeMeuHospital/view/home.php'</script>";
    die;
}

$db_selected = mysql_select_db("cademeuhospital");
if (!$db_selected) {
    print"<script>alert('Falha na conexão ao banco de dados \"cademeuhospital\".')</script>
    <script>  window.location='http://localhost/CadeMeuHospital/view/home.php'</script>";
    die;
}

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

?>
