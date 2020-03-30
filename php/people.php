<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("People", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
    <h1>People</h1>
    <form>
        <label>
            <input  class="inputs" name="people" placeholder="Search People">
        </label>
    </form>
    <div id="symptomResults">

    </div>

    <button onclick="window.location.href = 'addPerson.php';">Add Diagnosis</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
<?php
$webPage->writeFooter();
$webPage->close();
