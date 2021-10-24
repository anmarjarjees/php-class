<?php

// calling our class file "Song.php"
require "Song.php";

/*
Object is an instance of a class
*/

/*
The code below is for instantiating a new object named "song1" from the class "Song"
instantiation => creating an object
*/
$song1 = new Song();

// Now we can access the all the properties/methods of class Song through the object "song1":
// in other OOP languages, we usually use objectName.propertyName
// in PHP we use -> "object operator" instead of . to access the object properties and methods
$song1->setTitle("Tragedy");
$song1->setSinger("BEE GEES");
$song1->setGenre('Pop');

// Output the song information:
echo "<br>Song Info:";
echo "<br>Title: ".$song1->getTitle();
echo "<br>Genre: ".$song1->getGenre();
echo "<br>Singer/Band: ".$song1->getSinger();

/*
In the line below, we are adding a new property named "rank" and setting it with a new value to our object "song1"!
Our class "Song" doesn't have a property named "rank"!
But in PHP is doable :-)
So any new property we add to our object (doesn't exist in our class),
PHP will automatically add this property and give it the access modifier (keyword) of "public"
which allow us to write to it.

Although it's valid in PHP but it's a good coding practice!
*/
$song1->rank=8;

echo "<hr>";

// testing:
var_dump($song1);
/*
The output:
object(Song)#1 (4) 
{ 
    ["title":protected]=> string(7) "Tragedy" 
    ["genre":protected]=> string(3) "Pop" 
    ["singer":protected]=> string(8) "BEE GEES" 
    ["rank"]=> int(8) 
}
*/
