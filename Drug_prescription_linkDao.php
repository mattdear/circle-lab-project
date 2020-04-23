<?php
include ("DrugPrescriptionLinkDto.php")
class Drug_prescription_linkDao
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }
    //find  list by drug//
    public function findAllDrugPrescriptionLinkByDrug($drug)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE drug=?");
        $query->execute(["drug"=>$drug->getDrug()]);
        $Drug_prescription_link = [];
        while ($row = $query->fetch()) {
            $Drug_prescription_link = new $Drug_prescription_link ($row["Drug_prescription_link"]);
            $Drug_prescription_link->setDrug ($row["drug"]);
            $Drug_prescription_link->getPrescription($row["prescription"]);
            $Drug_prescription_link[] = $Drug_prescription_link;
        }
        return $Drug_prescription_link;
    }
    //find  list by prescription//
    public function findAllDrugPrescriptionLinkByPrescription($prescription)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE prescription=?");
        $query->execute(["prescription"=>$prescription->getPrescription()]);
        $Drug_prescription_link = [];
        while ($row = $query->fetch()) {
            $Drug_prescription_link = new $Drug_prescription_link ($row["Drug_prescription_link"]);
            $Drug_prescription_link->setDrug ($row["drug"]);
            $Drug_prescription_link->getPrescription($row["prescription"]);
            $Drug_prescription_link[] = $Drug_prescription_link;
        }
        return $Drug_prescription_link;
    }
    //Delete Drug_prescription_link
    public function deleteDrugPrescriptionLink(DrugPrescriptionLink $removedDS_Link){
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE = drug =? AND prescription = ? ");
        $stmt->execute([$removedDS_Link->getDrug(), $removedDS_Link->getPrescription()]);
    }
    //add a new Drug_prescription_link
    public function AddDrugPrescriptionLink(DrugPrescriptionLink $newDP_Link){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(drug, prescription) VALUES (? , ?)");
        $stmt->execute([$newDP_Link->getDrug(), $newDP_Link->getPrescription()]);
    }
    //Updating a Drug_prescription_link
    public function updateDrugPrescriptionLink(DrugPrescriptionLink $oldDP_Link,   DrugPrescriptionLink $updatedDP_Link){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET drug= ? , prescription= ? WHERE = drug =? AND prescription = ?  ");
        $stmt->execute([$updatedDP_Link->getDrug(), $updatedDP_Link->getPrescription(), $oldDP_Link->getDrug(), $oldDP_Link->getPrescription()]);
    }
    //find all list Drug_prescription//
    public function findAllDrugPrescriptionLink(DrugPrescriptionLink $findAllDP_Link)
    {
        $query = $this->conn->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $Drug_prescription_link = [];
        while ($row = $query->fetch()) {
            $Drug_prescription_link = new $Drug_prescription_link ($row["Drug_prescription_link"]);
            $Drug_prescription_link->setDrug ($row["drug"]);
            $Drug_prescription_link->getPrescription($row["prescription"]);
            $Drug_prescription_link[] = $Drug_prescription_link;
        }
        return $Drug_prescription_link;
    }


}
?>