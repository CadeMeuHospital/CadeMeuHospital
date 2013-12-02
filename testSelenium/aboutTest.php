<?php
class About extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost/");
    
  }

  public function testAboutPage()
  {
    $this->open("/cademeuhospital/src/View/Home.php");
    $this->click("css=img");
    $this->waitForPageToLoad("30000");
    $this->click("link=Sobre");
    $this->waitForPageToLoad("30000");
    $this->assertTitle("CMH - Sobre");
  }
}
?>