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
    $modifyPerson = $service->findPersonById($id);
    $modifyPerson->setIsactive(0);
    if ($service->modifyPerson($modifyPerson)) {
        popUpErrorBack("Person Deactivated", "php/people.php");
    } else {
        popUpErrorBack("Person Not Deactivated", "php/people.php");
    }
}
