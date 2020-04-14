<?php
include("../DTO/DS_Link.php");
use PHPUnit\Framework\TestCase;

class DS_Link_Test extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $Link1 = new DS_Link(1, 2);

        $this->assertIsInt($Link1->getDiseaseId(), $message = "testConstruct, test 1");
        $this->assertIsInt($Link1->getSymptomId(), $message = "testConstruct, test 2");
        $this->assertEquals(1, $Link1->getDiseaseId(), $message = "testConstruct, test 3");
        $this->assertEquals(2, $Link1->getSymptomId(), $message = "testConstruct, test 4");
    }

    public function testGetDiseaseId()
    {
        $Link1 = new DS_Link(1, 2);

        $this->assertIsInt($Link1->getDiseaseId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $Link1->getDiseaseId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $Link1->getDiseaseId(), $message = "testGetId, test 3");
    }

    public function testSetDiseaseId()
    {
        $id = 2;
        $Link1 = new DS_Link(1, 2);

        $this->assertEquals(1, $Link1->getDiseaseId(), $message = "testSetId, test 1");
        $this->assertNotEquals(2, $Link1->getDiseaseId(), $message = "testSetId, test 2");

        $Link1->setDiseaseId($id);

        $this->assertEquals(2, $Link1->getDiseaseId(), $message = "testSetId, test 3");
        $this->assertNotEquals(1, $Link1->getDiseaseId(), $message = "testSetId, test 4");
        $this->assertIsInt($Link1->getDiseaseId(), $message = "testSetId, test 5");
    }

    public function testGetPersonId()
    {
        $Link1 = new DS_Link(1, 2);

        $this->assertIsString($Link1->getSymptomId(), $message = "testGetName, test 1");
        $this->assertEquals("Chemo", $Link1->getSymptomId(), $message = "testGetName, test 2");
        $this->assertNotEquals("Medication", $Link1->getSymptomId(), $message = "testGetName, test 3");
    }

    public function testSetPersonId()
    {
        $id = 1;
        $Link1 = new DS_Link(1, 2);

        $this->assertEquals(2, $Link1->getSymptomId(), $message = "testSetName, test 1");
        $this->assertNotEquals(1, $Link1->getSymptomId(), $message = "testSetName, test 2");

        $Link1->setSymptomId($id);

        $this->assertEquals(1, $Link1->getSymptomId(), $message = "testSetName, test 3");
        $this->assertNotEquals(2, $Link1->getSymptomId(), $message = "testSetName, test 4");
        $this->assertIsString($Link1->getSymptomId(), $message = "testSetName, test 5");
    }

    public function testToString()
    {

    }

}

?>