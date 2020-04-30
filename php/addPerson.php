<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");

include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Person", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    $fName = htmlentities($_POST["fName"]);
    $sName = htmlentities($_POST["sName"]);
    $d = htmlentities($_POST["d"]);
    $m = htmlentities($_POST["m"]);
    $y = htmlentities($_POST["y"]);
    $time = "".$d."-".$m."-".$y;
    $date = date_create($time);
    $formattedDate = date_format($date,"Y/m/d");
    $gender = htmlentities($_POST["gender"]);
    $email = htmlentities($_POST["email"]);
    $phone = htmlentities($_POST["phone"]);
    $location = htmlentities($_POST["location"]);
    $role = htmlentities($_POST["role"]);
    $un = htmlentities($_POST["username"]);
    $pw = htmlentities($_POST["password"]);
    if ($fName != null or $sName != null or $dob != null or $gender != null or $email != null or $phone != null or $location != null or $role != null or $un != null or $pw != null) {
        $add = new personDTO(null, $fName, $sName, $formattedDate, $gender, $email, $phone, $location, $role, $un, $pw, 1);


        $added = $service->addPerson($add)
        ?>
        <h1>Added Person</h1>
        <p>Id <?= $added->getId() ?></p>
        <p>Name <?= $added->getFirstName() ?> <?= $added->getLastName() ?></p>
        <p>Date of Birth <?= $added->getDob() ?></p>
        <p>Gender <?= $added->getGender() ?></p>
        <p>Email <?=$added->getEmail() ?></p>
        <p>Location <?= $added->getAddress() ?></p>
        <p>Phone <?= $added->getPhone() ?></p>
        <p>Role <?= $added->getRole() ?></p>
        <button onclick="window.location.href = 'people.php';">People</button>
        <br/>
        <button onclick="window.location.href = 'homepage.php';">Homepage</button>
        <br/>
        <?php
    } else {
        echo "<p>Person not added</p>";
    }
    $webPage->writeFooter();
    $webPage->close();
}