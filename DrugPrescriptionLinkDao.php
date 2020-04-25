<?php
include ("DrugPrescriptionLinkDto.php");

class DrugPrescriptionLinkDao
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }
    //find  list by prescription//
    public function FindAllDrugPrescriptionLinkByPrescription($id)
    {
	if ($DrugPrescriptionLink->getId() != null)
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE prescription=?");
        $stmt->execute([$id]);
        $DrugPrescriptionLink = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($DrugPrescriptionLink, new DrugPrescriptionLinkDto($row["drug"], $row["prescription"]));
        }
        return $DrugPrescriptionLink;
	}
	return null;
	}
	
    //Delete Drug prescription link
    public function DeleteDrugPrescriptionLink($removedDrugPrescriptionLink)
      {
        if ($removedDrugPrescriptionLink != null && $removedDrugPrescriptionLink->getId() != null)
	{
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE = drug =? AND prescription = ? ");
        $stmt->execute([$removedDrugPrescriptionLink->getDrug(), $removedDrugPrescriptionLink->getPrescription()]);
	}
	return null;
    }
	
    //add a new Drug prescription link
    public function AddDrugPrescriptionLink(DrugPrescriptionLinkDto $newDrugPrescriptionLink){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(drug, prescription) VALUES (? , ?)");
        $stmt->execute([$newDrugPrescriptionLink->getDrug(), $newDrugPrescriptionLink->getPrescription()]);
    }
	
    //Updating a Drug_prescription_link
    public function UpdateDrugPrescriptionLink(DrugPrescriptionLinkDto $oldDrugPrescriptionLink, DrugPrescriptionLink $updatedDrugPrescriptionLink){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET drug= ? , prescription= ? WHERE = drug =? AND prescription = ?  ");
        $stmt->execute([$updatedDrugPrescriptionLink->getDrug(), $updatedDrugPrescriptionLink->getPrescription(), $oldDrugPrescriptionLink->getDrug(), $oldDrugPrescriptionLink->getPrescription()]);
    }
	
    //find all by drug
    public function FindAllDrugPrescriptionLinkByDrug($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE drug=?");
        $stmt->execute([$id]);
        $DrugPrescriptionLink = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($DrugPrescriptionLink, new DrugPrescriptionLinkDto($row["drug"], $row["prescription"]));
        }
        return $DrugPrescriptionLink;
	}

}
?>
