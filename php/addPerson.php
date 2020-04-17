<?php
include("../OOP/WebPage.php");
include("functions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Person", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    ?>
    <h1>Added Person</h1>
    <p>Name</p>
    <p>Date of Birth</p>
    <p>Gender</p>
    <p>Email</p>
    <p>Role</p>
    <p>Username</p>
    <p>Password</p>
    <?php
}