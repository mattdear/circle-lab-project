<?php

class roleDTO
{

    private $id, $name, $accessLevel;

    public function __construct($id, $name, $accessLevel)
    {
        $this->id = $id;
        $this->name = $name;
        $this->accessLevel = $accessLevel;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    public function setAccessLevel($accessLevel)
    {
        $this->accessLevel = $accessLevel;
    }

    function toString()
    {
        $string = " " . $this->id . " " . $this->name . " " . $this->accessLevel . " ";
        return $string;
    }

}

?>
