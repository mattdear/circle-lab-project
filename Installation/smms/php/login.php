<?php
session_start();
include("mFunctions.php");
include("../service/serviceFacade.php");
$un = $_POST["username"];
$pw = $_POST["password"];

$service = new serviceFacade();
$people = $service->findAllPeople();
$enter = 0;
try {
    foreach ($people as $person){
        if ($person->getUsername() == $un && $person->getPassword() == $pw){
            $token = bin2hex(random_bytes(32));
            $_SESSION["token"] = $token;
            $_SESSION["gatekeeper"] = $un;
            $role = $service->findRoleById($person->getRole());
            $access = $role->getAccessLevel();
            $_SESSION["userId"] = $person->getId();
            $_SESSION["access"] = $access;
            $enter=1;
            break;
        }
    }

    if ($enter == 1){
        header("Location: homepage.php");
    } else {
        popUpError("Invalid Username or Password");
    }

    /*if ($un == "admin" && $pw == "admin"){
        // Correct password : set up the authentication session variable
        // and store the username in it along with session token
        $token = bin2hex(random_bytes(32));
        $_SESSION["token"] = $token;
        $_SESSION["gatekeeper"] = $un;
        $_SESSION["role"] = 9;

        // Redirect to the main menu
        header("Location: homepage.php");
    } elseif ($un == "patient" && $pw == "patient"){
        $token = bin2hex(random_bytes(32));
        $_SESSION["token"] = $token;
        $_SESSION["gatekeeper"] = $un;
        $_SESSION["role"] = 0;


        header("Location: homepage.php");
    } else {
        // The no matching records supplied!
        popUpError("Invalid Username or Password");
    }*/

 } catch (PDOException $e) {
    echo "Error: $e";
}