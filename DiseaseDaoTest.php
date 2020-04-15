<?php

include("diseaseDAO.php");


class DiseaseDaoTest extends PHPUnit\Framework\TestCase
{
    public function test__construct()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new DiseaseDAO($conn, "disease");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");

    }
    
    public function testAddDisease()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new DiseaseDao($conn, "disease");

        $this->assertNotNull($DAO, $message = "testAddDisease, test 1");

        $newDisease = new Disease(null, null);
        $returnedDisease = $DAO->addDisease($newDisease);

        $this->assertNull($returnedDisease, $message = "testAddDisease, test 2");

        $newDisease = new Disease(1, "test");
        $returnedDisease = $DAO->addDisease($newDisease);

        $this->assertNull($returnedDisease, $message = "testAddDisease, test 3");

        $newDisease = new Disease(null, "test");
        $returnedDisease = $DAO->addDisease($newDisease);

        $this->assertNotNull($returnedDisease, $message = "testAddDisease, test 4");
        $this->assertIsInt($returnedDisease->getId(), $message = "testAddDisease, test 5");
        $this->assertIsString($returnedDisease->getName(), $message = "testAddDisease, test 6");
        $this->assertEquals(9, $returnedDisease->getId(), $message = "testAddDisease, test 7");
        $this->assertEquals("test", $returnedDisease->getName(), $message = "testAddDisease, test 7");
    }

    public function testUpdateDisease()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new DiseaseDao($conn, "disease");

        $disease = new Disease(null, null);
        $returnedDisease = $DAO->updateDisease($disease);
        $this->assertNull($returnedDisease);

        $disease = new Disease(null, "torn acl");
        $newDisease = $DAO->addDisease($disease);
        $this->assertEquals("torn acl", $newDisease->getName());

        $updateDisease = $DAO->findDisease($newDisease);
        $updateDisease->setName("hyperflex");
        $returnedDisease = $DAO->updateDisease($updateDisease);
        $this->assertNotNull($returnedDisease);
        $this->assertEquals("hyperflex", $returnedDisease->getName());
        $this->assertEquals($updateDisease->getId(), $returnedDisease->getId());
    }

    public function testFindDisease()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new DiseaseDao($conn, "disease");

        $disease = new Disease(null, null);
        $rDisease = $DAO->findDisease($disease);
        $this->assertNull($rDisease);

        $disease = new Disease(1, null);
        $rDisease = $DAO->findDisease($disease);
        $this->assertIsInt($rDisease->getId());
        $this->assertIsString($rDisease->getName());
        $this->assertEquals("1 broken ankle", $rDisease->toString());

        $disease = new Disease(null, "broken leg");
        $rDisease = $DAO->findDisease($disease);
        $this->assertIsInt($rDisease->getId());
        $this->assertIsString($rDisease->getName());
        $this->assertEquals("8 broken leg", $rDisease->toString());

    }

    public function testFindById()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new DiseaseDao($conn, "disease");

        $id = null;
        $rDisease = $DAO->findById($id);
        $this->assertNull($rDisease, $message = "testFindById, test 1");

        $id = 1;
        $rDisease = $DAO->findById($id);
        $this->assertIsInt($rDisease->getId(), $message = "testFindById, test 2");
        $this->assertIsString($rDisease->getName(), $message = "testFindById, test 3");
        $this->assertEquals(1, $rDisease->getId(), $message = "testFindById, test 4");
        $this->assertEquals("broken ankle", $rDisease->getName(), $message = "testFindById, test 5");
        $this->assertNotEquals(2, $rDisease->getId(), $message = "testFindById, test 6");
        $this->assertNotEquals("cough", $rDisease->getName(), $message = "testFindById, test 7");
    }

    public function testFindAllDiseases()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new DiseaseDao($conn, "disease");
        $diseases = $DAO->findAllDiseases();

        $this->assertIsArray($diseases);
        $this->assertNotNull($diseases);
        $this->assertEquals(8, count($diseases));
        $this->assertEquals("1 broken ankle", $diseases[0]->toString());
        $this->assertEquals("2 heel pain", $diseases[1]->toString());
        $this->assertEquals("3 oedema", $diseases[2]->toString());
        $this->assertEquals("4 restless legs syndrome", $diseases[3]->toString());
        $this->assertEquals("5 sprains and strains", $diseases[4]->toString());
        $this->assertEquals("6 varicose eczema", $diseases[5]->toString());
        $this->assertEquals("7 baker's cyst", $diseases[6]->toString());
        $this->assertEquals("8 broken leg", $diseases[7]->toString());
    }
}
