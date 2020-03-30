<?php
include("OOP/WebPage.php");
$webPage = new WebPage("Login", "Circle Lab", 2020);
$webPage->open();
$webPage->setCSS("css/smart-system");
$webPage->writeHead();
?>
    <div id="login">
        <h1>Log In</h1>
        <form method="post" action="php/homepage.php">
            <label for="username">Username:</label><br/>
            <input name="username" id="username"/> <br/>
            <label for="password">Password:</label><br/>
            <input name="password" id="password" type="password"/> <br/>
            <input class="button" type="submit" value="Sign In!"/>
        </form>
    </div>
<?php
$webPage->writeFooter();
$webPage->close();