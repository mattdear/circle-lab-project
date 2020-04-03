<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("Locations", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
    <h1>Locations</h1>
    <form>
        <label>
            <input  class="inputs" name="locations" placeholder="Search Locations">
        </label>
    </form>
    <div id="locationResults">

    </div>

    <button onclick="window.location.href = 'addPerson.php';">Add Location</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
<?php
$webPage->writeFooter();
$webPage->close();