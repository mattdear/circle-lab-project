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




?>
    <div>
        <h1>Test Page</h1>
        <p><?=$name?></p>

        <p><?=$person->getFirstName()?></p>
        <p><?=$person->getPassword()?></p>
        <p><?=$fullName?></p>

        <p>ID <?=$prescription->getId()?></p>
        <p>Patient <?=$prescription->getPatient()?></p>
        <p>Date <?=$prescription->getDate()?></p>
        <p>Quantity <?=$prescription->getQuantity()?></p>
        <p>Location <?=$prescription->getLocation()?></p>
    </div>
<?php

$webPage->writeFooter();
$webPage->close();



