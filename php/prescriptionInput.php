<?php
session_start();
include("../OOP/WebPage.php");
include("functions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Prescription", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $patient = null;
    $date = date("d/m/Y");
    ?>
    <h1>Add Prescription</h1>
    <form method="post" action="addPresciption.php">
        <div class="row">
            <div class="col-25">
                <label>Patient</label>
            </div>
            <div class="col-75">
                <p>NAME HERE</p>
                <input type="hidden" value="<?=$patient?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Date</label>
            </div>
            <div class="col-75">
                <p><?=$date?></p>
                <input type="hidden" value="<?=$date?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Drug</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="drug">
                    <option value="0">amoxicillin</option>
                    <option value="1">azithromycin</option>
                    <option value="2">doxycycline</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Quantity</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="quantity" placeholder="Quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Location</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="location">
                    <option value="0">10 London Road</option>
                    <option value="1">11 Rolling Road</option>
                    <option value="2">12 Sandpark Square</option>
                </select>
            </div>
        </div>

        <button type="submit">Add</button>
    </form>

    <button onclick="window.location.href = 'people.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
