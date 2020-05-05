<?php
include("locationDTO.php");

use PHPUnit\Framework\TestCase;

class locationDTOTest extends PHPUnit\Framework\TestCase
{

    public function testConstruct()
    {
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertIsInt($location->getId(), $message = "testConstruct, test 1");
        $this->assertIsString($location->getAddressLine(), $message = "testConstruct, test 2");
        $this->assertIsString($location->getCity(), $message = "testConstruct, test 3");
        $this->assertIsString($location->getPostcode(), $message = "testConstruct, test 4");
        $this->assertIsString($location->getType(), $message = "testConstruct, test 5");
        $this->assertIsString($location->getIsactive(), $message = "testConstruct, test 6");
        $this->assertEquals(1, $location->getId(), $message = "testConstruct, test 7");
        $this->assertEquals("1 London Road", $location->getAddressLine(), $message = "testConstruct, test 8");
        $this->assertEquals("Southampton", $location->getCity(), $message = "testConstruct, test9");
        $this->assertEquals("SO16 7GP", $location->getPostcode(), $message = "testConstruct, test10");
        $this->assertEquals("Home", $location->getType(), $message = "testConstruct, test11");
        $this->assertEquals(1, $location->getIsactive(), $message = "testConstruct, test12");

    }

    public function testGetId()
    {
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertIsInt($location->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $location->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $location->getId(), $message = "testGetId, test 3");
    }

    public function testSetId()
    {
        $id = 2;
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertEquals(1, $location->getId(), $message = "testSetId, test 1");
        $this->assertNotEquals(2, $location->getId(), $message = "testSetId, test 2");

        $location->setId($id);

        $this->assertEquals(2, $location->getId(), $message = "testSetId, test 3");
        $this->assertNotEquals(1, $location->getId(), $message = "testSetId, test 4");
        $this->assertIsInt($location->getId(), $message = "testSetId, test 5");
    }

    public function testGetAddressLine()
    {
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertIsString($location->getAddressLine(), $message = "testGetAddressLine, test 1");
        $this->assertEquals("1 London Road", $location->getAddressLine(), $message = "testGetAddressLine, test 2");
        $this->assertNotEquals("Portsmouth", $location->getAddressLine(), $message = "testGetAddressLine, test 3");
    }

    public function testSetAddressLine()
    {
        $name = "Portsmouth";
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertEquals("1 London Road", $location->getAddressLine(), $message = "testSetAddressLine, test 1");
        $this->assertNotEquals("Portsmouth", $location->getAddressLine(), $message = "testSetAddressLine, test 2");

        $location->setAddressLine($name);

        $this->assertEquals("Portsmouth", $location->getAddressLine(), $message = "testSetAddressLine, test 3");
        $this->assertNotEquals("1 London Road", $location->getAddressLine(), $message = "testSetAddressLine, test 4");
        $this->assertIsString($location->getAddressLine(), $message = "testSetAddressLine, test 5");
    }

    public function testGetCity()
    {
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertIsString($location->getCity(), $message = "testGetCity, test 1");
        $this->assertEquals("Southampton", $location->getCity(), $message = "testGetCity, test 2");
        $this->assertNotEquals("Portsmouth", $location->getCity(), $message = "testGetCity, test 3");
    }

    public function testSetCity()
    {
        $address = "Poole";
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertEquals("Southampton", $location->getCity(), $message = "testSetCity, test 1");
        $this->assertNotEquals("Poole", $location->getCity(), $message = "testSetCity, test 2");

        $location->setCity($address);

        $this->assertEquals("Poole", $location->getCity(), $message = "testSetCity, test 3");
        $this->assertNotEquals("Southampton", $location->getCity(), $message = "testSetCity, test 4");
        $this->assertIsString($location->getCity(), $message = "testSetCity, test 5");
    }

    public function testGetType()
    {
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertIsString($location->getType(), $message = "testGetType, test 1");
        $this->assertEquals("Home", $location->getType(), $message = "testGetType, test 2");
        $this->assertNotEquals("Doctors", $location->getType(), $message = "testGetType, test 3");
    }

    public function testSetType()
    {
        $type = "Doctors";
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");

        $this->assertEquals("Home", $location->getType(), $message = "testSetType, test 1");
        $this->assertNotEquals("Doctors", $location->getType(), $message = "testSetType, test 2");

        $location->setType($type);

        $this->assertEquals("Doctors", $location->getType(), $message = "testSetType, test 3");
        $this->assertNotEquals("Home", $location->getType(), $message = "testSetType, test 4");
        $this->assertIsString($location->getType(), $message = "testSetType, test 5");
    }

    public function testToString()
    {
        $location = new locationDTO(1, "1 London Road", "Southampton", "SO16 7GP", "Home", "1");
        $this->assertIsString($location->toString(), $message = "testToString, test 1");
        $this->assertEquals("1 , 1 London Road , Southampton , SO16 7GP , Home , 1", $Link1->toString(), $message = "testToString, test 2");
    }

}

?>
