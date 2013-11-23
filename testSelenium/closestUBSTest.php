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
    $this->click("link=UBS mais próxima");
    $this->waitForPageToLoad("30000");
    $this->assertTitle("CMH - UBS Mais Próxima");
  }
}
?>