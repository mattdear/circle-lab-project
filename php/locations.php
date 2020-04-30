<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Locations", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    ?>
    <h1>Locations</h1>
    <form method="get" action="locationResults.php">
        <label>
            <input class="inputs" name="locationName" placeholder="Search Postcode">
        </label>
        <br/>
        <button type="submit">Search</button>
    </form>

    <button onclick="window.location.href = 'addLocationInput.php';">Add Location</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}