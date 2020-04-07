<?php
include ("drugDTO.php");
use PHPUnit\Framework\TestCase;

class drugDTOTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
  {
    $drug = new drugDTO(1, "Paracetemol");

    $this->assertIsInt($drug->getId(), $message = "testConstruct, test 1");
    $this->assertIsString($drug->getName(), $message = "testConstruct, test 2");
    $this->assertEquals(1, $drug->getId(), $message = "testConstruct, test 3");
    $this->assertEquals("Paracetemol", $drug->getName(), $message = "testConstruct, test 4");
    $this->assertNotEquals(2, $drug->getId(), $message = "testConstruct, test 5");
    $this->assertNotEquals("Ibuprofen", $drug->getName(), $message = "testConstruct, test 6");
  }

  public function testGetId()
  {
    $drug = new drugDTO(1, "Paracetemol");

    $this->assertIsInt($drug->getId(), $message = "testGetId, test 1");
    $this->assertEquals(1, $drug->getId(), $message = "testGetId, test 2");
    $this->assertNotEquals(2, $drug->getId(), $message = "testGetId, test 3");
  }

  public function testSetId()
  {
    $id = 2;
    $drug = new drugDTO(null, null);

    $this->assertEquals(null, $drug->getId(), $message = "testSetId, test 1");
    $this->assertNotEquals(1, $drug->getId(), $message = "testSetId, test 2");

    $drug->setId($id);

    $this->assertEquals(2, $drug->getId(), $message = "testSetId, test 3");
    $this->assertNotEquals(1, $drug->getId(), $message = "testSetId, test 4");
    $this->assertIsInt($drug->getId(), $message = "testSetId, test 5");
  }

  public function testGetName()
  {
    $drug = new drugDTO(1, "Paracetemol");

    $this->assertIsString($drug->getName(), $message = "testGetName, test 1");
    $this->assertEquals("Paracetemol", $drug->getName(), $message = "testGetName, test 2");
    $this->assertNotEquals("Ibuprofen", $drug->getName(), $message = "testGetName, test 3");
  }

  public function testSetName()
  {
    $name = "Paracetemol";
    $drug = new drugDTO(null, null);

    $this->assertEquals(null, $drug->getName(), $message = "testSetName, test 1");
    $this->assertNotEquals("Ibuprofen", $drug->getName(), $message = "testSetName, test 2");

    $drug->setName($name);

    $this->assertEquals("Paracetemol", $drug->getName(), $message = "testSetName, test 3");
    $this->assertNotEquals("Ibuprofen", $drug->getName(), $message = "testSetName, test 4");
    $this->assertIsString($drug->getName(), $message = "testSetName, test 5");
  }

  public function testToString()
  {
    $drug = new drugDTO(1, "Paracetemol");
    $this->assertIsString($drug->toString(), $message = "testToString, test 1");
    $this->assertEquals(" 1 Paracetemol ", $drug->toString(), $message = "testToString, test 2");
  }

}

?>
