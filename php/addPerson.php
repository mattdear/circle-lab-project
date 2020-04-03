<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("Add Person", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
    <h1>Add Person</h1>
    <form>
        <div class="row">
            <div class="col-25">
                <label>First Name</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="fName" placeholder="First Name">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Second Name</label>
            </div>
            <div class="col-75">
                <input class="inputs" name="sName" placeholder="Second Name">
            </div>
        </div>
            <button type="submit">Add</button>
    </form>

    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
<?php
$webPage->writeFooter();
$webPage->close();
