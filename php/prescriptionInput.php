<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Add Prescription", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    $patientId = htmlentities($_POST["id"]);
    $patient = $service->findPersonById($patientId);
    $date = date("d-m-Y");


    ?>
    <h1>Add Prescription</h1>
    <form method="post" action="addPrescription.php">
        <div class="row">
            <div class="col-25">
                <label>Patient</label>
            </div>
            <div class="col-75">
                <p><?=$patient->getFirstName()?> <?=$patient->getLastName()?></p>
                <input type="hidden" name="patient" value="<?= $patientId ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Date</label>
            </div>
            <div class="col-75">
                <p><?=$date?></p>
                <input type="hidden" name="date" value="<?= $date ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Drug 1</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="drug1" required>
                    <option>Please Select Drug</option>
                    <?php
                    $drugs = $service->findAllDrugs();
                    foreach ($drugs as $drug) {
                        $name = $drug->getName();
                        $id = $drug->getId();
                        ?>
                        <option value="<?=$id?>"><?=$name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Drug 2</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="drug2">
                    <option>Please Select Drug</option>
                    <?php
                    $drugs = $service->findAllDrugs();
                    foreach ($drugs as $drug) {
                        $name = $drug->getName();
                        $id = $drug->getId();
                        ?>
                        <option value="<?=$id?>"><?=$name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Drug 3</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="drug3">
                    <option>Please Select Drug</option>
                    <?php
                    $drugs = $service->findAllDrugs();
                    foreach ($drugs as $drug) {
                        $name = $drug->getName();
                        $id = $drug->getId();
                        ?>
                        <option value="<?=$id?>"><?=$name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Quantity</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="quantity" placeholder="Quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Location</label>
            </div>
            <div class="col-75">
                <select class="inputs, select" name="location">
                    <option value="11">10 London Road</option>
                </select>
            </div>
        </div>

        <button type="submit">Add</button>
    </form>

    <button onclick="window.location.href = 'people.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
    <?php
    $webPage->writeFooter();
    $webPage->close();
}
