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
    $dateIn = date("Y-m-d", $time);
    $drug1 = htmlentities($_POST["drug1"]);
    $drug2 = htmlentities($_POST["drug2"]);
    $drug3 = htmlentities($_POST["drug3"]);
    $quantity = htmlentities($_POST["quantity"]);
    $location = htmlentities($_POST["location"]);

    $patient = $service->findPersonById($patientId);
    if ($drug1 == 0 or $quantity == null or $location == 0) {
        popUpErrorBack("Invalid Prescription added", "php/people.php");
    } else {
        $prescription = new prescriptionDTO(null, $patientId, $dateIn, $quantity, $location, 1);
        $addedPrescription = $service->addPrescription($prescription);

        /*$service->addDrugToPrescription($drug, $addedPrescription->getId())*/
        ?>
        <h1>Added Prescription</h1>
        <p>Patient Name: <?= $patient->getFirstName() ?> <?= $patient->getLastName() ?></p>
        <p>Date: <?= $date ?></p>
        <?php
        if ($drug1 != 0) {
            $link = new drugPrescriptionLinkDTO($drug1, $addedPrescription->getId());
            $service->addDrugPrescriptionLinkDTO($link);
            $drugName = $service->findDrugById($drug1)->getName();
            echo "<p>Drug 1: " . $drugName . "</p>";
        }
        if ($drug2 != 0) {
            $link = new drugPrescriptionLinkDTO($drug2, $addedPrescription->getId());
            $service->addDrugPrescriptionLinkDTO($link);
            $drugName = $service->findDrugById($drug2)->getName();
            echo "<p>Drug 2: " . $drugName . "</p>";
        }
        if ($drug3 != 0) {
            $link = new drugPrescriptionLinkDTO($drug3, $addedPrescription->getId());
            $service->addDrugPrescriptionLinkDTO($link);
            $drugName = $service->findDrugById($drug3)->getName();
            echo "<p>Drug 3: " . $drugName . "</p>";
        }
        ?>
        <p>Quantity: <?= $quantity ?></p>
        <?php
        $location = $service->findLocationById($location)
        ?>
        <p>Location: <?= $location->getAddressLine() ?></p>
        <?php
    }
    ?>
    <button onclick="window.location.href = 'people.php';">People</button>
    <br/>
    <button onclick="window.location.href = 'prescriptions.php';">Prescriptions</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
}
$webPage->writeFooter();
$webPage->close();
