<?php 

 $conexao = mysql_connect("localhost", "root", "");
 	if (!$conexao)  {
 		die ("Falha na Conexao");
 	}

	$bd = mysql_select_db("cademeuhospital");

 
 		$result = mysql_query("SELECT * FROM ubs");
		$linha = mysql_num_rows($result);
 		
 		$i = 0;
 		while($i < $linha){
 		$nom_estab = mysql_result($result, $i,"nom_estab");
 		$cod_unico = mysql_result($result, $i,"cod_unico");
 		$dsc_bairro = mysql_result($result, $i,"dsc_bairro");
 		$dsc_cidade = mysql_result($result, $i,"dsc_cidade");
                $dsc_estrut = mysql_result($result, $i,"dsc_equipamentos");
                $dsc_estrut2 = mysql_result($result, $i,"dsc_medicamentos");
 		echo "$cod_unico  ---  $dsc_estrut --- $dsc_estrut2<br>" ;
 		$i++;
 		}
 		
?>
