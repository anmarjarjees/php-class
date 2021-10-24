<?php
// Focusing on PHP code, so need for HTML template in this file:
/*
function functionName() {

}
*/


// Step1: Create our first function
// This function needs to accept any number of minutes and return the number of hours
/*
	The rule: 1 Hour = 60 minutes
	As a general rule, dividing your number of minutes by 60 will give you the same time in hours.

	The formula: hours = x min / 60 => the time in hour(s)
	hours = 120 min / 60 min
    hours = 180 min / 60 min
*/ 

// Let's name it "convertMinToHr'" => Convert Min To Hour
// This function has one parameter which is "minutes" to accept the numeric value of an argument for the minutes
function convertMinToHr($minutes) {
    $hours = $minutes / 60;
    /*
    In JS, we used toFixed(),
    We can use PHP number_format() Function
    https://www.tutorialrepublic.com/php-reference/php-number-format-function.php
    */
    $hours = number_format( ( $minutes / 60 ), 1 );
    // functions can be used to print/echo the result or return it:
    // echo "<br>the hours: $hours"; // echo the $hours
    return $hours;
}

// Step2: Then we need to call our function:
echo "<br> the hours for 60 min: " . convertMinToHr( 60 ); // $hours = 60 / 60 =>
echo "<br> the hours for 90 min: " . convertMinToHr( 90 ); // $hours = 90 / 60
echo "<br> the hours for 120 min: " . convertMinToHr( 120 ); // $hours = 120 / 60
echo "<br> the hours for 180 min: " . convertMinToHr( 180 ); // $hours = 180 / 60
echo "<br> the hours for 200 min: " . convertMinToHr( 200 ); // $hours = 200 / 60

// When we call our function, we need to pass the right number of arguments
// convertMinToHr(); // Error => Missing argument 1 for convertMinToHr()


// Example for converting LB to KG function as you did in JavaScript :-)
// Create our function first:
function convertLbToKg( $pound ) {
    // Google: Formula for an approximate result, divide the mass value by 2.205
    $Kilogram = $pound / 2.205;
    return $Kilogram;
  }

  // Then we need to call our function:
  echo "<br>" . convertLbToKg( 26 );
  echo "<br>" . convertLbToKg( 30 );

// more advanced examples:
/*
Task: Create a function that takes any list of numbers and return the total of these numbers:

the list of numbers => just an array that contains numeric values
this list of numbers (array) has to be created/populated first

- create a function that accept an array of numeric values
- this function should return the total of these numbers
- The main problem: to find a total of all the numbers in an array
*/

// Array of numbers:
$numbers = [ 25, 23, 54, 12, 8 ];
// Finding the total => exactly the "same logic" in JS or any programming language// the total = 25 + 23 + 54 + 12 + 8
// Bad way of coding! Because we should use for loop instead of repeating the same line x of times!
$theTotal = 0; // initial value for the sum container
$theTotal = $theTotal + $numbers[ 0 ]; // 0 + 25 = 25 => the current value of "theTotal" is 25
$theTotal = $theTotal + $numbers[ 1 ]; // 25 + 23 = 48;
$theTotal = $theTotal + $numbers[ 2 ];
$theTotal = $theTotal + $numbers[ 3 ];
$theTotal = $theTotal + $numbers[ 4 ];
echo "<br>My first total is: $theTotal"; // My first total is: 122

// use for loop instead (the standard logic that we used in JS):
$total = 0; // creating new variable named "total" with initial value of 0
for ( $i = 0; $i < count( $numbers ); $i++ ) {
    $total = $total + $numbers[ $i ]; // will run for i=0 to i=4
}
echo "<br>My second total is: $total";

// Let's try another logic to find the $total for the same array:
// setting the initial value for the arrayTotal to be the value of the first element in the array
$arrayTotal = $numbers[0];
// since we took/used the value of the first element (index 0), we have to start our loop from the next element (index 1)
for ( $i = 1; $i < count( $numbers ); $i++ ) {
    $arrayTotal = $arrayTotal + $numbers[ $i ]; // will run for i=1 to i=4
}
echo "<br>My third total is: $arrayTotal";


// I want to find the total again for these two arrays:
$myExams = [ 89, 78, 90, 91, 85 ];
$myBookPrices = [ 45.74, 34.72, 32.12, 24.89 ];

// yes, we can repeat the same code of finding the total:
// we can copy the same logic and just rename the array to the other name:
// First Time: Finding the total for myExams
$total = 0; // reset the variable named "total" to 0
for ( $i = 0; $i < count( $myExams ); $i++ ) {
  $total = $total + $myExams[ $i ]; // will run for i=0 to i=4
}
echo "<br>The total for my exams is: $total";

// Second Time: Finding the total for myBookPrices
$total = 0; // reset the variable named "total" to 0
for ( $i = 0; $i < count( $myBookPrices ); $i++ ) {
  $total = $total + $myBookPrices[ $i ]; // will run for i=0 to i=4
}
echo "<br>The total price for my books is: $total";

// Good example for your assignment1-part2
// Although the above 3 examples work fine for the end user / our clients
// In Programming it's considered a bad example of coding, Why?
// We repeating the same code 3-4 lines 3 times!!!!!
// we should write our full lines of code (that we want to repeat) inside a function
// then we can call our function x numbers of times
// this function supposed to find the total for any array we declare and pass to the function:
// Yes, we do need to have an array already created
function arrayTotal($anyArray) {
    $total = 0; // reset the variable named "total" to 0
    for ( $i = 0; $i < count( $anyArray ); $i++ ) {
        // the new total will be equal to the previous total + the current element's value:
	    // new total = previous total + the current element in the array:
        $total = $total + $anyArray[ $i ]; // will run for i=0 to i=4
    }
    // remember this function will return the value of the total (Not printing it)
    return $total;
}

// calling our function:
// arrayTotal(); // Error: Missing argument 1 for arrayTotal()
/*
Warning: Missing argument 1 for arrayTotal()
Notice: Undefined variable: anyArray
*/

// NOTE: The following 3 lines of calling our function 3 times will not display
// 1. Calling our function and passing the argument => our first array $numbers
arrayTotal($numbers);
// 2. Calling our function and passing the argument => our second array $myExams
arrayTotal($myExams);
// 3. Calling our function and passing the argument => our third array $myBookPrices
arrayTotal($myBookPrices);


// We need to echo the returned value of each time we call our function:
echo "<hr>";
// call our function: we just need to echo the function for each array:
// 1.find the total for my "$numbers" array:
echo "<br> the total of my numbers is: ".arrayTotal($numbers);

// 2.find the total for my "myExams" array:
echo "<br> the total of my exam is: ".arrayTotal($myExams);

// 3.find the total for my "$myBookPrices" array:
echo "<br> the total of my book prices is: ".arrayTotal($myBookPrices);


// Or using this way by creating 3 different variables for each array:
// Or since our function is returning a value (the total)
// we can assign this returned value into a variable named "result1":
$result1=arrayTotal($numbers);
$result2=arrayTotal($myExams);
$result3=arrayTotal($myBookPrices);

// Echo the three variables
echo "<br>the total of my numbers is $result1";
echo "<br>the total of my numbers is $result2";
echo "<br>the total of my numbers is $result3";


// Or just using one varaible "result":
$result=arrayTotal($numbers);
echo "<br>the total of my numbers is $result";
$result=arrayTotal($myExams);
echo "<br>the total of my numbers is $result";
$result=arrayTotal($myBookPrices);
echo "<br>the total of my numbers is $result";


// Again the same code:
$examTotal=arrayTotal($myExams);
// now since we have the value for the exam total
// we can find the average:
// average formula: the total of numbers / how many numbers
// to find how many numbers(exams) we have
// we can use the same function count() since our exams are inside an array "$myExams"
$average = $examTotal / count( $myExams );
echo "<br>The final average for my exams is: $average"; // The final average for my exams is: 86.6

// In the assignment1 - part2:
// This function supposed to return the result of multiplying all the numbers inside any array
// so this function like our previous function "arrayTotal()" also needs to have an array as parameter
function multiplyArrayValues($anyArray) {
    // we can can write our logic and run our for loop against the varaible "anyArray"
    // finding the result of multiplying all the numbers
    // return the result
}

// Assign your function to any variable (pick any name) like: Any Variable = Your Function
// This variable will be used to receive the returned value form our function

// Finally: Echo the variable that contains the function result

/*
Good to know!
Type declarations:
Type declarations can be added to function arguments, 
return values, and, as of PHP 7.4.0, class properties. 
They ensure that the value is of the specified type at call time, 
otherwise a TypeError is thrown.
PHP.NET: https://www.php.net/manual/en/language.types.declarations.php

Or check this article (advanced):
https://www.phpclasses.org/blog/post/1047-php-8-type-hinting.html#th_version
*/