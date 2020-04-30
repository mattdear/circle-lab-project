<?php

function getDatabase()
{
    return new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
    //return new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
}
