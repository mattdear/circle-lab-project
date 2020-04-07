<?php
include ("roleDTO.php");
use PHPUnit\Framework\TestCase;

class roleDTOTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $role = new roleDTO(1,"admin",1);

        $this->assertIsInt($role->getAccessLevel(), $message = "testConstruct, test 1");
        $this->assertIsInt($role->getId(), $message = "testConstruct, test 2");
        $this->assertIsString($role->getName(), $message = "testConstruct, test 3");
        $this->assertEquals(1, $role->getId(), $message = "testConstruct, test 4");
        $this->assertEquals("admin", $role->getName(), $message = "testConstruct, test 5");
        $this->assertEquals(1, $role->getAccessLevel(), $message = "testConstruct, test 6");
        $this->assertNotEquals(2, $role->getId(), $message = "testConstruct, test 7");
        $this->assertNotEquals("patient", $role->getName(), $message = "testConstruct, test 8");
        $this->assertNotEquals(2, $role->getAccessLevel(), $message = "testConstruct, test 9");
    }

    public function testGetId()
    {
        $role = new roleDTO(3,"Doctor",4);

        $this->assertIsInt($role->getId(), $message = "testGetId, test 1");
        $this->assertEquals(3, $role->getId(), $message = "testGetId, test 2");
        $this->assertNotEquals(2, $role->getId(), $message = "testGetId, test 3");
    }

    public function testSetId()
    {
      $id=2;
      $role = new roleDTO(null, null, null);

      $this->assertEquals(null, $role->getId(), $message = "testSetId, test 1");
      $this->assertNotEquals(2, $role->getId(), $message = "testSetId, test 2");

      $role->setId($id);

      $this->assertEquals(2, $role->getId(), $message = "testSetId, test 3");
      $this->assertNotEquals(null, $role->getId(), $message = "testSetId, test 4");
      $this->assertIsInt($role->getId(), $message = "testSetId, test 5");
    }

    public function testGetName()
    {
      $role = new roleDTO(3,"doctor",4);

      $this->assertIsString($role->getName(), $message = "testGetName, test 1");
      $this->assertEquals("doctor", $role->getName(), $message = "testGetName, test 2");
      $this->assertNotEquals("nurse", $role->getName(), $message = "testGetName, test 3");
    }

    public function testSetName()
    {
      $name="doctor";
      $role = new roleDTO(null, null, null);

      $this->assertEquals(null, $role->getName(), $message = "testSetName, test 1");
      $this->assertNotEquals("doctor", $role->getName(), $message = "testSetName, test 2");

      $role->setName($name);

      $this->assertEquals("doctor", $role->getName(), $message = "testSetName, test 3");
      $this->assertNotEquals(null, $role->getName(), $message = "testSetName, test 4");
      $this->assertIsString($role->getName(), $message = "testSetName, test 5");
    }

    public function testGetAccessLevel()
    {
      $role = new roleDTO(3,"doctor",4);

      $this->assertIsInt($role->getAccessLevel(), $message = "testGetAccessLevel, test 1");
      $this->assertEquals(4, $role->getAccessLevel(), $message = "testGetAccessLevel, test 2");
      $this->assertNotEquals(2, $role->getAccessLevel(), $message = "testGetAccessLevel, test 3");
    }

    public function testSetAccessLevel()
    {
      $accessLevel=10;
      $role = new roleDTO(null, null, null);

      $this->assertEquals(null, $role->getAccessLevel(), $message = "testSetAccessLevel, test 1");
      $this->assertNotEquals(9, $role->getAccessLevel(), $message = "testSetAccessLevel, test 2");

      $role->setAccessLevel($accessLevel);

      $this->assertEquals(10, $role->getAccessLevel(), $message = "testSetAccessLevel, test 3");
      $this->assertNotEquals(null, $role->getAccessLevel(), $message = "testSetAccessLevel, test 4");
      $this->assertIsInt($role->getAccessLevel(), $message = "testSetAccessLevel, test 5");
    }

    public function testToString()
    {
      $role = new roleDTO(7,"government",8);

      $this->assertIsString($role->toString(), $message = "testToString, test 1");
      $this->assertEquals(" 7 government 8 ", $role->toString(), $message = "testToString, test 2");
      $this->assertNotEquals(" 3 doctor 4 ", $role->toString(), $message = "testToString, test 3");
    }

}
