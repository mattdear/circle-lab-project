<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $todayMin = date("d/m/Y");
    $webPage = new WebPage("Appointments", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();
    if ($_SESSION["role"] > 6) {
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
        <?php
        if ($_SESSION["role"] == 9) {
            ?>
            <form method="get" action="appointmentResults.php">
                <input type="hidden" name="doctorId">
                <br/>
                <button type="submit">See All My Appointments</button>
            </form>
            <?php
        }
        ?>
    <?php } elseif ($_SESSION["role"] == 0) {
        ?>
        <h1>Appointments</h1>
        <form method="get" action="appointmentResults.php">
            <label>
                <input class="inputs" name="date" placeholder="dd/mm/yyyy" type="date" min='<?= $todayMin ?>'>
            </label>
            <br/>
            <button type="submit">Search</button>
        </form>
        <form method="get" action="appointmentResults.php">
            <input name="personId" type="hidden" value="">
            <input name="name" type="hidden" value="">
            <input name="date" type="hidden" value="">
            <br/>
            <button type="submit">See All My Appointments</button>
        </form>
        <?php
    } ?>

    <button onclick="window.location.href = 'addAppointment.php';">Add Appointment</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
