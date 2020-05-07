<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"]) and $_SESSION["access"] < 6) {
    popUpError("Your not logged in! Please log in and try again.");
} elseif ($_SESSION["access"] < 6) {
    popUpErrorBack("Access Denied.", "php/homepage.php");
} else {
    $webPage = new WebPage("Prescription Results", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();
    /*$people = $service->findAllPeople();
    $searchName = strtolower(htmlentities($_GET["name"]));
    if ($searchName == strtolower($person->getFirstName()) or $searchName == strtolower($person->getLastName()) or $searchName == $fullName) {

    }

    $person = $service->findPersonById(1);
*/
    $searchName = strtolower(htmlentities($_GET["name"]));
    $prescriptions = $service->findAllPrescriptions();
    $count = 0;
    ?>
    <h1>Prescription Results</h1>
    <div class="searchResults">
        <?php
        foreach ($prescriptions as $prescription) {
            $person = $service->findPersonById($prescription->getPatient());
            $fullName = strtolower($person->getFirstName()) . " " . strtolower($person->getLastName());
            if ($searchName == strtolower($person->getFirstName()) or $searchName == strtolower($person->getLastName()) or $searchName == $fullName) {
                $date = $prescription->getDate();
                $fullName = $person->getFirstName() . " " . $person->getLastName();
                $links = $service->findDrugPrescriptionLinkByPrescriptionId($prescription->getId());
                if ($prescription->getIsActive() == 1) {
                    ?>
                    <div class="searchResult">
                        <div class="searchDetails">
                            <p>Patient Name: <?= $fullName ?></p>
                            <p>Date: <?= $date->format("d-m-Y") ?></p>
                            <?php
                            $i = 1;
                            foreach ($links as $link) {
                                $drugId = $link->getDrug();
                                $drug = $service->findDrugById($drugId);
                                echo "<p>Drug " . $i . ": " . $drug->getName() . "</p>";
                                $i++;
                            }
                            ?>
                            <p>Quantity: <?= $prescription->getQuantity() ?></p>
                            <p>Location: 10 London Road</p>
                        </div>
                        <div class="searchButtons">
                            <form method="post" action="deletePrescription.php">
                                <input type="hidden" name="id" value="<?= $prescription->getId() ?>">
                                <button type="submit" class="modDelButton">Delete</button>
                            </form>
                        </div>
                    </div>
                    <?php
                    $count = 1;
                }
            }
        }
        if ($count == 0) {
            echo "<p>No Results Found</p>";
        }
        ?>
    </div>

    <button onclick="window.location.href = 'prescriptions.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();
}
