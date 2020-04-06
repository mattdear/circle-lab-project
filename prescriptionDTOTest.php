<?php
include ("prescriptionDTO.php");
use PHPUnit\Framework\TestCase;

class prescriptionDTOTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $prescription = new prescriptionDTO(1,"admin",1);

        $this->assertIsInt($prescription->getAccessLevel(), $message = "testConstruct, test 1");
        $this->assertIsInt($prescription->getId(), $message = "testConstruct, test 2");
        $this->assertIsString($prescription->getName(), $message = "testConstruct, test 3");
        $this->assertEquals(1, $prescription->getId(), $message = "testConstruct, test 4");
        $this->assertEquals("admin", $prescription->getName(), $message = "testConstruct, test 5");
        $this->assertEquals(1, $prescription->getAccessLevel(), $message = "testConstruct, test 6");
        $this->assertNotEquals(2, $prescription->getId(), $message = "testConstruct, test 7");
        $this->assertNotEquals("patient", $prescription->getName(), $message = "testConstruct, test 8");
        $this->assertNotEquals(2, $prescription->getAccessLevel(), $message = "testConstruct, test 9");
    }

    public function getId()
    {
        $prescription = new prescriptionDTO(3,"Doctor",4);

        $this->assertIsInt($prescription->getId(), $message = "testGetId, test 1");
        $this->assertEquals(3, $prescription->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $prescription->getId(), $message = "testGetId, test 3");
    }

    public function setId($id)
    {
        $id=2;
        $prescription = new prescriptionDTO(null, null, null);

        $this->assertEquals(null, $prescription->getId(), $message = "testSetId, test 1");
        $this->assertNotEquals(2, $prescription->getId(), $message = "testSetId, test 2");

        $prescription->setId($id);

        $this->assertEquals(2, $prescription->getId(), $message = "testSetId, test 3");
        $this->assertNotEquals(null, $prescription->getId(), $message = "testSetId, test 4");
        $this->assertIsInt($prescription->getId(), $message = "testSetId, test 5");
    }

    public function getPatient()
    {
        return $this->patient;
    }

    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getIsactive()
    {
        return $this->isactive;
    }

    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;
    }

    public function testToString()
    {
      $prescription = new prescriptionDTO(7,"government",8);

      $this->assertIsString($prescription->toString(), $message = "testToString, test 1");
      $this->assertEquals(" 7 government 8 ", $prescription->toString(), $message = "testToString, test 2");
      $this->assertNotEquals(" 3 doctor 4 ", $prescription->toString(), $message = "testToString, test 3");
    }
