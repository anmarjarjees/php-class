<?php
require "Song.php";
/*
Inheritance: are used to specify properties/methods that are the same in multiple classes in the main "parent" class
then just specify the differences in other classes.

1- Same or Similar classes can all have the same parent class 
but each individual one can override some features that inherits from the main/parent class

2- This concept is important to avoid duplication of our code

3- In PHP classes can have ONLY one parent/main class, they can inherit only from one parent class,
unlike some other language where classes can inherit from different parents

4- classes can have many children, which means many sub-classes can extend or inherit from the same parent class
We can have parent classes, children classes, and grand-children classes, and so on :-)

Declaring another class (subclass) "MainSong" to extend the class (superclass) "Song":
MainSong inherits from Song,
which means all the members (properties and methods) of the parent class "Song" will be copied to "MainSong"
Notice that only "public" and "protected" members will be transferred
*/

class MainSong extends Song {
    protected $introVerse="Welcome Theme"; // Setting a default value "Welcome Theme"
    
    public function getIntroVerse() {
        return $this->introVerse;
      }

    public function showSongInfo() {
        $msg = "<br>Title: ".$this->title;
        $msg .= "<br>Artist: ".$this->singer;
        $msg .= "<br>Introduction Verse: ".$this->introVerse;
        echo "<br>$msg<br>";
    }

    /*
    Notice that:
    - we don't the getters to receive the value of any property
    - we don't the setters to set the value of any property

    But we do have them in the parent class
    */
}