<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Joshua Alsop-Barrell
*
* Reviwer: Matthew Dear
*
*/

include("drugDTO.php");

class drugDAO
{

  private $table, $conn;

  public function __construct($conn, $table)
  {
    $this->conn = $conn;
    $this->table = $table;
  }

  public function addDrug(&$drugObj)
  {
    if($drugObj != null && $drugObj->getId() == null && $drugObj->getName() != null)
      {
        $stmt = $this->conn->prepare("INSERT INTO " .  $this->table .  " (name) VALUES (:name)");
        $stmt->execute([":name"=>$drugObj->getName()]);
        $idInt = (int)$this->conn->lastInsertId();
        $drugObj->setId($idInt);
        return $drugObj;
      }
      return null;
  }

  public function modfiyDrug($drugObj)
  {
    if($drugObj != null && $drugObj->getId() != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$drugObj->getId()]);
      $count = $stmt->rowCount();
      $row = $stmt->fetch();
      $currentdrugObj = new drugDTO((int)$row["id"], $row["name"]);
      if($count == 1)
      {
        if($drugObj->getName() != $currentdrugObj->getName() && $drugObj->getName() != null)
        {
          $currentdrugObj->setName($drugObj->getName());
        }
        $stmt = $this->conn->prepare("UPDATE " .  $this->table .  " SET name=:name WHERE id=:id");
        $stmt->execute([":id"=>$currentdrugObj->getId(), ":name"=>$currentdrugObj->getName()]);
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
        $stmt->execute([":id"=>$currentdrugObj->getId()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          if($row["id"] == $currentdrugObj->getId() && $row["name"] == $currentdrugObj->getName())
          return new drugDto((int)$row["id"], $row["name"]);
        }
        return null;
      }
      return null;
    }
    return null;
  }

  public function deleteDrug($drugObj)
  {
    if($drugObj != null && $drugObj->getId() != null)
    {
      $stmt = $this->conn->prepare("DELETE FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$drugObj->getId()]);
      $stmt = null;
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id");
      $stmt->execute([":id"=>$drugObj->getId()]);
      $count = $stmt->rowCount();
      if($count == 0){
        return true;
      }
      return false;
    }
    return false;
  }

  public function findDrug($drugObj)
  {
    if($drugObj != null)
    {
      if($drugObj->getId() != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
        $stmt->execute([":id"=>$drugObj->getId()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new drugDto((int)$row["id"], $row["name"]);
        }
        return null;
      }
      else if($drugObj->getName() != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE name=:name");
        $stmt->execute([":name"=>$drugObj->getName()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new drugDto((int)$row["id"], $row["name"]);
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
      $drug = new drugDTO((int)$row["id"], $row["name"]);
      $drugs[] = $drug;
    }
    return $drugs;
  }

  public function findDrugById($id)
  {
    if($id != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$id]);
      $count = $stmt->rowCount();
      if($count == 1)
      {
        $row = $stmt->fetch();
        return new drugDto((int)$row["id"], $row["name"]);
      }
      return null;
    }
    return null;
  }
}

?>
