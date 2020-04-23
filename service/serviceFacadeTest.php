<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Joshua Alsop-Barrell
*
* Reviewer: Matthew Dear
*
*/

include ("serviceFacade.php");
use PHPUnit\Framework\TestCase;

class serviceFacadeTest extends PHPUnit\Framework\TestCase
{
  public function testAddDrug()
  {
    $serviceFacade = new serviceFacade();

    // Test with null template object.
    $drug = new drugDTO(null, null);
    $returnedDrug = $serviceFacade->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 1");

    // Test with template object has id attribute.
    $drug = new drugDTO(1, "testInput");
    $returnedDrug = $serviceFacade->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 2");

    // Test with template object and null name attribute.
    $drug = new drugDTO(null, null);
    $returnedDrug = $serviceFacade->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 3");

    // Test with complete template object.
    $drug = new drugDTO(null, "testInput");

    $returnedDrug = $serviceFacade->addDrug($drug);

    $this->assertIsInt($returnedDrug->getId(), $message = "testAddDrug, test 4");
    $this->assertIsString($returnedDrug->getName(), $message = "testAddDrug, test 5");
    $this->assertEquals(8, $returnedDrug->getId(), $message = "testAddDrug, test 6");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testAddDrug, test 7");
    $this->assertNotEquals(4, $returnedDrug->getId(), $message = "testAddDrug, test 8");
    $this->assertNotEquals("Nurse", $returnedDrug->getName(), $message = "testAddDrug, test 9");

    // Test with template object and same name attribute as existing database entity.
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $serviceFacade->addDrug($drug);

    $this->assertNull($returnedDrug, $message = "testAddDrug, test 10");
  }

  public function testFindDrug()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $drug = new drugDTO(null, null);
    $returnedDrug = $serviceFacade->findDrug($drug);

    $this->assertNull($returnedDrug, $message = "testFindDrug, test 1");

    // Test with template object and null id.
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $serviceFacade->findDrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testFindDrug, test 2");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrug, test 3");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrug, test 4");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testFindDrug, test 5");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrug, test 6");

    // Test with template object and null name.
    $drug = new drugDTO(8, null);
    $returnedDrug = $serviceFacade->findDrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testFindDrug, test 7");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrug, test 8");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrug, test 9");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testFindDrug, test 10");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrug, test 11");

    // Test with complete template object.
    $drug = new drugDTO(8, "testInput");
    $returnedDrug = $serviceFacade->findDrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testFindDrug, test 12");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrug, test 13");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrug, test 14");
    $this->assertEquals(8, $returnedDrug->getId(), $message = "testFindDrug, test 15");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrug, test 16");
  }

  public function testFindAllDrugs()
  {
    $serviceFacade = new serviceFacade();

    $drugs = $serviceFacade->findAllDrugs();

    $this->assertIsArray($drugs, $message = "testFindAllDrugs, test 1");
    $this->assertNotNull($drugs, $message = "testFindAllDrugs, test 2");
    $this->assertEquals(" 1 amoxicillin ", $drugs[0]->toString(), $message = "testFindAllDrugs, test 3");
    $this->assertEquals(" 7 azithromycin ", $drugs[1]->toString(), $message = "testFindAllDrugs, test 4");
    $this->assertEquals(" 3 cephalexin ", $drugs[2]->toString(), $message = "testFindAllDrugs, test 5");
    $this->assertEquals(" 4 ciprofloxacin ", $drugs[3]->toString(), $message = "testFindAllDrugs, test 6");
    $this->assertEquals(" 5 clindamycin ", $drugs[4]->toString(), $message = "testFindAllDrugs, test 7");
    $this->assertEquals(" 2 doxycycline ", $drugs[5]->toString(), $message = "testFindAllDrugs, test 8");
    $this->assertEquals(" 6 metronidazole ", $drugs[6]->toString(), $message = "testFindAllDrugs, test 9");
    $this->assertEquals(" 8 testInput ", $drugs[7]->toString(), $message = "testFindAll, test 10");
  }

  public function testFindDrugById()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $id = null;
    $returnedDrug = $serviceFacade->findDrugById($id);

    $this->assertNull($returnedDrug, $message = "testFindDrugById, test 1");

    // Test for id not in database.
    $id = 23;
    $returnedDrug = $serviceFacade->findDrugById($id);

    $this->assertNull($returnedDrug, $message = "testFindDrugById, test 2");

    // Test with complete template object.
    $id = 8;
    $returnedDrug = $serviceFacade->findDrugById($id);

    $this->assertNotNull($returnedDrug, $message = "testFindDrugById, test 3");
    $this->assertIsInt($returnedDrug->getId(), $message = "testFindDrugById, test 4");
    $this->assertIsString($returnedDrug->getName(), $message = "testFindDrugById, test 5");
    $this->assertEquals(8, $returnedDrug->getId(), $message = "testFindDrugById, test 6");
    $this->assertEquals("testInput", $returnedDrug->getName(), $message = "testFindDrugById, test 7");
  }

  public function testModifyDrug()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $drug = new drugDTO(null, null);
    $returnedDrug = $serviceFacade->modifydrug($drug);

    $this->assertNull($returnedDrug, $message = "testModifyDrug, test 1");

    // Test with template object and pre-existing name in the database.
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $serviceFacade->modifydrug($drug);

    $this->assertNull($returnedDrug, $message = "testModifyDrug, test 2");

    // Test with template object and null name.
    $drug = new drugDTO(8, null);
    $returnedDrug = $serviceFacade->modifydrug($drug);

    $this->assertNull($returnedDrug, $message = "testModifyDrug, test 3");

    // Test with complete template object.
    $drug = new drugDTO(8, "testInput 2");
    $returnedDrug = $serviceFacade->modifydrug($drug);

    $this->assertNotNull($returnedDrug, $message = "testModifyDrug, test 4");
    $this->assertIsInt($returnedDrug->getId(), $message = "testModifyDrug, test 5");
    $this->assertIsString($returnedDrug->getName(), $message = "testModifyDrug, test 6");
    $this->assertEquals(8 ,$returnedDrug->getId(), $message = "testModifyDrug, test 7");
    $this->assertEquals("testInput 2", $returnedDrug->getName(), $message = "testModifyDrug, test 8");
  }

  public function testDeleteDrug()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $drug = new drugDTO(null, null);
    $returnedDrug = $serviceFacade->deleteDrug($drug);

    $this->assertFalse($returnedDrug, $message = "testDeleteDrug, test 1");

    // Test with template object and null id.
    $drug = new drugDTO(null, "testInput");
    $returnedDrug = $serviceFacade->deleteDrug($drug);

    $this->assertFalse($returnedDrug, $message = "testDeleteDrug, test 2");

    // Test with complete template object.
    $drug = new drugDTO(8, "testInput");
    $returnedDrug = $serviceFacade->deleteDrug($drug);

    $this->assertTrue($returnedDrug, $message = "testDeleteDrug, test 3");
  }

  public function testAddTreatment()
  {
    $serviceFacade = new serviceFacade();

    // Test with null template object.
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $serviceFacade->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 1");

    // Test with template object has id attribute.
    $treatment = new treatmentDTO(1, "testInput");
    $returnedTreatment = $serviceFacade->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 2");

    // Test with template object and null name attribute.
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $serviceFacade->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 3");

    // Test with complete template object.
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $serviceFacade->addTreatment($treatment);

    $this->assertIsInt($returnedTreatment->getId(), $message = "testAddTreatment, test 4");
    $this->assertIsString($returnedTreatment->getName(), $message = "testAddTreatment, test 5");
    $this->assertEquals(27, $returnedTreatment->getId(), $message = "testAddTreatment, test 6");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testAddTreatment, test 7");
    $this->assertNotEquals(4, $returnedTreatment->getId(), $message = "testAddTreatment, test 8");
    $this->assertNotEquals("Nurse", $returnedTreatment->getName(), $message = "testAddTreatment, test 9");

    // Test with template object and same name attribute as existing database entity.
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $serviceFacade->addTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testAddTreatment, test 10");
  }

  public function testFindTreatment()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $serviceFacade->findTreatment($treatment);

    $this->assertNull($returnedTreatment, $message = "testFindTreatment, test 1");

    // Test with template object and null id.
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $serviceFacade->findTreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatment, test 2");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatment, test 3");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatment, test 4");
    $this->assertEquals(27 ,$returnedTreatment->getId(), $message = "testFindTreatment, test 5");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatment, test 6");

    // Test with template object and null name.
    $treatment = new treatmentDTO(27, null);
    $returnedTreatment = $serviceFacade->findTreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatment, test 7");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatment, test 8");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatment, test 9");
    $this->assertEquals(27 ,$returnedTreatment->getId(), $message = "testFindTreatment, test 10");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatment, test 11");

    // Test with complete template object.
    $treatment = new treatmentDTO(27, "testInput");
    $returnedTreatment = $serviceFacade->findTreatment($treatment);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatment, test 12");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatment, test 13");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatment, test 14");
    $this->assertEquals(27, $returnedTreatment->getId(), $message = "testFindTreatment, test 15");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatment, test 16");
  }

  public function testFindAllTreatments()
  {
    $serviceFacade = new serviceFacade();

    $treatments = $serviceFacade->findAllTreatments();

    $this->assertIsArray($treatments, $message = "testFindAll, test 1");
    $this->assertNotNull($treatments, $message = "testFindAll, test 2");
    $this->assertEquals(" 2 ankle support ", $treatments[0]->toString(), $message = "testFindAllTreatments, test 3");
    $this->assertEquals(" 18 avoiding harm ", $treatments[1]->toString(), $message = "testFindAllTreatments, test 4");
    $this->assertEquals(" 14 avoiding standing for long periods of time ", $treatments[2]->toString(), $message = "testFindAllTreatments, test 5");
    $this->assertEquals(" 23 compression stockings ", $treatments[3]->toString(), $message = "testFindAllTreatments, test 6");
    $this->assertEquals(" 21 emollients ", $treatments[4]->toString(), $message = "testFindAllTreatments, test 7");
    $this->assertEquals(" 24 ice pack ", $treatments[5]->toString(), $message = "testFindAllTreatments, test 8");
    $this->assertEquals(" 25 immobilisation ", $treatments[6]->toString(), $message = "testFindAllTreatments, test 9");
    $this->assertEquals(" 15 lifestyle changes ", $treatments[7]->toString(), $message = "testFindAllTreatments, test 10");
    $this->assertEquals(" 11 losing weight ", $treatments[8]->toString(), $message = "testFindAllTreatments, test 11");
    $this->assertEquals(" 16 medication ", $treatments[9]->toString(), $message = "testFindAllTreatments, test 12");
    $this->assertEquals(" 1 painkiller ", $treatments[10]->toString(), $message = "testFindAllTreatments, test 13");
    $this->assertEquals(" 19 physiotherapy ", $treatments[11]->toString(), $message = "testFindAllTreatments, test 14");
    $this->assertEquals(" 17 price therapy ", $treatments[12]->toString(), $message = "testFindAllTreatments, test 15");
    $this->assertEquals(" 13 raising your legs three to four times a day ", $treatments[13]->toString(), $message = "testFindAllTreatments, test 16");
    $this->assertEquals(" 26 reduction ", $treatments[14]->toString(), $message = "testFindAllTreatments, test 17");
    $this->assertEquals(" 8 regular stretching ", $treatments[15]->toString(), $message = "testFindAllTreatments, test 18");
    $this->assertEquals(" 7 resting your heel ", $treatments[16]->toString(), $message = "testFindAllTreatments, test 19");
    $this->assertEquals(" 20 self-help measures ", $treatments[17]->toString(), $message = "testFindAllTreatments, test 20");
    $this->assertEquals(" 5 splint or plaster ", $treatments[18]->toString(), $message = "testFindAllTreatments, test 21");
    $this->assertEquals(" 4 supportive boot ", $treatments[19]->toString(), $message = "testFindAllTreatments, test 22");
    $this->assertEquals(" 6 surgery ", $treatments[20]->toString(), $message = "testFindAllTreatments, test 23");
    $this->assertEquals(" 12 taking regular exercise ", $treatments[21]->toString(), $message = "testFindAllTreatments, test 24");
    $this->assertEquals(" 27 testInput ", $treatments[22]->toString(), $message = "testFindAllTreatments, test 25");
    $this->assertEquals(" 22 topical corticosteroids ", $treatments[23]->toString(), $message = "testFindAllTreatments, test 26");
    $this->assertEquals(" 10 using supportive devices ", $treatments[24]->toString(), $message = "testFindAllTreatments, test 27");
    $this->assertEquals(" 9 wearing well fitted shoes ", $treatments[25]->toString(), $message = "testFindAllTreatments, test 28");
    $this->assertEquals(" 3 x-ray ", $treatments[26]->toString(), $message = "testFindAllTreatments, test 29");

  }

  public function testFindTreatmentById()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $id = null;
    $returnedTreatment = $serviceFacade->findTreatmentById($id);

    $this->assertNull($returnedTreatment, $message = "testFindTreatmentById, test 1");

    // Test for id not in database.
    $id = 30;
    $returnedTreatment = $serviceFacade->findTreatmentById($id);

    $this->assertNull($returnedTreatment, $message = "testFindTreatmentById, test 2");

    // Test with complete template object.
    $id = 27;
    $returnedTreatment = $serviceFacade->findTreatmentById($id);

    $this->assertNotNull($returnedTreatment, $message = "testFindTreatmentById, test 3");
    $this->assertIsInt($returnedTreatment->getId(), $message = "testFindTreatmentById, test 4");
    $this->assertIsString($returnedTreatment->getName(), $message = "testFindTreatmentById, test 5");
    $this->assertEquals(27, $returnedTreatment->getId(), $message = "testFindTreatmentById, test 6");
    $this->assertEquals("testInput", $returnedTreatment->getName(), $message = "testFindTreatmentById, test 7");
  }

  public function testDeleteTreatment()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $treatment = new treatmentDTO(null, null);
    $returnedTreatment = $serviceFacade->deleteTreatment($treatment);

    $this->assertFalse($returnedTreatment, $message = "testDeleteTreatment, test 1");

    // Test with template object and null id.
    $treatment = new treatmentDTO(null, "testInput");
    $returnedTreatment = $serviceFacade->deleteTreatment($treatment);

    $this->assertFalse($returnedTreatment, $message = "testDeleteTreatment, test 2");

    // Test with complete template object.
    $treatment = new treatmentDTO(27, "testInput");
    $returnedTreatment = $serviceFacade->deleteTreatment($treatment);

    $this->assertTrue($returnedTreatment, $message = "testDeleteTreatment, test 3");
  }

  public function testAddRole()
  {
    $serviceFacade = new serviceFacade();

    // Test with null template object.
    $role = new roleDTO(null, null, null);
    $returnedRole = $serviceFacade->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 1");

    // Test with template object has id attribute.
    $role = new roleDTO(1, "root", 9);
    $returnedRole = $serviceFacade->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 2");

    // Test with template object and null name attribute.
    $role = new roleDTO(null, null, 4);
    $returnedRole = $serviceFacade->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 3");

    // Test with template object and null access level attribute.
    $role = new roleDTO(null, "root", null);
    $returnedRole = $serviceFacade->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 4");

    // Test with complete template object.
    $role = new roleDTO(null, "root", 9);

    $returnedRole = $serviceFacade->addRole($role);

    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 5");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 6");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 7");
    $this->assertEquals(10, $returnedRole->getId(), $message = "testAddRole, test 8");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 9");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 10");
    $this->assertNotEquals(4, $returnedRole->getId(), $message = "testAddRole, test 11");
    $this->assertNotEquals("Nurse", $returnedRole->getName(), $message = "testAddRole, test 12");
    $this->assertNotEquals(8, $returnedRole->getAccessLevel(), $message = "testAddRole, test 13");
  }

  public function testFindRole()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $role = new roleDTO(null, null, null);
    $returnedRole = $serviceFacade->findRole($role);

    $this->assertNull($returnedRole, $message = "testFindRole, test 1");

    // Test with template object and null id.
    $role = new roleDTO(null, "root", 9);
    $returnedRole = $serviceFacade->findRole($role);

    $this->assertNotNull($returnedRole, $message = "testFindRole, test 2");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 3");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 4");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 5");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 6");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 7");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 8");

    // Test with template object and null name.
    $role = new roleDTO(10, null, 9);
    $returnedRole = $serviceFacade->findRole($role);

    $this->assertNotNull($returnedRole, $message = "testFindRole, test 9");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 10");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 11");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 12");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 13");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 14");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 15");

    // Test with complete template object.
    $role = new roleDTO(10, "root", 9);
    $returnedRole = $serviceFacade->findRole($role);

    $this->assertNotNull($returnedRole, $message = "testFindRole, test 16");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 17");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 18");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 19");
    $this->assertEquals(10, $returnedRole->getId(), $message = "testAddRole, test 20");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 21");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 22");
  }

  public function testFindAllRoles()
  {
    $serviceFacade = new serviceFacade();

    $roles = $serviceFacade->findAllRoles();

    $this->assertIsArray($roles, $message = "testFindAll, test 1");
    $this->assertNotNull($roles, $message = "testFindAll, test 2");
    $this->assertEquals(" 1 Admin 9 ", $roles[0]->toString(), $message = "testFindAll, test 3");
    $this->assertEquals(" 2 Doctor 9 ", $roles[1]->toString(), $message = "testFindAll, test 4");
    $this->assertEquals(" 3 Government 1 ", $roles[2]->toString(), $message = "testFindAll, test 5");
    $this->assertEquals(" 4 Nurse 8 ", $roles[3]->toString(), $message = "testFindAll, test 6");
    $this->assertEquals(" 5 Patient 0 ", $roles[4]->toString(), $message = "testFindAll, test 7");
    $this->assertEquals(" 6 Pharmacy 1 ", $roles[5]->toString(), $message = "testFindAll, test 8");
    $this->assertEquals(" 7 Regulatory Body 1 ", $roles[6]->toString(), $message = "testFindAll, test 9");
    $this->assertEquals(" 8 Research Company 1 ", $roles[7]->toString(), $message = "testFindAll, test 10");
    $this->assertEquals(" 9 Staff 7 ", $roles[8]->toString(), $message = "testFindAll, test 11");
    $this->assertEquals(" 10 root 9 ", $roles[9]->toString(), $message = "testFindAll, test 12");
  }

  public function testFindRoleById()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $id = null;
    $returnedRole = $serviceFacade->findRoleById($id);

    $this->assertNull($returnedRole, $message = "testFindRoleById, test 1");

    // Test for id not in database.
    $id = 23;
    $returnedRole = $serviceFacade->findRoleById($id);

    $this->assertNull($returnedRole, $message = "testFindRoleById, test 2");

    // Test with complete template object.
    $id = 10;
    $returnedRole = $serviceFacade->findRoleById($id);

    $this->assertNotNull($returnedRole, $message = "testFindRoleById, test 3");
    $this->assertIsInt($returnedRole->getId(), $message = "testFindRoleById, test 4");
    $this->assertIsString($returnedRole->getName(), $message = "testFindRoleById, test 5");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testFindRoleById, test 6");
    $this->assertEquals(10, $returnedRole->getId(), $message = "testFindRoleById, test 7");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testFindRoleById, test 8");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testFindRoleById, test 9");
  }

  public function testModifyRole()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $role = new roleDTO(null, null, null);
    $returnedRole = $serviceFacade->modifyRole($role);

    $this->assertNull($returnedRole, $message = "testModifyRole, test 1");

    // Test with template object and null id.
    $role = new roleDTO(null, "root", 9);
    $returnedRole = $serviceFacade->modifyRole($role);

    $this->assertNull($returnedRole, $message = "testModifyRole, test 2");

    // Test with template object and null name.
    $role = new roleDTO(10, null, 8);
    $returnedRole = $serviceFacade->modifyRole($role);

    $this->assertNotNull($returnedRole, $message = "testModifyRole, test 3");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 4");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 5");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 6");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 7");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 8");
    $this->assertEquals(8, $returnedRole->getAccessLevel(), $message = "testAddRole, test 9");

    // Test with template object and null accessLevel.
    $role = new roleDTO(10, "toor", null);
    $returnedRole = $serviceFacade->modifyRole($role);

    $this->assertNotNull($returnedRole, $message = "testModifyRole, test 10");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 11");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 12");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 13");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 14");
    $this->assertEquals("toor", $returnedRole->getName(), $message = "testAddRole, test 15");
    $this->assertEquals(8, $returnedRole->getAccessLevel(), $message = "testAddRole, test 16");

    // Test with complete template object.
    $role = new roleDTO(10, "root", 9);
    $returnedRole = $serviceFacade->modifyRole($role);

    $this->assertNotNull($returnedRole, $message = "testModifyRole, test 17");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 18");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 19");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 20");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 21");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 22");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 23");
  }

  public function testDeleteRole()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $role = new roleDTO(null, null, null);
    $returnedRole = $serviceFacade->deleteRole($role);

    $this->assertFalse($returnedRole, $message = "testDeleteRole, test 1");

    // Test with template object and null id.
    $role = new roleDTO(null, "root", 9);
    $returnedRole = $serviceFacade->deleteRole($role);

    $this->assertFalse($returnedRole, $message = "testDeleteRole, test 2");

    // Test with complete template object.
    $role = new roleDTO(10, "root", 9);
    $returnedRole = $serviceFacade->deleteRole($role);

    $this->assertTrue($returnedRole, $message = "testDeleteRole, test 3");
  }

  public function testAddPrescription()
  {
    $serviceFacade = new serviceFacade();

    // Test with null template object.
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 1");

    //Test with template object has id attribute.
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 2");

    //Test with template object and null patient attribute.
    $prescription = new prescriptionDTO(null, null, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 3");

    // Test with template object and null date attribute.
    $prescription = new prescriptionDTO(null, 6, null, 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 4");

    // Test with template object and null quantity attribute.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), null, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 5");

    // Test with template object and null location attribute.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, null, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 6");

    // Test with template object and null isactive attribute.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, null);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 7");

    // Test with template object and isactive set to 0.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 0);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 8");

    // Test with complete template object.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

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
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $serviceFacade->findPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testFindPrescription, test 1");

    // Test with template object and null id.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $serviceFacade->findPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testFindPrescription, test 2");

    // Test with complete template object.
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $serviceFacade->findPrescription($prescription);

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
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $person = new personDTO(null, null, null, null, null, null, null, null, null, null, null);
    $returnedPrescriptions = $serviceFacade->findPrescriptionByPatient($person);

    $this->assertNull($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 1");

    // Test with null patient.
    $person = new personDTO(null, "John", "Smith", null, null, null, null, null, null, null, null);
    $returnedPrescriptions = $serviceFacade->findPrescriptionByPatient($person);

    $this->assertNull($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 2");

    // Test with complete template object.
    $person = new personDTO(6, "John", "Smith", null, null, null, null, null, null, null, null);
    $returnedPrescriptions = $serviceFacade->findPrescriptionByPatient($person);

    $this->assertIsArray($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 3");
    $this->assertNotNull($returnedPrescriptions, $message = "testFindPrescriptionByPatient, test 4");
    $this->assertEquals(" 1 6 2020-03-30 14 11 1 ", $returnedPrescriptions[0]->toString(), $message = "testFindPrescriptionByPatient, test 5");
    $this->assertEquals(" 2 6 2020-04-01 14 11 1 ", $returnedPrescriptions[1]->toString(), $message = "testFindPrescriptionByPatient, test 6");
    $this->assertEquals(" 3 6 2020-04-02 14 11 1 ", $returnedPrescriptions[2]->toString(), $message = "testFindPrescriptionByPatient, test 7");
    $this->assertEquals(" 4 6 2020-04-10 14 11 1 ", $returnedPrescriptions[3]->toString(), $message = "testFindPrescriptionByPatient, test 8");
  }

  public function testFindAllPrescriptions()
  {
    $serviceFacade = new serviceFacade();

    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescriptions = $serviceFacade->findAllPrescriptions();

    $this->assertIsArray($returnedPrescriptions, $message = "testFindAll, test 1");
    $this->assertNotNull($returnedPrescriptions, $message = "testFindAll, test 2");
    $this->assertEquals(" 1 6 2020-03-30 14 11 1 ", $returnedPrescriptions[0]->toString(), $message = "testFindAll, test 3");
    $this->assertEquals(" 2 6 2020-04-01 14 11 1 ", $returnedPrescriptions[1]->toString(), $message = "testFindAll, test 4");
    $this->assertEquals(" 3 6 2020-04-02 14 11 1 ", $returnedPrescriptions[2]->toString(), $message = "testFindAll, test 5");
    $this->assertEquals(" 4 6 2020-04-10 14 11 1 ", $returnedPrescriptions[3]->toString(), $message = "testFindAll, test 6");
  }

  public function testFindPrescriptionById()
  {
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $id = null;
    $returnedPrescription = $serviceFacade->findPrescriptionById($id);

    $this->assertNull($returnedPrescription, $message = "testFindPrescriptionById, test 1");

    // Test for id not in database.
    $id = 23;
    $returnedPrescription = $serviceFacade->findPrescriptionById($id);

    $this->assertNull($returnedPrescription, $message = "testFindPrescriptionById, test 2");

    // Test for id in database.
    $id = 4;
    $returnedPrescription = $serviceFacade->findPrescriptionById($id);

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
    $serviceFacade = new serviceFacade();

    // Test with null object.
    $prescription = new prescriptionDTO(null, null, null, null, null, null);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testModifyPrescription, test 1");

    // Test with template object and null id.
    $prescription = new prescriptionDTO(null, 6, date_create("2020-04-10"), 14, 11, 1);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testModifyPrescription, test 2");

    // Test with template object and null patient.
    $prescription = new prescriptionDTO(4, null, date_create("2020-04-10"), 10, 11, 1);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

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
    $prescription = new prescriptionDTO(4, 6, null, 11, 11, 1);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

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
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), null, 11, 1);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

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
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 12, null, 1);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

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
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 13, 11, null);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

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
    $prescription = new prescriptionDTO(4, 6, date_create("2020-04-10"), 14, 11, null);
    $returnedPrescription = $serviceFacade->modifyPrescription($prescription);

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

  public function testAddDrugToPrescription()
  {
    $serviceFacade = new serviceFacade();

    $bool = $serviceFacade->addDrugToPrescription(1, 3);

    $this->assertTrue($bool, $message = "testAddDrugToPrescription, test 1");
  }

  public function testFindDrugPrescriptionLinkByPrescription()
  {
    $serviceFacade = new serviceFacade();

    $returnedLinks = $serviceFacade->findDrugPrescriptionLinkByPrescription(3);
    $this->assertIsArray($returnedLinks, $message = "testFindDrugPrescriptionLinkByPrescription, test 1");
    $this->assertNotNull($returnedLinks, $message = "testFindDrugPrescriptionLinkByPrescription, test 2");
    $this->assertIsInt($returnedLinks[0]->getDrug(), $message = "testFindDrugPrescriptionLinkByPrescription, test 3");
    $this->assertEquals(1, $returnedLinks[0]->getDrug(), $message = "testFindDrugPrescriptionLinkByPrescription, test 4");
    $this->assertNotEquals(2, $returnedLinks[0]->getDrug(), $message = "testFindDrugPrescriptionLinkByPrescription, test 5");
    $this->assertEquals(3, $returnedLinks[0]->getPrescription(), $message = "testFindDrugPrescriptionLinkByPrescription, test 6");
    $this->assertNotEquals(2, $returnedLinks[0]->getPrescription(), $message = "testFindDrugPrescriptionLinkByPrescription, test 7");
    $this->assertIsInt($returnedLinks[1]->getDrug(), $message = "testFindDrugPrescriptionLinkByPrescription, test 8");
    $this->assertEquals(3, $returnedLinks[1]->getDrug(), $message = "testFindDrugPrescriptionLinkByPrescription, test 9");
    $this->assertNotEquals(2, $returnedLinks[1]->getDrug(), $message = "testFindDrugPrescriptionLinkByPrescription, test 10");
    $this->assertEquals(3, $returnedLinks[1]->getPrescription(), $message = "testFindDrugPrescriptionLinkByPrescription, test 11");
    $this->assertNotEquals(2, $returnedLinks[1]->getPrescription(), $message = "testFindDrugPrescriptionLinkByPrescription, test 12");
  }
}

?>