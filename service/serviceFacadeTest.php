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
    $date = date_create("2020-04-10");
    $formattedDate = date_format($date,"Y/m/d");

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 1");

    //Test with template object has id attribute.
    $prescription = new prescriptionDTO(4, 6, $formattedDate, 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 2");

    //Test with template object and null patient attribute.
    $prescription = new prescriptionDTO(null, null, $formattedDate, 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 3");

    // Test with template object and null date attribute.
    $prescription = new prescriptionDTO(null, 6, null, 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 4");

    // Test with template object and null quantity attribute.
    $prescription = new prescriptionDTO(null, 6, $formattedDate, null, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 5");

    // Test with template object and null location attribute.
    $prescription = new prescriptionDTO(null, 6, $formattedDate, 14, null, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 6");

    // Test with template object and null isactive attribute.
    $prescription = new prescriptionDTO(null, 6, $formattedDate, 14, 11, null);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 7");

    // Test with template object and isactive set to 0.
    $prescription = new prescriptionDTO(null, 6, $formattedDate, 14, 11, 0);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertNull($returnedPrescription, $message = "testAddPrescription, test 8");

    // Test with complete template object.
    $prescription = new prescriptionDTO(null, 6, $formattedDate, 14, 11, 1);
    $returnedPrescription = $serviceFacade->addPrescription($prescription);

    $this->assertIsInt($returnedPrescription->getId(), $message = "testAddPrescription, test 9");
    $this->assertIsInt($returnedPrescription->getPatient(), $message = "testAddPrescription, test 10");
    $this->assertIsInt($returnedPrescription->getQuantity(), $message = "testAddPrescription, test 11");
    $this->assertIsInt($returnedPrescription->getLocation(), $message = "testAddPrescription, test 12");
    $this->assertIsInt($returnedPrescription->getIsactive(), $message = "testAddPrescription, test 13");
    $this->assertEquals(4, $returnedPrescription->getId(), $message = "testAddPrescription, test 14");
    $this->assertEquals(6, $returnedPrescription->getPatient(), $message = "testAddPrescription, test 15");
    $this->assertEquals($formattedDate, $returnedPrescription->getDate(), $message = "testAddPrescription, test 16");
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
  //
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

  public function testAddDiseasePersonLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new diseasePersonLinkDTO(1, 3);

    $bool = $serviceFacade->addDiseasePersonLinkDTO($linkObj);
    $this->assertTrue($bool, $message = "testAddDiseasePersonLinkDTO, test 1");
    $bool = $serviceFacade->addDiseasePersonLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseasePersonLinkDTO, test 2");

    $linkObj = new diseasePersonLinkDTO(1, null);

    $bool = $serviceFacade->addDiseasePersonLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseasePersonLinkDTO, test 3");

    $linkObj = new diseasePersonLinkDTO(null, 3);

    $bool = $serviceFacade->addDiseasePersonLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseasePersonLinkDTO, test 4");

    $linkObj = new diseasePersonLinkDTO(null, null);

    $bool = $serviceFacade->addDiseasePersonLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseasePersonLinkDTO, test 5");
  }

  public function testModifyDiseasePersonLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $oldLinkObj = new diseasePersonLinkDTO(1, 3);
    $newLinkObj = new diseasePersonLinkDTO(5, 3);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertTrue($bool, $message = "testModifyDiseasePersonLinkDTO, Test 1");

    $oldLinkObj = new diseasePersonLinkDTO(5, 3);
    $newLinkObj = new diseasePersonLinkDTO(5, 3);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 2");

    $oldLinkObj = new diseasePersonLinkDTO(null, 3);
    $newLinkObj = new diseasePersonLinkDTO(5, 3);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 3");

    $oldLinkObj = new diseasePersonLinkDTO(5, null);
    $newLinkObj = new diseasePersonLinkDTO(5, 3);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 4");

    $oldLinkObj = new diseasePersonLinkDTO(5, 3);
    $newLinkObj = new diseasePersonLinkDTO(null, 3);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 5");

    $oldLinkObj = new diseasePersonLinkDTO(5, 3);
    $newLinkObj = new diseasePersonLinkDTO(5, null);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 6");

    $oldLinkObj = new diseasePersonLinkDTO(null, null);
    $newLinkObj = new diseasePersonLinkDTO(null, null);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 7");

    $oldLinkObj = new diseasePersonLinkDTO(70, 70);
    $newLinkObj = new diseasePersonLinkDTO(70, 70);

    $bool = $serviceFacade->modifyDiseasePersonLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseasePersonLinkDTO, Test 8");
  }

  public function testFindDiseasePersonLinkByPersonId()
  {
    $serviceFacade = new serviceFacade();

    $id = 6;
    $retLinks = $serviceFacade->findDiseasePersonLinkByPersonId($id);

    $this->assertEquals(1, $retLinks[0]->getDisease(), $message = "testFindDiseasePersonLinkByPersonId, Test 1");
    $this->assertEquals(6, $retLinks[0]->getPerson(), $message = "testFindDiseasePersonLinkByPersonId, Test 2");

    $this->assertEquals(2, $retLinks[1]->getDisease(), $message = "testFindDiseasePersonLinkByPersonId, Test 3");
    $this->assertEquals(6, $retLinks[1]->getPerson(), $message = "testFindDiseasePersonLinkByPersonId, Test 4");

    $this->assertEquals(5, $retLinks[2]->getDisease(), $message = "testFindDiseasePersonLinkByPersonId, Test 5");
    $this->assertEquals(6, $retLinks[2]->getPerson(), $message = "testFindDiseasePersonLinkByPersonId, Test 6");

    $this->assertEquals(3, sizeOf($retLinks), $message = "testFindDiseasePersonLinkByPersonId, Test 7");

    $id = null;
    $retLinks = $serviceFacade->findDiseasePersonLinkByPersonId($id);

    $this->assertNull($retLinks, $message = "testFindByPersonId, Test 8");

    $id = 10;
    $retLinks = $serviceFacade->findDiseasePersonLinkByPersonId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "testFindByPersonId, Test 9");
  }

  public function testFindDiseasePersonLinkByDiseaseId()
  {
    $serviceFacade = new serviceFacade();

    $id = 5;
    $retLinks = $serviceFacade->findDiseasePersonLinkByDiseaseId($id);

    $this->assertEquals(5, $retLinks[0]->getDisease(), $message = "testFindDiseasePersonLinkByDiseaseId, Test 1");
    $this->assertEquals(3, $retLinks[0]->getPerson(), $message = "testFindDiseasePersonLinkByDiseaseId, Test 2");

    $this->assertEquals(5, $retLinks[1]->getDisease(), $message = "testFindDiseasePersonLinkByDiseaseId, Test 3");
    $this->assertEquals(6, $retLinks[1]->getPerson(), $message = "testFindDiseasePersonLinkByDiseaseId, Test 4");

    $this->assertEquals(2, sizeOf($retLinks), $message = "testFindDiseasePersonLinkByDiseaseId, Test 7");

    $id = null;
    $retLinks = $serviceFacade->findDiseasePersonLinkByDiseaseId($id);

    $this->assertNull($retLinks, $message = "testFindDiseasePersonLinkByDiseaseId, Test 8");

    $id = 10;
    $retLinks = $serviceFacade->findDiseasePersonLinkByDiseaseId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "testFindDiseasePersonLinkByDiseaseId, Test 9");
  }

  public function testDeleteDiseasePersonLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $link = new diseasePersonLinkDTO(5, 3);
    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);

    $this->assertTrue($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 1");

    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 2");

    $link = new diseasePersonLinkDTO(null, 3);
    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 3");

    $link = new diseasePersonLinkDTO(5, null);
    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 3");

    $link = new diseasePersonLinkDTO(null, null);
    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 3");

    $link = new diseasePersonLinkDTO(70, 3);
    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 4");

    $link = new diseasePersonLinkDTO(5, 70);
    $bool = $serviceFacade->deleteDiseasePersonLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseasePersonLinkDTO, Test 5");
  }

  public function testFindByDiseasePersonLinkObject()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new diseasePersonLinkDTO(2, 6);
    $returnedObj = $serviceFacade->findByDiseasePersonLinkObject($linkObj);
    $this->assertEquals(2, $returnedObj->getDisease(), $message = "testFindByDiseasePersonLinkObject, Test 1");
    $this->assertEquals(6, $returnedObj->getPerson(), $message = "testFindByDiseasePersonLinkObject, Test 2");

    $linkObj = new diseasePersonLinkDTO(20, 6);
    $returnedObj = $serviceFacade->findByDiseasePersonLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseasePersonLinkObject, Test 3");

    $linkObj = new diseasePersonLinkDTO(null, 6);
    $returnedObj = $serviceFacade->findByDiseasePersonLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseasePersonLinkObject, Test 4");

    $linkObj = new diseasePersonLinkDTO(2, null);
    $returnedObj = $serviceFacade->findByDiseasePersonLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseasePersonLinkObject, Test 5");

    $linkObj = new diseasePersonLinkDTO(null, null);
    $returnedObj = $serviceFacade->findByDiseasePersonLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseasePersonLinkObject, Test 6");
  }

  public function testAddDiseaseSymptomLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new diseaseSymptomLinkDTO(1, 10);

    $bool = $serviceFacade->addDiseaseSymptomLinkDTO($linkObj);
    $this->assertTrue($bool, $message = "testAddDiseaseSymptomLinkDTO, test 1");
    $bool = $serviceFacade->addDiseaseSymptomLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseSymptomLinkDTO, test 2");

    $linkObj = new diseaseSymptomLinkDTO(1, null);

    $bool = $serviceFacade->addDiseaseSymptomLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseSymptomLinkDTO, test 3");

    $linkObj = new diseaseSymptomLinkDTO(null, 3);

    $bool = $serviceFacade->addDiseaseSymptomLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseSymptomLinkDTO, test 4");

    $linkObj = new diseaseSymptomLinkDTO(null, null);

    $bool = $serviceFacade->addDiseaseSymptomLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseSymptomLinkDTO, test 5");

    $linkObj = new diseaseSymptomLinkDTO(1, 3);

    $bool = $serviceFacade->addDiseaseSymptomLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseSymptomLinkDTO, test 6");
  }

  public function testModifyDiseaseSymptomLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $oldLinkObj = new diseaseSymptomLinkDTO(1, 10);
    $newLinkObj = new diseaseSymptomLinkDTO(2, 15);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertTrue($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 1");

    $oldLinkObj = new diseaseSymptomLinkDTO(1, 1);
    $newLinkObj = new diseaseSymptomLinkDTO(1, 1);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 2");

    $oldLinkObj = new diseaseSymptomLinkDTO(null, 3);
    $newLinkObj = new diseaseSymptomLinkDTO(1, 3);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 3");

    $oldLinkObj = new diseaseSymptomLinkDTO(5, null);
    $newLinkObj = new diseaseSymptomLinkDTO(1, 3);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 4");

    $oldLinkObj = new diseaseSymptomLinkDTO(1, 3);
    $newLinkObj = new diseaseSymptomLinkDTO(null, 3);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 5");

    $oldLinkObj = new diseaseSymptomLinkDTO(1, 3);
    $newLinkObj = new diseaseSymptomLinkDTO(1, null);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 6");

    $oldLinkObj = new diseaseSymptomLinkDTO(null, null);
    $newLinkObj = new diseaseSymptomLinkDTO(null, null);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 7");

    $oldLinkObj = new diseaseSymptomLinkDTO(70, 70);
    $newLinkObj = new diseaseSymptomLinkDTO(70, 70);

    $bool = $serviceFacade->modifyDiseaseSymptomLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseSymptomLinkDTO, Test 8");
  }

  public function testFindDiseaseSymptomLinkBySymptomId()
  {
    $serviceFacade = new serviceFacade();

    $id = 10;
    $retLinks = $serviceFacade->findDiseaseSymptomLinkBySymptomId($id);

    $this->assertEquals(3, $retLinks[0]->getDisease(), $message = "testFindDiseaseSymptomLinkBySymptomId, Test 1");
    $this->assertEquals(10, $retLinks[0]->getSymptom(), $message = "testFindDiseaseSymptomLinkBySymptomId, Test 2");

    $this->assertEquals(1, sizeOf($retLinks), $message = "testFindDiseaseSymptomLinkBySymptomId, Test 3");

    $id = null;
    $retLinks = $serviceFacade->findDiseaseSymptomLinkBySymptomId($id);
    $this->assertNull($retLinks, $message = "testFindDiseaseSymptomLinkBySymptomId, Test 4");

    $id = 50;
    $retLinks = $serviceFacade->findDiseaseSymptomLinkBySymptomId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "testFindDiseaseSymptomLinkBySymptomId, Test 5");
  }

  public function testFindDiseaseSymptomLinkByDiseaseId()
  {
    $serviceFacade = new serviceFacade();

    $id = 3;
    $retLinks = $serviceFacade->findDiseaseSymptomLinkByDiseaseId($id);

    $this->assertEquals(3, $retLinks[0]->getDisease(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 1");
    $this->assertEquals(10, $retLinks[0]->getSymptom(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 2");

    $this->assertEquals(3, $retLinks[1]->getDisease(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 3");
    $this->assertEquals(11, $retLinks[1]->getSymptom(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 4");

    $this->assertEquals(3, $retLinks[2]->getDisease(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 5");
    $this->assertEquals(12, $retLinks[2]->getSymptom(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 6");

    $this->assertEquals(3, $retLinks[3]->getDisease(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 7");
    $this->assertEquals(13, $retLinks[3]->getSymptom(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 8");

    $this->assertEquals(3, $retLinks[4]->getDisease(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 9");
    $this->assertEquals(14, $retLinks[4]->getSymptom(), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 10");

    $this->assertEquals(5, sizeOf($retLinks), $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 11");

    $id = null;
    $retLinks = $serviceFacade->findDiseaseSymptomLinkByDiseaseId($id);

    $this->assertNull($retLinks, $message = "testFindDiseaseSymptomLinkByDiseaseId, Test 12");

    $id = 50;
    $retLinks = $serviceFacade->findDiseaseSymptomLinkByDiseaseId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "testFindDiseaseSymptomLinkBySymptomId, Test 13");
  }

  public function testDeleteDiseaseSymptomLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $link = new diseaseSymptomLinkDTO(2, 15);
    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);

    $this->assertTrue($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 1");

    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 2");

    $link = new diseaseSymptomLinkDTO(null, 3);
    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 3");

    $link = new diseaseSymptomLinkDTO(5, null);
    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 3");

    $link = new diseaseSymptomLinkDTO(null, null);
    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 3");

    $link = new diseaseSymptomLinkDTO(70, 3);
    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 4");

    $link = new diseaseSymptomLinkDTO(5, 70);
    $bool = $serviceFacade->deleteDiseaseSymptomLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseSymptomLinkDTO, Test 5");
  }

  public function testFindByDiseaseSymptomLinkObject()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new diseaseSymptomLinkDTO(2, 9);
    $returnedObj = $serviceFacade->findByDiseaseSymptomLinkObject($linkObj);
    $this->assertEquals(2, $returnedObj->getDisease(), $message = "testFindByDiseaseSymptomLinkObject, Test 1");
    $this->assertEquals(9, $returnedObj->getSymptom(), $message = "testFindByDiseaseSymptomLinkObject, Test 2");

    $linkObj = new diseaseSymptomLinkDTO(20, 6);
    $returnedObj = $serviceFacade->findByDiseaseSymptomLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseSymptomLinkObject, Test 3");

    $linkObj = new diseaseSymptomLinkDTO(null, 6);
    $returnedObj = $serviceFacade->findByDiseaseSymptomLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseSymptomLinkObject, Test 4");

    $linkObj = new diseaseSymptomLinkDTO(2, null);
    $returnedObj = $serviceFacade->findByDiseaseSymptomLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseSymptomLinkObject, Test 5");

    $linkObj = new diseaseSymptomLinkDTO(null, null);
    $returnedObj = $serviceFacade->findByDiseaseSymptomLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseSymptomLinkObject, Test 6");
  }

  public function testAddDiseaseTreatmentLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new diseaseTreatmentLinkDTO(1, 10);

    $bool = $serviceFacade->addDiseaseTreatmentLinkDTO($linkObj);
    $this->assertTrue($bool, $message = "testAddDiseaseTreatmentLinkDTO, test 1");
    $bool = $serviceFacade->addDiseaseTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseTreatmentLinkDTO, test 2");

    $linkObj = new diseaseTreatmentLinkDTO(1, null);

    $bool = $serviceFacade->addDiseaseTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseTreatmentLinkDTO, test 3");

    $linkObj = new diseaseTreatmentLinkDTO(null, 3);

    $bool = $serviceFacade->addDiseaseTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseTreatmentLinkDTO, test 4");

    $linkObj = new diseaseTreatmentLinkDTO(null, null);

    $bool = $serviceFacade->addDiseaseTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseTreatmentLinkDTO, test 5");

    $linkObj = new diseaseTreatmentLinkDTO(1, 3);

    $bool = $serviceFacade->addDiseaseTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDiseaseTreatmentLinkDTO, test 6");
  }

  public function testModifyDiseaseTreatmentLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $oldLinkObj = new diseaseTreatmentLinkDTO(1, 10);
    $newLinkObj = new diseaseTreatmentLinkDTO(2, 15);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertTrue($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 1");

    $oldLinkObj = new diseaseTreatmentLinkDTO(1, 1);
    $newLinkObj = new diseaseTreatmentLinkDTO(1, 1);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 2");

    $oldLinkObj = new diseaseTreatmentLinkDTO(null, 3);
    $newLinkObj = new diseaseTreatmentLinkDTO(1, 3);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 3");

    $oldLinkObj = new diseaseTreatmentLinkDTO(5, null);
    $newLinkObj = new diseaseTreatmentLinkDTO(1, 3);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 4");

    $oldLinkObj = new diseaseTreatmentLinkDTO(1, 3);
    $newLinkObj = new diseaseTreatmentLinkDTO(null, 3);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 5");

    $oldLinkObj = new diseaseTreatmentLinkDTO(1, 3);
    $newLinkObj = new diseaseTreatmentLinkDTO(1, null);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 6");

    $oldLinkObj = new diseaseTreatmentLinkDTO(null, null);
    $newLinkObj = new diseaseTreatmentLinkDTO(null, null);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 7");

    $oldLinkObj = new diseaseTreatmentLinkDTO(70, 70);
    $newLinkObj = new diseaseTreatmentLinkDTO(70, 70);

    $bool = $serviceFacade->modifyDiseaseTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDiseaseTreatmentLinkDTO, Test 8");
  }

  public function testFindDiseaseTreatmentLinkByTreatmentId()
  {
    $serviceFacade = new serviceFacade();

    $id = 6;
    $retLinks = $serviceFacade->findDiseaseTreatmentLinkByTreatmentId($id);

    $this->assertEquals(1, $retLinks[0]->getDisease(), $message = "findDiseaseTreatmentLinkByTreatmentId, Test 1");
    $this->assertEquals(6, $retLinks[0]->getTreatment(), $message = "findDiseaseTreatmentLinkByTreatmentId, Test 2");

    $this->assertEquals(8, $retLinks[1]->getDisease(), $message = "findDiseaseTreatmentLinkByTreatmentId, Test 3");
    $this->assertEquals(6, $retLinks[1]->getTreatment(), $message = "findDiseaseTreatmentLinkByTreatmentId, Test 4");

    $this->assertEquals(2, sizeOf($retLinks), $message = "findDiseaseTreatmentLinkByTreatmentId, Test 5");

    $id = null;
    $retLinks = $serviceFacade->findDiseaseTreatmentLinkByTreatmentId($id);
    $this->assertNull($retLinks, $message = "findDiseaseTreatmentLinkByTreatmentId, Test 6");

    $id = 50;
    $retLinks = $serviceFacade->findDiseaseTreatmentLinkByTreatmentId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "findDiseaseTreatmentLinkByTreatmentId, Test 7");
  }

  public function testFindDiseaseTreatmentLinkByDiseaseId()
  {
    $serviceFacade = new serviceFacade();

    $id = 5;
    $retLinks = $serviceFacade->findDiseaseTreatmentLinkByDiseaseId($id);

    $this->assertEquals(5, $retLinks[0]->getDisease(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 1");
    $this->assertEquals(1, $retLinks[0]->getTreatment(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 2");

    $this->assertEquals(5, $retLinks[1]->getDisease(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 3");
    $this->assertEquals(17, $retLinks[1]->getTreatment(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 4");

    $this->assertEquals(5, $retLinks[2]->getDisease(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 5");
    $this->assertEquals(18, $retLinks[2]->getTreatment(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 6");

    $this->assertEquals(5, $retLinks[3]->getDisease(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 7");
    $this->assertEquals(19, $retLinks[3]->getTreatment(), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 8");

    $this->assertEquals(4, sizeOf($retLinks), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 9");

    $id = null;
    $retLinks = $serviceFacade->findDiseaseTreatmentLinkByDiseaseId($id);

    $this->assertNull($retLinks, $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 10");

    $id = 50;
    $retLinks = $serviceFacade->findDiseaseTreatmentLinkByDiseaseId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "testFindDiseaseTreatmentLinkByDiseaseId, Test 11");
  }

  public function testDeleteDiseaseTreatmentLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $link = new diseaseTreatmentLinkDTO(2, 15);
    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);

    $this->assertTrue($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 1");

    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 2");

    $link = new diseaseTreatmentLinkDTO(null, 3);
    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 3");

    $link = new diseaseTreatmentLinkDTO(5, null);
    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 3");

    $link = new diseaseTreatmentLinkDTO(null, null);
    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 3");

    $link = new diseaseTreatmentLinkDTO(70, 3);
    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 4");

    $link = new diseaseTreatmentLinkDTO(5, 70);
    $bool = $serviceFacade->deleteDiseaseTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDiseaseTreatmentLinkDTO, Test 5");
  }

  public function testFindByDiseaseTreatmentLinkObject()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new diseaseTreatmentLinkDTO(2, 9);
    $returnedObj = $serviceFacade->findByDiseaseTreatmentLinkObject($linkObj);
    $this->assertEquals(2, $returnedObj->getDisease(), $message = "testFindByDiseaseTreatmentLinkObject, Test 1");
    $this->assertEquals(9, $returnedObj->getTreatment(), $message = "testFindByDiseaseTreatmentLinkObject, Test 2");

    $linkObj = new diseaseTreatmentLinkDTO(20, 6);
    $returnedObj = $serviceFacade->findByDiseaseTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseTreatmentLinkObject, Test 3");

    $linkObj = new diseaseTreatmentLinkDTO(null, 6);
    $returnedObj = $serviceFacade->findByDiseaseTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseTreatmentLinkObject, Test 4");

    $linkObj = new diseaseTreatmentLinkDTO(2, null);
    $returnedObj = $serviceFacade->findByDiseaseTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseTreatmentLinkObject, Test 5");

    $linkObj = new diseaseTreatmentLinkDTO(null, null);
    $returnedObj = $serviceFacade->findByDiseaseTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDiseaseTreatmentLinkObject, Test 6");
  }

  public function testAddLocation()
  {
    $serviceFacade = new serviceFacade();

    // Test with null template object.
    $location = new locationDTO(null, null, null, null, null, null);
    $returnedLocation = $serviceFacade->addLocation($location);

    $this->assertNull($returnedLocation, $message = "testAddLocation, test 1");
    //Test with pre set id
    $location = new locationDTO(1, "6 road road", "city", "postcode", "type", 1);
    $returnedLocation = $serviceFacade->addLocation($location);

    $this->assertNull($returnedLocation, $message = "testAddLocation, test 2");
    // Test complete object
    $location = new locationDTO(null, "6 road road", "city", "postcode", "type", 1);
    $returnedLocation = $serviceFacade->addLocation($location);

    $this->assertEquals("6 road road", $returnedLocation->getAddressLine(), $message = "testAddLocation, test 3");
    $this->assertEquals("city", $returnedLocation->getCity(), $message = "testAddLocation, test 4");
    $this->assertEquals("postcode", $returnedLocation->getPostcode(), $message = "testAddLocation, test 5");
    $this->assertEquals("type", $returnedLocation->getType(), $message = "testAddLocation, test 6");
    $this->assertEquals(1, $returnedLocation->getIsactive(), $message = "testAddLocation, test 7");

    //Test with null addressline
    $location = new locationDTO(null, null, "city", "postcode", "type", 1);
    $returnedLocation = $serviceFacade->addLocation($location);
    $this->assertNull($returnedLocation, $message = "testAddLocation, test 8");

    //Test with null city
    $location = new locationDTO(null, "6 road road", null, "postcode", "type", 1);
    $returnedLocation = $serviceFacade->addLocation($location);
    $this->assertNull($returnedLocation, $message = "testAddLocation, test 9");

    //Test with null postcode
    $location = new locationDTO(null, "6 road road", "city", null, "type", 1);
    $returnedLocation = $serviceFacade->addLocation($location);
    $this->assertNull($returnedLocation, $message = "testAddLocation, test 10");

    //Test with null type
    $location = new locationDTO(null, "6 road road", "city", "postcode", null, 1);
    $returnedLocation = $serviceFacade->addLocation($location);
    $this->assertNull($returnedLocation, $message = "testAddLocation, test 11");

    //Test with null isactive
    $location = new locationDTO(null, "6 road road", "city", "postcode", "type", null);
    $returnedLocation = $serviceFacade->addLocation($location);
    $this->assertNull($returnedLocation, $message = "testAddLocation, test 12");

    //Test with complete object with same addressline as in database
    $location = new locationDTO(null, "6 road road", "city", "postcode", "type", 1);
    $returnedLocation = $serviceFacade->addLocation($location);
    $this->assertNull($returnedLocation, $message = "testAddLocation, test 13");
  }

  public function testModifyLocation()
  {
    $serviceFacade = new serviceFacade();

    //Test with object with null values
    $location = new locationDTO(null, null, null, null, null, null);
    $returnedLocation = $serviceFacade->modifyLocation($location);
    $this->assertNull($returnedLocation, $message = "testModifyLocation, test 1");

    //Test with null
    $location = null;
    $returnedLocation = $serviceFacade->modifyLocation($location);
    $this->assertNull($returnedLocation, $message = "testModifyLocation, test 2");

    //Test with object with null id
    $location = new locationDTO(null, "road", "city", "postcode", "type", 1);
    $returnedLocation = $serviceFacade->modifyLocation($location);
    $this->assertNull($returnedLocation, $message = "testModifyLocation, test 3");

    //Test with complete object
    $location = new locationDTO(17, "uniqueAddress", "big city", "new postcode", "new type", 0);
    $bool = $serviceFacade->modifyLocation($location);
    $returnedLocation = $serviceFacade->findLocationById(17);

    $this->assertTrue($bool, $message = "testModifyLocation, test 4");
    $this->assertEquals(17, $returnedLocation->getId(), $message = "testModifyLocation, test 5");
    $this->assertEquals("uniqueAddress", $returnedLocation->getAddressLine(), $message = "testModifyLocation, test 6");
    $this->assertEquals("big city", $returnedLocation->getCity(), $message = "testModifyLocation, test 7");
    $this->assertEquals("new postcode", $returnedLocation->getPostcode(), $message = "testModifyLocation, test 8");
    $this->assertEquals("new type", $returnedLocation->getType(), $message = "testModifyLocation, test 9");
    $this->assertEquals(0, $returnedLocation->getIsactive(), $message = "testModifyLocation, test 10");
  }

  public function testFindLocationByType()
  {
    $serviceFacade = new serviceFacade();

    $locations = $serviceFacade->findLocationsByType("Hospital");

    $this->assertEquals(15, $locations[0]->getId(), $message = "testFindLocationByType, test 1");
    $this->assertEquals("14 Cresent Place", $locations[0]->getAddressLine(), $message = "testFindLocationByType, test 2");
    $this->assertEquals("Southampton", $locations[0]->getCity(), $message = "testFindLocationByType, test 3");
    $this->assertEquals("SO01 9UI", $locations[0]->getPostcode(), $message = "testFindLocationByType, test 4");
    $this->assertEquals("Hospital", $locations[0]->getType(), $message = "testFindLocationByType, test 5");
    $this->assertEquals(1, $locations[0]->getIsactive(), $message = "testFindLocationByType, test 6");

    $this->assertEquals(16, $locations[1]->getId(), $message = "testFindLocationByType, test 7");
    $this->assertEquals("15 London Road", $locations[1]->getAddressLine(), $message = "testFindLocationByType, test 8");
    $this->assertEquals("Southampton", $locations[1]->getCity(), $message = "testFindLocationByType, test 9");
    $this->assertEquals("SO23 6YP", $locations[1]->getPostcode(), $message = "testFindLocationByType, test 10");
    $this->assertEquals("Hospital", $locations[1]->getType(), $message = "testFindLocationByType, test 11");
    $this->assertEquals(1, $locations[1]->getIsactive(), $message = "testFindLocationByType, test 12");

    $locations = $serviceFacade->findLocationsByType(null);
    $this->assertNull($locations, $message = "testFindLocationByType, test 13");
  }

  public function testFindLocationById()
  {
    $serviceFacade = new serviceFacade();

    $location = $serviceFacade->findLocationById(16);

    $this->assertEquals(16, $location->getId(), $message = "testFindLocationById, test 1");
    $this->assertEquals("15 London Road", $location->getAddressLine(), $message = "testFindLocationById, test 2");
    $this->assertEquals("Southampton", $location->getCity(), $message = "testFindLocationById, test 3");
    $this->assertEquals("SO23 6YP", $location->getPostcode(), $message = "testFindLocationById, test 4");
    $this->assertEquals("Hospital", $location->getType(), $message = "testFindLocationById, test 5");
    $this->assertEquals(1, $location->getIsactive(), $message = "testFindLocationById, test 6");

    $location = $serviceFacade->findLocationById(64);
    $this->assertNull($location, $message = "testFindLocationById, test 7");
  }

  public function testAddSymptom()
  {
    $serviceFacade = new serviceFacade();

    $symptom = new Symptom(null, "testSymptom");
    $returnedSymptom = $serviceFacade->addSymptom($symptom);
    $this->assertIsInt($returnedSymptom->getId(), $message = "testAddSymptom, test 1");
    $this->assertEquals(47, $returnedSymptom->getId(), $message = "testAddSymptom, test 2");
    $this->assertEquals("testSymptom", $returnedSymptom->getName(), $message = "testAddSymptom, test 3");

    $symptom = new symptom(null, null);
    $returnedSymptom = $serviceFacade->addSymptom($symptom);
    $this->assertNull($returnedSymptom, $message = "testAddSymptom, test 4");

    $symptom = new symptom(100, "test");
    $returnedSymptom = $serviceFacade->addSymptom($symptom);
    $this->assertNull($returnedSymptom, $message = "testAddSymptom, test 5");

    $symptom = new symptom(null, "testSymptom");
    $returnedSymptom = $serviceFacade->addSymptom($symptom);
    $this->assertNull($returnedSymptom, $message = "testAddSymptom, test 6");
  }

  public function testFindAllSymptoms()
  {
    $serviceFacade = new serviceFacade();
    $symptoms = $serviceFacade->findAllSymptoms();
    $this->assertEquals(47, sizeOf($symptoms), $message = "testFindAllSymptoms, test 1");
    $this->assertEquals(1, $symptoms[0]->getId(), $message = "testFindAllSymptoms, test 2");
    $this->assertEquals("severe pain", $symptoms[0]->getName(), $message = "testFindAllSymptoms, test 3");
    $this->assertEquals(47, $symptoms[46]->getId(), $message = "testFindAllSymptoms, test 2");
    $this->assertEquals("testSymptom", $symptoms[46]->getName(), $message = "testFindAllSymptoms, test 3");
  }

  public function testFindSymptom()
  {
    $serviceFacade = new serviceFacade();
    $symptom = new Symptom(null, "testSymptom");
    $foundSymptom = $serviceFacade->findSymptom($symptom);

    $this->assertEquals(47, $foundSymptom->getId(), $message = "testFindSymptom, test 1");
    $this->assertEquals("testSymptom", $foundSymptom->getName(), $message = "testFindSymptom, test 2");

    $symptom = new Symptom(null, null);
    $foundSymptom = $serviceFacade->findSymptom($symptom);
    $this->assertEquals(null, $foundSymptom, $message = "testFindSymptom, test 3");

    $symptom = new Symptom(null, "Doesnotexist");
    $foundSymptom = $serviceFacade->findSymptom($symptom);
    $this->assertEquals(null, $foundSymptom, $message = "testFindSymptom, test 4");

    $symptom = new Symptom(null, null);
    $foundSymptom = $serviceFacade->findSymptom($symptom);
    $this->assertEquals(null, $foundSymptom, $message = "testFindSymptom, test 5");
  }

  public function testFindSymptomById()
  {
    $serviceFacade = new serviceFacade();

    $returnedSymptom = $serviceFacade->findSymptomById(47);
    $this->assertEquals(47, $returnedSymptom->getId(), $message = "testFindSymptomById, test 1");
    $this->assertEquals("testSymptom", $returnedSymptom->getName(), $message = "testFindSymptomById, test 2");

    $returnedSymptom = $serviceFacade->findSymptomById(77);
    $this->assertNull($returnedSymptom, $message = "testFindSymptomById, test 3");
  }

  public function testModifySymptom()
  {
    $serviceFacade = new serviceFacade();
    $symptomObj = new Symptom(47, "updatedTestSymptom");
    $returnedSymptom = $serviceFacade->modifySymptom($symptomObj);

    $this->assertNotNull($returnedSymptom, $message = "testModifySymptom, test 1");
    $this->assertEquals($symptomObj, $returnedSymptom, $message = "testModifySymptom, test 2");

    $symptomObj = new Symptom(99, "Doesnotexist");
    $returnedSymptom = $serviceFacade->modifySymptom($symptomObj);

    $this->assertNull($returnedSymptom, $message = "testModifySymptom, test 3");
  }

  public function testAddDrugTreatmentLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new DrugTreatmentLinkDto(1, 3);

    $bool = $serviceFacade->addDrugTreatmentLinkDTO($linkObj);
    $this->assertTrue($bool, $message = "testAddDrugTreatmentLinkDTO, test 1");
    $bool = $serviceFacade->addDrugTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugTreatmentLinkDTO, test 2");

    $linkObj = new DrugTreatmentLinkDto(1, null);

    $bool = $serviceFacade->addDrugTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugTreatmentLinkDTO, test 3");

    $linkObj = new DrugTreatmentLinkDto(null, 3);

    $bool = $serviceFacade->addDrugTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugTreatmentLinkDTO, test 4");

    $linkObj = new DrugTreatmentLinkDto(null, null);

    $bool = $serviceFacade->addDrugTreatmentLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugTreatmentLinkDTO, test 5");
  }

  public function testModifyDrugTreatmentLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $oldLinkObj = new DrugTreatmentLinkDto(1, 3);
    $newLinkObj = new DrugTreatmentLinkDto(2, 2);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertTrue($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 1");

    $oldLinkObj = new DrugTreatmentLinkDto(1, 1);
    $newLinkObj = new DrugTreatmentLinkDto(1, 1);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 2");

    $oldLinkObj = new DrugTreatmentLinkDto(null, 3);
    $newLinkObj = new DrugTreatmentLinkDto(1, 3);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 3");

    $oldLinkObj = new DrugTreatmentLinkDto(5, null);
    $newLinkObj = new DrugTreatmentLinkDto(1, 3);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 4");

    $oldLinkObj = new DrugTreatmentLinkDto(1, 3);
    $newLinkObj = new DrugTreatmentLinkDto(null, 3);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 5");

    $oldLinkObj = new DrugTreatmentLinkDto(1, 3);
    $newLinkObj = new DrugTreatmentLinkDto(1, null);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 6");

    $oldLinkObj = new DrugTreatmentLinkDto(null, null);
    $newLinkObj = new DrugTreatmentLinkDto(null, null);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 7");

    $oldLinkObj = new DrugTreatmentLinkDto(70, 70);
    $newLinkObj = new DrugTreatmentLinkDto(70, 70);

    $bool = $serviceFacade->modifyDrugTreatmentLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugTreatmentLinkDTO, Test 8");
  }

  public function testFindDrugTreatmentLinkByTreatmentId()
  {
    $serviceFacade = new serviceFacade();

    $id = 2;
    $retLinks = $serviceFacade->findDrugTreatmentLinkByTreatmentId($id);

    $this->assertEquals(2, $retLinks[0]->getDrug(), $message = "findDrugTreatmentLinkByTreatmentId, Test 1");
    $this->assertEquals(2, $retLinks[0]->getTreatment(), $message = "findDrugTreatmentLinkByTreatmentId, Test 2");

    $this->assertEquals(1, sizeOf($retLinks), $message = "findDrugTreatmentLinkByTreatmentId, Test 3");

    $id = null;
    $retLinks = $serviceFacade->findDrugTreatmentLinkByTreatmentId($id);
    $this->assertNull($retLinks, $message = "findDrugTreatmentLinkByTreatmentId, Test 4");

    $id = 50;
    $retLinks = $serviceFacade->findDrugTreatmentLinkByTreatmentId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "findDrugTreatmentLinkByTreatmentid, Test 5");
  }

  public function testFindDrugTreatmentLinkByDrugId()
  {
    $serviceFacade = new serviceFacade();

    $id = 2;
    $retLinks = $serviceFacade->findDrugTreatmentLinkByDrugId($id);

    $this->assertEquals(2, $retLinks[0]->getDrug(), $message = "findDrugTreatmentLinkByDrugId, Test 1");
    $this->assertEquals(1, $retLinks[0]->getTreatment(), $message = "findDrugTreatmentLinkByDrugId, Test 2");

    $this->assertEquals(2, $retLinks[1]->getDrug(), $message = "findDrugTreatmentLinkByDrugId, Test 3");
    $this->assertEquals(2, $retLinks[1]->getTreatment(), $message = "findDrugTreatmentLinkByDrugId, Test 4");

    $this->assertEquals(2, sizeOf($retLinks), $message = "findDrugTreatmentLinkByDrugId, Test 5");

    $id = null;
    $retLinks = $serviceFacade->findDrugTreatmentLinkByDrugId($id);
    $this->assertNull($retLinks, $message = "findDrugTreatmentLinkByDrugId, Test 6");

    $id = 50;
    $retLinks = $serviceFacade->findDrugTreatmentLinkByDrugId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "findDrugTreatmentLinkByDrugId, Test 7");
  }

  public function testDeleteDrugTreatmentLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $link = new DrugTreatmentLinkDto(2, 2);
    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);

    $this->assertTrue($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 1");

    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 2");

    $link = new DrugTreatmentLinkDto(null, 3);
    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 3");

    $link = new DrugTreatmentLinkDto(5, null);
    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 3");

    $link = new DrugTreatmentLinkDto(null, null);
    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 3");

    $link = new DrugTreatmentLinkDto(70, 3);
    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 4");

    $link = new DrugTreatmentLinkDto(5, 70);
    $bool = $serviceFacade->deleteDrugTreatmentLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugTreatmentLinkDTO, Test 5");
  }

  public function testFindByDrugTreatmentLinkObject()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new DrugTreatmentLinkDto(3, 1);
    $returnedObj = $serviceFacade->findByDrugTreatmentLinkObject($linkObj);
    $this->assertEquals(3, $returnedObj->getDrug(), $message = "testFindByDrugTreatmentLinkObject, Test 1");
    $this->assertEquals(1, $returnedObj->getTreatment(), $message = "testFindByDrugTreatmentLinkObject, Test 2");

    $linkObj = new DrugTreatmentLinkDto(20, 6);
    $returnedObj = $serviceFacade->findByDrugTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugTreatmentLinkObject, Test 3");

    $linkObj = new DrugTreatmentLinkDto(null, 6);
    $returnedObj = $serviceFacade->findByDrugTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugTreatmentLinkObject, Test 4");

    $linkObj = new DrugTreatmentLinkDto(2, null);
    $returnedObj = $serviceFacade->findByDrugTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugTreatmentLinkObject, Test 5");

    $linkObj = new DrugTreatmentLinkDto(null, null);
    $returnedObj = $serviceFacade->findByDrugTreatmentLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugTreatmentLinkObject, Test 6");
  }

  public function testAddDrugPrescriptionLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new DrugPrescriptionLinkDto(1, 3);

    $bool = $serviceFacade->addDrugPrescriptionLinkDTO($linkObj);
    $this->assertTrue($bool, $message = "testAddDrugPrescriptionLinkDTO, test 1");
    $bool = $serviceFacade->addDrugPrescriptionLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugPrescriptionLinkDTO, test 2");

    $linkObj = new DrugPrescriptionLinkDto(1, null);

    $bool = $serviceFacade->addDrugPrescriptionLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugPrescriptionLinkDTO, test 3");

    $linkObj = new DrugPrescriptionLinkDto(null, 3);

    $bool = $serviceFacade->addDrugPrescriptionLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugPrescriptionLinkDTO, test 4");

    $linkObj = new DrugPrescriptionLinkDto(null, null);

    $bool = $serviceFacade->addDrugPrescriptionLinkDTO($linkObj);
    $this->assertNull($bool, $message = "testAddDrugPrescriptionLinkDTO, test 5");
  }

  public function testModifyDrugPrescriptionLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $oldLinkObj = new DrugPrescriptionLinkDto(1, 3);
    $newLinkObj = new DrugPrescriptionLinkDto(3, 1);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertTrue($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 1");

    $oldLinkObj = new DrugPrescriptionLinkDto(1, 1);
    $newLinkObj = new DrugPrescriptionLinkDto(1, 1);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 2");

    $oldLinkObj = new DrugPrescriptionLinkDto(null, 3);
    $newLinkObj = new DrugPrescriptionLinkDto(1, 3);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 3");

    $oldLinkObj = new DrugPrescriptionLinkDto(5, null);
    $newLinkObj = new DrugPrescriptionLinkDto(1, 3);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 4");

    $oldLinkObj = new DrugPrescriptionLinkDto(1, 3);
    $newLinkObj = new DrugPrescriptionLinkDto(null, 3);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 5");

    $oldLinkObj = new DrugPrescriptionLinkDto(1, 3);
    $newLinkObj = new DrugPrescriptionLinkDto(1, null);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 6");

    $oldLinkObj = new DrugPrescriptionLinkDto(null, null);
    $newLinkObj = new DrugPrescriptionLinkDto(null, null);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 7");

    $oldLinkObj = new DrugPrescriptionLinkDto(70, 70);
    $newLinkObj = new DrugPrescriptionLinkDto(70, 70);

    $bool = $serviceFacade->modifyDrugPrescriptionLinkDTO($oldLinkObj, $newLinkObj);
    $this->assertNull($bool, $message = "testModifyDrugPrescriptionLinkDTO, Test 8");
  }

  public function testFindDrugPrescriptionLinkByPrescriptionId()
  {
    $serviceFacade = new serviceFacade();

    $id = 2;
    $retLinks = $serviceFacade->findDrugPrescriptionLinkByPrescriptionId($id);

    $this->assertEquals(2, $retLinks[0]->getDrug(), $message = "findDrugPrescriptionLinkByPrescriptionId, Test 1");
    $this->assertEquals(2, $retLinks[0]->getPrescription(), $message = "findDrugPrescriptionLinkByPrescriptionId, Test 2");

    $this->assertEquals(1, sizeOf($retLinks), $message = "findDrugPrescriptionLinkByPrescriptionId, Test 3");

    $id = null;
    $retLinks = $serviceFacade->findDrugPrescriptionLinkByPrescriptionId($id);
    $this->assertNull($retLinks, $message = "findDrugPrescriptionLinkByPrescriptionId, Test 4");

    $id = 50;
    $retLinks = $serviceFacade->findDrugPrescriptionLinkByPrescriptionId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "findDrugPrescriptionLinkByPrescriptionid, Test 5");
  }

  public function testFindDrugPrescriptionLinkByDrugId()
  {
    $serviceFacade = new serviceFacade();

    $id = 3;
    $retLinks = $serviceFacade->findDrugPrescriptionLinkByDrugId($id);

    $this->assertEquals(3, $retLinks[0]->getDrug(), $message = "findDrugPrescriptionLinkByDrugId, Test 1");
    $this->assertEquals(1, $retLinks[0]->getPrescription(), $message = "findDrugPrescriptionLinkByDrugId, Test 2");

    $this->assertEquals(3, $retLinks[1]->getDrug(), $message = "findDrugPrescriptionLinkByDrugId, Test 3");
    $this->assertEquals(3, $retLinks[1]->getPrescription(), $message = "findDrugPrescriptionLinkByDrugId, Test 4");

    $this->assertEquals(2, sizeOf($retLinks), $message = "findDrugPrescriptionLinkByDrugId, Test 5");

    $id = null;
    $retLinks = $serviceFacade->findDrugPrescriptionLinkByDrugId($id);
    $this->assertNull($retLinks, $message = "findDrugPrescriptionLinkByDrugId, Test 6");

    $id = 50;
    $retLinks = $serviceFacade->findDrugPrescriptionLinkByDrugId($id);

    $this->assertEquals(0, sizeOf($retLinks), $message = "findDrugPrescriptionLinkByDrugId, Test 7");
  }

  public function testDeleteDrugPrescriptionLinkDTO()
  {
    $serviceFacade = new serviceFacade();

    $link = new DrugPrescriptionLinkDto(3, 1);
    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);

    $this->assertTrue($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 1");

    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 2");

    $link = new DrugPrescriptionLinkDto(null, 3);
    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 3");

    $link = new DrugPrescriptionLinkDto(5, null);
    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 3");

    $link = new DrugPrescriptionLinkDto(null, null);
    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 3");

    $link = new DrugPrescriptionLinkDto(70, 3);
    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 4");

    $link = new DrugPrescriptionLinkDto(5, 70);
    $bool = $serviceFacade->deleteDrugPrescriptionLinkDTO($link);
    $this->assertNull($bool, $message = "testDeleteDrugPrescriptionLinkDTO, Test 5");
  }

  public function testFindByDrugPrescriptionLinkObject()
  {
    $serviceFacade = new serviceFacade();

    $linkObj = new DrugPrescriptionLinkDto(3, 3);
    $returnedObj = $serviceFacade->findByDrugPrescriptionLinkObject($linkObj);
    $this->assertEquals(3, $returnedObj->getDrug(), $message = "testFindByDrugPrescriptionLinkObject, Test 1");
    $this->assertEquals(3, $returnedObj->getPrescription(), $message = "testFindByDrugPrescriptionLinkObject, Test 2");

    $linkObj = new DrugPrescriptionLinkDto(20, 6);
    $returnedObj = $serviceFacade->findByDrugPrescriptionLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugPrescriptionLinkObject, Test 3");

    $linkObj = new DrugPrescriptionLinkDto(null, 6);
    $returnedObj = $serviceFacade->findByDrugPrescriptionLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugPrescriptionLinkObject, Test 4");

    $linkObj = new DrugPrescriptionLinkDto(2, null);
    $returnedObj = $serviceFacade->findByDrugPrescriptionLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugPrescriptionLinkObject, Test 5");

    $linkObj = new DrugPrescriptionLinkDto(null, null);
    $returnedObj = $serviceFacade->findByDrugPrescriptionLinkObject($linkObj);
    $this->assertNull($returnedObj, $message = "testFindByDrugPrescriptionLinkObject, Test 6");
  }

  public function testAddDisease()
  {
    $serviceFacade = new serviceFacade();

    $symptom = new Disease(null, "testDisease");
    $returnedDisease = $serviceFacade->addDisease($symptom);
    $this->assertIsInt($returnedDisease->getId(), $message = "testAddDisease, test 1");
    $this->assertEquals(9, $returnedDisease->getId(), $message = "testAddDisease, test 2");
    $this->assertEquals("testDisease", $returnedDisease->getName(), $message = "testAddDisease, test 3");

    $symptom = new symptom(null, null);
    $returnedDisease = $serviceFacade->addDisease($symptom);
    $this->assertNull($returnedDisease, $message = "testAddDisease, test 4");

    $symptom = new symptom(100, "test");
    $returnedDisease = $serviceFacade->addDisease($symptom);
    $this->assertNull($returnedDisease, $message = "testAddDisease, test 5");

    $symptom = new symptom(null, "testDisease");
    $returnedDisease = $serviceFacade->addDisease($symptom);
    $this->assertNull($returnedDisease, $message = "testAddDisease, test 6");
  }

  public function testFindAllDiseases()
  {
    $serviceFacade = new serviceFacade();
    $symptoms = $serviceFacade->findAllDiseases();
    $this->assertEquals(9, sizeOf($symptoms), $message = "testFindAllDisease, test 1");
    $this->assertEquals(1, $symptoms[0]->getId(), $message = "testFindAllDisease, test 2");
    $this->assertEquals("broken ankle", $symptoms[0]->getName(), $message = "testFindAllDisease, test 3");
    $this->assertEquals(9, $symptoms[8]->getId(), $message = "testFindAllDisease, test 2");
    $this->assertEquals("testDisease", $symptoms[8]->getName(), $message = "testFindAllDisease, test 3");
  }

  public function testFindDisease()
  {
    $serviceFacade = new serviceFacade();
    $disease = new Disease(null, "testDisease");
    $foundDisease = $serviceFacade->findDisease($disease);

    $this->assertEquals(9, $foundDisease->getId(), $message = "testFindDisease, test 1");
    $this->assertEquals("testDisease", $foundDisease->getName(), $message = "testFindDisease, test 2");

    $disease = new Disease(null, null);
    $foundDisease = $serviceFacade->findDisease($disease);
    $this->assertEquals(null, $foundDisease, $message = "testFindDisease, test 3");

    $disease = new Disease(null, "Doesnotexist");
    $foundDisease = $serviceFacade->findDisease($disease);
    $this->assertEquals(null, $foundDisease, $message = "testFindDisease, test 4");

    $disease = new Disease(null, null);
    $foundDisease = $serviceFacade->findDisease($disease);
    $this->assertEquals(null, $foundDisease, $message = "testFindDisease, test 5");
  }

  public function testFindDiseaseById()
  {
    $serviceFacade = new serviceFacade();

    $returnedDisease = $serviceFacade->findDiseaseById(9);
    $this->assertEquals(9, $returnedDisease->getId(), $message = "testFindDiseaseById, test 1");
    $this->assertEquals("testDisease", $returnedDisease->getName(), $message = "testFindDiseaseById, test 2");

    $returnedDisease = $serviceFacade->findDiseaseById(77);
    $this->assertNull($returnedDisease, $message = "testFindDiseaseById, test 3");
  }

  public function testModifyDisease()
  {
    $serviceFacade = new serviceFacade();
    $diseaseObj = new Disease(9, "updatedTestDisease");
    $returnedDisease = $serviceFacade->modifyDisease($diseaseObj);

    $this->assertNotNull($returnedDisease, $message = "testModifyDisease, test 1");
    $this->assertEquals($diseaseObj, $returnedDisease, $message = "testModifyDisease, test 2");

    $diseaseObj = new Disease(99, "Doesnotexist");
    $returnedDisease = $serviceFacade->modifyDisease($diseaseObj);

    $this->assertNull($returnedDisease, $message = "testModifyDisease, test 3");
  }

  public function testAddPerson()
  {
    $serviceFacade = new serviceFacade();

    $date = date_create("1997-03-01");
    $formattedDate = date_format($date,"Y/m/d");
    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);

    $this->assertNotNull($returnedPerson, $message = "testAddPerson, test 1");
    $this->assertEquals(10, $returnedPerson->getId(), $message = "testAddPerson, test 2");
    $this->assertEquals("Justin", $returnedPerson->getFirstName(), $message = "testAddPerson, test 3");
    $this->assertEquals("Bieber", $returnedPerson->getLastName(), $message = "testAddPerson, test 4");
    $this->assertEquals("1997/03/01", $returnedPerson->getDob(), $message = "testAddPerson, test 5");
    $this->assertEquals(0, $returnedPerson->getGender(), $message = "testAddPerson, test 6");
    $this->assertEquals("jb@gmail.com", $returnedPerson->getEmail(), $message = "testAddPerson, test 7");
    $this->assertEquals("07780000000", $returnedPerson->getPhone(), $message = "testAddPerson, test 8");
    $this->assertEquals(1, $returnedPerson->getAddress(), $message = "testAddPerson, test 9");
    $this->assertEquals(1, $returnedPerson->getRole(), $message = "testAddPerson, test 10");
    $this->assertEquals("justinbieber", $returnedPerson->getUsername(), $message = "testAddPerson, test 11");
    $this->assertEquals("jb123", $returnedPerson->getPassword(), $message = "testAddPerson, test 12");
    $this->assertEquals(1, $returnedPerson->getIsactive(), $message = "testAddPerson, test 13");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 14");

    $personObj = new personDTO(null, null, "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 15");

    $personObj = new personDTO(null, "Justin", null, $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 16");

    $personObj = new personDTO(null, "Justin", "Bieber", null, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 17");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, null, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 18");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, null, "07780000000", 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 19");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", null, 1, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 20");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", null, 1, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 21");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, null, "justinbieber", "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 22");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, null, "jb123", 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 23");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", null, 1);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 24");

    $personObj = new personDTO(null, "Justin", "Bieber", $formattedDate, 0, "jb@gmail.com", "07780000000", 1, 1, "justinbieber", "jb123", null);
    $returnedPerson = $serviceFacade->addPerson($personObj);
    $this->assertNull($returnedPerson, $message = "testAddPerson, test 25");
  }

  public function testModifyPerson()
  {
    $serviceFacade = new serviceFacade();

    $date = date_create("1997-03-01");
    $formattedDate = date_format($date,"Y/m/d");
    $personObj = $serviceFacade->findPersonById(10);
    $personObj->setFirstName("Jack");
    $personObj->setLastName("Black");
    $personObj->setUsername("jackblack");
    $bool = $serviceFacade->modifyPerson($personObj);

    $this->assertEquals("Jack", $personObj->getFirstName(), $message = "testModifyPerson, test 1");
    $this->assertEquals("Black", $personObj->getLastName(), $message = "testModifyPerson, test 2");
    $this->assertEquals("jackblack", $personObj->getUsername(), $message = "testModifyPerson, test 3");
    $returnedPerson = $serviceFacade->findPersonById($personObj->getId());

    $this->assertNotNull($returnedPerson, $message = "testModifyPerson, test 4");
    $this->assertTrue($bool, $message = "testModifyPerson, test 5");
    $this->assertEquals(10, $returnedPerson->getId(), $message = "testModifyPerson, test 6");
    $this->assertEquals("Jack", $returnedPerson->getFirstName(), $message = "testModifyPerson, test 7");
    $this->assertEquals("Black", $returnedPerson->getLastName(), $message = "testModifyPerson, test 8");
    $this->assertEquals("1997-03-01", $returnedPerson->getDob(), $message = "testModifyPerson, test 9");
    $this->assertEquals(0, $returnedPerson->getGender(), $message = "testModifyPerson, test 10");
    $this->assertEquals("jb@gmail.com", $returnedPerson->getEmail(), $message = "testModifyPerson, test 11");
    $this->assertEquals("07780000000", $returnedPerson->getPhone(), $message = "testModifyPerson, test 12");
    $this->assertEquals(1, $returnedPerson->getAddress(), $message = "testModifyPerson, test 13");
    $this->assertEquals(1, $returnedPerson->getRole(), $message = "testModifyPerson, test 14");
    $this->assertEquals("jackblack", $returnedPerson->getUsername(), $message = "testModifyPerson, test 15");
    $this->assertEquals("jb123", $returnedPerson->getPassword(), $message = "testModifyPerson, test 16");
    $this->assertEquals(1, $returnedPerson->getIsactive(), $message = "testModifyPerson, test 17");

    $personObj = $serviceFacade->findPersonById(1);
    $personObj->setUsername("jackblack");
    $bool = $serviceFacade->modifyPerson($personObj);
    $this->assertNull($bool, $message = "testModifyPerson, test 18");
  }

  public function testFindAllPeople()
  {
    $serviceFacade = new serviceFacade();

    $allPeople = $serviceFacade->findAllPeople();

    $this->assertEquals(1, $allPeople[0]->getId(), $message = "testModifyPerson, test 1");
    $this->assertEquals($serviceFacade->findPersonById(1), $allPeople[0], $message = "testModifyPerson, test 2");

    $this->assertEquals(10, $allPeople[9]->getId(), $message = "testModifyPerson, test 1");
    $this->assertEquals($serviceFacade->findPersonById(10), $allPeople[9], $message = "testModifyPerson, test 2");

  }

  public function testFindPersonByRole()
  {
    $serviceFacade = new serviceFacade();
    $people = $serviceFacade->findPersonByRole(1);

    $this->assertEquals(2, sizeOf($people), $message = "testModifyPerson, test 1");

    $this->assertEquals(1, $people[0]->getId(), $message = "testModifyPerson, test 2");
    $this->assertEquals($serviceFacade->findPersonById(1), $people[0], $message = "testModifyPerson, test 3");

    $this->assertEquals(10, $people[1]->getId(), $message = "testModifyPerson, test 4");
    $this->assertEquals($serviceFacade->findPersonById(10), $people[1], $message = "testModifyPerson, test 5");
  }

  public function testFindPersonById()
  {
    $serviceFacade = new serviceFacade();

    $returnedPerson = $serviceFacade->findPersonById(1);
    $this->assertNotNull($returnedPerson, $message = "testFindPersonById, test 1");

    $returnedPerson = $serviceFacade->findPersonById(100);
    $this->assertNull($returnedPerson, $message = "testFindPersonById, test 2");
  }

  public function testAddAppointment()
  {
    $serviceFacade = new serviceFacade();
    $date = date_create("2020-03-01");
    $formattedDate = date_format($date,"Y/m/d");
    $appointment = new AppointmentDto(null, "test", 5, 4, $formattedDate, 16, 30, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);

    $this->assertEquals("test", $returnedAppointment->getDescription(), $message = "testAddAppointment, test 1");
    $this->assertEquals(4, $returnedAppointment->getId(), $message = "testAddAppointment, test 2");
    $this->assertEquals(4, $returnedAppointment->getStaffmember(), $message = "testAddAppointment, test 3");
    $this->assertEquals(5, $returnedAppointment->getPatient(), $message = "testAddAppointment, test 4");
    $this->assertEquals("2020/03/01", $returnedAppointment->getDateTime(), $message = "testAddAppointment, test 5");
    $this->assertEquals(16, $returnedAppointment->getLocation(), $message = "testAddAppointment, test 6");
    $this->assertEquals(30, $returnedAppointment->getDuration(), $message = "testAddAppointment, test 7");
    $this->assertEquals(1, $returnedAppointment->getIsactive(), $message = "testAddAppointment, test 8");

    $appointment = new AppointmentDto(null, null, 5, 4, $formattedDate, 16, 30, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 9");

    $appointment = new AppointmentDto(null, "test", null, 4, $formattedDate, 16, 30, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 10");

    $appointment = new AppointmentDto(null, "test", 5, null, $formattedDate, 16, 30, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 11");

    $appointment = new AppointmentDto(null, "test", 5, 4, null, 16, 30, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 12");

    $appointment = new AppointmentDto(null, "test", 5, 4, $formattedDate, null, 30, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 13");

    $appointment = new AppointmentDto(null, "test", 5, 4, $formattedDate, 16, null, 1);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 14");

    $appointment = new AppointmentDto(null, "test", 5, 4, $formattedDate, 16, 30, null);
    $returnedAppointment = $serviceFacade->addAppointment($appointment);
    $this->assertNull($returnedAppointment, $message = "testAddAppointment, test 15");
  }

  // public function testModifyAppointment()
  // {
  //   $serviceFacade = new serviceFacade();
  //   $date = date_create("2020-03-01");
  //   $formattedDate = date_format($date,"Y/m/d");
  //   $appointment = new AppointmentDto(null, "test", 5, 4, $formattedDate, 16, 30, 1);
  // }
}

?>
