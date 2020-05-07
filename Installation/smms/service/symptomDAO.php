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

    public function addSymptom($newSymptom)
    {
        if ($newSymptom != null && $newSymptom->getId() == null && $newSymptom->getName() != null) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (name) VALUES (?)");
            $stmt->execute([$newSymptom->getName()]);
            $idInt = (int)$this->conn->lastInsertId();
            $newSymptom->setId($idInt);
            return $newSymptom;
        }
        return null;
    }

    public function findAllSymptoms()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " ORDER BY id");
        $stmt->execute();
        $symptoms = [];
        while ($row = $stmt->fetch()) {
            array_push($symptoms, new Symptom($row["id"], $row["name"]));
        }
        return $symptoms;
    }

    public function findSymptom($searchSymptom)
    {
        if ($searchSymptom != null) {
            if ($searchSymptom->getId() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
                $stmt->execute([$searchSymptom->getId()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new Symptom((int)$row["id"], $row["name"]);
                }
            } elseif ($searchSymptom->getName() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE name=?");
                $stmt->execute([$searchSymptom->getName()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new Symptom((int)$row["id"], $row["name"]);
                }
            }
            return null;
        }
        return null;
    }

    public function findById($id)
    {
        if ($id != null) {
            $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
            $stmt->execute([$id]);
            $count = $stmt->rowCount();
            if ($count == 1) {
                $row = $stmt->fetch();
                return new Symptom((int)$row["id"], $row["name"]);
            }
            return null;
        }
        return null;
    }

    public function modifySymptom($updatedSymptom)
    {
        if ($updatedSymptom->getId() != null && $updatedSymptom->getName() != null) {
            $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET name= ? WHERE id= ? ");
            $stmt->execute([$updatedSymptom->getName(), $updatedSymptom->getId()]);
            return $updatedSymptom;
        }
        return null;
    }


}
