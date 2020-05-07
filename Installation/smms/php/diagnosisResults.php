<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Diagnosis Results", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    $searchName = strtolower(htmlentities($_GET["symptom"]));

    $symptoms = $service->findAllSymptoms();

    foreach ($symptoms as $symptom) {
        if ($searchName == strtolower($symptom->getName())) {
            $matchingSymptom = $symptom;
        }
    }

    $diseases = $service->findDiseaseSymptomLinkBySymptomId($matchingSymptom->getId());

    ?>
    <h1>Disease Results</h1>
    <div class="searchResults">
    <?php
    foreach ($diseases as $d) {
        $disease = $service->findDiseaseById($d->getDisease());
        $matchingTreatments = $service->findDiseaseTreatmentLinkByDiseaseId($d->getDisease());
        ?>
    <div class="searchResult">
    <div class="searchDetails">
        <p>Disease: <?= ucfirst($disease->getName()) ?></p>
        <?php
        if ($_SESSION["access"] > 7) {
            echo "<p>Possible Treatments:</p>";
            foreach ($matchingTreatments as $t) {
                $treatment = $service->findTreatmentById($t->getTreatment());
                echo "<p>" . ucfirst($treatment->getName()) . "</p>";
            }
        }
        ?>
    </div>
    </div>
    <?php
    }
    ?>
    </div>
    <button onclick="window.location.href = 'diagnosis.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();

}
