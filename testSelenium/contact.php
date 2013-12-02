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
    $this->open("/cademeuhospital/src/View/Home.php");
    $this->click("link=Fale Conosco");
    $this->waitForPageToLoad("30000");
    $this->click("link=Fale Conosco");
    $this->waitForPageToLoad("30000");
    $this->assertTitle("CMH - Contatos");
  }
}
?>