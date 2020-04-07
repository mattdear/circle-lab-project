<?php
include ("treatmentDTO.php");
use PHPUnit\Framework\TestCase;

class treatmentDTOTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
  {
    $treatment = new treatmentDTO(1, "Chemo");

    $this->assertIsInt($treatment->getId(), $message = "testConstruct, test 1");
    $this->assertIsString($treatment->getName(), $message = "testConstruct, test 2");
    $this->assertEquals(1, $treatment->getId(), $message = "testConstruct, test 3");
    $this->assertEquals("Chemo", $treatment->getName(), $message = "testConstruct, test 4");
    $this->assertNotEquals(2, $treatment->getId(), $message = "testConstruct, test 5");
    $this->assertNotEquals("Medication", $treatment->getName(), $message = "testConstruct, test 6");

  }

  public function testGetId()
  {
    $treatment = new treatmentDTO(1, "Chemo");

    $this->assertIsInt($treatment->getId(), $message = "testGetId, test 1");
    $this->assertEquals(1, $treatment->getId(), $message = "testGetId, test 2");
    $this->assertNotEquals(2, $treatment->getId(), $message = "testGetId, test 3");
  }

  public function testSetId()
  {
    $id = 2;
    $treatment = new treatmentDTO(null, null);

    $this->assertEquals(null, $treatment->getId(), $message = "testSetId, test 1");
    $this->assertNotEquals(1, $treatment->getId(), $message = "testSetId, test 2");

    $treatment->setId($id);

    $this->assertEquals(2, $treatment->getId(), $message = "testSetId, test 3");
    $this->assertNotEquals(1, $treatment->getId(), $message = "testSetId, test 4");
    $this->assertIsInt($treatment->getId(), $message = "testSetId, test 5");
  }

  public function testGetName()
  {
    $treatment = new treatmentDTO(1, "Chemo");

    $this->assertIsString($treatment->getName(), $message = "testGetName, test 1");
    $this->assertEquals("Chemo", $treatment->getName(), $message = "testGetName, test 2");
    $this->assertNotEquals("Medication", $treatment->getName(), $message = "testGetName, test 3");
  }

  public function testSetName()
  {
    $name = "Chemo";
    $treatment = new treatmentDTO(null, null);

    $this->assertEquals(null, $treatment->getName(), $message = "testSetName, test 1");
    $this->assertNotEquals("Meds", $treatment->getName(), $message = "testSetName, test 2");
  }

  public function testToString()
  {
    $treatment = new treatmentDTO(1, "Chemo");
    $this->assertIsString($treatment->toString(), $message = "testToString, test 1");
    $this->assertEquals("ID: 1 \nName: Chemo", $treatment->toString(), $message = "testToString, test 2");
  }
}
 ?>
