<?php
session_start();
include("../OOP/WebPage.php");
include("functions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Person", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $fName = htmlentities($_POST["fName"]);
    $sName = htmlentities($_POST["sName"]);
    $dob = htmlentities($_POST["dob"]);
    $gender = htmlentities($_POST["gender"]);
    $email = htmlentities($_POST["email"]);
    $phone = htmlentities($_POST["phone"]);
    $role = htmlentities($_POST["role"]);
    $un = htmlentities($_POST["username"]);
    $pw = htmlentities($_POST["password"]);

    ?>
    <h1>Added Person</h1>
    <p>Name <?=$fName?> <?=$sName?></p>
    <p>Date of Birth <?=$dob?></p>
    <p>Gender <?=$gender?></p>
    <p>Email <?=$email?></p>
    <p>Role <?=$role?></p>
    <p>Username <?=$un?></p>
    <p>Password <?=$pw?></p>
    <button onclick="window.location.href = 'people.php';">People</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}