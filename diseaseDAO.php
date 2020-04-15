<?php
include("diseaseDTO.php");

class DiseaseDao
{

    private $conn, $table;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    public function addDisease(Disease $newDisease)
    {
        if ($newDisease != null && $newDisease->getId() == null && $newDisease->getName() != null){
            $stmt = $this->conn->prepare("INSERT INTO " .$this->table. " (name) VALUES (?)");
            $stmt->execute([$newDisease->getName()]);
            $idInt = (int)$this->conn->lastInsertId();
            $newDisease->setId($idInt);
            return $newDisease;
        }
        return null;
    }

    public function findAllDiseases(){
        $stmt = $this->conn->prepare("SELECT * FROM " .$this->table. " ORDER BY id");
        $stmt->execute();
        $diseases = [];
        while ($row = $stmt->fetch()){
            array_push($diseases, new Disease($row["id"], $row["name"]));
        }
        return $diseases;
    }

    public function findDisease(Disease $searchDisease)
    {
        if ($searchDisease != null) {
            if ($searchDisease->getId() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
                $stmt->execute([$searchDisease->getId()]);
                $row = $stmt->fetch();
                return new Disease((int)$row["id"], $row["name"]);
            } elseif ($searchDisease->getName() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE name=?");
                $stmt->execute([$searchDisease->getName()]);
                $row = $stmt->fetch();
                return new Disease((int)$row["id"], $row["name"]);
            }
            return null;
        }
        return null;
    }

    public function findById($id){
        if ($id!=null){
            $stmt = $this->conn->prepare("SELECT * FROM " .$this->table. " WHERE id=?");
            $stmt->execute([$id]);
            $count = $stmt->rowCount();
            if ($count == 1){
                $row = $stmt->fetch();
                return new Disease((int)$row["id"], $row["name"]);
            }
            return null;
        }
        return null;
    }

    public function updateDisease(Disease $updatedDisease){
        if ($updatedDisease->getId() !=null && $updatedDisease->getName() != null){
            $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET name= ? WHERE id= ? ");
            $stmt->execute([$updatedDisease->getName(), $updatedDisease->getId()]);
            return $updatedDisease;
        }
        return null;
    }

}
