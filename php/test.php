<?php
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");

$webPage = new WebPage("Test", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();

$service = new serviceFacade();

$drugs = $service->findAllDrugs();
$name = $drugs[1]->getName();
$person = $service->findPersonById(1);
?>
    <div>
        <h1>Test Page</h1>
        <p><?=$name?></p>

        <p><?=$person->getFirstName()?></p>
        <p><?=$person->getPassword()?></p>
    </div>
<?php

$webPage->writeFooter();
$webPage->close();



