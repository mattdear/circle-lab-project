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
    public function FindAllDrugTreatmentLinkByPrescription($id)
     {
        if ($id != null) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE treatment=?");
        $stmt->execute([$id]);
        $DrugTreatmentLink = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($DrugTreatmentLink, new DrugTreatmentLinkDto($row["drug"], $row["treatment"]));
        }
        return $DrugTreatmentLink;
    }
    return null;
    }

    //Delete Drug treatment link
    public function DeleteDrugTreatmentLink($removedDrugTreatmentLink)
   {
        if ($removedDrugTreatmentLink != null && $removedDrugTreatmentLink->getId() != null) 
        {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE = drug =? AND Treatment = ? ");
        $stmt->execute([$removedDrugTreatmentLink->getDrug(), $removedDrugTreatmentLink->getTreatment()]);
        }
        return null;
    }


    //add a new Drug treatment link
    public function AddDrugTreatmentLink($newDrugTreatmentLink)
    {
        if ($newDrugTreatmentLink->getDrug() != null)  && $newDrugTreatmentLink->getTreatment() != null) 
        {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(drug, Treatment) VALUES (? , ?)");
        $stmt->execute([$newDrugTreatmentLink->getDrug(), $newDrugTreatmentLink->getTreatment()]);
        $idInt = (int)$this->conn->lastInsertId();
        $newDrugTreatmentLink->setId($idInt);
        return $newDrugTreatmentLink;
        }
        return null;
    }

    //Updating a Drug_prescription_link
    public function UpdateDrugTreatmentLink($oldDrugTreatmentLink, $updatedDrugTreatmentLink)
    {
        if ($updatedDrugTreatmentLink->getDrug() != null)  && $updatedDrugTreatmentLink->getTreatment() != null) 
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET drug= ? , prescription= ? WHERE = drug =? AND prescription = ?  ");
        $stmt->execute([$updatedDrugTreatmentLink->getDrug(), $updatedDrugTreatmentLink->getPrescription(), $oldDrugTreatmentLink->getDrug(), $oldDrugTreatmentLink->getPrescription()]);
    }
    return false;
}

    //find all by drug
    public function FindAllDrugTreatmentLinkByDrug($id)
     {
            if ($id != null) 
            {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE drug=?");
            $stmt->execute([$id]);
            $DrugTreatmentLink = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                array_push($DrugPrescriptionLink, new DrugTreatmentLinkDto($row["drug"], $row["prescription"]));
                }
            return $DrugTreatmentLink;
            }
        return null;
      }    

    	public function findByObject($link)
        {
		$stmt = $this->conn->prepare("SELECT * FROM ". $this->table . " WHERE drug = ? AND treatment = ?");
		$stmt->execute([$link->getDrug() , $link->getTreatment()]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$uniqueCount = $stmt->rowCount();
		if($uniqueCount == 1)
        {
			$foundLink = new DrugTreatmentLinkDto($row["drug"], $row["prescription"]));
			return $foundLink;
		}
		else{
			return null;
		}
	}
}
?>
