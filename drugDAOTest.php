<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Joshua Alsop-Barrell
*
* Reviwer: Matthew Dear
*
*/

include ("drugDAO.php");
use PHPUnit\Framework\TestCase;

class drugDAOTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");

    $this->assertNotNull($DAO, $message = "testConstruct, test 1");
  }

  public function testAddDrug()
  {
    // Test with null template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, null);
    $returnedDrug = $DAO->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 1");

    // Test with template object has id attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(1, "testInput");
    $returnedDrug = $DAO->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 2");

    // Test with template object and null name attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, null);
    $returnedDrug = $DAO->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 3");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, "testInput");

    $returnedDrug = $DAO->addDrug($drug);

    $this->assertIsInt($returnedDrug->getId(), $message = "testAddDrug, test 4");
    $this->assertIsString($returnedDrug->getName(), $message = "testAddDrug, test 5");
    $this->assertEquals(8, $returnedDrug->getId(), $message = "testAddDrug, test 6");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testAddDrug, test 7");
    $this->assertNotEquals(4, $returnedDrug->getId(), $message = "testAddDrug, test 8");
    $this->assertNotEquals("Nurse", $returnedDrug->getName(), $message = "testAddDrug, test 9");
  }

  public function testFindDrug()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, null);
    $returnedDrug = $DAO->findDrug($drug);

    $this->assertNull($returnedDrug, $message = "testFindDrug, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $DAO->findDrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testFindDrug, test 2");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrug, test 3");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrug, test 4");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testFindDrug, test 5");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrug, test 6");

    // Test with template object and null name.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(8, null);
    $returnedDrug = $DAO->findDrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testFindDrug, test 7");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrug, test 8");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrug, test 9");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testFindDrug, test 10");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrug, test 11");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(8, "testInput");
    $returnedDrug = $DAO->findDrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testFindDrug, test 12");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrug, test 13");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrug, test 14");
    $this->assertEquals(8, $returnedDrug->getId(), $message = "testFindDrug, test 15");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrug, test 16");
  }

  public function testFindAll()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $DAO->addDrug($drug);
    $drugs = $DAO->findAll();

    $this->assertIsArray($drugs, $message = "testFindAll, test 1");
    $this->assertNotNull($drugs, $message = "testFindAll, test 2");
    $this->assertEquals(" 1 amoxicillin ", $drugs[0]->toString(), $message = "testFindAll, test 3");
    $this->assertEquals(" 7 azithromycin ", $drugs[1]->toString(), $message = "testFindAll, test 4");
    $this->assertEquals(" 3 cephalexin ", $drugs[2]->toString(), $message = "testFindAll, test 5");
    $this->assertEquals(" 4 ciprofloxacin ", $drugs[3]->toString(), $message = "testFindAll, test 6");
    $this->assertEquals(" 5 clindamycin ", $drugs[4]->toString(), $message = "testFindAll, test 7");
    $this->assertEquals(" 2 doxycycline ", $drugs[5]->toString(), $message = "testFindAll, test 8");
    $this->assertEquals(" 6 metronidazole ", $drugs[6]->toString(), $message = "testFindAll, test 9");
    $this->assertEquals(" 8 testInput ", $drugs[7]->toString(), $message = "testFindAll, test 10");
  }

  public function testFindDrugById()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $id = null;
    $returnedDrug = $DAO->findDrugById($id);

    $this->assertNull($returnedDrug, $message = "testFindDrugById, test 1");

    // Test for id not in database.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $id = 23;
    $returnedDrug = $DAO->findDrugById($id);

    $this->assertNull($returnedDrug, $message = "testFindDrugById, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $id = 8;
    $returnedDrug = $DAO->findDrugById($id);

    $this->assertNotNull($returnedDrug, $message = "testFindDrugById, test 3");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrugById, test 4");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrugById, test 5");
    $this->assertEquals(8, $returnedDrug->getId(), $message = "testFindDrugById, test 6");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrugById, test 7");
  }

  public function testModifyDrug()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, null);
    $returnedDrug = $DAO->modfiydrug($drug);

    $this->assertNull($returnedDrug, $message = "testModifyDrug, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $DAO->modfiydrug($drug);

    $this->assertNull($returnedDrug, $message = "testModifyDrug, test 2");

    // Test with template object and null name.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(8, null);
    $returnedDrug = $DAO->modfiydrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testModifyDrug, test 3");
    $this->assertIsInt($returnedDrug->getId(), $message = "testModifyDrug, test 4");
    $this->assertIsString($returnedDrug->getName(), $message = "testModifyDrug, test 5");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testModifyDrug, test 6");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testModifyDrug, test 7");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(8, "testInput");
    $returnedDrug = $DAO->modfiydrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testModifyDrug, test 8");
    $this->assertIsInt($returnedDrug->getId(), $message = "testModifyDrug, test 9");
    $this->assertIsString($returnedDrug->getName(), $message = "testModifyDrug, test 10");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testModifyDrug, test 11");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testModifyDrug, test 12");
  }

  public function testDeleteDrug()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, null);
    $returnedDrug = $DAO->deleteDrug($drug);

    $this->assertFalse($returnedDrug, $message = "testDeleteDrug, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $DAO->deleteDrug($drug);

    $this->assertFalse($returnedDrug, $message = "testDeleteDrug, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new drugDAO($conn, "Drug");
    $drug = new drugDTO(8, "testInput");
    $returnedDrug = $DAO->deleteDrug($drug);

    $this->assertTrue($returnedDrug, $message = "testDeleteDrug, test 3");
  }
}

?>
