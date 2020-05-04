<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} elseif ($_SESSION["access"] < 6) {
    popUpErrorBack("Access Denied.", "php/homepage.php");
} else {
    $webPage = new WebPage("Add Location", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();
    ?>
    <h1>Add Person</h1>
    <form method="post" action="addLocation.php">
        <div class="row">
            <div class="col-25">
                <label>First Line of Address</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="address" placeholder="First Line of Address">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>City</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="city" placeholder="City">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Postcode</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="postcode" placeholder="Postcode">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Location Type</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="type">
                    <option value="Home">Home</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Surgery">Surgery</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Research Lab">Research Lab</option>
                </select>
            </div>
        </div>
        <button type="submit">Add</button>
    </form>

    <button onclick="window.location.href = 'locations.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
