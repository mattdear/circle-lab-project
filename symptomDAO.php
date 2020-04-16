<?php
include("symptomDTO.php");

class SymptomDao
{

    private $conn, $table;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    public function addSymptom(Symptom $newSymptom)
    {
        $stmt = $this->conn->prepare("INSERT INTO " .$this->table. " (name) VALUES (?)");
        $stmt->execute([$newSymptom->getName()]);
    }

    public function findAllSymptoms(){
        $stmt = $this->conn->prepare("SELECT * FROM " .$this->table);
        $stmt->execute();
        $symptoms = [];
        while ($row = $stmt->fetch()){
            array_push($symptoms, new Symptom($row["id"], $row["name"]));
        }
        return $symptoms;
    }

    public function findSymptom(Symptom $searchSymptom){
        $stmt = $this->conn->prepare("SELECT * FROM " .$this->table. " WHERE name=?");
        $stmt->execute([$searchSymptom->getName()]);
        $row = $stmt->fetch();
        return new Symptom($row["id"], $row["name"]);
    }

    public function findById($id){
        $stmt = $this->conn->prepare("SELECT * FROM " .$this->table. " WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return new Symptom($row["id"], $row["name"]);
    }

    public function updateSymptom(Symptom $updatedSymptom){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET name= ? WHERE id= ? ");
        $stmt->execute([$updatedSymptom->getName(), $updatedSymptom->getId()]);
    }


}
