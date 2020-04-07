<?php
include("treatment.php");
include("functions.php");
class treatmentDAO
{
    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function addTreatment(treatment $treatmentObj) {
        $query = $this->conn->prepare("INSERT INTO " . $this->table .  "(name) VALUES (?)");
        $query->execute([$treatmentObj->getName()]);
        return $treatmentObj;
    }

    public function modifyTreatment($treatmentObj){
        $query = $this->conn->prepare("UPDATE " . $this->table .  " SET name=?");
        $query->execute([$treatmentObj->getName()]);
        $row = $query->fetch();

    }

    public function deleteTreatment($treatmentObj){
        $query = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE id=?");
        $query->execute([$treatmentObj->getId()]);
        $count = $query->rowCount();

        if($count>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function findTreatment($treatmentObj){
        $query = $this->conn->prepare("SELECT * FROM " . $this->table .  " WHERE TRUE=TRUE");
        if($treatmentObj->getName!=null){
            $query = $query + " AND name = ?";
        }
        $treatmentRet = $query->execute([$treatmentObj->getName()]);
        return $treatmentRet;
    }

    public function findAll(){
        $query = $this->conn->prepare("SELECT * FROM " . $this->table);
        $query->execute();
        $treatments = [];
        while($row = $query->fetch()) {
            $treatment = new treatment($row["name"]);
            $treatment->setId($row["id"]);
            $treatments[] = $treatment;
        }

        return $treatments;
    }

}
