<?php

class Example extends PHPUnit_Framework_TestCase {

    protected function setUp() {
        $this->setBrowser("*firefox");
        $this->setBrowserUrl("http://localhost/");
    }

    public function testRateUBS() {
        $this->open("/CadeMeuHospital/src/view/home.php");
        $this->click("css=body");
        $this->click("id=searchType");
        $this->select("id=searchType", "label=Estado");
        $this->click("css=option[value=\"4\"]");
        $this->click("id=optionUF");
        $this->select("id=optionUF", "label=Distrito Federal");
        $this->click("css=option[value=\"DF\"]");
        $this->click("name=Enviar");
        $this->waitForPageToLoad("30000");
        $this->click("link=CSC 03 CEILANDIA");
        $this->waitForPageToLoad("30000");
        $this->click("document.Evaluate.evaluate[3]");
        $this->click("name=submitEvaluate");
        $this->waitForPageToLoad("30000");
    }

}

?>