<?php
// if condition in PHP like JS
/*
    if (condition) {
        my code if the condition is true
    } else {
        my code if the condition is false
    }
*/

/*
Conditional statements operators are the same as "JS"
The comparison operators:
== both values are equal " 1 =='1' ==> true
=== both values are identical (same value and same data type) 1==='1' ==> false
!== the values are NOT identical
>= greater or equal to
<= less than or equal to
>
<
!= not equal to
*/
$booleanValue = false; // change it true/false
if ($booleanValue) {
    echo "True: booleanValue variable is true";
} else {
    echo "False: booleanValue variable is false";
}

echo "<hr>";
echo "<br>";
/*
Unnecessary Code below!
if ($isValid==true) => no need to these too much details

we can just write"
if ($isValid)
*/
$isValid =true;
if ($isValid==true) {
    echo "Is valid!";
} else {
    echo "Is not valid!";
}

echo "<br>";
$hasAnything = null; // using a php keyword "null" => hasAnything that has value of null => false
// null value is false
if ($hasAnything) {
    echo "True: hasAnything variable has a value";
} else {
    echo "False: hasAnything variable is null";
}


echo "<br>";
$myNumber = 0; // change it to any positive/negative numeric value => true
// 0 value is false
if ($myNumber) {
    echo "True: myNumber variable has a number";
} else {
    echo "False: myNumber variable has the value of 0";
}


echo "<br>";
$myStr = ""; // change it to put any string or keep it empty
// Empty string is false
if ($myStr) {
    echo "True: myStr variable has a string";
} else {
    echo "False: myStr variable has an empty string";
}


echo "<br>";
$myArray = []; // we are just declaring an empty array
// we are just saying if $myArray has a value or not! or it's true of not true
if ( $myArray ) {
    echo "True: My array is not empty";
  } else {
    echo "False: My array is empty";
}


/*
To summarize: The values that considered to be false in PHP are:

let's use $x as a varaible with any of these values:

The keywords "false" and "null":
$x= false;
$x= null;

Zero as a number or string:
$x= 0; 
$x= 0.0; 
$x= '0'; 

Empty string
$x= '' or $x= " " 

Empty array
$x= array(); or $x= [];
*/

// More examples:
echo "<hr>";
$isValidInput = true;
/*
The code below is: if ($isValidInput == true ) => lengthy way!
The more professional way: if ($isValidInput) => the better way in PHP/JS/Python...!
*/
if ( $isValidInput == true ) {
  echo "Your input is valid";
} else {
  echo "Your input is not valid!";
}

echo "<hr>";
$isLegalAge = true;
// if ( $isLegalAge ) => In any programming language => if the variable isLegal it "true" OR "has a value"
if ( $isLegalAge ) {
  echo "Yes you can buy fireworks";
} else {
  echo "Sorry, you can't buy fireworks";
}

// the same example as JS: it has to be 18+ to buy these items
echo "<hr>";
$isLegalAge = 15;
// if ( $isLegalAge ) => In any programming language => if the variable isLegal it "true" OR "has a value"
if ( $isLegalAge >= 18 ) {
  echo "Yes you can buy fireworks";
} else {
  echo "Sorry, you can't buy fireworks";
}

// if (the remainder of dividing this number by 2 is 0) => even
if ( $myNumber % 2 == 0 ) {
    echo "<p>Even Number</p>";
  } else {
    echo "<p>Odd Number</p>";
  }


// Thee variables:
$exam1 = 80;
$exam2 = 82;
$exam3 = 88;

// Task 1: Create a variable to find the average for the three exams then display it in the browser:
$average = ( $exam1 + $exam2 + $exam3 ) / 3; // Just the average formula without rounding the result

/*
The round() function rounds a floating-point number.
basic use: round(number,precision);

Example: 
round(85.975, 2) ==> 85.98
so:
85.975 is the number that we need to round
2 is how many digits we want after the .

In our task the number that we need to round is the $average value
The answer: round($average,2)
*/

// first way: we can use the function round at the beginning:
$average = round( ( $exam1 + $exam2 + $exam3 ) / 3, 2 );

// second way:
$average = round( $average, 2 );
/*
The right side rounded $average variable is assigned to the left side $average variable

Like:
$a=2;
a=a*2; => a will be 4
*/
echo "<br>The average for $exam1, $exam2, and $exam3 is: $average<br>";

// third way:
// notice that we can not include function inside the double quotes
echo "<br>The average for $exam1, $exam2, and $exam3 is: " . round( $average, 2 ) . "<br>";
/*
Task: if the average is greater/equal to 60 ==> display "Well done"
else display "Try again"
*/
if ( $average >= 60 ) {
    echo "<p>Well Done!</p>";
  } else {
    echo "<p>Try again</p>";
}

/*
If we have multiple conditions, we can use elseif block:
if {

} elseif {

} elseif {

} else {

}
*/
echo "<hr>";
$currentModule = "PHP";
if ( $currentModule == 'JS' ) {
  echo "We are still in JavaScript";
} elseif ( $currentModule == 'PHP' ) {
  echo "We are in the first week of PHP!";
} else {
  echo "Your current module $currentModule";
}

/*
logical operators (also the same like JS :-) ):
AND ==> &&
OR ==> ||
NOT ==> !
*/

/*
With the logical operators we need to use following
table. This table is called "Truth Table"
		
OR: 
LEFT-HAND SIDE OR RIGHT-HAND-SIDE ==> BOOLEAN RESULT
TRUE OR TRUE ==> TRUE
TRUE OR FALSE ==> TRUE
FALSE OR TRUE ==> TRUE
FALSE OR FALSE ==> FALSE
		
AND:
LEFT-HAND SIDE AND RIGHT-HAND-SIDE ==> BOOLEAN RESULT
TRUE AND TRUE ==> TRUE
TRUE AND FALSE ==> FALSE
FALSE AND TRUE ==> FALSE
FALSE AND FALSE ==> FALSE
		
NOT:
NOT TRUE (!TRUE) ==> FALSE
NOT FALSE (!FALSE) ==> TRUE
*/

echo "<hr>";
$userName = "alexchow";
$password = "alex1234";
/*
A common mistake (in PHP/JS/Py): Using one equal sign!
= one equal symbol/sign is for assigning a value to a variable => always "True" in if condition
== or === are comparison operators (We have to use either one of them depending on our condition)
if ($userName = "alexchow") => we used one symbol of "=" ==> it's an assignment operator => True = 1
We have to remember using either "==" or "===" 
*/
if ($userName=="alexchow" && $password=="alex1234") {
    echo "Thank you $userName, You can check below all our products";
} elseif ($userName=="alexchow" && $password!="alex1234") {
    echo "Sorry $userName, Your password is not correct!";
} else {
    echo "Invalid Credentials!";
}


// **************** Important Note ******************* //
/*
In PHP we have:  "elseif" as one single word or "else if" as two words
> The two words "else if" could be written like two words else if WHEN using the normal block with "{" and "}"
> The single word "elseif" has to be written as one single word elseif WHEN using block ":" and "endif" is one single word!

To make it easy :-) => we can always use "elseif" as a single word => it works with any situation
That's "elseif" is more commonly used than "else if"
*/

// Example of using the normal way with { and } and using the PHP unique way with ":" and "endif" 
echo "<hr>";

/*
The logic (algorithm):
- scan the average value and check:
- if the average is 90+ AND less or equal to 100 ==> Excellent
- else if the average is 80+ AND less or equal to 89 ==> Very Good
- else if the average is 70+ AND less or equal to 79 ==> Good
- else if the average is 60+ AND less or equal to 69 ==> Satisfactory
- else if the average is 0+ and less than 60 ==> Fail
- else ==> Invalid Average Value

In JS:
if (average >= 90 && average <= 100) {
    document.write(`<p>Your final average is ${average.toFixed(2)}. Your grade is A+</p>`);
} else if (average >= 80 && average <= 89) {
    document.write(`<p>Your final average is ${average.toFixed(2)}. Your grade is B</p>`);
} else if (average >= 70 && average <= 79) {
    document.write(`<p>Your final average is ${average.toFixed(2)}. Your grade is C</p>`);
} else if (average >= 60 && average <= 69) {
    document.write(`<p>Your final average is ${average.toFixed(2)}. Your grade is D</p>`);
} else if (average < 60) {
    document.write(`<p>Your final average is ${average.toFixed(2)}. Your grade is F</p>`);
} else {
    document.write(`<p> Sorry, All the marks have to be from minimum 0 to maximum 100! </p>`);
}
*/

// Excellent (Honors) ==> 90 - 100
if ( $average >= 90 && $average <= 100 ) {
    print( "<p>Your final average is : $average. Your grade is: A+</p>" );
} elseif ( $average >= 80 && $average <= 89 ) {
    print( "<p>Your final average is $average. Your grade is: B</p>" );
} elseif ( $average >= 70 && $average <= 79 ) {
    print( "<p>Your final average is $average. Your grade is: C</p>" );
} elseif ( $average >= 60 && $average <= 69 ) {
    print( "<p>Your final average is $average. Your grade is: D</p>" );
} else {
    print( "<p>Your final average is $average. Your grade is: F</p>" );
}
echo "<hr>";

// In the example below, I am using else then space then if. In PHP is still ok with normal block of {}
// Excellent (Honors) ==> 90 - 100
if ( $average >= 90 && $average <= 100 ) {
    print( "Your final average is : $average.Your grade is: A+" );
} else if ( $average >= 80 && $average <= 89 ) {
    print( "Your final average is $average.Your grade is: B" );
} else if ( $average >= 70 && $average <= 79 ) {
    print( "Your final average is $average.Your grade is: C" );
} else if ( $average >= 60 && $average <= 69 ) {
    print( "Your final average is $average.Your grade is: D" );
} else {
    print( "Your final average is $average.Your grade is: F" );
}

echo "<hr>";

/*
below is the modern way for using alternative syntax:
1- by replacing the opening "{" with ":"
2- remove the closing "}" or we don't have } because we don't have {
3- The last change, we need to add the keyword "endif" at the end of the all if conditions

This way is used intensively when the condition block contains too many html code
In Python: elif => for else if
*/
if ( $average >= 90 && $average <= 100 ) :
    print( "<p>Your final average is : $average. Your grade is: A+</p>" );
elseif ( $average >= 80 && $average <= 89 ) :
    print( "<p>Your final average is $average. Your grade is: B</p>" );
elseif ( $average >= 70 && $average <= 79 ) :
    print( "<p>Your final average is $average. Your grade is: C</p>" );
elseif ( $average >= 60 && $average <= 69 ) :
    print( "<p>Your final average is $average. Your grade is: D</p>" );
else :
    print( "<p>Your final average is $average. Your grade is: F</p>" );
endif; // We need to close our entire if block with endif keyword when start using the :

echo "<hr>";
echo "<hr>";
// We can repeat the same idea of using : and endif with our first example:
if ($userName=="alexchow" && $password=="alex1234") :
    echo "Thank you $userName, You can check below all our products";
elseif ($userName=="alexchow" && $password!="alex1234") :
    echo "Sorry $userName, Your password is not correct!";
else:
    echo "Invalid Credentials!";
endif;  // We need to close our entire if block with endif keyword when start using the : 
echo "<hr>";

/*  
To summarize:

You can always use "elseif":
  - it works with { and }
  - it works with : and "endif"

You can use "else if" ONLY with { and }
*/


/*
Kind Reminder:
We are outputting our results with HTML elements outside the HTML template (outside the body element)!
Again, it's just for learning and demonstrations purposes.
Otherwise, we can place/write our PHP code any where (inside/outside the HTML template)
But we should output the results professionally into our html page within the body element
*/
?>

<!-- Since we put our HTML template, let's use it :-) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP If Condition</title>
</head>
<body>
    <p id="result">My current module is <?php echo $currentModule; ?>.</p>
</body>
</html>