<?php
include("DrugPrescriptionLinkDto.php");

class drugPrescriptionLinkDAO
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //find  list by prescription//
    public function findAllDrugPrescriptionLinkByPrescription($id)
    {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE prescription=?");
            $stmt->execute([$id]);
            $DrugPrescriptionLink = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($DrugPrescriptionLink, new DrugPrescriptionLinkDto($row["drug"], $row["prescription"]));
            }
            return $DrugPrescriptionLink;
        } else {
            return null;
        }
    }

    //Delete Drug prescription link
    public function deleteDrugPrescriptionLink($removedDrugPrescriptionLink)
    {
        if ($removedDrugPrescriptionLink != null && $removedDrugPrescriptionLink->getDrug() != null && $removedDrugPrescriptionLink->getPrescription() != null) {
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE drug =? AND prescription = ? ");
            $stmt->execute([$removedDrugPrescriptionLink->getDrug(), $removedDrugPrescriptionLink->getPrescription()]);
        } else {
            return null;
        }
    }

    //add a new Drug prescription link
    public function addDrugPrescriptionLink($newDrugPrescriptionLink)
    {
        if ($newDrugPrescriptionLink->getDrug() != null && $newDrugPrescriptionLink->getPrescription() != null) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(drug, prescription) VALUES (? , ?)");
            $stmt->execute([$newDrugPrescriptionLink->getDrug(), $newDrugPrescriptionLink->getPrescription()]);
        } else {
            return null;
        }
    }

    //Updating a Drug_prescription_link
    public function modifyDrugPrescriptionLink($oldDrugPrescriptionLink, $updatedDrugPrescriptionLink)
    {
        if ($updatedDrugPrescriptionLink->getDrug() != null && $updatedDrugPrescriptionLink->getPrescription() != null) {
            $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET drug= ? , prescription= ? WHERE drug =? AND prescription = ?  ");
            $stmt->execute([$updatedDrugPrescriptionLink->getDrug(), $updatedDrugPrescriptionLink->getPrescription(), $oldDrugPrescriptionLink->getDrug(), $oldDrugPrescriptionLink->getPrescription()]);
        } else {
            return null;
        }
    }

    //find all by drug
    public function findAllDrugPrescriptionLinkByDrug($id)
    {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE drug=?");
            $stmt->execute([$id]);
            $DrugPrescriptionLink = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($DrugPrescriptionLink, new DrugPrescriptionLinkDto($row["drug"], $row["prescription"]));
            }
            return $DrugPrescriptionLink;
        } else {
            return null;
        }
    }

    public function findByObject($link)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE drug =? AND prescription = ? ");
        $stmt->execute([$link->getDrug(), $link->getPrescription()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $uniqueCount = $stmt->rowCount();
        if ($uniqueCount == 1) {
            $foundLink = new DrugPrescriptionLinkDto($row["drug"], $row["prescription"]);
            return $foundLink;
        } else {
            return null;
        }
    }


}

?>
