<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
include("../service/serviceFacade.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("People Results", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $service = new serviceFacade();

    $searchName = strtolower(htmlentities($_GET["locationName"]));

    $locations = $service->findAllLocations();
    $count = 0;
    ?>
    <h1>Location Results</h1>
    <div class="searchResults">
        <?php
        foreach ($locations as $location) {
            if ($searchName == strtolower($location->getPostcode()) or $searchName == strtolower($location->getCity())) {
                $count = 1;
                ?>
                <div class="searchResult">
                    <div class="searchDetails">
                        <p>Name: <?= $location->getAddressLine() ?></p>
                        <p>City: <?= $location->getCity() ?></p>
                        <p>Postcode: <?= $location->getPostcode() ?></p>
                        <p>Type: <?= $location->getType() ?></p>
                    </div>
                    <?php
                    if ($_SESSION["access"] > 6) {
                        ?>
                        <div class="searchButtons">
                            <!--<form method="post" action="modifyLocationInput.php">
                                <input type="hidden" name="id">
                                <button type="submit" class="modDelButton">Modify</button>
                            </form>-->
                            <form method="post" action="deletePerson.php">
                                <input type="hidden" name="id">
                                <button type="submit" class="modDelButton">Delete</button>
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
        }
        if ($count == 0){
            echo "<p>No Results Found</p>";
        }
        ?>
    </div>

    <button onclick="window.location.href = 'locations.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();
}
