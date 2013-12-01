<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://localhost/");
  }

  public function testMyTestCase()
  {
    $this->open("/CadeMeuHospital/src/view/Profile.php?id=18517&latlon=-15.780147999999999,-47.92917");
    $this->click("link=Home");
    $this->waitForPageToLoad("30000");
    $this->assertTitle("CMH - Home");
  }
}
?>