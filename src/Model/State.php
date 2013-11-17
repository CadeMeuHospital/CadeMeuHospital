<?php

class State {

    private $acronym;
    private $amount_ubs;
    private $avarage;
    private $nameState;
    private $population;
    private $area;

    function __construct($acronym, $amount_ubs, $avarage, $nameState, $population, $area) {
        $this->setAcronym($acronym);
        $this->setAmount_ubs($amount_ubs);
        $this->setAvarage($avarage);
        $this->setNameState($nameState);
        $this->setPopulation($population);
        $this->setArea($area);
    }

    public function getAcronym() {
        return $this->acronym;
    }

    public function setAcronym($acronym) {
        $this->acronym = $acronym;
    }

    public function getAmount_ubs() {
        return $this->amount_ubs;
    }

    public function setAmount_ubs($amount_ubs) {
        $this->amount_ubs = $amount_ubs;
    }

    public function getAvarage() {
        return $this->avarage;
    }

    public function setAvarage($avarage) {
        $this->avarage = $avarage;
    }

    public function getNameState() {
        return $this->nameState;
    }

    public function setNameState($nameState) {
        $this->nameState = $nameState;
    }

    public function getPopulation() {
        return $this->population;
    }

    public function setPopulation($population) {
        $this->population = $population;
    }

    public function getArea() {
        return $this->area;
    }

    public function setArea($area) {
        $this->area = $area;
    }

}

?>
