<?php

include("symptomDao.php");

class SymptomDaoTest extends PHPUnit\Framework\TestCase
{
    public function test__construct()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new SymptomDao($conn, "symptom");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");
    }

    public function testFindById()
    {

    }


    public function testAddSymptom()
    {

    }

    public function testFindAllSymptoms()
    {

    }

    public function testFindSymptom()
    {

    }

    public function testUpdateSymptom()
    {

    }
}
