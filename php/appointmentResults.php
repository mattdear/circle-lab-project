<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Appointment Results", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    /*$searchName = htmlentities($_GET["name"]);
    $searchDate = $_GET["date"];*/
    $user = $_GET["userId"];
    $appointments = $service->findAllAppointments();
    ?>
    <h1>Appointment Results</h1>
    <div class="searchResults">
        <?php
        foreach ($appointments as $app) {
            if ($app->getStaffMember() == $user or $app->getPatient()== $user){
                $patient = $service->findPersonById($app->getPatient());
                $doctor = $service->findPersonById($app->getStaffMember());
            ?>
            <div class="searchResult">
                <div class="searchDetails">
                    <p>Date: <?= $app->getDateTime() ?></p>
                    <p>Patient: <?=$patient->getFirstName()?> <?=$patient->getLastName()?></p>
                    <p>Doctor: <?=$doctor->getFirstName()?> <?=$doctor->getLastName()?></p>
                    <p>Duration: <?=$app->getDuration()?> minutes</p>
                    <p>Description: <?=$app->getDescription()?></p>
                </div>
                <div class="searchButtons">
                    <?php
                    if ($_SESSION["access"] > 7) {
                        ?>
                        <!--<form method="get" action="modifyAppointment.php">
                            <input type="hidden" name="id">
                            <button type="submit" class="modDelButton">Modify Appointment</button>
                        </form>-->
                        <form method="post" action="cancelAppointment.php">
                            <input type="hidden" name="id">
                            <button type="submit" class="modDelButton">Cancel Appointment</button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <form method="post" action="cancelAppointment.php">
                            <input type="hidden" name="id">
                            <button type="submit" class="modDelButtonPatient">Cancel Appointment</button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
            }
        }
        ?>
    </div>

    <button onclick="window.location.href = 'appointments.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();
}