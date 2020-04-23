<?php


class diseaseSymptomLinkDTO
{
    private $disease, $symptom ;

    public function __construct($disease, $symptom) {
        $this->disease = $disease;
        $this->symptom = $symptom;
    }

    public function getDisease()
    {
        return $this->disease;
    }

    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    public function getSymptom()
    {
        return $this->symptom;
    }

    public function setSymptom($symptom)
    {
        $this->symptom = $symptom;
    }

    public function toString()
    {
        $string = $this->disease . " , " . $this->symptom;
        return $string;
    }
}
