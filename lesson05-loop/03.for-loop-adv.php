<!-- 
    Notice that any file with .php extension in web development field:
    1- can have pure HTML content only (NO PHP at all)
    in this point, no need to add opening and closing php tag at all

    2- can have pure PHP code only (NO HTML at all)
    in this point, we still need to have at least the the opening tag for php

    3- can have both PHP and HTML content (the file has PHP and HTML code)
    in this point, we need to use the opening and the closing PHP tags


    for this reason, in the point 2 and point 3 we have to always write the opening php tag: < ? php
 -->
<?php
// We will focus on pure php (so no need for html template)
// Very Important Examples for part 1 assignment 1:
// ************************************************
/*
Array of all the exam results named "$examResults"
each exam is out of 10 (10 is maximum)

Exam mark is 5 or more ==> pass
Exam mark is less then 5 ==>fail
*/
$examResults = [ 6, 7, 4, 2, 8, 9, 10, 5, 2, 6, 3 ];
/*
we need to loop through the examResults array
to scan each value

if the value (mark) >= 5 ==> add the value into another 
array named "passExams"

if the value (mark) <5 ==> add the value into another 
array named "failExams"

So we will populate the two new arrays on the fly using for loop as we did in the previous example
*/

// it's a good practice to prepare the two arrays
// like JS we should declare the two empty arrays
// before start using them
$passExams = [];
$failExams = [];

// looping through the examResult array
// tip: use PHP count() function inside the loop condition
for ( $i = 0; $i < count( $examResults ); $i++ ) {
	// the main logic goes here
	if ( $examResults[ $i ] >= 5 ) {
		// since this element is > or = 5
		// we need to add it to passExams array
		// in PHP we can leave it empty[] like $passExams[]
		// and PHP will add the index automatically
		$passExams[] = $examResults[ $i ];
	} else { // else ==> mark < 5
		$failExams[] = $examResults[ $i ];
	}
}
// Last step, just to print the two arrays:
// notice below, we used ' and NOT " to print the text only
// we can use " if we want to print the values also
echo '<br> $examResults';
print_r( $examResults );
echo '<br> $passArray: ';
print_r( $passExams );
echo '<br> $failArray: ';
print_r( $failExams );

echo "<hr><hr>";

// Task: Creating an array that is mixed of "letters" like "a","b" and "integers" like 1,2,3
// in other words, this array has text values and numeric values
// we can name it "letIntArray" for "letters and Integers Array":
$letIntArray = [ 'a', 4, 'c', 75, 122, 'y', 100, 88, 'b', 'k', 'm', 7 ,'g'];

// for testing:
var_dump( $letIntArray );
echo "<hr>";
/*
Task:
1. We will create two new empty arrays:
- $intArray => for an array that contains only integer values
- $letterArray => for an array that contains only letter/string values

2. Populate (putting) the values of two these arrays on the fly (using for loop):
- $intArray => will contain only the integer numbers (values) of $letIntArray
$intArray => 4, 75, 122, 100, 88, 7

- $letterArray => will contain only the letters (values) of $letIntArray
$letterArray => 'a', 'c', 'y', 'b', 'k', 'm', 'g'

3. for point (2) we will loop through the $letIntArray to scan each item:
- if the item is an integer number => add it to the intArray
- otherwise => add it to the letterArray
*/

/*
Hints (As we did in JavaScript first assignment):
- It's a good programming practice to declare both new arrays as empty arrays
before starting insert values into them inside the loop block as mentioned in point (1)
*/

$intArray = []; // This empty array will be used for storing integers/ whole numbers, for storing only the integer values
$letterArray = []; // This empty array will be used for storing letters "text", for storing only the letters

/*
Question: How can we check if the value is an number of type integer (whole number/no decimal points)?

Answer:
To find whether the number is int or not we can use the built-in PHP function is_int()
is_int() returns a bool data type => true or false

is_int( myNumber ) => return true if myNumber has an integer value like: 90, 1, 7, etc...
is_int( myNumber ) => return false if myNumber has any value other than an integer
*/
// let's try to see how is_int() is working

// echo true value => 1 , echo false value => nothing
echo is_int(90); // is 90 an integer number => Yes => true => 1
echo "<br>";

echo is_int(75.98); // is 75.98 an integer number => No => false => empty string (we know that false is just an empty value)
echo "<br>";

echo is_int("abc"); // is "abc" an integer number => No => false => empty string
echo "<hr>";

/*
Logic:
We need to loop through the $letIntArray array and check/scan every value/element in this array.
if the value in the current index is integer => add it to the array "$intArray"
else => add it to the array "$letterArray"

Question:
How can we check if the value is integer or not integer

- To find whether the value is int or not we can use the built-in PHP function is_int()
is_int — Find whether the type of a variable is integer
you can check: https://www.php.net/manual/en/function.is-int.php

Again using count() function:
- to let PHP count how many elements we have in an array
- to make our array length flexible (add/remove items for the array)

Examine the condition of the for loop below => $i < count( $letIntArray ) 
is better than using: $i < 13

Remember in JS, array as object, it has a property named "length"
the condition in JS: i < letIntArray.length 
*/

/*
Below the loop counter $i
will represent the index of the array that's why we initialized by 0
*/
for ($i=0; $i<count($letIntArray);$i++){
    // for testing/printing:
    echo $letIntArray[ $i ] . " ";
    
    // Below is our major code to solve the problem:
    // check every value: if (the current value is int)
    /*
    *****************************************************************
    We will check if  the item (element) in the current index is integer
    Then insert it into "$intArray"
    Otherwise insert it into "$letterArray"

            example:
            $a = 32;
            echo "a is " . is_int($a) . "<br>";
    */
    if (is_int($letIntArray[$i])) {
        $intArray[]=$letIntArray[$i];
    } else {
        $letterArray[]=$letIntArray[$i];
    }
} // end for loop

// Last step is to print all the arrays:
echo "<hr>";
echo "The mixed array (letters and numbers):<br>";
print_r( $letIntArray );
echo "<br>";

echo "<br>int array values:<br>";
print_r( $intArray );
echo "<br>";

echo "<br>letter array values:<br>";
print_r( $letterArray );











// If the .php file contains ONLY PHP code, we usually omit the closing php tag (no need for it/optional)
// <!-- No need for HTML contents :-) -->

    
