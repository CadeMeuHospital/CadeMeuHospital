<?php


class DataValidation {
    
    public function validateNullFields($parameter){
            return !(empty($parameter));
            //retorna verdadeiro caso a variavel esteja vazia
            //com isso, o valor false eh invertido e enviado como true
        }
    
    public function validateName($nameUBS){

            $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            
            for ($i = 0; $i < strlen($nameUBS); $i++) {
                $char = stripos($validCharacters, $nameUBS[$i]);
                if(!$char){
                    return 1;
                }
                
                if($nameUBS[$i] == " " && $nameUBS[$i+1] == " "){
                    return 2;   
                }
            }
        }
        
        public function validatedscCidade($dscCidade){

            $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            
            for ($i = 0; $i < strlen($dscCidade); $i++) {
                $char = stripos($validCharacters, $dscCidade[$i]);
                if(!$char){
                    return 1;
                }
                
                if($dscCidade[$i] == " " && $dscCidade[$i+1] == " "){
                    return 2;   
                }
            }
        }
}

?>
