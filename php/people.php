<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("People", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
    <h1>People</h1>
    <form method="get" action="peopleResults.php">
        <label>
            <input class="inputs" name="name" placeholder="Search Name">
        </label>
        <br/>
        <button type="submit">Search</button>
    </form>

    <button onclick="window.location.href = 'addPersonInput.php';">Add Person</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
<?php
$webPage->writeFooter();
$webPage->close();
