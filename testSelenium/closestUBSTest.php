<?php
class ClosestUBS extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*firefox");
    $this->setBrowserUrl("http://localhost/");
  }

  public function testClosestUBSPage()
  {
    $this->open("/CadeMeuHospital/src/view/home.php");
    $this->click("link=UBS mais próxima");
    $this->waitForPageToLoad("30000");
    $this->assertTitle("CMH - UBS Mais Próxima");
  }
    
}
?>