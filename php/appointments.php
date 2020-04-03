<?php
include("../OOP/WebPage.php");
$webPage = new WebPage("Appointments", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("../css/smart-system");
$webPage->writeHead();
?>
    <h1>Appointments</h1>
    <form>
        <label>
            <input class="inputs" name="appointment" placeholder="Search Name">
        </label>
        <p>OR</p>
        <label>
            <input class="inputs" name="appointmentDate" type="date">
        </label>
        <br/>
        <button type="submit">Search</button>
    </form>
    <div id="appointmentResults">

    </div>
    <p>Click appointment for more information</p>

    <button onclick="window.location.href = 'addAppointment.php';">Add Appointment</button>
    <br/>
    <button onclick="window.location.href = 'homepage.php';">Homepage</button>
    <br/>
<?php
$webPage->writeFooter();
$webPage->close();
