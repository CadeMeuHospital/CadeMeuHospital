<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost/");
  }

  public function testMyTestCase()
  {
    $this->open("/CadeMeuHospital/src/view/home.php");
    $this->click("id=search");
    $this->type("id=search", "taguatinga");
    $this->click("name=Enviar");
    $this->waitForPageToLoad("30000");
    $this->click("link=CST 07 TAGUATINGA");
    $this->waitForPageToLoad("30000");
    $this->assertTextPresent("CST");
  }
}
?>