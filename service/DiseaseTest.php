<?php

include("diseaseDTO.php");

class DiseaseTest extends PHPUnit\Framework\TestCase
{
    public function test__construct()
    {
        $disease = new Disease(1, "Asthma");

        $this->assertIsInt($disease->getId());
        $this->assertIsString($disease->getName());
    }

    public function testGetName()
    {
        $disease = new Disease(1, "Asthma");

        $this->assertIsString($disease->getName(), $message = "testGetName, test 1");
        $this->assertEquals("Asthma", $disease->getName(), $message = "testGetName, test 2");
        $this->assertNotEquals("Headache", $disease->getName(), $message = "testGetName, test 3");
    }

    public function testSetName()
    {
        $name = "Asthma";
        $disease = new Disease(null, "null");

        $this->assertEquals("null", $disease->getName(), $message = "testSetName, test 1");
        $this->assertNotEquals("Asthma", $disease->getName(), $message = "testSetName, test 2");

        $disease->setName($name);

        $this->assertEquals("Asthma", $disease->getName(), $message = "testSetName, test 1");
        $this->assertNotEquals("null", $disease->getName(), $message = "testSetName, test 2");
        $this->assertIsString($disease->getName(), $message = "testSetName, test 3");
    }

    public function testGetId()
    {
        $disease = new Disease(1, "Asthma");

        $this->assertIsInt($disease->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $disease->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $disease->getId(), $message = "testGetId, test 3");
    }

    public function testToString()
    {
        $disease = new Disease(1, "Asthma");

        $this->assertIsString($disease->toString(), $message = "testToString, test 1");
        $this->assertEquals("1 Asthma", $disease->toString(), $message = "testToString, test 2");
        $this->assertNotEquals("2 Headache", $disease->toString(), $message = "testToString, test 3");

    }
}
