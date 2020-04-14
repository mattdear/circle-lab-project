<?php


class DT_Link
{
    private $diseaseId, $treatmentId ;

    public function __construct($diseaseId, $treatmentId ) {
        $this->diseaseId = $this->diseaseId;
        $this->treatmentId = $this->treatmentId;
    }

    public function getDisease()
    {
        return $this->diseaseId;
    }

    public function setDisease($diseaseId)
    {
        $this->diseaseId = $diseaseId;
    }

    public function getTreatment()
    {
        return $this->treatmentId;
    }

    public function setTreatment($treatmentId)
    {
        $this->treatmentId = $treatmentId;
    }

}