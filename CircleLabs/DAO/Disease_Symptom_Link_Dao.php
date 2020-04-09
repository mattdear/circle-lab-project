<?php


class Disease_Symptom_Link_Dao
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new Disease_Symptom_Link
    public function insertDS_Link(DS_Link $newDS_Link){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(disease, symptom) VALUES (? , ?)");
        $stmt->execute([$newDS_Link->getDisease(), $newDS_Link->getSymptom()]);
    }

    //Updating a Disease_Symptom_Link
    public function updateDS_Link(DS_Link $oldDS_Link,   DS_Link $updatedDS_Link){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET disease= ? , treatment= ? WHERE = disease =? AND symptom = ?  ");
        $stmt->execute([$updatedDS_Link->getDisease(), $updatedDS_Link->getSymptom(), $oldDS_Link->getDisease(), $oldDS_Link->getSymptom()]);
    }

    //Find by SymptomId
    public function findBySymptomId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE symptom=?");
        $stmt->execute([$id]);
        $symptomDiseases = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($symptomDiseases, new DS_Link($row["disease"], $row["symptom"]));
        }
        return $symptomDiseases;
    }

    //Find by DiseaseId
    public function findByDiseaseId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE disease=?");
        $stmt->execute([$id]);
        $symptomsForDisease = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($symptomsForDisease, new DS_Link($row["disease"], $row["symptom"]));
        }
        return $symptomsForDisease;
    }

    //Delete Disease_Symptom_Link
    public function removeDS_Link(DS_Link $removedDS_Link){
            $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE = disease =? AND symptom = ? ");
            $stmt->execute([$removedDS_Link->getDisease(), $removedDS_Link->getSymptom()]);
        }
}