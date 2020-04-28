<?php
include("diseaseSymptomLinkDTO.php");

class diseaseSymptomLinkDAO
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new Disease_Symptom_Link
    public function addDiseaseSymptomLinkDTO($newDS_Link)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(disease, symptom) VALUES (? , ?)");
        $stmt->execute([$newDS_Link->getDisease(), $newDS_Link->getSymptom()]);
    }

    //Updating a Disease_Symptom_Link
    public function modifyDiseaseSymptomLinkDTO($oldDS_Link, $updatedDS_Link)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET disease= ? , symptom= ? WHERE disease =? AND symptom = ?  ");
        $stmt->execute([$updatedDS_Link->getDisease(), $updatedDS_Link->getSymptom(), $oldDS_Link->getDisease(), $oldDS_Link->getSymptom()]);
    }

    //Find by SymptomId
    public function findBySymptomId($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE symptom=?");
        $stmt->execute([$id]);
        $symptomDiseases = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($symptomDiseases, new diseaseSymptomLinkDTO($row["disease"], $row["symptom"]));
        }
        return $symptomDiseases;
    }

    //Find by DiseaseId
    public function findByDiseaseId($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE disease=?");
        $stmt->execute([$id]);
        $symptomsForDisease = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($symptomsForDisease, new diseaseSymptomLinkDTO($row["disease"], $row["symptom"]));
        }
        return $symptomsForDisease;
    }

    //Delete Disease_Symptom_Link
    public function deleteDiseaseSymptomLinkDTO($removedDS_Link)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table . " WHERE disease =? AND symptom = ? ");
        $stmt->execute([$removedDS_Link->getDisease(), $removedDS_Link->getSymptom()]);
    }

    public function findByObject($link)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE disease = ? AND symptom = ?");
        $stmt->execute([$link->getDisease(), $link->getSymptom()]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $uniqueCount = $stmt->rowCount();
        if ($uniqueCount == 1) {
            $foundLink = new diseaseSymptomLinkDTO((int)$row["disease"], (int)$row["symptom"]);
            return $foundLink;
        } else {
            return null;
        }
    }
}


?>
