<?php
// Just pure PHP code on need for HTML in this file:
// Gets the current PHP version
phpversion(); // just returns which version is running in the server (or our computers - localhost);
// this function will NOT output anything => just returns a text "string data type"

// We need to echo/print the returned value of this function
echo phpversion(); // we can omit the ' or " since we don't output a string or HTML elements

echo '<br>';
echo "phpversion()"; // This will output the literal text => phpversion()

$mySubject = "PHP";
echo '<br>';
echo "My current subject is $mySubject"; // Yes, echo can output the value of a variable inside ""
echo '<br>';
echo "My current PHP version is phpversion()"; // echo will treat a function is literal text
echo '<br>';
echo 'My current PHP version is phpversion()'; // Sure, the same when using '

echo '<hr>';
// The solutions:
// first one: the same logic that we used in JS which is the concatenation:
echo 'My current PHP version is '.phpversion();
echo '<br>';
// second one: assigning the returned value of this function into a varaible then output the variable
$myPhpVersion = phpversion(); 
echo '<br>';
echo "My current PHP version is $myPhpVersion"; 
echo '<hr>';

// String Functions:
$name = 'MARTIN';
echo $name; // MARTIN
echo '<br>';

/*
Review about JavaScript
In JS, everything is an object.
so string is an object
object can have: properties and methods()

To access the properties and methods of each object:
- objectName.property
- objectName.method()

Examples: Using the two string methods:
myString.toLowerCase() => to make all letters in lowercase
myString.toUpperCase() => to make all letters in uppercase

JS Task: Output the name "MARTIN" all in lowe case:
Solution:
let name = 'martin';
document.write(name.toLowerCase());
*/

echo '<br>';
/*
In PHP, not everything is an object like in JS.
So The JS built-in methods that we have for arrays and strings
We have them as built-in function in PHP

Example:
strtolower => built-in function for converting all letters to small
strtoupper => built-in function for converting all letters to capital

function can take arguments
these function (strtolower and strtoupper) 
take one argument which the string that we want to change
*/

// print MARTIN in lowercase "martin"
echo strtolower($name);

echo '<br>';
$subject = "JAVASCRIPT";
echo strtolower( $subject ); // javascript

/*
Yes, you can try strtoupper() 
*/

echo '<hr>';
// ucfirst built-in function takes one argument, 
// one string and convert the first letter ONLY of this string into a Capital letter
// and do not touch the other letters
// ucfirst() => upper case first letter
$myText = 'lEArNING PrOgraMMinG'; // mixing small and capital!!!
$myTask = ucfirst($myText);
echo "My current task is: $myTask <br>"; // My current task is: LEArNING PrOgraMMinG

/*
Like JS, in PHP we can nest functions (placing a function inside a function)
Example from JS:
let exam1 = praseFloat(prompt(enter your exam1 mark:));

below we will use the two functions:
- ucfirst()
- strtolower()

Nested Functions:
- The inner function "strtolower()" will run first to make all the text in lower case
- Then the outer function "ucfirst()" will run after to make ONLY the first letter in upper case
*/
$myDuty = ucfirst(strtolower($myText));
$myDuty = ucfirst( strtolower($myText));
echo "My current duty is: $myDuty <br>";
echo "<hr>";

// To recap, we have used count() built-in function to count how many elements we have in an array:
$letters = array( 'D', 'C', 'A', 'E', 'B', 'G', 'F' );        
for ($i=0; $i<count($letters);$i++) {
    echo "<p> $letters[$i] </p>";
}
echo "<hr>";

// another example of using foreach with the same indexed array "letters":
foreach ($letters as $letter) {
    echo "<p> $letter </p>";
}
echo "<hr>";

    
// sort() built-in function to sort an array:
sort( $letters ); // to sort the array, the function sort will change the original array
foreach ( $letters as $letter ) {
echo "<p> $letter </p>";
}

echo "<hr>";
// rsort() built-in function to sort an array in reverse order:
rsort( $letters ); // Reverse the order of the array
foreach ( $letters as $letter ) {
echo "<p> $letter </p>";
}

// We have another important function named "strip_tags()":
// Strip HTML and PHP tags from a string
// This function will remove all the html elements (tags) including <script> element for JS coding!

// Examples:
// We have "msg" that contains text and HTML elements:
$msg = "<div><p>We are learning <em>PHP</em>, PHP is a <b>server side</b> language</p></div>";

echo $msg;
echo "<br>";
echo strip_tags($msg);
echo "<hr>";

// We have 'frontend' that contains text and HTML elements:
$frontend = '
<ul>
    <li>HTML</li>
    <li>CSS</li>
    <li>JavaScript</li>
</ul>';

echo $frontend;
echo "<br>";
echo strip_tags($frontend);
echo '<hr>';

// In HTML form we ask the user to input first name, age, date of birth, job title, etc...
// we asked the user to input his/her first name:
// $input ="Marting Smith";
$input ="<script>alert('Boom Boom!');</script>";
echo $input; // <script>alert('Boom Boom!');</script>

echo strip_tags($input); // alert('Boom Boom!'); => the opening/closing tags (<script> and </script>) wil be removed

// another example of danger input:
// The user can input some SQL statement to access the database
$jobTitle = "<php? echo 'Remove all your data!' ?>";

/*
You can learn more about built functions for string in PHP:
https://www.tutorialrepublic.com/php-reference/php-string-functions.php
*/
