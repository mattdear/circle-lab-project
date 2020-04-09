<?php


class DS_Link
{
    private $disease, $symptom ;

    public function __construct($disease, $symptom ) {
        $this->disease = $this->disease;
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
}