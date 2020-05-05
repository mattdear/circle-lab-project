<?php
session_start();
include("php/mFunctions.php");
include("OOP/WebPage.php");
if (!isset ($_SESSION["gatekeeper"])) {
    $webPage = new WebPage("Login", "Circle Lab", 2020);
    $webPage->open();
    $webPage->setCSS("css/smart-system");
    $webPage->writeHead();
    ?>
    <div id="login">
        <h1>Log In</h1>
        <form method="post" action="php/login.php">
            <label for="username">Username:</label><br/><br/>
            <input name="username" class="inputs" id="username"/><br/><br/>
            <label for="password">Password:</label><br/><br/>
            <input name="password" class="inputs" id="password" type="password"/> <br/><br/>

            <button type="submit">Sign In!</button>
        </form>
    </div>
    <?php
    $webPage->writeFooter();
    $webPage->close();
} else {
    echo '<script type="text/javascript">';
    echo 'window.location.href="php/homepage.php";';
    echo '</script>';
}