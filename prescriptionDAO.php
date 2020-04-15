<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Matthew Dear
*
* Reviwer: Joshua Alsop-Barrell
*
*/

include("prescriptionDTO.php");

class prescriptionDAO {

  private $table, $conn;

  public function __construct($conn, $table)
  {
    $this->conn = $conn;
    $this->table = $table;
  }

  public function addPrescription(&$prescriptionObj)
  {
    if($prescriptionObj != null && $prescriptionObj->getId() == null && $prescriptionObj->getPatient() != null && $prescriptionObj->getDate() != null && $prescriptionObj->getQuantity() != null && $prescriptionObj->getLocation() != null && $prescriptionObj->getIsactive() == 1)
    {
      $stmt = $this->conn->prepare("INSERT INTO " .  $this->table .  " (patient, date, quantity, location, isactive) VALUES (:patient, :date, :quantity, :location, :isactive)");
      $stmt->execute([":patient"=>$prescriptionObj->getPatient(), ":date"=>$prescriptionObj->getDate()->format("Y-m-d"), ":quantity"=>$prescriptionObj->getQuantity(), ":location"=>$prescriptionObj->getLocation(), ":isactive"=>$prescriptionObj->getIsactive()]);
      $id = (int)$this->conn->lastInsertId();
      $prescriptionObj->setId($id);
      return $prescriptionObj;
    }
    return null;
  }

  public function modfiyPrescription($prescriptionObj)
  {
    if($prescriptionObj != null && $prescriptionObj->getId() != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$prescriptionObj->getId()]);
      $count = $stmt->rowCount();
      if($count == 1)
      {
        $row = $stmt->fetch();
        $currentPrescriptionObj = new prescriptionDTO((int)$row["id"], (int)$row["patient"], date_create($row["date"]), (int)$row["quantity"], (int)$row["location"], (int)$row["isactive"]);

        if($prescriptionObj->getPatient() != $currentPrescriptionObj->getPatient() && $prescriptionObj->getPatient() != null)
        {
          $currentPrescriptionObj->setPatient($prescriptionObj->getPatient());
        }
        if($prescriptionObj->getDate() != $currentPrescriptionObj->getDate() && $prescriptionObj->getDate() != null)
        {
          $currentPrescriptionObj->setDate($prescriptionObj->getDate());
        }
        if($prescriptionObj->getQuantity() != $currentPrescriptionObj->getQuantity() && $prescriptionObj->getQuantity() != null)
        {
          $currentPrescriptionObj->setQuantity($prescriptionObj->getQuantity());
        }
        if($prescriptionObj->getLocation() != $currentPrescriptionObj->getLocation() && $prescriptionObj->getLocation() != null)
        {
          $currentPrescriptionObj->setLocation($prescriptionObj->getLocation());
        }
        if($prescriptionObj->getIsactive() != $currentPrescriptionObj->getIsactive() && $prescriptionObj->getIsactive() != null)
        {
          $currentPrescriptionObj->setIsactive($prescriptionObj->getIsactive());
        }
        $stmt = $this->conn->prepare("UPDATE " .  $this->table .  " SET patient=:patient, date=:date, quantity=:quantity, location=:location, isactive=:isactive WHERE id=:id");
        $stmt->execute([":id"=>$currentPrescriptionObj->getId(), ":patient"=>$currentPrescriptionObj->getPatient(), ":date"=>$currentPrescriptionObj->getDate()->format("Y-m-d"), ":quantity"=>$currentPrescriptionObj->getQuantity(), ":location"=>$currentPrescriptionObj->getLocation(), ":isactive"=>$currentPrescriptionObj->getIsactive()]);
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
        $stmt->execute([":id"=>$currentPrescriptionObj->getId()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new prescriptionDTO((int)$row["id"], (int)$row["patient"], date_create($row["date"]), (int)$row["quantity"], (int)$row["location"], (int)$row["isactive"]);
        }
        return null;
      }
      return null;
    }
    return null;
  }

  public function deletePrescription($prescriptionObj)
  {
    if($prescriptionObj != null && $prescriptionObj->getId() != null)
    {
      $stmt = $this->conn->prepare("UPDATE " .  $this->table .  " SET isactive=0 WHERE id=:id");
      $stmt->execute([":id"=>$prescriptionObj->getId()]);
      $stmt = null;
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id=:id AND isactive=1");
      $stmt->execute([":id"=>$prescriptionObj->getId()]);
      $count = $stmt->rowCount();
      if($count == 0){
        return true;
      }
      return false;
    }
    return false;
  }

  public function findPrescription($prescriptionObj)
  {
    if($prescriptionObj != null)
    {
      if($prescriptionObj->getId() != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
        $stmt->execute([":id"=>$prescriptionObj->getId()]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new prescriptionDTO((int)$row["id"], (int)$row["patient"], date_create($row["date"]), (int)$row["quantity"], (int)$row["location"], (int)$row["isactive"]);
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
    $count = $stmt->rowCount();
    if($count > 0)
    {
      while($row = $stmt->fetch()) {
        $prescription = new prescriptionDTO((int)$row["id"], (int)$row["patient"], date_create($row["date"]), (int)$row["quantity"], (int)$row["location"], (int)$row["isactive"]);
        $prescriptions[] = $prescription;
      }
      return $prescriptions;
    }
    return null;
  }

  public function findPrescriptionById($id)
  {
    if($id != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
      $stmt->execute([":id"=>$id]);
      $count = $stmt->rowCount();
      if($count == 1)
      {
        $row = $stmt->fetch();
        return new prescriptionDTO((int)$row["id"], (int)$row["patient"], date_create($row["date"]), (int)$row["quantity"], (int)$row["location"], (int)$row["isactive"]);
      }
      return null;
    }
    return null;
  }

  public function findPrescriptionByPatient($personObj)
  {
    if($personObj != null && $personObj->getId() != null)
    {
      $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE patient=:id");
      $stmt->execute([":id"=>$personObj->getId()]);
      $count = $stmt->rowCount();
      if($count > 0)
      {
        while($row = $stmt->fetch()) {
          $prescription = new prescriptionDTO((int)$row["id"], (int)$row["patient"], date_create($row["date"]), (int)$row["quantity"], (int)$row["location"], (int)$row["isactive"]);
          $prescriptions[] = $prescription;
        }
        return $prescriptions;
      }
      return null;
    }
    return null;
  }

}

?>
