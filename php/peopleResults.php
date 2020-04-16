<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("People Results", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
    <h1>People Results</h1>
    <div class="searchResults">
        <div class="searchResult">
            <div class="searchDetails">
                <p>Name:</p>
                <p>Date of Birth:</p>
                <p>Telephone:</p>
                <p>Email:</p>
            </div>
            <div class="searchButtons">
                <form method="get" action="modifyAppointment.php">
                    <input type="hidden" name="id">
                    <button type="submit">Modify</button>
                </form>
                <form method="post" action="deleteAppointment.php">
                    <input type="hidden" name="id">
                    <button type="submit">Delete</button>
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
