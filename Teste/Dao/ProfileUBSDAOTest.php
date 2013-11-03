<?php

require_once dirname(__FILE__) . '/../../Dao/ProfileUBSDAO.php';

class ProfileUBSDAOTest extends PHPUnit_Framework_TestCase {

    protected $profileUBSDao;

    protected function setUpProfileUBS() {
        $this->profileUBSDao = new ProfileUBSDAO();
    }

    protected function tearDownProfileUBS() {
        unset($this->profileUBSDao);
    }

    public function testSearchUBSinDatabase() {
        $this->setUpProfileUBS();
        $resultNotNULL = $this->profileUBSDao->searchUBSinDatabase("taguatinga", 2);
        $this->assertNotNULL($resultNotNULL);
        $this->tearDownProfileUBS();
    }

    public function testReturnUBSFalse() {
        $this->setUpProfileUBS();
        $resultFalse = $this->profileUBSDao->returnUBS(40000);
        $this->assertFalse($resultFalse);
        $this->tearDownProfileUBS();        
    }
    
    public function testSearchUBSInTableEvaluate(){
        $this->setUpProfileUBS();
        $resultNotNULL = $this->profileUBSDao->searchUBSInTableEvaluate(1);
        $this->assertNotNULL($resultNotNULL);
        $this->tearDownProfileUBS();
    
    }
    
    public function testSaveEvaluationUBSNotNULL(){
        $this->setUpProfileUBS();
        $resultNotNULL = $this->profileUBSDao->saveEvaluationUBS(6, 1);
        $this->assertNotNULL($resultNotNULL);
        $this->tearDownProfileUBS();        
    }
    
    public function testTakeAverageUBSFalse(){
        $this->setUpProfileUBS();
        $resultFalse = $this->profileUBSDao->takeAverageUBS(NULL);
        $this->assertFalse($resultFalse);
        $this->tearDownProfileUBS();
    }
}
