<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Prescription", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $patientId = htmlentities($_POST["patient"]);
    $date = htmlentities($_POST["date"]);
    $drug = htmlentities($_POST["drug"]);
    $quantity = htmlentities($_POST["quantity"]);
    $location = htmlentities($_POST["location"]);

    $patientName = $patientId;
    ?>
    <h1>Added Prescription</h1>
    <p>Patient Name <?=$patientName?></p>
    <p>Date <?=$date?></p>
    <p>Drug <?=$drug?></p>
    <p>Quantity <?=$quantity?></p>
    <p>Location <?=$location?></p>
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