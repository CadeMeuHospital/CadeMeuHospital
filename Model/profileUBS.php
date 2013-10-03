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
        $this->setIdUBS($idUBS);
        $this->setNameUBS($nameUBS);
        $this->setLatitudeUBS($latitudeUBS);
        $this->setLongitudeUBS($longitudeUBS);
        $this->setCodCNES($codCNES);
        $this->setPhoneUBS($phoneUBS);
        $this->setPhysicStructureUBS($physicStructureUBS);
        $this->setAdapOldPeople($adapOldPeople);
        $this->setDescriTools($descriTools);
        $this->setDescMedicine($descMedicine);         
    }
        
    public function getIdUBS() {
        return $this->idUBS;
    }

    public function setIdUBS($idUBS) {
        $this->idUBS = $idUBS;
    }

    public function getNameUBS() {
        return $this->nameUBS;
    }

    public function setNameUBS($nameUBS) {
        $this->nameUBS = $nameUBS;
    }

    public function getLatitudeUBS() {
        return $this->latitudeUBS;
    }

    public function setLatitudeUBS($latitudeUBS) {
        $this->latitudeUBS = $latitudeUBS;
    }

    public function getLongitudeUBS() {
        return $this->longitudeUBS;
    }

    public function setLongitudeUBS($longitudeUBS) {
        $this->longitudeUBS = $longitudeUBS;
    }

    public function getCodCNES() {
        return $this->codCNES;
    }

    public function setCodCNES($codCNES) {
        $this->codCNES = $codCNES;
    }

    public function getPhoneUBS() {
        return $this->phoneUBS;
    }

    public function setPhoneUBS($phoneUBS) {
        $this->phoneUBS = $phoneUBS;
    }

    public function getPhysicStructureUBS() {
        return $this->physicStructureUBS;
    }

    public function setPhysicStructureUBS($physicStructureUBS) {
        $this->physicStructureUBS = $physicStructureUBS;
    }

    public function getAdapOldPeople() {
        return $this->adapOldPeople;
    }

    public function setAdapOldPeople($adapOldPeople) {
        $this->adapOldPeople = $adapOldPeople;
    }

    public function getDescriTools() {
        return $this->descriTools;
    }

    public function setDescriTools($descriTools) {
        $this->descriTools = $descriTools;
    }

    public function getDescMedicine() {
        return $this->descMedicine;
    }

    public function setDescMedicine($descMedicine) {
        $this->descMedicine = $descMedicine;
    }


        
            
    }
    
?>
