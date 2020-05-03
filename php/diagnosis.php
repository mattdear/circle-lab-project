<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Diagnosis", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    ?>
    <h1>Diagnosis</h1>
    <form method="get" action="diagnosisResults.php">
        <label>
            <input class="inputs" name="symptom" placeholder="Search Symptoms"><br/>
        </label>
        <button type="submit">Search</button>
    </form>
    <?php
/*    if ($_SESSION["access"] > 8) {
        */?><!--
        <button onclick="window.location.href = 'addDiagnosisInput.php';">Add Disease</button>
        <br/>
        --><?php
/*    }
    */?>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
