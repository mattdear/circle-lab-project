<?php


class DPe_Link
{
    private $diseaseId, $personId ;

    public function __construct($diseaseId, $personId ) {
        $this->diseaseId = $this->diseaseId;
        $this->personId = $this->personId;
    }

    public function getDisease()
    {
        return $this->diseaseId;
    }

    public function setDisease($diseaseId)
    {
        $this->diseaseId = $diseaseId;
    }

    public function getPerson()
    {
        return $this->personId;
    }

    public function setPerson($personId)
    {
        $this->personId = $personId;
    }

}