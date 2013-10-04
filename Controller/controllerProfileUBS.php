<?php

    include_once 'Model/profileUBS.php';
    include_once 'DAO/profileUBSDAO.php';

    class controllerProfileUBS{
        
        public function __construct(){
        }
        
        public function makeObjectUBS($idUBS,$nameUBS,$latitudeUBS,$longitudeUBS,$codCNES,$phoneUBS,$physicStructureUBS,$adapOldPeople,$descriTools,$descMedicine){
            //try{
                $profileUBS = new profileUBS($idUBS,$nameUBS,$latitudeUBS,$longitudeUBS,$codCNES,$phoneUBS,$physicStructureUBS,$adapOldPeople,$descriTools,$descMedicine);
            //}catch(Exception $e){
            //    print"<script>alert('".$e->getMessage()."')</script>";
            //}
            return $profileUBS;
        }
        
        public function searchUBSByCodCNES($profileUBS){
            $profileUBSDAO = new profileUBSDAO();
            //Cria um objeto da classe profileUBSDAO
            
            $codCNES = $profileUBS->getCodCNES();
            //Cria uma variável para capturar o Codigo CNES do obejto UBS que está sendo passado no parametro do método
            
            return $profileUBSDAO->searchUBSByCodCNES($codCNES);
        }
    }
    
        
    
?>
