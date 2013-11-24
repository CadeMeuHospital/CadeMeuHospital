/* FALTAR TERMINAR ESSE TESTE */
/* Esse teste continua sem Terminar*/

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
    $this->click("name=Enviar");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("Campo não pode ser nulo!", $this->getAlert());
  }
}
?>