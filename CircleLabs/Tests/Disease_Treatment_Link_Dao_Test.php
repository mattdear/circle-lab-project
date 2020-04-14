<?php

include("../DAO/Disease_Treatment_Link_Dao.php");
use PHPUnit\Framework\TestCase;

class Disease_Treatment_Link_Dao_Test extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new Disease_Treatment_Link_Dao($conn, "disease_treatment_link");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");
    }

    public function testInsert()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new Disease_Treatment_Link_Dao($conn, "disease_treatment_link");

        // Test with complete template object.
        $link = 
        $people = $DAO->findAllPeople();
        $DAO->insertPerson($person);
        $newPeople = $DAO->findAllPeople();
        $this->assertEquals(sizeof($newPeople), sizeof($people) + 1, $message = "testAddPerson, test 2");

    }

    public function testUpdate()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "Person");

        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $newPerson = $DAO->insertPerson($person);
        $newPerson->setAddress("Updated Address Test");
        $DAO->updatePerson($newPerson);

        $this->assertEquals("Updated Address Test", $DAO->findPersonById($newPerson->getId())->getAddress(), $message = "testUpdatePerson, test 1");
    }

    public function testFindByTreatmentId()
    {
        // Test with null object.
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "Person");
        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $DAO->insertPerson($person);
        $people = $DAO->findByRole("Nurse");
        foreach ($people as $foundPerson){
            $this->assertEquals("Nurse", $foundPerson->getRole(), $message = "testFindByRole , test 1");
        }
    }

    public function testFindByDiseaseId()
    {
        // Test with null object.
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new PersonDao($conn, "Person");
        $person = new personDto(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , "Test_Address", "Nurse", "Test_Username", "Test_Password");
        $person = $DAO->insertPerson($person);
        $people = $DAO->findPersonById($person->getId());
        foreach ($people as $foundPerson){
            $this->assertEquals($person->getId() , $foundPerson->getId(), $message = "testFindById , test 1");
        }
    }

    public function testDelete(){

    }
}

?>