<?php
session_start();
include("../OOP/WebPage.php");
include("mFunctions.php");
if (!isset ($_SESSION["gatekeeper"])) {
    popUpError("Your not logged in! Please log in and try again.");
} else {
    $webPage = new WebPage("Modify Person", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("../css/smart-system");
    $webPage->writeHead();

    $modifyId = htmlentities($_POST["id"]);
    if ($_SESSION["role"] > 7) {
        ?>
        <h1>Modify Person</h1>
        <form method="post" action="people.php">
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
            <div class="row">
                <div class="col-25">
                    <label>Date of Birth</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="dob" placeholder="dd/mm/yyyy" type="date">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Gender</label>
                </div>
                <div class="col-75">
                    <select class="inputs, select" name="gender">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Email</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Phone</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="phone" placeholder="Phone">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Role</label>
                </div>
                <div class="col-75">
                    <select class="inputs, select" name="role">
                        <option value="1">Admin</option>
                        <option value="2">Doctor</option>
                        <option value="3">Government</option>
                        <option value="4">Nurse</option>
                        <option value="5">Patient</option>
                        <option value="6">Pharmacy</option>
                        <option value="7">Regulatory Body</option>
                        <option value="8">Research Company</option>
                        <option value="9">Staff</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Username</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="fName" placeholder="Username">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Password</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="sName" placeholder="Password" type="password">
                </div>
            </div>
            <button type="submit">Save</button>
        </form>

        <button onclick="window.location.href = 'people.php';">People</button>
        <br/>

        <?php
    } elseif ($_SESSION["role"] == 0) {
        ?>
        <h1>Update Personal Information</h1>
        <form method="post" action="people.php">
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
            <div class="row">
                <div class="col-25">
                    <label>Date of Birth</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="dob" placeholder="dd/mm/yyyy" type="date">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Gender</label>
                </div>
                <div class="col-75">
                    <select class="inputs, select" name="gender">
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Other</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Email</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="email" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label>Phone</label>
                </div>
                <div class="col-75">
                    <input class="inputs" name="phone" placeholder="Phone">
                </div>
            </div>
            <button type="submit">Save</button>
        </form>
        <button onclick="window.location.href = 'homepage.php';">Homepage</button>
        <br/>
        <?php
    }

    $webPage->writeFooter();
    $webPage->close();
}