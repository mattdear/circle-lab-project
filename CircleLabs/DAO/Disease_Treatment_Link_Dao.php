<?php
include(__DIR__."\..\DTO\DT_Link.php");

class Disease_Treatment_Link_Dao
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new Disease_Treatment_Link
    public function insertDT_Link(DT_Link $newDT_Link){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(disease, treatment) VALUES (? , ?)");
        $stmt->execute([$newDT_Link->getDisease(), $newDT_Link->getTreatment()]);
    }

    //Updating a Disease_Treatment_Link
    public function updateDT_Link(DT_Link $updatedDT_Link ,  DT_Link $oldDT_Link){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET disease= ? , treatment= ? WHERE disease =? AND treatment = ?  ");
        $stmt->execute([$updatedDT_Link->getDisease(), $updatedDT_Link->getTreatment(), $oldDT_Link->getDisease(), $oldDT_Link->getTreatment()]);
    }

    //Find by TreatmentId
    public function findByTreatmentId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE treatment=?");
        $stmt->execute([$id]);
        $treatmentDiseases = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($treatmentDiseases, new DT_Link($row["disease"], $row["treatment"]));
        }
        return $treatmentDiseases;
    }

    //Find by DiseaseId
    public function findByDiseaseId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE disease=?");
        $stmt->execute([$id]);
        $treatmentsForDisease = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($treatmentsForDisease, new DT_Link($row["disease"], $row["treatment"]));
        }
        return $treatmentsForDisease;
    }

    //Delete Disease_Treatment_Link
    public function removeDT_Link(DT_Link $removedDT_Link){
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE disease =? AND treatment = ? ");
        $stmt->execute([$removedDT_Link->getDisease(), $removedDT_Link->getTreatment()]);
    }
}
