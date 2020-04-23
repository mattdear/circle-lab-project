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
        $Drug_treatment_Link = [];
        while ($row = $query->fetch()) {
            $Drug_treatment_Link = new $Drug_treatment_Link ($row["Drug_treatment_Link"]);
            $Drug_treatment_Link->setDrug($row["drug"]);
            $Drug_treatment_Link->getTreatment($row["treatment"]);
            $Drug_treatment_Link[] = $Drug_treatment_Link;
        }
        return $Drug_treatment_Link;
    }

    //find  list by prescription//
    public function findAllDrugTreatmentLinkByTreatment($treatment)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE treatment=?");
        $query->execute(["treatment" => $treatment->getTreatment()]);
        $Drug_treatment_link = [];
        while ($row = $query->fetch()) {
            $Drug_treatment_link = new $Drug_treatment_link ($row["Drug_treatment_link"]);
            $Drug_treatment_link->setDrug($row["drug"]);
            $Drug_treatment_link->getTreatment($row["treatment"]);
            $Drug_treatment_link[] = $Drug_treatment_link;
        }
        return $Drug_treatment_link;
    }

    //Delete Drug treatment LinkDao
    public function deleteDrugTreatmentLink(DrugTreatmentLinkDto $removedDT_Link)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE = drug =? AND treatment = ? ");
        $stmt->execute([$removedDT_Link->getDrug(), $removedDT_Link->getTreatment()]);
    }

    //add a new Drug treatment LinkDao
    public function AddDrugTreatmentLink(DrugTreatmentLinkDto $newDT_Link)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(drug, treatment) VALUES (? , ?)");
        $stmt->execute([$newDT_Link->getDrug(), $newDT_Link->getTreatment()]);
    }

    //Updating a Drug treatment LinkDao
    public function updateDrugTreatmentLink(DrugTreatmentLinkDto $oldDT_Link, DrugTreatmentLinkDto $updatedDT_Link)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET drug= ? , treatment = ? WHERE = drug =? AND treatment = ?  ");
        $stmt->execute([$updatedDT_Link->getDrug(), $updatedDT_Link->getTreatment(), $oldDT_Link->getDrug(), $oldDT_Link->getTreatment()]);
    }

    //find all list Drug treatment LinkDao//
    public function findAllDrugTreatmentLink(Drug_treatment_linkDto $findAllDT_Link)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $Drug_treatment_link = [];
        while ($row = $query->fetch()) {
            $Drug_treatment_link = new $Drug_treatment_link ($row["Drug_treatment_link"]);
            $Drug_treatment_link->setDrug($row["drug"]);
            $Drug_treatment_link->getTreatment($row["treatment"]);
            $Drug_treatment_link[] = $Drug_treatment_link;
        }
        return $Drug_treatment_link;
    }

}
?>