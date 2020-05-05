<?php
include("../service/serviceFacade.php");
include("mFunctions.php");
$id = htmlentities($_POST["id"]);
$fName = htmlentities($_POST["fName"]);
$sName = htmlentities($_POST["sName"]);
$dob = htmlentities($_POST["dob"]);
$gender = htmlentities($_POST["gender"]);
$email = htmlentities($_POST["email"]);
$phone = htmlentities($_POST["phone"]);
$role = htmlentities($_POST["role"]);

$service = new serviceFacade();
$modifyPerson = $service->findPersonById($id);
$modifyPerson->setFirstName($fName);
$modifyPerson->setLastName($sName);
$modifyPerson->setDob($dob);
$modifyPerson->setGender($gender);
$modifyPerson->setEmail($email);
$modifyPerson->setPhone($phone);

if ($service->modifyPerson($modifyPerson)){
    popUpErrorBack("Person Details Modified", "php/homepage.php");
} else{
    popUpErrorBack("Person Details Not Modified", "php/homepage.php");
}

