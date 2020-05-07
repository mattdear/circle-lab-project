<?php
session_start();
include("../OOP/WebPage.php");
include("../service/serviceFacade.php");
include("mFunctions.php");

if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $service = new serviceFacade();

    $id = htmlentities($_POST["id"]);
    $service = new serviceFacade();
    $modifyApp = $service->findAppointmentById($id);
    $modifyApp->setIsactive(0);
    if ($service->modifyAppointment($modifyApp)) {
        popUpErrorBack("Appointment Cancelled", "php/appointments.php");
    } else {
        popUpErrorBack("Appointment Not Cancelled", "php/appointments.php");
    }
}
