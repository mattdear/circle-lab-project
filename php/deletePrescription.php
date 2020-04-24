<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Delete Prescription", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();
    $prescriptionId = htmlentities($_POST["id"]);

    if (empty($prescriptionId)) {
        popUpErrorBack("Invalid delete", "php/prescriptions.php");
    } else {
        $prescription = $service->findPrescriptionById($prescriptionId);
        if ($service->deletePrescription($prescription)) {
            ?>
            <h1>Delete prescription</h1>
            <p>Prescription Deleted </p>
            <button onclick="window.location.href = 'people.php';">People</button>
            <br/>
            <button onclick="window.location.href = 'prescriptions.php';">Prescriptions</button>
            <br/>
            <button onclick="window.location.href = 'homepage.php';">Homepage</button>
            <br/>
            <?php
        } else {
            echo "<p>Prescription Not deleted</p>";
        }
    }
}
$webPage->writeFooter();
$webPage->close();
