<?php
session_start();
include("../OOP/WebPage.php");
include("functions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Appointment Results", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $searchName = htmlentities($_GET["name"]);
    $searchDate = htmlentities($_GET["date"]);
    if ($searchDate != null) {
        $searchDate = date("d/m/Y", strtotime($searchDate));
    }
    ?>
    <h1>Appointment Results</h1>
    <div class="searchResults">
        <div class="searchResult">
            <div class="searchDetails">
                <p>Date: <?= $searchDate ?></p>
                <p>Patient: <?= $searchName ?></p>
                <p>Doctor:</p>
                <p>Duration:</p>
                <p>Description:</p>
            </div>
            <div class="searchButtons">
                <form method="get" action="modifyAppointment.php">
                    <input type="hidden" name="id">
                    <button type="submit" class="modDelButton">Modify</button>
                </form>
                <form method="post" action="deleteAppointment.php">
                    <input type="hidden" name="id">
                    <button type="submit" class="modDelButton">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <button onclick="window.location.href = 'appointments.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();
}