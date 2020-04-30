<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");

include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Person", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    $address = htmlentities($_POST["address"]);
    $city = htmlentities($_POST["city"]);
    $postcode = htmlentities($_POST["postcode"]);
    $type = htmlentities($_POST["type"]);
    if ($address != null or $city != null or $postcode != null or $type != null) {
        $add = new locationDTO(null, $address, $city, $postcode, $type, 1);

        $added = $service->addLocation($add);
        ?>
        <h1>Location Added</h1>
        <p>Id <?= $added->getId() ?></p>
        <p>Name <?= $added->getAddressLine() ?></p>
        <p>Date of Birth <?= $added->getCity() ?></p>
        <p>Gender <?= $added->getPostcode() ?></p>
        <p>Email <?=$added->getType() ?></p>
        <button onclick="window.location.href = 'locations.php';">Locations</button>
        <br/>
        <button onclick="window.location.href = 'homepage.php';">Homepage</button>
        <br/>
        <?php
    } else {
        popUpErrorBack("Person Not added", "php/people.php");
    }
    $webPage->writeFooter();
    $webPage->close();
}