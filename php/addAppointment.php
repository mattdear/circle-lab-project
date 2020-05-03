<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Appointment", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    $description = htmlentities($_POST["description"]);
    $patient = htmlentities($_POST["patient"]);
    $staff = htmlentities($_POST["staff"]);
    $d = htmlentities($_POST["d"]);
    $m = htmlentities($_POST["m"]);
    $y = htmlentities($_POST["y"]);
    $h = htmlentities($_POST["h"]);
    $min = htmlentities($_POST["min"]);
    $time = "".$y."-".$m."-".$d. " ".$h.":".$min;
    $date = date_create($time);
    $formattedDate = date_format($date,"Y/m/d H:i:s");
    $location = htmlentities($_POST["location"]);
    $duration = htmlentities($_POST["duration"]);
    if ($description != null and $patient != null and $staff != null and $m != null and $location != null and $duration != null) {
        $add = new appointmentDto(null, $description, $patient, $staff, $formattedDate, $location, $duration, 1);

        $added = $service->addAppointment($add)
        ?>
        <h1>Added Appointment</h1>
        <p>Id <?= $added->getId() ?></p>
        <p>Description <?= $added->getDescription()?></p>
        <p>Date <?= $added->getDateTime() ?></p>
        <button onclick="window.location.href = 'appointments.php';">Appointments</button>
        <br/>
        <button onclick="window.location.href = 'homepage.php';">Homepage</button>
        <br/>
        <?php
    } else {
        popUpErrorBack("Appointment Not added", "php/appointments.php");
    }
    $webPage->writeFooter();
    $webPage->close();
}