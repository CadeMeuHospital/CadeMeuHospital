<?php

require_once dirname(__FILE__) . '/../../Dao/ProfileUBSDAO.php';

class ProfileUBSDAOTest extends PHPUnit_Framework_TestCase {

    protected $profileUBSDao;

    protected function setUp() {
        $this->profileUBSDao = new ProfileUBSDAO();
    }

    protected function tearDown() {
        
    }

    public function testSearchUBSinDatabase() {
        $result = $this->profileUBSDao->searchUBSinDatabase("", 2);
        $this->assertNotNULL($result);
    }

    public function testReturnUBS() {
    }

}
