<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Report Requests", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    ?>
    <h1>Report Requests</h1>
    <div class="searchResults">
        <div class="searchResult">
            <div class="searchDetails">
                <p>Name: </p>
                <p>Date of Birth:</p>
                <p>Telephone:</p>
                <p>Email:</p>
            </div>
            <div class="searchButtons">
                <form method="post" action="acceptRequest.php">
                    <button type="submit" class="modDelButton">Accept</button>
                </form>
                <form method="post" action="declineRequest.php">
                    <button type="submit" class="modDelButton">Decline</button>
                </form>
            </div>
        </div>
    </div>

    <button onclick="window.location.href = 'reports.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();
}
