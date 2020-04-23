<?php

include("diseaseTreatmentLinkDAO.php");
use PHPUnit\Framework\TestCase;

class diseaseTreatmentLinkDAOTest extends PHPUnit\Framework\TestCase
{
    public function testConstruct()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new diseaseTreatmentLinkDAO($conn, "disease_treatment_link");

        $this->assertNotNull($DAO, $message = "testConstruct, test 1");
    }

    public function testInsert()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new diseaseTreatmentLinkDAO($conn, "disease_treatment_link");

        $links = $DAO->findByDiseaseId(6);
        // Test with compleZte template object.
        $link = new diseasePersonLinkDTO(6,25);
        $DAO->insertDiseaseTreatmentLinkDTO($link);
        $newLinks = $DAO->findByDiseaseId(6);
        $this->assertEquals(sizeof($newLinks), sizeof($links) + 1, $message = "testInsert, test 1");
        $DAO->removeDiseaseTreatmentLinkDTO($link);
    }

    public function testUpdate()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new diseaseTreatmentLinkDAO($conn, "disease_treatment_link");


        $link = new diseasePersonLinkDTO(6,24);
        $DAO->insertDiseaseTreatmentLinkDTO($link);
        $link->setDisease(2);
        $oldLink = new diseasePersonLinkDTO(6,24);
        $DAO->updateDiseaseTreatmentLinkDTO($link, $oldLink );
        $links = $DAO->findByDiseaseId(2);
        foreach($links as $foundLink)
        {
            if ($foundLink->getTreatment() == 24){
                $newLink = $foundLink;
            }
        }
        $this->assertEquals($link, $newLink, $message = "testUpdate, test 1");
        $DAO->removeDiseaseTreatmentLinkDTO($newLink);
    }

    public function testFindByTreatmentId()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new diseaseTreatmentLinkDAO($conn, "disease_treatment_link");

        $link = new diseasePersonLinkDTO(6,23);

        $DAO->insertDiseasePersonLinkDTO($link);
        $links = $DAO->findByTreatmentId(23);

        foreach($links as $foundLink )
        {
            if ($foundLink->getDisease() == 6){
                $newLink = $foundLink;
            }
        }

        $this->assertEquals($link, $newLink, $message = "testFindByTreatmentId, test 1");
        $DAO->removeDiseaseTreatmentLinkDTO($link);
    }

    public function testFindByDiseaseId()
    {
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new diseaseTreatmentLinkDAO($conn, "disease_treatment_link");

       $link = new diseasePersonLinkDTO(6,22);

        $DAO->insertDiseaseTreatmentLinkDTO($link);
        $links = $DAO->findByDiseaseId(6);

        foreach($links as $foundLink )
        {
            if ($foundLink->getTreatment() == 22){
                $newLink = $foundLink;
            }
        }

        $this->assertEquals($link, $newLink, $message = "testFindByDiseaseId, test 1");
        $DAO->removeDiseaseTreatmentLinkDTO($link);
    }

    public function testDelete(){
        $conn = new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DAO = new diseaseTreatmentLinkDAO($conn, "disease_treatment_link");

        $link = new diseasePersonLinkDTO(6,21);
        $DAO->insertDiseaseTreatmentLinkDTO($link);
        $links = $DAO->findByDiseaseId(6);
        $DAO->removeDiseaseTreatmentLinkDTO($link);
        $newLinks = $DAO->findByDiseaseId(6);
        $this->assertEquals(sizeof($newLinks), sizeof($links) - 1, $message = "testInsert, test 1");

    }
}

?>
