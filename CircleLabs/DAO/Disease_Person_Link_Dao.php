<?php
include("../DTO/DPe_Link.php");

class Disease_Person_Link_Dao
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new Disease_Person_Link
    public function insertDPe_Link(DPe_Link $newDPe_Link){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(disease, person) VALUES (? , ?)");
        $stmt->execute([$newDPe_Link->getDisease(), $newDPe_Link->getPerson()]);
    }

    //Updating a Disease_Person_Link
    public function updateDPe_Link(Dpe_Link $oldDPe_Link , DPe_Link $updatedDPe_Link){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET disease= ? , person= ? WHERE = disease =? AND person = ?  ");
        $stmt->execute([$updatedDPe_Link->getDisease(), $updatedDPe_Link->getPerson(), $oldDPe_Link->getDisease(), $oldDPe_Link->getPerson()]);
    }

    //Find by PersonId
    public function findByPersonId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE person=?");
        $stmt->execute([$id]);
        $personsDiseases = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($personsDiseases, new DPe_Link($row["disease"], $row["person"]));
        }
        return $personsDiseases;
    }

    //Find by DiseaseId
    public function findByDiseaseId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE disease=?");
        $stmt->execute([$id]);
        $diseaseInPeople = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($diseaseInPeople, new DPe_Link($row["disease"], $row["person"]));
        }
        return $diseaseInPeople;
    }

    //Delete Disease_Person_Link
    public function removeDPe_Link(DPe_Link $removedDPe_Link){
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE = disease =? AND person = ? ");
        $stmt->execute([$removedDPe_Link->getDisease(), $removedDPe_Link->getPerson()]);
    }
}
