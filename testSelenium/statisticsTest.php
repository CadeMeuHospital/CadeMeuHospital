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
    $this->open("/CadeMeuHospital/src/View/");
    $this->click("link=Estatísticas");
    $this->waitForPageToLoad("30000");
    $this->assertTitle("CMH - Estatísticas");
  }
}
?>