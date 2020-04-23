<?php
include ("DrugTreatmentLinkDto.php");

class DrugTreatmentLinkDao
{
    private $table, $conn;
    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //find  list by drug//
    public function findAllDrugTreatmentLinkByDrug($drug)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE drug=?");
        $query->execute(["drug" => $drug->getDrug()]);
        $Drugtreatmentlink = [];
        while ($row = $query->fetch()) {
            $Drugtreatmentlink = new $Drugtreatmentlink ($row["Drug_treatment_Link"]);
            $Drugtreatmentlink->setDrug($row["drug"]);
            $Drugtreatmentlink->getTreatment($row["treatment"]);
            $Drugtreatmentlink[] = $Drugtreatmentlink;
        }
        return $Drugtreatmentlink;
    }

    //find  list by prescription//
    public function findAllDrugTreatmentLinkByTreatment($treatment)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE treatment=?");
        $query->execute(["treatment" => $treatment->getTreatment()]);
        $Drugtreatmentlink = [];
        while ($row = $query->fetch()) {
            $Drugtreatmentlink = new $Drugtreatmentlink ($row["$Drugtreatmentlink"]);
            $Drugtreatmentlink->setDrug($row["drug"]);
            $Drugtreatmentlink->getTreatment($row["treatment"]);
            $Drugtreatmentlink[] = $Drugtreatmentlink;
        }
        return $Drugtreatmentlink;
    }

    //Delete Drug treatment LinkDao
    public function deleteDrugTreatmentLink(DrugTreatmentLinkDto $removedDrugTreatmentLink)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE = drug =? AND treatment = ? ");
        $stmt->execute([$removedrugTreatmentLink->getDrug(), $removedrugTreatmentLink->getTreatment()]);
    }

    //add a new Drug treatment LinkDao
    public function AddDrugTreatmentLink(DrugTreatmentLinkDto $newDrugTreatmentLink)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(drug, treatment) VALUES (? , ?)");
        $stmt->execute([$newDrugTreatmentLink->getDrug(), $newDrugTreatmentLink->getTreatment()]);
    }

    //Updating a Drug treatment LinkDao
    public function updateDrugTreatmentLink(DrugTreatmentLinkDto $oldDT_Link, DrugTreatmentLinkDto $updatedDT_Link)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET drug= ? , treatment = ? WHERE = drug =? AND treatment = ?  ");
        $stmt->execute([$updatedDrugTreatmentLink->getDrug(), $updatedDrugTreatmentLink->getTreatment(), $oldDrugTreatmentLink->getDrug(), $oldDrugTreatmentLink->getTreatment()]);
    }

    //find all list Drug treatment LinkDao//
    public function findAllDrugTreatmentLink(DrugtreatmentlinkDto $findAllDT_Link)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $Drugtreatmentlink = [];
        while ($row = $query->fetch()) {
            $Drugtreatmentlink = new $Drugtreatmentlink ($row["Drug_treatment_link"]);
            $Drugtreatmentlink->setDrug($row["drug"]);
            $Drugtreatmentlink->getTreatment($row["treatment"]);
            $Drugtreatmentlink[] = $Drugtreatmentlink;
        }
        return $Drugtreatmentlink;
    }

}
?>
