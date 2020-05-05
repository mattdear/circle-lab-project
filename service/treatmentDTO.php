<?php

/**
 * Copyright (C) 2020 Circle Lab
 *
 * Coder: Joshua Alsop-Barrell
 *
 * Reviwer: Matthew Dear
 *
 */

class treatmentDTO
{
    private $id, $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
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

    public function toString()
    {
        $string = " " . $this->id . " " . $this->name . " ";
        return $string;
    }

}

?>
