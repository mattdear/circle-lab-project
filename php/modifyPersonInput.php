<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Modify Person", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    if ($_SESSION["access"] == 0) {
        $modifyId = $_SESSION["userId"];
    } else {
        $modifyId = htmlentities($_POST["id"]);
    }

    $service = new serviceFacade();
    $person = $service->findPersonById($modifyId);

    if ($_SESSION["access"] >= 0) {
        ?>
        <h1>Modify Person</h1>
        <form method="post" action="modifyPerson.php">
            <div class="row">
                <div class="col-25">
                    <label>First Name</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="fName" value="<?= $person->getFirstName() ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Second Name</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="sName" value="<?= $person->getLastName() ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Date of Birth</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="dob" value="<?= $person->getDob() ?>" type="date">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Gender</label>
                </div>
                <div class="col-75">
                    <select class="inputs, select" name="gender">
                        <?php
                        if ($person->getGender() == 0) {
                            echo "<option  selected value=\"0\">Male</option>";
                            echo "<option value=\"1\">Female</option>";
                            echo "<option value=\"2\">Other</option>";
                        } else if ($person->getGender() == 1) {
                            echo "<option value=\"0\">Male</option>";
                            echo "<option selected value=\"1\">Female</option>";
                            echo "<option value=\"2\">Other</option>";
                        } else {
                            echo "<option value=\"0\">Male</option>";
                            echo "<option value=\"1\">Female</option>";
                            echo "<option selected value=\"2\">Other</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Email</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="email" value="<?= $person->getEmail() ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Phone</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="phone" value="<?= $person->getPhone() ?>">
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $modifyId ?>">
            <input type="hidden" name="id" value="<?= $modifyId ?>">
            <button type="submit">Save</button>
        </form>

        <button onclick="window.location.href = 'homepage.php';">Homepage</button>
        <br/>
        <?php

        $webPage->writeFooter();
        $webPage->close();
    }
}
