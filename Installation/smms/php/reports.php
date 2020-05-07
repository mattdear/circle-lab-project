<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} elseif ($_SESSION["access"] != 100) {
    popUpErrorBack("Access Denied.", "php/homepage.php");
} else {
    $webPage = new WebPage("Reports", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    ?>
    <h1>Reports</h1>
    <form method="get" action="AddReportRequest.php">
        <button type="submit">Add Report Requests</button>
    </form>
    <button onclick="window.location.href = 'reportRequests.php';">Report Requests</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
