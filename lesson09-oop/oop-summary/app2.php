<?php

require "MainSong.php";

// Creating an object from the subclass "MainSong"
$mySong = new MainSong();

echo "<hr>";
// testing:
var_dump($mySong); // Empty
echo "<hr>";
/*
object(MainSong)#1 (4) 
{ 
    ["introVerse":protected]=> string(13) "Welcome Theme" 
    ["title":protected]=> NULL 
    ["genre":protected]=> NULL 
    ["singer":protected]=> NULL 
}
*/

/*
Below, the object "mySong" has access to all the methods from the parent class + MainSong class
We are calling the two setters methods: setTitle() and setSinger()
*/
$mySong->setTitle("Dancing Queen");
$mySong->setSinger("ABBA");
echo "<br>My Song Title: ".$mySong->getTitle(); // "Dancing Queen"
echo "<br>My Song Band: ".$mySong->getSinger(); // "ABBA"
echo "<br>My Song Intro Verse: ".$mySong->getIntroVerse(); // only this method is in the subclass

echo "<hr>";
$mySong->showSongInfo();