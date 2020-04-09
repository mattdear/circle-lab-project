<?php

/**
* Copyright (C) 2020 Circle Lab
*
* Coder: Matthew Dear
*
* Reviwer: Joshua Alsop-Barrell
*
*/

include ("roleDAO.php");
use PHPUnit\Framework\TestCase;

class roleDAOTest extends PHPUnit\Framework\TestCase
{
  public function testConstruct()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");

    $this->assertNotNull($DAO, $message = "testConstruct, test 1");
  }

  public function testAddRole()
  {
    // Test with null template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, null, null);
    $returnedRole = $DAO->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 1");

    // Test with template object has id attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(1, "root", 9);
    $returnedRole = $DAO->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 2");

    // Test with template object and null name attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, null, 4);
    $returnedRole = $DAO->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 3");

    // Test with template object and null access level attribute.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, "root", null);
    $returnedRole = $DAO->addRole($role);

    $this->assertNull($returnedRole, $message = "testAddRole, test 4");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, "root", 9);

    $returnedRole = $DAO->addRole($role);

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
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, null, null);
    $returnedRole = $DAO->findRole($role);

    $this->assertNull($returnedRole, $message = "testFindRole, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, "root", 9);
    $returnedRole = $DAO->findRole($role);

    $this->assertNotNull($returnedRole, $message = "testFindRole, test 2");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 3");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 4");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 5");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 6");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 7");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 8");

    // Test with template object and null name.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(10, null, 9);
    $returnedRole = $DAO->findRole($role);

    $this->assertNotNull($returnedRole, $message = "testFindRole, test 9");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 10");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 11");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 12");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 13");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 14");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 15");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(10, "root", 9);
    $returnedRole = $DAO->findRole($role);

    $this->assertNotNull($returnedRole, $message = "testFindRole, test 16");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 17");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 18");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 19");
    $this->assertEquals(10, $returnedRole->getId(), $message = "testAddRole, test 20");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 21");
    $this->assertEquals(9, $returnedRole->getAccessLevel(), $message = "testAddRole, test 22");
  }

  public function testFindAll()
  {
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $DAO->addRole($role);
    $roles = $DAO->findAll();

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
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $id = null;
    $returnedRole = $DAO->findRoleById($id);

    $this->assertNull($returnedRole, $message = "testFindRoleById, test 1");

    // Test for id not in database.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $id = 23;
    $returnedRole = $DAO->findRoleById($id);

    $this->assertNull($returnedRole, $message = "testFindRoleById, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $id = 10;
    $returnedRole = $DAO->findRoleById($id);

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
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, null, null);
    $returnedRole = $DAO->modfiyRole($role);

    $this->assertNull($returnedRole, $message = "testModifyRole, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, "root", 9);
    $returnedRole = $DAO->modfiyRole($role);

    $this->assertNull($returnedRole, $message = "testModifyRole, test 2");

    // Test with template object and null name.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(10, null, 8);
    $returnedRole = $DAO->modfiyRole($role);

    $this->assertNotNull($returnedRole, $message = "testModifyRole, test 3");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 4");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 5");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 6");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 7");
    $this->assertEquals("root", $returnedRole->getName(), $message = "testAddRole, test 8");
    $this->assertEquals(8, $returnedRole->getAccessLevel(), $message = "testAddRole, test 9");

    // Test with template object and null accessLevel.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(10, "toor", null);
    $returnedRole = $DAO->modfiyRole($role);

    $this->assertNotNull($returnedRole, $message = "testModifyRole, test 10");
    $this->assertIsInt($returnedRole->getId(), $message = "testAddRole, test 11");
    $this->assertIsString($returnedRole->getName(), $message = "testAddRole, test 12");
    $this->assertIsInt($returnedRole->getAccessLevel(), $message = "testAddRole, test 13");
    $this->assertEquals(10 ,$returnedRole->getId(), $message = "testAddRole, test 14");
    $this->assertEquals("toor", $returnedRole->getName(), $message = "testAddRole, test 15");
    $this->assertEquals(8, $returnedRole->getAccessLevel(), $message = "testAddRole, test 16");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(10, "root", 9);
    $returnedRole = $DAO->modfiyRole($role);

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
    // Test with null object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, null, null);
    $returnedRole = $DAO->deleteRole($role);

    $this->assertFalse($returnedRole, $message = "testDeleteRole, test 1");

    // Test with template object and null id.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(null, "root", 9);
    $returnedRole = $DAO->deleteRole($role);

    $this->assertFalse($returnedRole, $message = "testDeleteRole, test 2");

    // Test with complete template object.
    $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $DAO = new roleDAO($conn, "role");
    $role = new roleDTO(10, "root", 9);
    $returnedRole = $DAO->deleteRole($role);

    $this->assertTrue($returnedRole, $message = "testDeleteRole, test 3");
  }
}

?>
