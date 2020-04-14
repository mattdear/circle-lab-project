<?php

include("../DAO/PersonDao.php");
use PHPUnit\Framework\TestCase;

class PersonDaoTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");
    }

    public function testAddPerson()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");

        // Test with complete template object.
        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $people = $DAO->findAllPeople();
        $DAO->insertPerson($person);
        $newPeople = $DAO->findAllPeople();
        $this->assertEquals(sizeof($newPeople), sizeof($people) + 1, $message = "testAddPerson, test 2");

    }

    public function testUpdatePerson()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");

        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $newPerson = $DAO->insertPerson($person);
        $newPerson->setAddress("Updated Address Test");
        $DAO->updatePerson($newPerson);

        $this->assertEquals("Updated Address Test", $DAO->findPersonById($newPerson->getId())->getAddress(), $message = "testUpdatePerson, test 1");
    }

    public function testFindAll()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");
        $people = $DAO->findAllPeople();

        $this->assertIsArray($people, $message = "testFindAll, test 1");
        $this->assertNotNull($people, $message = "testFindAll, test 2");

    }

    public function testFindMatchingPeople()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");

        // Test with complete template object.
        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $DAO->insertPerson($person);
        $personTemplate = new PersonDto(null, null, null, null, null, "Test@test.com", null, null, null, null, null);
        $matchingPeople = $DAO->findMatchingPeople($personTemplate);
        $matchingPerson = $matchingPeople[0];
        $this->assertEquals($personTemplate->getEmail(), $matchingPerson->getEmail(),   $message = "testFindMatchingPeople , test 1");
    }

    public function testFindByRole()
    {
        // Test with null object.
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");
        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $DAO->insertPerson($person);
        $people = $DAO->findByRole("Nurse");
        foreach ($people as $foundPerson){
            $this->assertEquals("Nurse", $foundPerson->getRole(), $message = "testFindByRole , test 1");
        }
    }

    public function testFindById()
    {
        // Test with null object.
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "person");
        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $person = $DAO->insertPerson($person);
        $people = $DAO->findPersonById($person->getId());
        foreach ($people as $foundPerson){
            $this->assertEquals($person->getId() , $foundPerson->getId(), $message = "testFindById , test 1");
        }
    }
}

?>