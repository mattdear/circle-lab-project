<?php
session_start();
include("../OOP/WebPage.php");
include("functions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Diagnosis", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    ?>
    <h1>Diagnosis</h1>
    <form>
        <label>
            <input class="inputs" name="symptom" placeholder="Search Symptoms">
        </label>
    </form>
    <div id="symptomResults">

    </div>
    <?php
    if ($_SESSION["role"] > 8) {
        ?>
        <button onclick="window.location.href = 'addDiagnosis.php';">Add Diagnosis</button>
        <br/>
        <?php
    }
    ?>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
