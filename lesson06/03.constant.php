<?php
// only php code, no html content in this file

$myBook="Learning JavaScript";
$myBook='Learning PHP'; // in PHP using ' is more common
echo "$myBook<br>"; // Learning PHP
echo '$myBook<br>'; // $myBook
echo "<hr>";

/*
PHP Constants: 
A constant is an identifier (name) for a simple value. 
The value CANNOT be changed during the script (like using CONSTANT in any other language).

A valid constant name starts with a letter or underscore 
(no $ sign before the constant name).

Based on the naming convention, the constant name is written all in Capital letters (no camelCase)

To create a constant, we use a built-in function named "define()"

This function takes two parameters:
1) the name of our constant
2) the value of our constant

The syntax: define("The Constant Name","The Constant Value")

You can read more:
- https://www.tutorialrepublic.com/php-tutorial/php-constants.php
- https://www.w3schools.com/php/php_constants.asp
*/

// Task: 
// create a constant to hold the text value of "Canadian Business College" 
// Pick any meaningful name for this constant

// The naming convention is to create a php constant with all uppercase (better but not mandatory) 
// constant name has to be in between ' or "
define('COLLEGE','Canadian Business College');

// then just echo the value of COLLEGE:
echo "<br>";
echo COLLEGE;

echo "<br>COLLEGE"; // Notice that php will treat it as a literal text
// we will the see the word "COLLEGE" instead of its value "Canadian Business College"

// OR we can write the <br> + COLLEGE in just one echo statement:
echo "<br>".COLLEGE; // placing our constant outside the "" will give us its value

// We don't HTML template, we are using p element just for learning
echo "<p>I am studying Digital Media and Web Design at ".COLLEGE.".</p>";

// COLLEGE = "Seneca College"; // Error we can't assign any value to a constant