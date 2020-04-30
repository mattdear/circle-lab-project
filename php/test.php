<?php
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");

$webPage = new WebPage("Test", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();

$service = new serviceFacade();

$patientId = 2;
$date = "23/04/2020";
$drug = 3;
$quantity = 10;
$location = 11;

$drugs = $service->findAllDrugs();
$name = $drugs[1]->getName();
$person = $service->findPersonById(1);
$fullName = strtolower($person->getFirstName()) . " " . strtolower($person->getLastName());
$prescription = new prescriptionDTO(null, $patientId, $date, $quantity, $location, 1);

$links = $service->findDrugPrescriptionLinkByPrescriptionId(9);

$d = 01;
$m = 04;
$y = 1995;
$time = "".$y."-".$m."-".$d;

$date = date_create($time);
$formattedDate = date_format($date,"Y/m/d");

$app = $service->findAppointmentById(2);
?>
    <div>
        <h1>Test Page</h1>
        <p>Get Drug Name<?=$name?></p>

        <p>Get First Name From Find<?=$person->getFirstName()?></p>
        <p>Full name Display <?=$fullName?></p>

        <p>ID <?=$prescription->getId()?></p>
        <p>Patient <?=$prescription->getPatient()?></p>
        <p>Date <?=$prescription->getDate()?></p>
        <p>Quantity <?=$prescription->getQuantity()?></p>
        <p>Location <?=$prescription->getLocation()?></p>
        <?php
        foreach ($links as $link){
            $drugId = $link->getDrug();
            $drug = $service->findDrugById($drugId);
            echo"<p>Drug: ".$drug->getName()."</p>";
        }
        ?>

        <p> Time: <?=$formattedDate?></p>

        <p>App: <?=$app->getIsactive()?></p>
    </div>
<?php

$webPage->writeFooter();
$webPage->close();



