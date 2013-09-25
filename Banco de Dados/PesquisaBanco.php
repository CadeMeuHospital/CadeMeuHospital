<?php 

 $conexao = mysql_connect("localhost", "root", "");
 	if (!$conexao)  {
 		die ("Falha na Conexao");
 	}

	$bd = mysql_select_db("cademeuhospital");

 
 		$result = mysql_query("SELECT * FROM ubs");
		$linha = mysql_num_rows($result);
 		
 		$i = 0;
 		
 		$executar = mysql_query("SELECT * FROM ubs WHERE cod_unico LIKE 35365");	
 		//$executar = mysql_query($pesquisa);
 		$total = mysql_result($executar, $i, "nom_estab");
 		echo $total;

 	

 		//while($i < $linha){
 		
 		

 		//$nom_estab = mysql_result($result, $i,"nom_estab");
 		//$cod_unico = mysql_result($result, $i,"cod_unico");
 		//$dsc_bairro = mysql_result($result, $i,"dsc_bairro");
 		//$dsc_cidade = mysql_result($result, $i,"dsc_cidade");
 		//echo "$cod_unico  ---  $nom_estab --- $dsc_bairro --- $dsc_cidade <br>" ;
 		//$i++;
 		//}
 		
?>
