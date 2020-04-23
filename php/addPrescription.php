<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Prescription", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();
    $patientId = htmlentities($_POST["patient"]);
    $date = htmlentities($_POST["date"]);
    $time = strtotime($date);
    $dateIn = date("Y-m-d",$time);
    $drug = htmlentities($_POST["drug"]);
    $quantity = htmlentities($_POST["quantity"]);
    $location = htmlentities($_POST["location"]);

    $patient = $service->findPersonById($patientId);

    $prescription = new prescriptionDTO(null, $patientId, $dateIn, $quantity, $location, 1);
    $addedPrescription = $service->addPrescription($prescription);
    if ($service->addDrugToPrescription($drug, $addedPrescription->getId())){
        echo "<p> add to linking worked</p>";
    }
    ?>
    <h1>Added Prescription</h1>
    <p>Patient Name <?=$patient->getFirstName()?> <?=$patient->getLastName()?></p>
    <p>Date <?=$date?></p>
    <p>Drug <?=$drug?></p>
    <p>Quantity <?=$quantity?></p>
    <p>Location 10 London Road</p>
    <button onclick="window.location.href = 'people.php';">People</button>
    <br/>
    <button onclick="window.location.href = 'prescriptions.php';">Prescriptions</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}