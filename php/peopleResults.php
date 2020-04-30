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


    $searchName = strtolower(htmlentities($_GET["name"]));
    $people = $service->findAllPeople();
    $count = 0;
    ?>
    <h1>People Results</h1>
    <div class="searchResults">
        <?php
        foreach ($people as $person) {
            $fullName = strtolower($person->getFirstName()) . " " . strtolower($person->getLastName());
            if ($searchName == strtolower($person->getFirstName()) or $searchName == strtolower($person->getLastName()) or $searchName == $fullName) {
                if ($person->getIsactive() == 1) {
                    ?>
                    <div class="searchResult">
                        <div class="searchDetails">
                            <p>Name: <?= $person->getFirstName() ?> <?= $person->getLastName() ?></p>
                            <p>Date of Birth: <?= $person->getDob() ?></p>
                            <p>Telephone: <?= $person->getPhone() ?></p>
                            <p>Email: <?= $person->getEmail() ?></p>
                        </div>
                        <div class="searchButtons">
                            <form method="post" action="modifyPersonInput.php">
                                <input type="hidden" name="id" value="<?= $person->getId() ?>">
                                <button type="submit" class="modDelButton">Modify</button>
                            </form>
                            <form method="post" action="deletePerson.php">
                                <input type="hidden" name="id" value="<?= $person->getId() ?>" >
                                <button type="submit" class="modDelButton">Delete</button>
                            </form>
                            <form method="post" action="prescriptionInput.php">
                                <input type="hidden" name="id" value="<?= $person->getId() ?>">
                                <button type="submit" class="modDelButton">Add Prescription</button>
                            </form>
                        </div>
                    </div>
                    <?php
                    $count++;
                }
            }
        }
        if ($count == 0) {
            echo "<p>No Results Found</p>";
        }
        ?>
    </div>

    <button onclick="window.location.href = 'people.php';">Back</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>

    <?php
    $webPage->writeFooter();
    $webPage->close();
}
