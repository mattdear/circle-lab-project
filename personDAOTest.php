<?php

include("personDAO.php");
use PHPUnit\Framework\TestCase;

class personDAOTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");
    }

    public function testAddPerson()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");

        // Test with complete template object.
        $person = new personDTO(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , 2, 1, "Test_Username1", "Test_Password");
        $people = $DAO->findAllPeople();
        $DAO->addPerson($person);
        $newPeople = $DAO->findAllPeople();
        $this->assertEquals(sizeof($newPeople), sizeof($people) + 1, $message = "testAddPerson, test 2");

    }

    public function testUpdatePerson()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");

        $person = new personDTO(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , 2, 1 , "Test_Username2", "Test_Password");
        $newPerson = $DAO->addPerson($person);
        $newPerson->setEmail("Updated email Test");
        $DAO->modifyPerson($newPerson);

        $updatedPerson = $DAO->findPersonById($newPerson->getId());

        $this->assertEquals("Updated email Test", $updatedPerson->getEmail(), $message = "testUpdatePerson, test 1");
    }

    public function testFindAll()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");
        $people = $DAO->findAllPeople();

        $this->assertIsArray($people, $message = "testFindAll, test 1");
        $this->assertNotNull($people, $message = "testFindAll, test 2");

    }

    public function testFindMatchingPeople()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");

        // Test with complete template object.
        $person = new personDTO(null, "bob", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , 2, 1, "Test_Username3", "Test_Password");
        $DAO->addPerson($person);
        $personTemplate = new personDTO(null, "bob" , null , null, null , null,null , null, null, null, null);
        $matchingPeople = $DAO->findMatchingPeople($personTemplate);
        $this->assertNotNull($matchingPeople);
        $this->assertEquals(sizeof($matchingPeople), 1 );
        foreach ($matchingPeople as $matchingPerson) {
          $this->assertNotSame(strpos($matchingPerson->getFirstName(), $personTemplate->getFirstName()), false);
        }

    }

    public function testFindByRole()
    {
        // Test with null object.
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");
        $person = new personDTO(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , 2, 1, "Test_Username4", "Test_Password");
        $DAO->addPerson($person);
        $people = $DAO->findByRole(1);
        $foundPerson = $people[0];
        $this->assertEquals(1, $foundPerson->getRole(), $message = "testFindByRole , test 1");

    }

    public function testFindById()
    {
        // Test with null object.
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new personDAO($conn, "person");
        $person = new personDTO(null, "Test_FirstName", "Test_LastName", 01/01/2020, "Female", "Test@test.com", 0000 , 2 , 1 , "Test_Username5", "Test_Password");
        $person = $DAO->addPerson($person);
        $people = $DAO->findPersonById($person->getId());
        $this->assertEquals($person->getId() , $people->getId(), $message = "testFindById , test 1");

    }
}

?>
