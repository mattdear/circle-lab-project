<?php
include("diseasePersonLinkDTO.php");
use PHPUnit\Framework\TestCase;

class diseasePersonLinkDTOTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $Link1 = new diseasePersonLinkDTO(1, 2);

        $this->assertIsInt($Link1->getDisease(), $message = "testConstruct, test 1");
        $this->assertIsInt($Link1->getPerson(), $message = "testConstruct, test 2");
        $this->assertEquals(1, $Link1->getDisease(), $message = "testConstruct, test 3");
        $this->assertEquals(2, $Link1->getPerson(), $message = "testConstruct, test 4");
    }

    public function testGetDiseaseId()
    {
        $Link1 = new diseasePersonLinkDTO(1, 2);

        $this->assertIsInt($Link1->getDisease(), $message = "testGetId, test 1");
        $this->assertEquals(1, $Link1->getDisease(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $Link1->getDisease(), $message = "testGetId, test 3");
    }

    public function testSetDiseaseId()
    {
        $id = 2;
        $Link1 = new diseasePersonLinkDTO(1, 2);

        $this->assertEquals(1, $Link1->getDisease(), $message = "testSetId, test 1");
        $this->assertNotEquals(2, $Link1->getDisease(), $message = "testSetId, test 2");

        $Link1->setDisease($id);

        $this->assertEquals(2, $Link1->getDisease(), $message = "testSetId, test 3");
        $this->assertNotEquals(1, $Link1->getDisease(), $message = "testSetId, test 4");
        $this->assertIsInt($Link1->getDisease(), $message = "testSetId, test 5");
    }

    public function testGetPersonId()
    {
        $Link1 = new diseasePersonLinkDTO(1, 2);

        $this->assertIsInt($Link1->getPerson(), $message = "testGetName, test 1");
        $this->assertEquals(2, $Link1->getPerson(), $message = "testGetName, test 2");
        $this->assertNotEquals(1, $Link1->getPerson(), $message = "testGetName, test 3");
    }

    public function testSetPersonId()
    {
        $id = 1;
        $Link1 = new diseasePersonLinkDTO(1,2);

        $this->assertEquals(2, $Link1->getPerson(), $message = "testSetName, test 1");
        $this->assertNotEquals(1, $Link1->getPerson(), $message = "testSetName, test 2");

        $Link1->setPerson($id);

        $this->assertEquals(1, $Link1->getPerson(), $message = "testSetName, test 3");
        $this->assertNotEquals(2, $Link1->getPerson(), $message = "testSetName, test 4");
        $this->assertIsInt($Link1->getPerson(), $message = "testSetName, test 5");
    }

    public function testToString()
  {
    $Link1 = new diseasePersonLinkDTO(1, 2);
    $this->assertIsString($Link1->toString(), $message = "testToString, test 1");
    $this->assertEquals("1 , 2", $Link1->toString(), $message = "testToString, test 2");
  }


}

?>
