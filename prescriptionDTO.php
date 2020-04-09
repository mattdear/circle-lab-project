<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Matthew Dear
*
* Reviwer: Joshua Alsop-Barrell
*
*/

class prescriptionDTO
{

    private $id, $patient, $date, $quantity, $location, $isactive;

    public function __construct($id, $patient, $date, $quantity, $location, $isactive)
    {
        $this->id = $id;
        $this->patient = $patient;
        $this->date = $date;
        $this->quantity = $quantity;
        $this->location = $location;
        $this->isactive = $isactive;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPatient()
    {
        return $this->patient;
    }

    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getIsactive()
    {
        return $this->isactive;
    }

    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;
    }

    public function toString()
    {
        $string = " " . $this->id . " " . $this->patient . " " . $this->date . " " . $this->quantity . " " . $this->location . " " . $this->isactive . " ";
        return $string;
    }

}

?>
