<?php
session_start();
include("../OOP/WebPage.php");
include("functions.php");

if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Homepage", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    ?>
    <div>
    <h1>Homepage</h1>
    <!--Only for prototype-->
    <p>Access : <?= $_SESSION["role"] ?></p>
    <!--Only for prototype-->
    <?php if ($_SESSION["role"] > 8) { ?>
        <button onclick="window.location.href = 'diagnosis.php';">Diagnosis</button>
        <br/>
        <button onclick="window.location.href = 'people.php';">People</button>
        <br/>
        <button onclick="window.location.href = 'appointments.php';">Appointments</button>
        <br/>
        <button onclick="window.location.href = 'locations.php';">Locations</button>
        <br/>
        <button onclick="window.location.href = 'prescriptions.php';">Prescriptions</button>
        <br/>
        <button onclick="window.location.href = 'reports.php';">Reports</button>
        <br/>
        <button onclick="window.location.href = 'logOff.php';">Log Off</button>
        <br/>
    <?php } elseif ($_SESSION["role"] == 0) { ?>
        <button onclick="window.location.href = 'diagnosis.php';">Diagnosis</button>
        <br/>
        <button onclick="window.location.href = 'appointments.php';">Appointments</button>
        <br/>
        <button onclick="window.location.href = 'locations.php';">Locations</button>
        <br/>
        <button onclick="window.location.href = 'modifyPerson.php';">Update Personal Info</button>
        <br/>
        <button onclick="window.location.href = 'logOff.php';">Log Off</button>
        <br/>
        </div>
        <?php
    }
    $webPage->writeFooter();
    $webPage->close();
}


