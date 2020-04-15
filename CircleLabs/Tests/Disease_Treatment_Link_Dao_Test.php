<?php

include(__DIR__."\..\DAO\Disease_Treatment_Link_Dao.php");
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

        $links = $DAO->findByDiseaseId(6);
        // Test with complete template object.
        $link = new DT_Link(6,25);
        $DAO->insertDT_Link($link);
        $newLinks = $DAO->findByDiseaseId(6);
        $this->assertEquals(sizeof($newLinks), sizeof($links) + 1, $message = "testInsert, test 1");
        $DAO->removeDT_Link($link);
    }

    public function testUpdate()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new Disease_Treatment_Link_Dao($conn, "disease_treatment_link");


        $link = new DT_Link(6,24);
        $DAO->insertDT_Link($link);
        $link->setDisease(2);
        $oldLink = new DT_Link(6,24);
        $DAO->updateDT_Link($link, $oldLink );
        $links = $DAO->findByDiseaseId(2);
        foreach($links as $foundLink)
        {
            if ($foundLink->getTreatment() == 24){
                $newLink = $foundLink;
            }
        }
        $this->assertEquals($link, $newLink, $message = "testUpdate, test 1");
        $DAO->removeDT_Link($newLink);
    }

    public function testFindByTreatmentId()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new Disease_Treatment_Link_Dao($conn, "disease_treatment_link");

        $link = new DT_Link(6,23);

        $DAO->insertDT_Link($link);
        $links = $DAO->findByTreatmentId(23);

        foreach($links as $foundLink )
        {
            if ($foundLink->getDisease() == 6){
                $newLink = $foundLink;
            }
        }

        $this->assertEquals($link, $newLink, $message = "testFindByTreatmentId, test 1");
        $DAO->removeDT_Link($link);
    }

    public function testFindByDiseaseId()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new Disease_Treatment_Link_Dao($conn, "disease_treatment_link");

       $link = new DT_Link(6,22);

        $DAO->insertDT_Link($link);
        $links = $DAO->findByDiseaseId(6);

        foreach($links as $foundLink )
        {
            if ($foundLink->getTreatment() == 22){
                $newLink = $foundLink;
            }
        }

        $this->assertEquals($link, $newLink, $message = "testFindByDiseaseId, test 1");
        $DAO->removeDT_Link($link);
    }

    public function testDelete(){
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new Disease_Treatment_Link_Dao($conn, "disease_treatment_link");

        $link = new DT_Link(6,21);
        $DAO->insertDT_Link($link);
        $links = $DAO->findByDiseaseId(6);
        $DAO->removeDT_Link($link);
        $newLinks = $DAO->findByDiseaseId(6);
        $this->assertEquals(sizeof($newLinks), sizeof($links) - 1, $message = "testInsert, test 1");

    }
}

?>
