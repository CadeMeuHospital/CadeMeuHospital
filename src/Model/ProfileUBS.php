<?php

class ProfileUBS {

    private $idUBS;
    private $latitudeUBS;
    private $longitudeUBS;
    private $codCNES;
    private $nameUBS;
    private $descEnder;
    private $phoneUBS;
    private $physicStructureUBS;
    private $adapOldPeople;
    private $descriTools;
    private $descMedicine;
    private $average;
    
    private $city;

    function __construct($idUBS, $latitudeUBS, $longitudeUBS, $codCNES,
            $nameUBS, $descEnder, $phoneUBS,$physicStructureUBS, 
            $adapOldPeople, $descriTools, $descMedicine, 
            $average, $city) {
        $this->setIdUBS($idUBS);
        $this->setLatitudeUBS($latitudeUBS);
        $this->setLongitudeUBS($longitudeUBS);
        $this->setCodCNES($codCNES);
        $this->setNameUBS($nameUBS);
        $this->setDescEnder($descEnder);
        $this->setPhoneUBS($phoneUBS);
        $this->setPhysicStructureUBS($physicStructureUBS);
        $this->setAdapOldPeople($adapOldPeople);
        $this->setDescriTools($descriTools);
        $this->setDescMedicine($descMedicine);
        $this->setAverage($average);
        
        $this->setCity($city);
    }
    
    public function getCity(){
        return $this->city;
    }

    public function setCity($city){
        $this->city = $city;
    }
    
    public function getIdUBS(){
        return $this->idUBS;
    }

    public function setIdUBS($idUBS){
        $this->idUBS = $idUBS;
    }

    public function getLatitudeUBS(){
        return $this->latitudeUBS;
    }

    public function setLatitudeUBS($latitudeUBS){
        $this->latitudeUBS = $latitudeUBS;
    }

    public function getLongitudeUBS(){
        return $this->longitudeUBS;
    }

    public function setLongitudeUBS($longitudeUBS){
        $this->longitudeUBS = $longitudeUBS;
    }

    public function getCodCNES(){
        return $this->codCNES;
    }

    public function setCodCNES($codCNES){
        $this->codCNES = $codCNES;
    }

    public function getNameUBS() {
        return $this->nameUBS;
    }

    public function setNameUBS($nameUBS){
        $this->nameUBS = $nameUBS;
    }

    public function getDescEnder(){
        return $this->descEnder;
    }

    public function setDescEnder($descEnder){
        $this->descEnder = $descEnder;
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

    public function setPhysicStructureUBS($physicStructureUBS){
        $this->physicStructureUBS = $physicStructureUBS;
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

    public function getDescMedicine() {
        return $this->descMedicine;
    }

    public function setDescMedicine($descMedicine){
        $this->descMedicine = $descMedicine;
    }

    public function setAverage($average){
        $this->average = $average;
    }

    public function getAverage(){
        return $this->average;
    }

}

?>
