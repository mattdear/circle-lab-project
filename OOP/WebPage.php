<?php

class WebPage
{
    // attributes
    private $title;
    private $stylesheet;
    private $author;
    private $year;
    private $links = [];


    //methods
    function __construct($titleIn, $authorIn, $yearIn)
    {
        $this->title=$titleIn;
        $this->author=$authorIn;
        $this->year=$yearIn;
    }

    public function open(){
        echo"<!DOCTYPE html><html lang=\"en\">";
    }

    public function setCSS($stylesheet){
        $this->stylesheet=$stylesheet;
    }

    public function writeHead(){
        echo"<head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
                <title>$this->title</title>
                <link rel='stylesheet' type='text/css' href='$this->stylesheet.css'>
             </head><body><div class='wrapper'>";
    }

    public function addLinks($name, $link){
        $this->links["$name"]= "$link";
    }

    public function writeSidebar(){
        echo "<nav class='navbar'>";
        echo "<ul>";
        foreach($this->links as $key => $value)
        {
            echo "<li class='$key'><a href='$value'>$key</a></li>";
        }
        echo "</ul>";
        echo "</nav>";
        echo "<div class='content'>";
    }

    public function writeFooter(){
        echo "<footer>This website copyright (c) $this->author $this->year</footer>";
    }

    public function close(){
        echo "</div></body></html>";
    }

}
