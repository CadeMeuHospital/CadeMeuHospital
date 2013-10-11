<?php 

 $conexao = mysql_connect("localhost", "root", "");
 	if (!$conexao)  {
 		die ("Falha na Conexao");
 	}

	$bd = mysql_select_db("cademeuhospital");

 		$i = 0;
 		
 		$executar = mysql_query("SELECT * FROM ubs WHERE cod_unico LIKE 7");	
 		$latitude = mysql_result($executar, $i, "vlr_latitude");
                $longitude = mysql_result($executar, $i, "vlr_longitude");
 		return $latitude.",".$longitude;
                
 		
?>
