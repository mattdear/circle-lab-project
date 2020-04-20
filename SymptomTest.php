<?php

include("symptomDTO.php");

class SymptomTest extends PHPUnit\Framework\TestCase
{

    public function testGetName()
    {
        $symptom = new Symptom(1, "Cough");

        $this->assertIsString($symptom->getName(), $message = "testGetName, test 1");
        $this->assertEquals("Cough", $symptom->getName(), $message = "testGetName, test 2");
        $this->assertNotEquals("Dizziness", $symptom->getName(), $message = "testGetName, test 3");
    }

    public function testSetName()
    {
        $name = "Cough";
        $symptom = new Symptom(null, "null");

        $this->assertEquals("null", $symptom->getName(), $message = "testSetName, test 1");
        $this->assertNotEquals("Asthma", $symptom->getName(), $message = "testSetName, test 2");

        $symptom->setName($name);

        $this->assertEquals("Cough", $symptom->getName(), $message = "testSetName, test 1");
        $this->assertNotEquals("null", $symptom->getName(), $message = "testSetName, test 2");
        $this->assertIsString($symptom->getName(), $message = "testSetName, test 3");
    }

    public function testGetId()
    {
        $symptom = new Symptom(1, "Asthma");

        $this->assertIsInt($symptom->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $symptom->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $symptom->getId(), $message = "testGetId, test 3");
    }

    public function test__construct()
    {
        $symptom = new Symptom(1, "Wheezing");

        $this->assertIsInt($symptom->getId(), $message = "testConstruct, test 1");
        $this->assertIsString($symptom->getName(), $message = "testConstruct, test 2");
    }

    public function testToString()
    {
        $symptom = new Symptom(1, "Cough");

        $this->assertIsString($symptom->toString(), $message = "testToString, test 1");
        $this->assertEquals("1 Cough", $symptom->toString(), $message = "testToString, test 2");
        $this->assertNotEquals("2 Headache", $symptom->toString(), $message = "testToString, test 3");
    }
}
