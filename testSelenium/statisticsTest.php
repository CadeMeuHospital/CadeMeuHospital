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
    $this->open("/cademeuhospital/src/View/Statistics.php");
    $this->assertTitle("CMH - Estatisticas");
  }
}
?>