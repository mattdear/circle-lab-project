<?php


class DrugTreatmentLinkDto
{
    private $drug, $treatment;
    public function __construct($drug, $treatment)
    {
        $this->drug = $drug;
        $this->treatment = $treatment;
    }
    public function getDrug()
    {
        return $this->drug;
    }
    public function setDrug($drug)
    {
        $this->drug = $drug;
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
        $string = $this->drug . " , " . $this->treatment;
        return $string;
    }
}
?>
