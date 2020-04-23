<?php


class locationDTO
{
    private $id, $name, $address , $type;

    public function __construct($id, $name, $address , $type) {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->type = $type;
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

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function toString()
    {
        $string = $this->id . " , " . $this->name . " , ". $this->address . " , " . $this->type;
        return $string;
    }
}
?> 