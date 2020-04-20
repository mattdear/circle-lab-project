<?php

include ("Drug_Treatment_LinkDto.php");
use PHPUnit\Framework\TestCase;
class Drug_Treatment_LinkTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
{
    $Link = new Drug_Treatment_LinkDto(1, 2);

    $this->assertIsInt($Link->getDrug(), $message = "testConstruct, test 1");
    $this->assertIsInt($Link->getTreatment(), $message = "testConstruct, test 2");
    $this->assertEquals(1, $Link->getDrug(), $message = "testConstruct, test 3");
    $this->assertEquals(2, $Link->getTreatment(), $message = "testConstruct, test 4");
}

public function testGetDrugId()
{
    $Link = new Drug_Treatment_LinkDto(1, 2);

    $this->assertIsInt($Link->getDrug(), $message = "testGetDrugId, test 1");
    $this->assertEquals(1, $Link->getDrug(), $message = "testGetDrugId, test 2");
    $this->assertNotEquals(2, $Link->getDrug(), $message = "testGetDrugId, test 3");
}

public function testSetDrugId()
{
    $id = 2;
    $Link = new Drug_Treatment_LinkDto(1, 2);

    $this->assertEquals(1, $Link->getDrug(), $message = "testSetDrugId, test 1");
    $this->assertNotEquals(2, $Link->getDrug(), $message = "testSetDrugId, test 2");

    $Link->getDrug($id);

    $this->assertEquals(1, $Link->getDrug(), $message = "testSetDrugId, test 3");
    $this->assertNotEquals(2, $Link->getDrug(), $message = "testSetDrugId, test 4");
    $this->assertIsInt($Link->getDrug(), $message = "testSetDrugId, test 5");
}

public function testGetTreatmentId()
{
    $Link = new Drug_Treatment_LinkDto(1, 2);

    $this->assertIsInt($Link->getTreatment(), $message = "testGetName, test 1");
    $this->assertEquals(2, $Link->getTreatment(), $message = "testGetName, test 2");
    $this->assertNotEquals(1, $Link->getTreatment(), $message = "testGetName, test 3");
}

public function testSetTreatmentId()
{
    $id = 1;
    $Link = new Drug_Treatment_LinkDto(1, 2);

    $this->assertEquals(2, $Link->getTreatment(), $message = "testSetName, test 1");
    $this->assertNotEquals(1, $Link->getTreatment(), $message = "testSetName, test 2");

    $Link->setTreatment($id);

    $this->assertEquals(1, $Link->getTreatment(), $message = "testSetName, test 3");
    $this->assertNotEquals(2, $Link->getTreatment(), $message = "testSetName, test 4");
    $this->assertIsInt($Link->getTreatment(), $message = "testSetName, test 5");
}

public function testToString()
{
    $Link = new Drug_Treatment_LinkDto(1, 2);
    $this->assertIsString($Link->toString(), $message = "testToString, test 1");
    $this->assertEquals("1 , 2", $Link->toString(), $message = "testToString, test 2");
}
}
?>
