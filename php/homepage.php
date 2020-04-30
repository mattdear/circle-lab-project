<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");

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
        <h1>User ID <?=$_SESSION["userId"]?></h1>
        <h1>access <?=$_SESSION["access"]?></h1>
        <?php if ($_SESSION["access"] > 6) { ?>
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
    <?php } elseif ($_SESSION["access"] == 0) { ?>
        <button onclick="window.location.href = 'diagnosis.php';">Diagnosis</button>
        <br/>
        <button onclick="window.location.href = 'appointments.php';">Appointments</button>
        <br/>
        <button onclick="window.location.href = 'locations.php';">Locations</button>
        <br/>
        <button onclick="window.location.href = 'modifyPersonInput.php';">Update Personal Info</button>
        <br/>
        <button onclick="window.location.href = 'logOff.php';">Log Off</button>
        <br/>
        </div>
        <?php
    }
    $webPage->writeFooter();
    $webPage->close();
}


