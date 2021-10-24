<!-- 
Basic Coding Standard:
https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md    

If you only want to write pure php code, you can ignore the HTML template
If you want to have this file acting as web page that contains HTML contents and PHP code, 
We need to have HTML template written below

NOTE:
Notice in this file or the other future files,
we are printing/outputting HTML contents like: h1, p, br, hr, etc
before or outside the HTML Template! No Valid
Just for learning purpose
 -->
<?php
// Data Types in PHP: number, string, boolean
/*
- number = integer (whole number) or floating (decimal)
example: 5 is an integer, 7.5 is a floating number
- string = text (characters)
example: "Here is my text" or 'Here is my text' (Like JS, we can wrap our text with ' or ")
- boolean: either true or false
example: true or false

Read more: https://www.w3schools.com/php/php_datatypes.asp
*/


// Variables: A temporary location in the RAM to save any value while the program/website/web application is running
/*
In JS (I use JS for JavaScript):
var firstName = "Tony";
let firstName = "Tony";
*/
$firstName = "Tony"; // must be end with ; and no need to declare variable type or using any keyword like "var" or "let" in JS
$lastName = 'Tonies';

$middleName = 65; // it's not a good idea => we should name our variable wisely 
$age = 65; // it makes sense to us to use meaningful variable names
$total = 55.72; // number can have decimal point using point but not comma
$avg = 25.67;


// In JS, to output anything to our page:
// document.write(firstName + "<br>");

/*
in PHP we have 2 built-in functions:
> echo() 
> print() 
both can be used to output our data:
We can format our output by using HTML elements also! 
In JS we used the + for concatenating => in PHP we use the . symbol for concatenating 
In php, we use the dot to concatenate text and variables
In the future we will use print_r() to print array values
*/
// In JS: document.write(firstName + "<br>");
echo( $firstName . "<br>" );
print($lastName . "<br>" ); // the same result like echo

// In JS: document.write(firstName + " " + lastName); 

// We can omit the brackets from echo() and print() functions:
// Examples of using echo and print without brackets
echo $firstName." ".$lastName;
print '<hr>';
echo $avg . "<br>";

echo $firstName, "\n"; // for a "new line" or a "space"
echo 'The total of your invoice is: '.$total;

/*
	echo vs print:
    --------------
    - print can only display a single value
	- echo can display or can use a comma separated list
	as shown below:		
*/
echo "<br>" . $total, "\t", $firstName, "\t", $age; // t (tabbing) one space

// Or
echo "<br>", $firstName, " ", $age;

// The line below will generate an error => we cannot use , with print
// VS code Error => syntax error, unexpected ','
// In the browser: Parse error: syntax error, unexpected ',' in ....
// print "<br>", $firstName, " ", $age;

// Or
// like JS: document.write("<br>" + firstName + " " + age);
// In PHP:
echo "<br>" . $firstName . " " . $age;
echo '<h2>'.$firstName.'</h2>';
/*
In JS:
let result;
var name;
*/
echo "<hr>";
$myModule;
// The following code will generate an error
// echo $myModule; // In PHP, it's an error: Notice: Undefined variable: myModule in ...

// The following variables will not be seen without print or echo
$firstName;
$age;
$total;
$avg;
$middleName;

// Task1: Declare 3 variables with any names you want:
/*
first variable has the value of "HTML and CSS"
second variable has the value of "JavaScript"
third variable has the value of "PHP"
*/

$subject1 = "HTML and CSS"; // in PHP string value either use " or ' like JS
$subject2 = "JavaScript";
$subject3 = "PHP";

/*
Casting in PHP - Good to know :-)
Read more: https://www.php.net/manual/en/language.types.type-juggling.php#language.types.typecasting
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables, Data Types, and Output</title>
</head>
<body>
    <!-- The body is the place that we have to use to display any content for the user -->
    <h1>Embedded PHP</h1>
    <p>We can insert PHP opening/closing tags inside the body element or inside any HTML element!</p>

    <!-- Below is our PHP script inside the body element -->
    <?php
        // we can write our PHP code
        $x = 6;
        $y = 7;
        $avg = ( $x + $y ) / 2;
    ?>

    <!--
        Below we will embed php code into this p element:
        We have one PHP variable that we need to embed: $age

        We still need to use the php block: < ? php and ? > definitely!
    -->

    <!-- 
        The output of this code: Hello, Tony. your age is
        which is a very common mistake is forgetting to add echo/print to output the value of any varaible 
    -->
    <p>Hello, Tony. your age is <?php $age; ?></p>

    <!-- 
        The output of this code: Hello, Tony. your age is 65 (so we have to use either echo or print) 
    -->
    <p>Hello, Tony. your age is <?php echo $age; ?></p>

    <!--
        Task1:
        Output the values of $firstName and $age
        we are not declaring new variables here => we want to output/print/show/display their values!!!
        so we need to use echo/print
    -->
    <p>Hello, <?php echo $firstName ?>. Your age is <?php echo $age ?></p>

    <h2>Our Code list</h2>
    <ul>
        <li>HTML and CSS</li>
        <li>JavaScript</li>
        <li>PHP</li>
    </ul>

    <!--
    Task2:
    Use <ul> elements with the <li> and with php syntax to display the
    three variable values for the subjects as shown below:
    * HTML and CSS
    * JavaScript
    * PHP
    -->
    <h2>Our Code list</h2>
    <ul>
        <li><?php echo $subject1 ?></li>
        <li><?php echo $subject2 ?></li>
        <li><?php echo $subject3 ?></li>
    </ul>
    <hr>
    <script>
        // Our Normal JavaScript Code (For Example):
        let firstName="Alex";
        let age=48;
        document.write("<br>"+firstName+" "+age);

        var x=4;
        var y=5;
        var avg = (x+y)/2;
        document.write("<br>The average of "+x+" and "+y+" is: "+avg);
    </script>
</body>
</html>