<?php
include("../DTO/LocationDto.php");

use PHPUnit\Framework\TestCase;

class LocationDtoTest extends PHPUnit\Framework\TestCase
{

    public function testConstruct()
    {
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertIsInt($location->getId(), $message = "testConstruct, test 1");
        $this->assertIsString($location->getName(), $message = "testConstruct, test 2");
        $this->assertIsString($location->getAddress(), $message = "testConstruct, test 3");
        $this->assertIsString($location->getType(), $message = "testConstruct, test 4");
        $this->assertEquals(1, $location->getId(), $message = "testConstruct, test 5");
        $this->assertEquals("Southampton General", $location->getName(), $message = "testConstruct, test 6");
        $this->assertEquals("Southampton" , $location->getAddress(), $message = "testConstruct, test7");
        $this->assertEquals("Hospital", $location->getType(), $message = "testConstruct, test8");
    }

    public function testGetId()
    {
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertIsInt($location->getId(), $message = "testGetId, test 1");
        $this->assertEquals(1, $location->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $location->getId(), $message = "testGetId, test 3");
    }

    public function testSetId()
    {
        $id = 2;
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertEquals(1, $location->getId(), $message = "testSetId, test 1");
        $this->assertNotEquals(2, $location->getId(), $message = "testSetId, test 2");

        $location->setId($id);

        $this->assertEquals(2, $location->getId(), $message = "testSetId, test 3");
        $this->assertNotEquals(1, $location->getId(), $message = "testSetId, test 4");
        $this->assertIsInt($location->getId(), $message = "testSetId, test 5");
    }

    public function testGetName()
    {
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertIsString($location->getName(), $message = "testGetName, test 1");
        $this->assertEquals("Southampton General", $location->getName(), $message = "testGetName, test 2");
        $this->assertNotEquals("Portsmouth", $location->getName(), $message = "testGetName, test 3");
    }

    public function testSetName()
    {
        $name = "Portsmouth";
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertEquals("Portsmouth", $location->getName(), $message = "testSetName, test 1");
        $this->assertNotEquals("Southampton General", $location->getName(), $message = "testSetName, test 2");

        $location->setName($name);

        $this->assertEquals("Portsmouth", $location->getName(), $message = "testSetName, test 3");
        $this->assertNotEquals("Southampton General", $location->getName(), $message = "testSetName, test 4");
        $this->assertIsString($location->getName(), $message = "testSetName, test 5");
    }

    public function testGetAddress(){
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertIsString($location->getAddress(), $message = "testGetAddress, test 1");
        $this->assertEquals("Southampton", $location->getAddress(), $message = "testGetAddress, test 2");
        $this->assertNotEquals("Portsmouth", $location->getAddress(), $message = "testGetAddress, test 3");
    }

    public function testSetAddress(){
        $address = "Poole";
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertEquals("Southampton", $location->getAddress(), $message = "testSetAddress, test 1");
        $this->assertNotEquals("Poole", $location->getAddress(), $message = "testSetAddress, test 2");

        $location->setAddress($address);

        $this->assertEquals("Poole", $location->getAddress(), $message = "testSetAddress, test 3");
        $this->assertNotEquals("Southampton", $location->getAddress(), $message = "testSetAddress, test 4");
        $this->assertIsString($location->getAddress(), $message = "testSetAddress, test 5");
    }

    public function testGetType(){
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertIsString($location->getType(), $message = "testGetType, test 1");
        $this->assertEquals("Hospital", $location->getType(), $message = "testGetType, test 2");
        $this->assertNotEquals("Doctors", $location->getType(), $message = "testGetType, test 3");
    }

    public function testSetType(){
        $type = "Doctors";
        $location = new LocationDtoTest(1, "Southampton General", "Southampton" , "Hospital");

        $this->assertEquals("Hospital", $location->getType(), $message = "testSetType, test 1");
        $this->assertNotEquals("Doctors", $location->getType(), $message = "testSetType, test 2");

        $location->setType($type);

        $this->assertEquals("Doctors", $location->getType(), $message = "testSetType, test 3");
        $this->assertNotEquals("Hospital", $location->getType(), $message = "testSetType, test 4");
        $this->assertIsString($location->getType(), $message = "testSetType, test 5");
    }

    public function testToString()
    {

    }

}

?>