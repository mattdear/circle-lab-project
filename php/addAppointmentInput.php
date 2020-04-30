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

    $people = $service->findAllPeople();
    $patients = [];
    $staff = [];
    foreach ($people as $person) {
        if ($person->getRole() == 5) {
            array_push($patients, $person);
        } elseif ($person->getRole() == 2 or $person->getRole() == 4) {
            array_push($staff, $person);
        }
    }
    ?>
    <h1>Add Appointment</h1>
    <form method="post" action="addAppointment.php">
        <div class="row">
            <div class="col-25">
                <label>Description</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="description" placeholder="Description">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Patient</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="patient">
                    <?php
                    if ($_SESSION["access"] != 0) {
                        foreach ($patients as $member) {
                            echo "<option value=" . $member->getId() . ">" . $member->getFirstName() . " " . $member->getLastName() . "</option>";
                        }
                    } else {
                        $person = $service->findPersonById($_SESSION["userId"]);
                        echo "<option value=" . $person->getId(). ">" . $person->getFirstName() . " " . $person->getLastName() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Doctor/Nurse</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="staff">
                    <?php
                    foreach ($staff as $member) {
                        echo "<option value=" . $member->getId() . ">" . $member->getFirstName() . " " . $member->getLastName() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Date</label>
            </div>
            <div class="col-75">
                <select class="dob" name="d">
                    <option>Day</option>
                    <?php
                    for ($i = 1; $i < 32; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                <select class="dob" name="m">
                    <option>Month</option>
                    <?php
                    for ($i = 1; $i < 13; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                <select class="dob" name="y">
                    <option>Year</option>
                    <?php
                    for ($i = 2020; $i < 2023; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Time</label>
            </div>
            <div class="col-75">
                <select class="dob" name="h">
                    <?php
                    for ($i = 9; $i < 18; $i++) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
                <select class="dob" name="min">
                    <?php
                    for ($i = 0; $i < 46; $i = $i + 15) {
                        echo "<option value=" . $i . ">" . $i . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Location</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="location">
                    <?php
                    $locations = $service->findAllLocations();
                    foreach ($locations as $location) {
                        echo "<option value=" . $location->getId() . ">" . $location->getAddressLine() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Duration</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="duration">
                    <option value="15">15 Minutes</option>
                    <option value="30">30 Minutes</option>
                    <option value="45">45 Minutes</option>
                    <option value="60">60 Minutes</option>
                </select>
            </div>
        </div>
        <button type="submit">Add</button>
    </form>
    <button onclick="window.location.href = 'appointments.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
