<?php


class DS_Link
{
    private $diseaseId, $symptomId ;

    public function __construct($diseaseId, $symptomId ) {
        $this->diseaseId = $this->diseaseId;
        $this->symptomId = $this->symptomId;
    }

    public function getDisease()
    {
        return $this->diseaseId;
    }

    public function setDisease($diseaseId)
    {
        $this->diseaseId = $diseaseId;
    }

    public function getSymptom()
    {
        return $this->symptomId;
    }

    public function setSymptom($symptomId)
    {
        $this->symptomId = $symptomId;
    }
}