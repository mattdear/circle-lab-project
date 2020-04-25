<?php
include("diseasePersonLinkDTO.php");

class diseasePersonLinkDAO
{
    private $table, $conn;

    public function __construct($conn, $table)
    {
        $this->conn = $conn;
        $this->table = $table;
    }

    //Inserting a new Disease_Person_Link
    public function addDiseasePersonLinkDTO($newDPe_Link){
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table .  "(disease, person) VALUES (? , ?)");
        $stmt->execute([$newDPe_Link->getDisease(), $newDPe_Link->getPerson()]);
    }

    //Updating a Disease_Person_Link
    public function modifyDiseasePersonLinkDTO($oldDPe_Link , $updatedDPe_Link){
        $stmt = $this->conn->prepare("UPDATE " . $this->table .  " SET disease= ? , person= ? WHERE disease =? AND person = ?  ");
        $stmt->execute([$updatedDPe_Link->getDisease(), $updatedDPe_Link->getPerson(), $oldDPe_Link->getDisease(), $oldDPe_Link->getPerson()]);
    }

    //Find by PersonId
    public function findByPersonId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE person=?");
        $stmt->execute([$id]);
        $personsDiseases = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($personsDiseases, new diseasePersonLinkDTO($row["disease"], $row["person"]));
        }
        return $personsDiseases;
    }

    //Find by DiseaseId
    public function findByDiseaseId($id){
        $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE disease=?");
        $stmt->execute([$id]);
        $diseaseInPeople = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($diseaseInPeople, new diseasePersonLinkDTO($row["disease"], $row["person"]));
        }
        return $diseaseInPeople;
    }

    //Delete Disease_Person_Link
    public function deleteDiseasePersonLinkDTO($removedDPe_Link){
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table .  " WHERE disease =? AND person = ? ");
        $stmt->execute([$removedDPe_Link->getDisease(), $removedDPe_Link->getPerson()]);
    }

    //Find by Object
    public function findByObject($link)
    {
      $stmt = $this->conn->prepare("SELECT * FROM ".  $this->table .  " WHERE disease=? AND person=?");
      $stmt->execute([$link->getDisease(), $link->getPerson()]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $uniqueCount = $stmt->rowCount();
      if($uniqueCount == 1)
      {
        $foundLink = new diseasePersonLinkDTO((int)$row["disease"], (int)$row["person"]);;
        return $foundLink;
      }
      else
      {
        return null;
      }
    }
}

?>
