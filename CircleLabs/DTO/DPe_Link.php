<?php


class DPe_Link
{
    private $disease, $person ;

    public function __construct($disease, $person) {
        $this->disease = $disease;
        $this->person = $person;
    }

    public function getDisease()
    {
        return $this->disease;
    }

    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    public function getPerson()
    {
        return $this->person;
    }

    public function setPerson($person)
    {
        $this->person = $person;
    }

    public function toString()
    {
        $string = $this->disease . " , " . $this->person;
        return $string;
    }

}
