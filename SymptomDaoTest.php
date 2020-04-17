<?php

include("symptomDao.php");

class SymptomDaoTest extends PHPUnit\Framework\TestCase
{
    public function test__construct()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");
    }

    public function testFindById()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");

        $id = null;
        $rSymptom = $DAO->findById($id);
        $this->assertNull($rSymptom, $message = "testFindById, test 1");

        $id = 1;
        $rSymptom = $DAO->findById($id);
        $this->assertIsInt($rSymptom->getId(), $message = "testFindById, test 2");
        $this->assertIsString($rSymptom->getName(), $message = "testFindById, test 3");
        $this->assertEquals(1, $rSymptom->getId(), $message = "testFindById, test 4");
        $this->assertEquals("severe pain", $rSymptom->getName(), $message = "testFindById, test 5");
        $this->assertNotEquals(2, $rSymptom->getId(), $message = "testFindById, test 6");
        $this->assertNotEquals("cough", $rSymptom->getName(), $message = "testFindById, test 7");
    }


    public function testAddSymptom()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");

        $this->assertNotNull($DAO, $message = "testAddSymptom, test 1");

        $newSymptom = new Symptom(null, null);
        $returnedSymptom = $DAO->addSymptom($newSymptom);

        $this->assertNull($returnedSymptom, $message = "testAddSymptom, test 2");

        $newDisease = new Symptom(1, "test");
        $returnedSymptom = $DAO->addSymptom($newDisease);

        $this->assertNull($returnedSymptom, $message = "testAddSymptom, test 3");

        $newDisease = new Symptom(null, "test");
        $returnedSymptom = $DAO->addSymptom($newDisease);

        $this->assertNotNull($returnedSymptom, $message = "testAddSymptom, test 4");
        $this->assertIsInt($returnedSymptom->getId(), $message = "testAddSymptom, test 5");
        $this->assertIsString($returnedSymptom->getName(), $message = "testAddSymptom, test 6");
        $this->assertEquals("test", $returnedSymptom->getName(), $message = "testAddSymptom, test 8");
    }

    public function testFindAllSymptoms()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");
        $symptoms = $DAO->findAllSymptoms();

        $this->assertIsArray($symptoms, $message = "testFindAllSymptoms, test 1");
        $this->assertNotNull($symptoms, $message = "testFindAllSymptoms, test 2");
        $this->assertEquals(46, count($symptoms), $message = "testFindAllSymptoms, test 3");

    }

    public function testFindSymptom()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");

        $symptom = new Symptom(null, null);
        $rSymptom = $DAO->findSymptom($symptom);
        $this->assertNull($rSymptom, $message = "testFindSymptom, test 1");

        $symptom = new Symptom(1, null);
        $rSymptom = $DAO->findSymptom($symptom);
        $this->assertIsInt($rSymptom->getId(), $message = "testFindSymptom, test 2");
        $this->assertIsString($rSymptom->getName(), $message = "testFindSymptom, test 3");
        $this->assertEquals("1 severe pain", $rSymptom->toString(), $message = "testFindSymptom, test 4");

        $symptom = new Symptom(null, "redness");
        $rSymptom = $DAO->findSymptom($symptom);
        $this->assertIsInt($rSymptom->getId(), $message = "testFindSymptom, test 5");
        $this->assertIsString($rSymptom->getName(), $message = "testFindSymptom, test 6");
        $this->assertEquals("redness", $rSymptom->getName(), $message = "testFindSymptom, test 7");
    }

    public function testUpdateSymptom()
    {
        $conn = new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");

        $symptom = new Symptom(null, null);
        $rSymptom = $DAO->updateSymptom($symptom);
        $this->assertNull($rSymptom, $message = "testUpdateSymptom, test 1");

        $symptom = new Symptom(null, "torn acl");
        $newSymptom = $DAO->addSymptom($symptom);
        $this->assertEquals("torn acl", $newSymptom->getName(), $message = "testUpdateSymptom, test 2");

        $updateSymptom = $DAO->findSymptom($newSymptom);
        $updateSymptom->setName("hyperflex");
        $rSymptom = $DAO->updateSymptom($updateSymptom);
        $this->assertNotNull($rSymptom, $message = "testUpdateSymptom, test 3");
        $this->assertEquals("hyperflex", $rSymptom->getName(), $message = "testUpdateSymptom, test 4");
        $this->assertEquals($updateSymptom->getId(), $rSymptom->getId(), $message = "testUpdateSymptom, test 5");
    }
}
