<?php


class diseaseTreatmentLinkDTO
{
    private $disease, $treatment ;

    public function __construct($disease, $treatment) {
        $this->disease = $disease;
        $this->treatment = $treatment;
    }

    public function getDisease()
    {
        return $this->disease;
    }

    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    public function getTreatment()
    {
        return $this->treatment;
    }

    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;
    }

    public function toString()
    {
        $string = $this->disease . " , " . $this->treatment;
        return $string;
    }
}

?>