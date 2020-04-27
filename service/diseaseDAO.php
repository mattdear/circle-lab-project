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

    public function addDisease($newDisease)
    {
        if ($newDisease != null && $newDisease->getId() == null && $newDisease->getName() != null) {
            $stmt = $this->conn->prepare("INSERT INTO " . $this->table . " (name) VALUES (?)");
            $stmt->execute([$newDisease->getName()]);
            $idInt = (int)$this->conn->lastInsertId();
            $newDisease->setId($idInt);
            return $newDisease;
        }
        return null;
    }

    public function findAllDiseases()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " ORDER BY id");
        $stmt->execute();
        $count = $stmt->rowCount();
        $diseases = [];
        if ($count != 0) {
            while ($row = $stmt->fetch()) {
                array_push($diseases, new Disease($row["id"], $row["name"]));
            }
            return $diseases;
        } else {
            return null;
        }
    }

    public function findDisease($searchDisease)
    {
        if ($searchDisease != null) {
            if ($searchDisease->getId() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=?");
                $stmt->execute([$searchDisease->getId()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new Disease((int)$row["id"], $row["name"]);
                }
                return null;
            } elseif ($searchDisease->getName() != null) {
                $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE name=?");
                $stmt->execute([$searchDisease->getName()]);
                $count = $stmt->rowCount();
                if ($count == 1) {
                    $row = $stmt->fetch();
                    return new Disease((int)$row["id"], $row["name"]);
                }
                return null;
            }
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
                return new Disease((int)$row["id"], $row["name"]);
            }
            return null;
        }
        return null;
    }

    public function modifyDisease($updatedDisease)
    {
        if ($updatedDisease->getId() != null && $updatedDisease->getName() != null) {
            $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET name= ? WHERE id= ? ");
            $stmt->execute([$updatedDisease->getName(), $updatedDisease->getId()]);
            return $updatedDisease;
        }
        return null;
    }

}
