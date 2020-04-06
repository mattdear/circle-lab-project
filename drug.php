<?php


class drug
{
    //Attributes
    private $id;
    private $name;


    public function __construct($name)
    {
        $this->name = $name;
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