<?php

function getDatabase()
{
  // return new PDO("mysql:host=circlelab.co.uk.mysql:3306;dbname=circlelab_co_ukcirclelab", "circlelab_co_ukcirclelab", "Yf25&ZPPaAAk");
  // return new PDO ("mysql:host=cookmate.app:3306;dbname=circlelabs", "CircleLabs", "Yf25&ZPPaAAk");
  return new PDO ("mysql:host=localhost;dbname=circlelabs;", "CircleLabs", "Yf25&ZPPaAAk");
}
