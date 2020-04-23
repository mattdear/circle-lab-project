<?php

include ("daoFactory.php");

class serviceFacade
{

  private $drugDAO, $treatmentDAO, $prescriptionDAO,$locationDAO, $symptomDAO, $diseaseDAO, $appointmentDAO, $personDAO, $roleDAO,
  $reportDAO, $drugPrescriptionLinkDAO, $drugTreatmentLinkDAO, $diseaseTreatmentLink, $diseaseSymptomLinkDAO, $diseasePersonLinkDAO;

  public function __construct()
  {
  $this->conn = getDatabase();
  $this->drugDAO = new drugDAO(getDatabase(), "Drug");
  $this->treatmentDAO = new treatmentDAO(getDatabase(), "Treatment");
  $this->prescriptionDAO = new prescriptionDAO(getDatabase(), "Prescription");
  // $this->locationDAO = new locationDAO(getDatabase(), "Location");
  // $this->symptomDAO = new symptomDAO(getDatabase(), "Symptom");
  // $this->diseaseDAO = new diseaseDAO(getDatabase(), "Disease");
  // $this->appointmentDAO = new appointmentDAO(getDatabase(), "Appointment");
  // $this->personDAO = new personDAO(getDatabase(), "Person");
  $this->roleDAO = new roleDAO(getDatabase(), "Role");
  // $this->reportDAO = new reportDAO(getDatabase(), "Report");
  // $this->drugPrescriptionLinkDAO = new drugPrescriptionLinkDAO(getDatabase(), "Drug_Prescription_Link");
  // $this->drugTreatmentLinkDAO = new drugTreatmentLinkDAO(getDatabase(), "Drug_Treatment_Link");
  // $this->diseaseTreatmentLinkDAO = new diseaseTreatmentLinkDAO(getDatabase(), "Disease_Treatment_Link");
  // $this->diseaseSymptomLinkDAO = new diseaseSymptomLinkDAO(getDatabase(), "Disease_Symptom_Link");
  // $this->diseasePersonLinkDAO = new diseasePersonLinkDAO(getDatabase(), "Disease_Person_Link");
  }

  public function addTreatment($treatmentObj)
  {
    try
    {
      if($treatmentObj != null && $treatmentObj->getId() == null && $treatmentObj->getName() != null)
      {
        return $this->treatmentDAO->addTreatment($treatmentObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function modifyTreatment($treatmentObj)
  {
    try
    {
      if($treatmentObj != null && $treatmentObj->getId() != null)
      {
        return $this->treatmentDAO->modfiyTreatment($treatmentObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function deleteTreatment($treatmentObj)
  {
    try {
      if ($treatmentObj != null && $treatmentObj->getId() != null)
      {
        return $this->treatmentDAO->deleteTreatment($treatmentObj);
      }
      else
      {
        return false;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findTreatment($treatmentObj)
  {
    try
    {
      if($treatmentObj != null)
      {
        return $this->treatmentDAO->findTreatment($treatmentObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findTreatmentById($id)
  {
    try
    {
      if($id != null)
      {
        return $this->treatmentDAO->findTreatmentById($id);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findAllTreatments()
  {
    try
    {
      $treatments = $this->treatmentDAO->findAll();
      return $treatments;
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function addDrug($drugObj)
  {
    try
    {
      if($drugObj != null && $drugObj->getId() == null && $drugObj->getName() != null)
      {
        return $this->drugDAO->addDrug($drugObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function modifyDrug($drugObj)
  {
    try
    {
      if($drugObj != null && $drugObj->getId() != null)
      {
        return $this->drugDAO->modfiyDrug($drugObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function deleteDrug($drugObj)
  {
    try {
      if ($drugObj != null && $drugObj->getId() != null)
      {
        return $this->drugDAO->deleteDrug($drugObj);
      }
      else
      {
        return false;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findDrug($drugObj)
  {
    try
    {
      if($drugObj != null)
      {
        return $this->drugDAO->findDrug($drugObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findDrugById($id)
  {
    try
    {
      if($id != null)
      {
        return $this->drugDAO->findDrugById($id);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findAllDrugs()
  {
    try
    {
      $drugs = $this->drugDAO->findAll();
      return $drugs;
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function addRole($roleObj)
  {
    try
    {
      if($roleObj != null && $roleObj->getId() == null && $roleObj->getName() != null && $roleObj->getAccessLevel() != null)
      {
        return $this->roleDAO->addRole($roleObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function modifyRole($roleObj)
  {
    try
    {
      if($roleObj != null && $roleObj->getId() != null)
      {
        return $this->roleDAO->modfiyRole($roleObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function deleteRole($roleObj)
  {
    try {
      if ($roleObj != null && $roleObj->getId() != null)
      {
        return $this->roleDAO->deleteRole($roleObj);
      }
      else
      {
        return false;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findRole($roleObj)
  {
    try
    {
      if($roleObj != null)
      {
        return $this->roleDAO->findRole($roleObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findAllRoles()
  {
    try
    {
      $roles = $this->roleDAO->findAll();
      return $roles;
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findRoleById($id)
  {
    try
    {
      if($id != null)
      {
        return $this->roleDAO->findRoleById($id);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function addPrescription($prescriptionObj)
  {
    try
    {
      if($prescriptionObj != null && $prescriptionObj->getId() == null && $prescriptionObj->getPatient() != null && $prescriptionObj->getDate() != null && $prescriptionObj->getQuantity() != null && $prescriptionObj->getLocation() != null && $prescriptionObj->getIsactive() == 1)
      {
        return $this->prescriptionDAO->addPrescription($prescriptionObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function modifyPrescription($prescriptionObj)
  {
    try
    {
      if($prescriptionObj != null && $prescriptionObj->getId() != null)
      {
        return $this->prescriptionDAO->modfiyPrescription($prescriptionObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function deletePrescription($prescriptionObj)
  {
    try {
      if ($prescriptionObj != null && $prescriptionObj->getId() != null)
      {
        return $this->prescriptionDAO->deletePrescription($prescriptionObj);
      }
      else
      {
        return false;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findPrescription($prescriptionObj)
  {
    try
    {
      if($prescriptionObj != null)
      {
        return $this->prescriptionDAO->findPrescription($prescriptionObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findAllPrescriptions()
  {
    try
    {
      $prescriptions = $this->prescriptionDAO->findAll();
      return $prescriptions;
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findPrescriptionById($id)
  {
    try
    {
      if($id != null)
      {
        return $this->prescriptionDAO->findPrescriptionById($id);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findPrescriptionByPatient($personObj)
  {
    try
    {
      if($personObj->getId() != null)
      {
        return $this->prescriptionDAO->findPrescriptionByPatient($personObj);
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findPersonById($id)
  {
    try
    {
      $table = "Person";
      $conn = getDatabase();

      if($id != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " .  $this->table .  " WHERE id=:id");
        $stmt->execute([":id"=>$id]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new personDTO((int)$row["id"], $row["first_name"], $row["last_name"], $row["dob"], $row["gender"], $row["email"], $row["phone"], $row["address"], $row["role"], $row["username"], $row["password"]);
        }
        return null;
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function addDrugToPrescription($drugId, $prescriptionId)
  {
    try
    {
      $table = "Drug_Prescription_Link";
      $conn = getDatabase();

      if($drugId != null && $prescriptionId != null)
      {
        $unique = $conn->prepare("SELECT * FROM " .  $table .  " WHERE drug=:drug AND prescription=:prescription");
        $unique->execute([":drug"=>$drugId, ":prescription"=>$prescriptionId]);
        $count = $unique->rowCount();
          if($count == 0)
        {
          $stmt = $conn->prepare("INSERT INTO " .  $table .  " (drug, prescription) VALUES (:drug, :prescription)");
          $stmt->execute([":drug"=>$drugId, "prescription"=>$prescriptionId]);
          return true;
        }
        else
        {
          return null;
        }
      }
      else
      {
        return null;
      }
    }
    catch(PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findDrugPrescriptionLinkByPrescription($id)
  {
    try
    {
      $table = "Drug_Prescription_Link";
      $conn = getDatabase();

      if($id != null)
      {
        $stmt = $conn->prepare("SELECT * FROM " .  $table .  " WHERE prescription=:id");
        $stmt->execute([":id"=>$id]);
        while($row = $stmt->fetch())
        {
          $link = new drugPrescriptionLinkDTO((int)$row["drug"], (int)$row["prescription"]);
          $links[] = $link;
        }
        return $links;
      }
      else
      {
        return null;
      }
    }
    catch(PDOException $e)
    {
      echo "Error: $e";
    }
  }
}

?>
