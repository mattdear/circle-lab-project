<?php

class DrugPrescriptionLinkDto
{

    private $drug, $prescription;

    public function __construct($drug, $prescription)
    {
        $this->drug = $drug;
        $this->prescription = $prescription;
    }

    public function getDrug()
    {
        return $this->drug;
    }

    public function setDrug($drug)
    {
        $this->drug = $drug;
    }

    public function getPrescription()
    {
        return $this->prescription;
    }

    public function setPrescription($prescription)
    {
        $this->prescription = $prescription;
    }

    public function toString()
    {
        $string = $this->drug . " , " . $this->prescription;
        return $string;
    }
}

?>
