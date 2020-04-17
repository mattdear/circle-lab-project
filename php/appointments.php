<?php
include("../OOP/WebPage.php");
include("functions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Appointments", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    ?>
    <h1>Appointments</h1>
    <form method="get" action="appointmentResults.php">
        <label>
            <input class="inputs" name="name" placeholder="Search Name">
        </label>
        <p>OR</p>
        <label>
            <input class="inputs" name="date" placeholder="dd/mm/yyyy" type="date" min='<?= $todayMin ?>'>
        </label>
        <br/>
        <button type="submit">Search</button>
    </form>

    <button onclick="window.location.href = 'addAppointment.php';">Add Appointment</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
