<?php
include ("roleDTO.php");

class roleDTOTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct()
    {
        $role = new roleDTO(1,"Tom Cruise",1);
        assert(is_int($role->getId),"Id is int");
    }

    public function testGetId()
    {
        return $this->id;
    }

    public function testSetId($id)
    {
        $this->id = $id;
    }

    public function testGetName()
    {
        return $this->name;
    }

    public function testSetName($name)
    {
        $this->name = $name;
    }

    public function testGetAccessLevel()
    {
        return $this->accessLevel;
    }

    public function testSetAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;
    }

    public function testToString()
    {

    }
{

}


}
