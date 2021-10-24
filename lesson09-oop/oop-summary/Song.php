<?php
/*
Object Oriented Programming:
Encapsulate specific related code into a class (main template/blue print)
Then we can create instances (objects) from this class

Classes and Objects
Class define the object properties and methods
*/

// Creating a class which is a blue-print for making any object
// By convention, the class file name starts with Capital letter

class Song {
  /*
    Creating these properties for the class "Song":
    - Title
    - Genre
    - Singer/Band:

    properties are just variables stored within a class.
    the have set the keyword "protected" (Access Modifier), so they can only being accessed within this class
    or if we extend it to another sub-class, so they will be also available for the child class
  */
    protected $title;
    protected $genre;
    protected $singer;

    /*
        Creating 4 methods which are just functions within a class (object)
        These function are "public" so we can access them outside the class through its object
        
        The first function is a special one "__construct",
        Any type of function that starts with double underscore __ in PHP is called "Magic Methods"
        which means we don't have call them when we create an object,
        as they will be called automatically by PHP itself when we instantiate an object.

        instantiate an object => means creating an instance of a class
        so when we create an instance (object) from the class "Song", this method "__construct()" will be triggered automatically!

        Normally we use this type of function "Constructor Function" when we need to populate some values for our new created object,
        or when we need to assign some value to the object properties at the same time when we create an object
        otherwise it will be useless if it's not accepting any parameters or if its empty for sure :-)
    */

    // We override the constructor when we want to assign some value to the created object
    public function __construct() {
        // populate the values of the class (object) properties
    }

    // other normal function or methods:
    /* 
    These will help us to retrieve the values of these properties:
    - title, 
    - genre, 
    - and singer 
    
    we can call these methods publicly through our object
    */

    public function getTitle() {
        // testing:
        // echo $this->title;
        return $this->title;
    }
    
    public function getGenre() {
        return $this->genre;
    }

    public function getSinger() {
        return $this->singer;
    }

    /*
        In OOP language, such types of method for returning or getting the values of the class/object properties
        are usually called "Getters".

        if we create method for changing or setting new values to the class/object properties
        these types of method are called "Setters" as they can accept values and set these values to the class properties
        and definitely in such case we should apply some kind of validation if needed
    */

    public function setTitle($songTitle) {
        // Yes, can add a validation before setting any value to a property
        // Let's try to validate the title of the song => must maximum 40 character
        if (strlen($songTitle)<=40) {
           $this->title=$songTitle;
           
           // testing:
           // echo "Testing Title: ".$this->title;
        }
    }
    
    public function setGenre($songGenre) {
        $this->genre=$songGenre;
    }

    public function setSinger($singerSinger) {
        $this->singer=$singerSinger;
    }
  
} // end class Song
