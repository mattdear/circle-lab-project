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
    $modifyLocation = $service->findLocationById($id);
    $modifyLocation->setIsactive(0);
    if ($service->modifyLocation($modifyLocation)) {
        popUpErrorBack("Location Deactivated " .$modifyLocation->getAddressLine(), "php/locations.php");
    } else {
        popUpErrorBack("Location Not Deactivated ".$modifyLocation->getAddressLine(), "php/locations.php");
    }
}
