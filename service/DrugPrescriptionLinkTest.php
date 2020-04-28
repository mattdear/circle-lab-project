<?php

include("DrugPrescriptionLinkDto.php");

use PHPUnit\Framework\TestCase;

class DrugPrescriptionLinkTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $Link = new DrugPrescriptionLinkDto(1, 2);

        $this->assertIsInt($Link->getDrug(), $message = "testConstruct, test 1");
        $this->assertIsInt($Link->getPrescription(), $message = "testConstruct, test 2");
        $this->assertEquals(1, $Link->getDrug(), $message = "testConstruct, test 3");
        $this->assertEquals(2, $Link->getPrescription(), $message = "testConstruct, test 4");
    }

    public function testGetDrugId()
    {
        $Link = new DrugPrescriptionLinkDto(1, 2);

        $this->assertIsInt($Link->getDrug(), $message = "testGetDrugId, test 1");
        $this->assertEquals(1, $Link->getDrug(), $message = "testGetDrugId, test 2");
        $this->assertNotEquals(2, $Link->getDrug(), $message = "testGetDrugId, test 3");
    }

    public function testSetDrugId()
    {
        $id = 2;
        $Link = new DrugPrescriptionLinkDto(1, 2);

        $this->assertEquals(1, $Link->getDrug(), $message = "testSetDrugId, test 1");
        $this->assertNotEquals(2, $Link->getDrug(), $message = "testSetDrugId, test 2");

        $Link->setDrug($id);

        $this->assertEquals(2, $Link->getDrug(), $message = "testSetDrugId, test 3");
        $this->assertNotEquals(1, $Link->getDrug(), $message = "testSetDrugId, test 4");
        $this->assertIsInt($Link->getDrug(), $message = "testSetDrugId, test 5");
    }

    public function testGetTreatmentId()
    {
        $Link = new DrugPrescriptionLinkDto(1, 2);

        $this->assertIsInt($Link->getPrescription(), $message = "testGetName, test 1");
        $this->assertEquals(2, $Link->getPrescription(), $message = "testGetName, test 2");
        $this->assertNotEquals(1, $Link->getPrescription(), $message = "testGetName, test 3");
    }

    public function testSetTreatmentId()
    {
        $id = 1;
        $Link = new DrugPrescriptionLinkDto(1, 2);

        $this->assertEquals(2, $Link->getPrescription(), $message = "testSetName, test 1");
        $this->assertNotEquals(1, $Link->getPrescription(), $message = "testSetName, test 2");

        $Link->setPrescription($id);

        $this->assertEquals(1, $Link->getPrescription(), $message = "testSetName, test 3");
        $this->assertNotEquals(2, $Link->getPrescription(), $message = "testSetName, test 4");
        $this->assertIsInt($Link->getPrescription(), $message = "testSetName, test 5");
    }

    public function testToString()
    {
        $Link = new DrugPrescriptionLinkDto(1, 2);
        $this->assertIsString($Link->toString(), $message = "testToString, test 1");
        $this->assertEquals("1 , 2", $Link->toString(), $message = "testToString, test 2");
    }
}

?>
