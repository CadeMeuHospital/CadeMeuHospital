<?php
    
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbconnection = mysql_connect($server, $username, $password);
        
        if(!$dbconnection){
            die ("Não foi possível conectar: " . mysql_error());
        }
        
        $dataBase = mysql_select_db("cademeuhospital");

?>
