<?php

include_once "/../Utils/dataBaseConnection.php";

class RankingDAO {

    public function __construct() {}

    public function getRank(){
        $sql = "SELECT nom_estab,cod_unico,average FROM ubs INNER JOIN evaluate 
            ON ubs.cod_unico = evaluate.id_cod_unico WHERE average > 0 ORDER BY average DESC,amount_people DESC LIMIT 5";
        $result = mysql_query($sql);
  // $return = mysql_fetch_row($result);
          return $result;

        
    }
}
?>
