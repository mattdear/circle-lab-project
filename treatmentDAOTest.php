<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Joshua Alsop-Barrell
*
* Reviewer: Matthew Dear
*
*/

include ("treatmentDAO.php");
use PHPUnit\Framework\TestCase;

class treatmentDAOTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");

    $this->assertNotNull($DAO, $message = "testConstruct, test 1");
  }

  public function testAddTreatment()
  {
    // Test with null template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $DAO->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 1");

    // Test with template object has id attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(1, "testInput");
    $returnedTreatment = $DAO->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 2");

    // Test with template object and null name attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $DAO->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 3");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, "testInput");

    $returnedTreatment = $DAO->addTreatment($treatment);

    $this->assertIsInt($returnedTreatment->getId(), $message = "testAddTreatment, test 4");
    $this->assertIsString($returnedTreatment->getName(), $message = "testAddTreatment, test 5");
    $this->assertEquals(27, $returnedTreatment->getId(), $message = "testAddTreatment, test 6");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testAddTreatment, test 7");
    $this->assertNotEquals(4, $returnedTreatment->getId(), $message = "testAddTreatment, test 8");
    $this->assertNotEquals("Nurse", $returnedTreatment->getName(), $message = "testAddTreatment, test 9");

    // Test with template object and same name attribute as existing database entity.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $DAO->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 10");
  }

  public function testFindTreatment()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $DAO->findTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testFindTreatment, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $DAO->findTreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatment, test 2");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatment, test 3");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatment, test 4");
    $this->assertEquals(27 ,$returnedTreatment->getId(), $message = "testFindTreatment, test 5");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatment, test 6");

    // Test with template object and null name.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(27, null);
    $returnedTreatment = $DAO->findTreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatment, test 7");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatment, test 8");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatment, test 9");
    $this->assertEquals(27 ,$returnedTreatment->getId(), $message = "testFindTreatment, test 10");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatment, test 11");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(27, "testInput");
    $returnedTreatment = $DAO->findTreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatment, test 12");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatment, test 13");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatment, test 14");
    $this->assertEquals(27, $returnedTreatment->getId(), $message = "testFindTreatment, test 15");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatment, test 16");
  }

  public function testFindAll()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $DAO->addTreatment($treatment);
    $treatments = $DAO->findAll();

    $this->assertIsArray($treatments, $message = "testFindAll, test 1");
    $this->assertNotNull($treatments, $message = "testFindAll, test 2");
    $this->assertEquals(" 2 ankle support ", $treatments[0]->toString(), $message = "testFindAll, test 3");
    $this->assertEquals(" 18 avoiding harm ", $treatments[1]->toString(), $message = "testFindAll, test 4");
    $this->assertEquals(" 14 avoiding standing for long periods of time ", $treatments[2]->toString(), $message = "testFindAll, test 5");
    $this->assertEquals(" 23 compression stockings ", $treatments[3]->toString(), $message = "testFindAll, test 6");
    $this->assertEquals(" 21 emollients ", $treatments[4]->toString(), $message = "testFindAll, test 7");
    $this->assertEquals(" 24 ice pack ", $treatments[5]->toString(), $message = "testFindAll, test 8");
    $this->assertEquals(" 25 immobilisation ", $treatments[6]->toString(), $message = "testFindAll, test 9");
    $this->assertEquals(" 15 lifestyle changes ", $treatments[7]->toString(), $message = "testFindAll, test 10");
    $this->assertEquals(" 11 losing weight ", $treatments[8]->toString(), $message = "testFindAll, test 11");
    $this->assertEquals(" 16 medication ", $treatments[9]->toString(), $message = "testFindAll, test 12");
    $this->assertEquals(" 1 painkiller ", $treatments[10]->toString(), $message = "testFindAll, test 13");
    $this->assertEquals(" 19 physiotherapy ", $treatments[11]->toString(), $message = "testFindAll, test 14");
    $this->assertEquals(" 17 price therapy ", $treatments[12]->toString(), $message = "testFindAll, test 15");
    $this->assertEquals(" 13 raising your legs three to four times a day ", $treatments[13]->toString(), $message = "testFindAll, test 16");
    $this->assertEquals(" 26 reduction ", $treatments[14]->toString(), $message = "testFindAll, test 17");
    $this->assertEquals(" 8 regular stretching ", $treatments[15]->toString(), $message = "testFindAll, test 18");
    $this->assertEquals(" 7 resting your heel ", $treatments[16]->toString(), $message = "testFindAll, test 19");
    $this->assertEquals(" 20 self-help measures ", $treatments[17]->toString(), $message = "testFindAll, test 20");
    $this->assertEquals(" 5 splint or plaster ", $treatments[18]->toString(), $message = "testFindAll, test 21");
    $this->assertEquals(" 4 supportive boot ", $treatments[19]->toString(), $message = "testFindAll, test 22");
    $this->assertEquals(" 6 surgery ", $treatments[20]->toString(), $message = "testFindAll, test 23");
    $this->assertEquals(" 12 taking regular exercise ", $treatments[21]->toString(), $message = "testFindAll, test 24");
    $this->assertEquals(" 27 testInput ", $treatments[22]->toString(), $message = "testFindAll, test 25");
    $this->assertEquals(" 22 topical corticosteroids ", $treatments[23]->toString(), $message = "testFindAll, test 26");
    $this->assertEquals(" 10 using supportive devices ", $treatments[24]->toString(), $message = "testFindAll, test 27");
    $this->assertEquals(" 9 wearing well fitted shoes ", $treatments[25]->toString(), $message = "testFindAll, test 28");
    $this->assertEquals(" 3 x-ray ", $treatments[26]->toString(), $message = "testFindAll, test 29");

  }

  public function testFindTreatmentById()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $id = null;
    $returnedTreatment = $DAO->findTreatmentById($id);

    $this->assertNull($returnedTreatment, $message = "testFindTreatmentById, test 1");

    // Test for id not in database.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $id = 30;
    $returnedTreatment = $DAO->findTreatmentById($id);

    $this->assertNull($returnedTreatment, $message = "testFindTreatmentById, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $id = 27;
    $returnedTreatment = $DAO->findTreatmentById($id);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatmentById, test 3");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatmentById, test 4");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatmentById, test 5");
    $this->assertEquals(27, $returnedTreatment->getId(), $message = "testFindTreatmentById, test 6");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatmentById, test 7");
  }

  public function testModifyTreatment()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $DAO->modfiytreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testModifyTreatment, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, "testInput2");
    $returnedTreatment = $DAO->modfiytreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testModifyTreatment, test 2");

    // Test with template object and null name.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(27, null);
    $returnedTreatment = $DAO->modfiytreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testModifyTreatment, test 3");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(27, "testInput2");
    $returnedTreatment = $DAO->modfiytreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testModifyTreatment, test 4");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testModifyTreatment, test 5");
    $this->assertIsString($returnedTreatment->getName(), $message = "testModifyTreatment, test 6");
    $this->assertEquals(27 ,$returnedTreatment->getId(), $message = "testModifyTreatment, test 7");
    $this->assertEquals("testInput2", $returnedTreatment->getName(), $message = "testModifyTreatment, test 8");
  }

  public function testDeleteTreatment()
  {
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $DAO->deleteTreatment($treatment);

    $this->assertFalse($returnedTreatment, $message = "testDeleteTreatment, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $DAO->deleteTreatment($treatment);

    $this->assertFalse($returnedTreatment, $message = "testDeleteTreatment, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new treatmentDAO($conn, "Treatment");
    $treatment = new treatmentDTO(27, "testInput");
    $returnedTreatment = $DAO->deleteTreatment($treatment);

    $this->assertTrue($returnedTreatment, $message = "testDeleteTreatment, test 3");
  }
}

?>
