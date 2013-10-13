<?php

searchUBS("Ariquemes");

function searchUBS($field) {
    
    $conexao = mysql_connect("localhost", "root", "");
    if (!$conexao) {
        die("Falha na Conexao");
    }

    $bd = mysql_select_db("cademeuhospital");

    $result = mysql_query("SELECT * FROM ubs WHERE dsc_cidade LIKE '" . $field . "'");
    $linha = mysql_num_rows($result);

    $i = 0;
    $arrayUBS = array();
    
    while ($i < $linha) {

        $cod_unico = mysql_result($result, $i, "cod_unico");
        $nom_estab = mysql_result($result, $i, "nom_estab");
        $dsc_cidade = mysql_result($result, $i, "dsc_cidade");

        $UBS = new UBS($cod_unico, $nom_estab, $dsc_cidade);

        array_push($arrayUBS, $UBS);

        $i++;
        
    }
    
    $i = 0;
    while ($i<  count($arrayUBS)){
        $UBS = $arrayUBS[$i];
        $id = $UBS->getId();
        $nome = $UBS->getNome();
        $cidade = $UBS->getCidade();
        
        echo "$id -- $nome -- $cidade <br>";
        $i++;
    }
}

class UBS {

    private $id;
    private $nome;
    private $cidade;

    public function __construct($id, $nome, $cidade) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setCidade($cidade);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

}

?>
