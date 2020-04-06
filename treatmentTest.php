<?php


class treatment
{
    //Attributes
    private $id;
    private $name;


    public function __construct($id, $name)
    {
        $this->name = $name;
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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function toString()
    {
        return = "Name: $this->name";
    }

}