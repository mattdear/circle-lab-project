<?php

/**
 * Copyright (C) 2020 Circle Lab
 *
 * Coder: Matthew Dear
 *
 * Reviwer: Joshua Alsop-Barrell
 *
 */

include("prescriptionDTO.php");

use PHPUnit\Framework\TestCase;

class prescriptionDTOTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsInt($prescription->getId(), $message = "testConstruct, test 1");
        $this->assertIsInt($prescription->getPatient(), $message = "testConstruct, test 2");
        $this->assertIsString($prescription->getDate(), $message = "testConstruct, test 3");
        $this->assertIsInt($prescription->getQuantity(), $message = "testConstruct, test 4");
        $this->assertIsInt($prescription->getLocation(), $message = "testConstruct, test 5");
        $this->assertIsInt($prescription->getIsactive(), $message = "testConstruct, test 6");
        $this->assertEquals(1, $prescription->getId(), $message = "testConstruct, test 7");
        $this->assertEquals(2, $prescription->getPatient(), $message = "testConstruct, test 8");
        $this->assertEquals("2020-04-06", $prescription->getDate(), $message = "testConstruct, test 9");
        $this->assertEquals(3, $prescription->getQuantity(), $message = "testConstruct, test 10");
        $this->assertEquals(4, $prescription->getLocation(), $message = "testConstruct, test 11");
        $this->assertEquals(5, $prescription->getIsactive(), $message = "testConstruct, test 12");
        $this->assertNotEquals(3, $prescription->getId(), $message = "testConstruct, test 13");
        $this->assertNotEquals(5, $prescription->getPatient(), $message = "testConstruct, test 14");
        $this->assertNotEquals("2019-11-29", $prescription->getDate(), $message = "testConstruct, test 15");
        $this->assertNotEquals(2, $prescription->getQuantity(), $message = "testConstruct, test 16");
        $this->assertNotEquals(1, $prescription->getLocation(), $message = "testConstruct, test 17");
        $this->assertNotEquals(4, $prescription->getIsactive(), $message = "testConstruct, test 18");

    }

    public function testGetId()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsInt($prescription->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $prescription->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $prescription->getId(), $message = "testGetId, test 3");
    }

    public function testSetId()
    {
        $id = 2;
        $prescription = new prescriptionDTO(null, null, null, null, null, null);

        $this->assertEquals(null, $prescription->getId(), $message = "testSetId, test 1");
        $this->assertNotEquals(2, $prescription->getId(), $message = "testSetId, test 2");

        $prescription->setId($id);

        $this->assertEquals(2, $prescription->getId(), $message = "testSetId, test 3");
        $this->assertNotEquals(null, $prescription->getId(), $message = "testSetId, test 4");
        $this->assertIsInt($prescription->getId(), $message = "testSetId, test 5");
    }

    public function testGetPatient()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsInt($prescription->getPatient(), $message = "testGetPatient, test 1");
        $this->assertEquals(2, $prescription->getPatient(), $message = "testGetPatient, test 2");
        $this->assertNotEquals(1, $prescription->getPatient(), $message = "testGetPatient, test 3");
    }

    public function testSetPatient()
    {
        $patient = 2;
        $prescription = new prescriptionDTO(null, null, null, null, null, null);

        $this->assertEquals(null, $prescription->getPatient(), $message = "testSetPatient, test 1");
        $this->assertNotEquals(2, $prescription->getPatient(), $message = "testSetPatient, test 2");

        $prescription->setPatient($patient);

        $this->assertEquals(2, $prescription->getPatient(), $message = "testSetPatient, test 3");
        $this->assertNotEquals(null, $prescription->getPatient(), $message = "testSetPatient, test 4");
        $this->assertIsInt($prescription->getPatient(), $message = "testSetPatient, test 5");
    }

    public function testGetDate()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsString($prescription->getDate(), $message = "testGetDate, test 1");
        $this->assertEquals("2020-04-06", $prescription->getDate(), $message = "testGetDate, test 2");
        $this->assertNotEquals("2019-11-29", $prescription->getDate(), $message = "testGetDate, test 3");
    }

    public function testSetDate()
    {
        $date = "2019-11-29";
        $prescription = new prescriptionDTO(null, null, null, null, null, null);

        $this->assertEquals(null, $prescription->getDate(), $message = "testSetDate, test 1");
        $this->assertNotEquals("2019-11-29", $prescription->getDate(), $message = "testSetDate, test 2");

        $prescription->setDate($date);

        $this->assertEquals("2019-11-29", $prescription->getDate(), $message = "testSetDate, test 3");
        $this->assertNotEquals(null, $prescription->getDate(), $message = "testSetDate, test 4");
        $this->assertIsString($prescription->getDate(), $message = "testSetDate, test 5");
    }

    public function testGetQuantity()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsInt($prescription->getQuantity(), $message = "testGetQuantity, test 1");
        $this->assertEquals(3, $prescription->getQuantity(), $message = "testGetQuantity, test 2");
        $this->assertNotEquals(4, $prescription->getQuantity(), $message = "testGetQuantity, test 3");
    }

    public function testSetQuantity()
    {
        $quantity = 2;
        $prescription = new prescriptionDTO(null, null, null, null, null, null);

        $this->assertEquals(null, $prescription->getQuantity(), $message = "testSetQuantity, test 1");
        $this->assertNotEquals(2, $prescription->getQuantity(), $message = "testSetQuantity, test 2");

        $prescription->setQuantity($quantity);

        $this->assertEquals(2, $prescription->getQuantity(), $message = "testSetQuantity, test 3");
        $this->assertNotEquals(null, $prescription->getQuantity(), $message = "testSetQuantity, test 4");
        $this->assertIsInt($prescription->getQuantity(), $message = "testSetQuantity, test 5");
    }

    public function testGetLocation()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsInt($prescription->getLocation(), $message = "testGetLocation, test 1");
        $this->assertEquals(4, $prescription->getLocation(), $message = "testGetLocation, test 2");
        $this->assertNotEquals(5, $prescription->getLocation(), $message = "testGetLocation, test 3");
    }

    public function testSetLocation()
    {
        $location = 2;
        $prescription = new prescriptionDTO(null, null, null, null, null, null);

        $this->assertEquals(null, $prescription->getLocation(), $message = "testSetLocation, test 1");
        $this->assertNotEquals(2, $prescription->getLocation(), $message = "testSetLocation, test 2");

        $prescription->setLocation($location);

        $this->assertEquals(2, $prescription->getLocation(), $message = "testSetLocation, test 3");
        $this->assertNotEquals(null, $prescription->getLocation(), $message = "testSetLocation, test 4");
        $this->assertIsInt($prescription->getLocation(), $message = "testSetLocation, test 5");
    }

    public function testGetIsactive()
    {
        $prescription = new prescriptionDTO(1, 2, "2020-04-06", 3, 4, 5);

        $this->assertIsInt($prescription->getIsactive(), $message = "testGetIsactive, test 1");
        $this->assertEquals(5, $prescription->getIsactive(), $message = "testGetIsactive, test 2");
        $this->assertNotEquals(4, $prescription->getIsactive(), $message = "testGetIsactive, test 3");
    }

    public function testSetIsactive()
    {
        $isactive = 2;
        $prescription = new prescriptionDTO(null, null, null, null, null, null);

        $this->assertEquals(null, $prescription->getIsactive(), $message = "testSetIsactive, test 1");
        $this->assertNotEquals(2, $prescription->getIsactive(), $message = "testSetIsactive, test 2");

        $prescription->setIsactive($isactive);

        $this->assertEquals(2, $prescription->getIsactive(), $message = "testSetIsactive, test 3");
        $this->assertNotEquals(null, $prescription->getIsactive(), $message = "testSetIsactive, test 4");
        $this->assertIsInt($prescription->getIsactive(), $message = "testSetIsactive, test 5");
    }

    public function testToString()
    {
        $prescription = new prescriptionDTO(1, 2, date_create("2020-04-06"), 3, 4, 5);

        $this->assertIsString($prescription->toString(), $message = "testToString, test 1");
        $this->assertEquals(" 1 2 2020-04-06 3 4 5 ", $prescription->toString(), $message = "testToString, test 2");
        $this->assertNotEquals(" 3 5 2019-11-29 2 1 4 ", $prescription->toString(), $message = "testToString, test 3");
    }

}

?>
