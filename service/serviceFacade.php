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
  $this->locationDAO = new locationDAO(getDatabase(), "Location");
  // $this->symptomDAO = new symptomDAO(getDatabase(), "Symptom");
  // $this->diseaseDAO = new diseaseDAO(getDatabase(), "Disease");
  // $this->appointmentDAO = new appointmentDAO(getDatabase(), "Appointment");
  // $this->personDAO = new personDAO(getDatabase(), "Person");
  $this->roleDAO = new roleDAO(getDatabase(), "Role");
  // $this->reportDAO = new reportDAO(getDatabase(), "Report");
  // $this->drugPrescriptionLinkDAO = new drugPrescriptionLinkDAO(getDatabase(), "Drug_Prescription_Link");
  // $this->drugTreatmentLinkDAO = new drugTreatmentLinkDAO(getDatabase(), "Drug_Treatment_Link");
  $this->diseaseTreatmentLinkDAO = new diseaseTreatmentLinkDAO(getDatabase(), "Disease_Treatment_Link");
  $this->diseaseSymptomLinkDAO = new diseaseSymptomLinkDAO(getDatabase(), "Disease_Symptom_Link");
  $this->diseasePersonLinkDAO = new diseasePersonLinkDAO(getDatabase(), "Disease_Person_Link");
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

  public function addLocation($locationObj)
  {
    try
    {
      if($locationObj != null && $locationObj->getId() == null && $locationObj->getAddressLine() != null && $locationObj->getCity() != null && $locationObj->getPostcode() != null && $locationObj->getType() != null && $locationObj->getIsactive() != null)
      {
        $allLocations = $this->locationDAO->findAllLocations();
        $unique = TRUE;
        foreach ($allLocations as $location)
        {
          if($location->getAddressLine() == $locationObj->getAddressLine())
          {
            $unique = FALSE;
          }
        }
        if($unique == TRUE)
        {
          return $this->locationDAO->addLocation($locationObj);
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function modifyLocation($locationObj)
  {
    try
    {
      if($locationObj != null && $locationObj->getId() == null && $locationObj->getAddress() != null && $locationObj->getCity() != null && $locationObj->getPostcode() != null && $locationObj->getType != null && $locationObj->getIsactive() != null)
      {
        $originalObj = $this->prescriptionDAO->findLocationById($locationObj->getId());
        if($originalObj != null)
        {
          return $this->locationDAO->modifyLocation($locationObj);
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findLocationsByType($type)
  {
    try
    {
      if($type != null)
      {
        $locations = $this->locationDAO->findLocationByType($type);
        $activeLocations = null;

        foreach ($locations as $location)
        {
          if($location->getIsactive() == 1)
          {
            $activeLocations[] = $location;
          }
        }
        return $locations;
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

  public function findMatchingLocations($locationObj)
  {
    try
    {
      $returnedObj = null;
      if($locationObj != null && $locationObj->getId() == null && $locationObj->getAddress() != null && $locationObj->getCity() != null && $locationObj->getPostcode() != null && $locationObj->getType != null && $locationObj->getIsactive() != null)
      {
        return $this->locationDAO->findMatchingLocations($locationObj);
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

  public function findLocationById($id)
  {
    try {
      if($id != null)
      {
        return $this->locationDAO->findLocationById();
      }
      else
      {
        return null;
      }
    }
    catch (PDOException $e) {
      echo "Error: $e";
    }
  }

  public function addDiseasePersonLinkDTO($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getPerson() != null)
      {
        if($this->diseasePersonLinkDAO->findByObject($link) == null)
        {
          $this->diseasePersonLinkDAO->addDiseasePersonLinkDTO($link);
          return TRUE;
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
    catch (PDOException $e) {
      echo "Error: $e";
    }
  }

  public function modifyDiseasePersonLinkDTO($oldLink , $newLink)
  {
    try
    {
      if($oldLink != null && $oldLink->getDisease() != null && $oldLink->getPerson() != null && $newLink != null && $newLink->getDisease() != null && $newLink->getPerson() != null)
      {
        if($this->diseasePersonLinkDAO->findByObject($oldLink) != null && $this->diseasePersonLinkDAO->findByObject($newLink) == null)
        {
          $this->diseasePersonLinkDAO->modifyDiseasePersonLinkDTO($oldLink, $newLink);
          return TRUE;
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findDiseasePersonLinkByPersonId($id)
  {
    try
    {
      if($id != null)
      {
        return $this->diseasePersonLinkDAO->findByPersonId($id);
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

  public function findDiseasePersonLinkByDiseaseId($id)
  {
    try
    {
      if($id != null)
      {
        return $this->diseasePersonLinkDAO->findByDiseaseId($id);
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

  public function deleteDiseasePersonLinkDTO($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getPerson() != null && $this->diseasePersonLinkDAO->findByObject($link) != null)
      {
        $this->diseasePersonLinkDAO->deleteDiseasePersonLinkDTO($link);
        return TRUE;
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

  public function findByDiseasePersonLinkObject($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getPerson() != null)
      {
        $foundLink = $this->diseasePersonLinkDAO->findByObject($link);
        if($foundLink != null)
        {
          return $foundLink;
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function addDiseaseSymptomLinkDTO($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getSymptom() != null)
      {
        if($this->diseaseSymptomLinkDAO->findByObject($link) == null)
        {
          $this->diseaseSymptomLinkDAO->addDiseaseSymptomLinkDTO($link);
          return TRUE;
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
    catch (PDOException $e) {
      echo "Error: $e";
    }
  }

  public function modifyDiseaseSymptomLinkDTO($oldLink , $newLink)
  {
    try
    {
      if($oldLink != null && $oldLink->getDisease() != null && $oldLink->getSymptom() != null && $newLink != null && $newLink->getDisease() != null && $newLink->getSymptom() != null)
      {
        if($this->diseaseSymptomLinkDAO->findByObject($oldLink) != null && $this->diseaseSymptomLinkDAO->findByObject($newLink) == null)
        {
          $this->diseaseSymptomLinkDAO->modifyDiseaseSymptomLinkDTO($oldLink, $newLink);
          return TRUE;
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findDiseaseSymptomLinkBySymptomId($id)
  {
    try
    {
      if($id != null)
      {
        return $this->diseaseSymptomLinkDAO->findBySymptomId($id);
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

  public function findDiseaseSymptomLinkByDiseaseId($id)
  {
    try
    {
      if($id != null)
      {
        return $this->diseaseSymptomLinkDAO->findByDiseaseId($id);
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

  public function deleteDiseaseSymptomLinkDTO($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getSymptom() != null && $this->diseaseSymptomLinkDAO->findByObject($link) != null)
      {
        $this->diseaseSymptomLinkDAO->deleteDiseaseSymptomLinkDTO($link);
        return TRUE;
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

  public function findByDiseaseSymptomLinkObject($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getSymptom() != null)
      {
        $foundLink = $this->diseaseSymptomLinkDAO->findByObject($link);
        if($foundLink != null)
        {
          return $foundLink;
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function addDiseaseTreatmentLinkDTO($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getTreatment() != null)
      {
        if($this->diseaseTreatmentLinkDAO->findByObject($link) == null)
        {
          $this->diseaseTreatmentLinkDAO->addDiseaseTreatmentLinkDTO($link);
          return TRUE;
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
    catch (PDOException $e) {
      echo "Error: $e";
    }
  }

  public function modifyDiseaseTreatmentLinkDTO($oldLink , $newLink)
  {
    try
    {
      if($oldLink != null && $oldLink->getDisease() != null && $oldLink->getTreatment() != null && $newLink != null && $newLink->getDisease() != null && $newLink->getTreatment() != null)
      {
        if($this->diseaseTreatmentLinkDAO->findByObject($oldLink) != null && $this->diseaseTreatmentLinkDAO->findByObject($newLink) == null)
        {
          $this->diseaseTreatmentLinkDAO->modifyDiseaseTreatmentLinkDTO($oldLink, $newLink);
          return TRUE;
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }

  public function findDiseaseTreatmentLinkByTreatmentId($id)
  {
    try
    {
      if($id != null)
      {
        return $this->diseaseTreatmentLinkDAO->findByTreatmentId($id);
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

  public function findDiseaseTreatmentLinkByDiseaseId($id)
  {
    try
    {
      if($id != null)
      {
        return $this->diseaseTreatmentLinkDAO->findByDiseaseId($id);
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

  public function deleteDiseaseTreatmentLinkDTO($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getTreatment() != null && $this->diseaseTreatmentLinkDAO->findByObject($link) != null)
      {
        $this->diseaseTreatmentLinkDAO->deleteDiseaseTreatmentLinkDTO($link);
        return TRUE;
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

  public function findByDiseaseTreatmentLinkObject($link)
  {
    try
    {
      if($link != null && $link->getDisease() != null && $link->getTreatment() != null)
      {
        $foundLink = $this->diseaseTreatmentLinkDAO->findByObject($link);
        if($foundLink != null)
        {
          return $foundLink;
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
    catch (PDOException $e)
    {
      echo "Error: $e";
    }
  }















}

?>
