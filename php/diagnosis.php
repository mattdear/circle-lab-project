<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("Diagnosis", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
<h1>Hello World</h1>
