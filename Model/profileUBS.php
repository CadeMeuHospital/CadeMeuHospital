<?php

class ProfileUBS{
    
    private $idUBS;
    private $nameUBS;
    private $latitudeUBS;
    private $longitudeUBS;
    private $codCNES;
    private $phoneUBS;
    private $physicStructureUBS;
    private $adapOldPeople;
    private $descriTools;
    private $descMedicine;
    
    function __construct($idUBS,$nameUBS,$latitudeUBS,$longitudeUBS,$codCNES,$phoneUBS,$physicStructureUBS,$adapOldPeople,$descriTools,$descMedicine){
        $this->setidUBS($idUBS);
        $this->nameUBS($nameUBS);
        $this->latitudeUBS($latitudeUBS);
        $this->longitudeUBS($longitudeUBS);
        $this->codCNES($codCNES);
        $this->phoneUBS($phoneUBS);
        $this->physicStructureUBS($physicStructureUBS);
        $this->adapOldPeople($adapOldPeople);
        $this->descriTools($descriTools);
        $this->descMedicine($descMedicine);         
    }
        public function getIdUBS(){
            return $this->idUBS;            
        }
        public function setIdUBS($idUBS){
            $this->idUBS = $idUBS;            
        }
        
        
        public function getNameUBS(){
            return $this->nameUBS;            
        }
        public function setNameUBS($nameUBS){
            $this->nameUBS = $nameUBS;            
        }
        
        
        public function getLatitude(){
            return $this->latitudeUBS;
        }
        public function setLatitude($latitude){
            $this->latitudeUBS = $latitude;
        }
        
        
        public function getLongitude(){
            return $this->longitudeUBS;                    
        }
        public function setLongitude($longitude){
            $this->longitudeUBS = $longitude;                    
        }
        
                
        public function getCodCNES(){
            return $this->codCNES; 
        }
        public function setCodCNES($codCNES){
            $this->codCNES = $codCNES; 
        }
        
        
        public function getPhoneUBS(){
            return $this->phoneUBS;
        }
        public function setPhoneUBS($phoneUBS){
            $this->phoneUBS = $phoneUBS;
        }
        
        
        public function getPhysicStructureUBS(){
            return $this->physicStructureUBS;
        }
        public function setPhysicStructureUBS($physicStructure){
            $this->physicStructureUBS = $physicStructure;
        }
        
        
        public function getAdapOldPeople(){
            return $this->adapOldPeople;
        }
        public function setAdapOldPeople($adapOldPeople){
            $this->adapOldPeople = $adapOldPeople;
        }
        
        
        public function getDescriTools(){
            return $this->descriTools;
        }
        public function setDescriTools($descriTools){
            $this->descriTools = $descriTools;
        }
        
        
        public function getDescMedicine(){
            return $this->descMedicine;
        }
        public function setDescMedicine($descMedicine){
            $this->descMedicine = $descMedicine;
        }
        
            
    }
    
?>
