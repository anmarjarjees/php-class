<?php
// This is just an external PHP file that contains only PHP code
// We need to include/embed/add this file in our HTML page
// This file is being used/called by "04.my-page.php


// For demo, simple PHP code:

/*
Example from our JS lectures:

var num = 5;
if (num % 2 == 0) {
    document.write("Your number is even");
} else {
    document.write("Your number is odd");
} 
*/

// Writing the same logic in PHP using ternary operator and save the text into a variable:
// $var = (condition) ? value/code if true : value/code if false;
$num =7;
$result = ($num % 2 == 0) ? 'your number is even' : 'your number is odd';

// We don't want to output anything here
// We need to output the result(s) inside our HTML page to be nicely formatted and valid


/*
NOTE:
As we learnt before, 
since this file contains ONLY php code (No HTML Template),
we can omit the closing php tag
*/