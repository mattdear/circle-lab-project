<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Matthew Dear
*
* Reviwer: Joshua Alsop-Barrell
*
*/

include ("prescriptionDAO.php");
// include ("personDTO.php");
use PHPUnit\Framework\TestCase;

class prescriptionDAOTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");

    $this->assertNotNull($DAO, $message = "testConstruct, test 1");
  }

  public function testAddPrescription()
  {
    // Test with null template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 1");

    //Test with template object has id attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 2");

    //Test with template object and null patient attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, null, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 3");

    // Test with template object and null date attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, null, 14, 11, 1);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 4");

    // Test with template object and null quantity attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), null, 11, 1);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 5");

    // Test with template object and null location attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, null, 1);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 6");

    // Test with template object and null isactive attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, null);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 7");

    // Test with template object and isactive set to 0.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 0);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 8");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->addPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testAddPrescription, test 9");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testAddPrescription, test 10");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testAddPrescription, test 11");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testAddPrescription, test 12");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testAddPrescription, test 13");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testAddPrescription, test 14");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testAddPrescription, test 15");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testAddPrescription, test 16");
    $this->assertEquals(14, $returnedPrescription->getQuantity(), $message = "testAddPrescription, test 17");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testAddPrescription, test 18");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testAddPrescription, test 19");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testAddPrescription, test 20");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testAddPrescription, test 21");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testAddPrescription, test 22");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testAddPrescription, test 23");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testAddPrescription, test 24");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testAddPrescription, test 25");
  }

  public function testFindPrescription()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $DAO->findPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testFindPrescription, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->findPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testFindPrescription, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->findPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testFindPrescription, test 3");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testFindPrescription, test 4");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testFindPrescription, test 5");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testFindPrescription, test 6");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testFindPrescription, test 7");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testFindPrescription, test 8");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testFindPrescription, test 9");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testFindPrescription, test 10");
    $this->assertEquals(14, $returnedPrescription->getQuantity(), $message = "testFindPrescription, test 11");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testFindPrescription, test 12");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testFindPrescription, test 13");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testFindPrescription, test 14");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testFindPrescription, test 15");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testFindPrescription, test 16");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testFindPrescription, test 17");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testFindPrescription, test 18");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testFindPrescription, test 19");
  }

  public function testFindPrescriptionByPatient()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $person = new personDTO(null, null, null);
    $returnedPrescriptions = $DAO->findPrescriptionByPatient($person);

    $this->assertNull($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 1");

    // Test with null patient.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $person = new personDTO(null, "John", "Smith");
    $returnedPrescriptions = $DAO->findPrescriptionByPatient($person);

    $this->assertNull($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $person = new personDTO(6, "John", "Smith");
    $returnedPrescriptions = $DAO->findPrescriptionByPatient($person);

    $this->assertIsArray($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 3");
    $this->assertNotNull($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 4");
    $this->assertEquals(" 1 6 2020-03-30 14 11 1 ", $returnedPrescriptions[0]->toString(), $message = "testFindPrescriptionByPatient, test 5");
    $this->assertEquals(" 2 6 2020-04-01 14 11 1 ", $returnedPrescriptions[1]->toString(), $message = "testFindPrescriptionByPatient, test 6");
    $this->assertEquals(" 3 6 2020-04-02 14 11 1 ", $returnedPrescriptions[2]->toString(), $message = "testFindPrescriptionByPatient, test 7");
    $this->assertEquals(" 4 6 2020-04-10 14 11 1 ", $returnedPrescriptions[3]->toString(), $message = "testFindPrescriptionByPatient, test 8");
  }

  public function testFindAll()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescriptions = $DAO->findAll();

    $this->assertIsArray($returnedPrescriptions, $message = "testFindAll, test 1");
    $this->assertNotNull($returnedPrescriptions, $message = "testFindAll, test 2");
    $this->assertEquals(" 1 6 2020-03-30 14 11 1 ", $returnedPrescriptions[0]->toString(), $message = "testFindAll, test 3");
    $this->assertEquals(" 2 6 2020-04-01 14 11 1 ", $returnedPrescriptions[1]->toString(), $message = "testFindAll, test 4");
    $this->assertEquals(" 3 6 2020-04-02 14 11 1 ", $returnedPrescriptions[2]->toString(), $message = "testFindAll, test 5");
    $this->assertEquals(" 4 6 2020-04-10 14 11 1 ", $returnedPrescriptions[3]->toString(), $message = "testFindAll, test 6");
  }

  public function testFindPrescriptionById()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $id = null;
    $returnedPrescription = $DAO->findPrescriptionById($id);

    $this->assertNull($returnedPrescription, $message = "testFindPrescriptionById, test 1");

    // Test for id not in database.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $id = 23;
    $returnedPrescription = $DAO->findPrescriptionById($id);

    $this->assertNull($returnedPrescription, $message = "testFindPrescriptionById, test 2");

    // Test for id in database.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $id = 4;
    $returnedPrescription = $DAO->findPrescriptionById($id);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testFindPrescriptionById, test 3");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testFindPrescriptionById, test 4");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testFindPrescriptionById, test 5");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testFindPrescriptionById, test 6");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testFindPrescriptionById, test 7");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testFindPrescriptionById, test 8");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testFindPrescriptionById, test 9");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testFindPrescriptionById, test 10");
    $this->assertEquals(14, $returnedPrescription->getQuantity(), $message = "testFindPrescriptionById, test 11");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testFindPrescriptionById, test 12");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testFindPrescriptionById, test 13");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testFindPrescriptionById, test 14");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testFindPrescriptionById, test 15");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testFindPrescriptionById, test 16");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testFindPrescriptionById, test 17");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testFindPrescriptionById, test 18");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testFindPrescriptionById, test 19");
  }

  public function testModifyPrescription()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testModifyPrescription, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testModifyPrescription, test 2");

    // Test with template object and null patient.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, null, date_create("2020-04-10"), 10, 11, 1);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testModifyPrescription, test 3");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testModifyPrescription, test 4");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 5");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testModifyPrescription, test 6");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 7");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testModifyPrescription, test 8");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 9");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 10");
    $this->assertEquals(10, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 11");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 12");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 13");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testModifyPrescription, test 14");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 15");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 16");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 17");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 18");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 19");

    // Test with template object and null date.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, null, 11, 11, 1);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testModifyPrescription, test 20");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testModifyPrescription, test 21");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 22");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testModifyPrescription, test 23");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 24");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testModifyPrescription, test 25");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 26");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 27");
    $this->assertEquals(11, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 28");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 29");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 30");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testModifyPrescription, test 31");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 32");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 33");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 34");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 35");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 36");

    // Test with template object and null quantity.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), null, 11, 1);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testModifyPrescription, test 37");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testModifyPrescription, test 38");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 39");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testModifyPrescription, test 40");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 41");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testModifyPrescription, test 42");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 43");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 44");
    $this->assertEquals(11, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 45");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 46");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 47");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testModifyPrescription, test 48");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 49");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 50");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 51");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 52");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 53");

    // Test with template object and null location.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 12, null, 1);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testModifyPrescription, test 54");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testModifyPrescription, test 55");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 56");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testModifyPrescription, test 57");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 58");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testModifyPrescription, test 59");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 60");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 61");
    $this->assertEquals(12, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 62");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 63");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 64");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testModifyPrescription, test 65");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 66");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 67");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 68");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 69");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 70");

    // Test with template object and null isactive.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 13, 11, null);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testModifyPrescription, test 71");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testModifyPrescription, test 72");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 73");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testModifyPrescription, test 74");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 75");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testModifyPrescription, test 76");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 77");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 78");
    $this->assertEquals(13, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 79");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 80");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 81");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testModifyPrescription, test 82");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 83");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 84");
    $this->assertNotEquals(14, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 85");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 86");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 87");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, null);
    $returnedPrescription = $DAO->modfiyPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testModifyPrescription, test 88");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testModifyPrescription, test 89");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 90");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testModifyPrescription, test 91");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 92");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testModifyPrescription, test 93");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 94");
    $this->assertEquals(date_create("2020-04-10"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 95");
    $this->assertEquals(14, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 96");
    $this->assertEquals(11, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 97");
    $this->assertEquals(1, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 98");
    $this->assertNotEquals(3, $returnedPrescription->getId(), $message = "testModifyPrescription, test 99");
    $this->assertNotEquals(5, $returnedPrescription->getPatient(), $message = "testModifyPrescription, test 100");
    $this->assertNotEquals(date_create("2020-04-09"), $returnedPrescription->getDate(), $message = "testModifyPrescription, test 101");
    $this->assertNotEquals(13, $returnedPrescription->getQuantity(), $message = "testModifyPrescription, test 102");
    $this->assertNotEquals(10, $returnedPrescription->getLocation(), $message = "testModifyPrescription, test 103");
    $this->assertNotEquals(0, $returnedPrescription->getIsactive(), $message = "testModifyPrescription, test 104");
  }

  public function testDeletePrescription()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $DAO->deletePrescription($prescription);

    $this->assertFalse($returnedPrescription, $message = "testDeletePrescription, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->deletePrescription($prescription);

    $this->assertFalse($returnedPrescription, $message = "testDeletePrescription, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new prescriptionDAO($conn, "prescription");
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $DAO->deletePrescription($prescription);

    $this->assertTrue($returnedPrescription, $message = "testDeletePrescription, test 3");
  }

}

?>
