<?php 

 $conexao = mysql_connect("localhost", "root", "");
 	if (!$conexao)  {
 		die ("Falha na Conexao");
 	}

	$bd = mysql_select_db("cademeuhospital");

 		$i = 0;
 		
 		$executar = mysql_query("SELECT * FROM ubs WHERE cod_unico LIKE 2");	
 		$total = mysql_result($executar, $i, "nom_estab");
 		echo $total;
 		
?>
