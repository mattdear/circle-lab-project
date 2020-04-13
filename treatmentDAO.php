<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Joshua Alsop-Barrell
*
* Reviewer: Matthew Dear
*
*/

include("treatmentDTO.php");

class treatmentDAO
{

  private $table, $conn;

  public function __construct($conn, $table)
  {
    $this->conn = $conn;
    $this->table = $table;
  }

  public function addTreatment(&$treatmentObj)
  {
    if($treatmentObj != null && $treatmentObj->getId() == null && $treatmentObj->getName() != null)
      {
        $unique = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE name=:name");
        $unique->execute([":name"=>$treatmentObj->getName()]);
        $uniqueCount = $unique->rowCount();
        if($uniqueCount == 0)
        {
          $stmt = $this->conn->prepare("INSERT INTO " .  $this->table .  " (name) VALUES (:name)");
          $stmt->execute([":name"=>$treatmentObj->getName()]);
          $idInt = (int)$this->conn->lastInsertId();
          $treatmentObj->setId($idInt);
          return $treatmentObj;
        }
        return null;
      }
      return null;
  }

  public function modfiyTreatment($treatmentObj)
  {
    if($treatmentObj != null && $treatmentObj->getId() != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$treatmentObj->getId()]);
      $count = $stmt->rowCount();
      $row = $stmt->fetch();
      $currentTreatmentObj = new treatmentDTO((int)$row["id"], $row["name"]);
      if($count == 1)
      {
        if($treatmentObj->getName() != $currentTreatmentObj->getName() && $treatmentObj->getName() != null)
        {
          $currentTreatmentObj->setName($treatmentObj->getName());
        }
        $unique = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE name=:name");
        $unique->execute([":name"=>$currentTreatmentObj->getName()]);
        $uniqueCount = $unique->rowCount();
        if($uniqueCount == 0)
        {
          $stmt = $this->conn->prepare("UPDATE " .  $this->table .  " SET name=:name WHERE id=:id");
          $stmt->execute([":id"=>$currentTreatmentObj->getId(), ":name"=>$currentTreatmentObj->getName()]);
          $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
          $stmt->execute([":id"=>$currentTreatmentObj->getId()]);
          $count = $stmt->rowCount();
          if($count == 1)
          {
            $row = $stmt->fetch();
            if($row["id"] == $currentTreatmentObj->getId() && $row["name"] == $currentTreatmentObj->getName())
            return new treatmentDto((int)$row["id"], $row["name"]);
          }
          return null;
        }
        return null;
      }
      return null;
      }
      return null;
  }

  public function deleteTreatment($treatmentObj)
  {
    if($treatmentObj != null && $treatmentObj->getId() != null)
    {
      $stmt = $this->conn->prepare("DELETE FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$treatmentObj->getId()]);
      $stmt = null;
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
      $stmt->execute([":id"=>$treatmentObj->getId()]);
      $count = $stmt->rowCount();
      if($count == 0){
        return true;
      }
      return false;
    }
    return false;
  }

  public function findTreatment($treatmentObj)
  {
    if($treatmentObj != null)
    {
      if($treatmentObj->getId() != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
        $stmt->execute([":id"=>$treatmentObj->getId()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new treatmentDto((int)$row["id"], $row["name"]);
        }
        return null;
      }
      else if($treatmentObj->getName() != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE name=:name");
        $stmt->execute([":name"=>$treatmentObj->getName()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new treatmentDto((int)$row["id"], $row["name"]);
        }
        return null;
      }
      return null;
    }
    return null;
  }

  public function findAll()
  {
    $stmt = $this->conn->prepare("SELECT * FROM " . $this->table);
    $stmt->execute();
    while($row = $stmt->fetch()) {
      $treatment = new treatmentDTO((int)$row["id"], $row["name"]);
      $treatments[] = $treatment;
    }
    return $treatments;
  }

  public function findTreatmentById($id)
  {
    if($id != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$id]);
      $count = $stmt->rowCount();
      if($count == 1)
      {
        $row = $stmt->fetch();
        return new treatmentDto((int)$row["id"], $row["name"]);
      }
      return null;
    }
    return null;
  }
}

?>
