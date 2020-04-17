<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("People Results", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();

$searchName = htmlentities($_GET["name"]);
?>
    <h1>People Results</h1>
    <div class="searchResults">
        <div class="searchResult">
            <div class="searchDetails">
                <p>Name: <?=$searchName?></p>
                <p>Date of Birth:</p>
                <p>Telephone:</p>
                <p>Email:</p>
            </div>
            <div class="searchButtons">
                <form method="post" action="modifyPerson.php">
                    <input type="hidden" name="id">
                    <button type="submit" class="modDelButton">Modify</button>
                </form>
                <form method="post" action="deletePerson.php">
                    <input type="hidden" name="id">
                    <button type="submit" class="modDelButton">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <button onclick="window.location.href = 'people.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

<?php
$webPage->writeFooter();
$webPage->close();
