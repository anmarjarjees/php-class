<?php
// print from 1 to 10:
echo "1<br>"; // in HTML <br>
echo "2<br>";
echo "3<br>";
echo "4<br>";
// and so on till 10... Bad idea!!!

/*
In PHP (like JS), we have 3 types of loop:
- for loop
- while loop
- do while loop

Also we have another type of for loop:
- foreach loop: the one we can use with an associative array
*/


/*
for loop structure:
for (part1; part2; part3) {
    // the for loop code goes here
}
part1: The initial/starting value of the loop counter (The start counting number)
part2: The condition to be applied to the loop counter to keep the for loop "running"
=> I want to keep looping since this condition is still true
=> so part3 determines for how many times we need to keep loop-till when?
part3: The increment/decrement operation/operator for the loop counter
*/

// A simple loop to print from 1 to 10:
/*
In JS: Using for loop to print from 1 to 10 vertically
for (var loopCounter = 1; loopCounter <= 10; loopCounter++) {
    // the for loop code goes here
    // This code/message will be printed 10 times!
    document.write(loopCounter + "<br>");
}
*/

// Writing the same logic with PHP for loop:
/*
Below: the loop variable named "$loopCounter"
it starts with 1 because we need print from 1
the loop condition $loopCounter<=10 so this will keep the loop running
while $number is still less than or equal to 10.

Review: increment => $varName++ and decrement => $varName--
*/  
for ($loopCounter = 1; $loopCounter <= 10; $loopCounter++) {
    // the for loop code goes here
    // This code/message will be printed 10 times!
    // don't forget that in PHP we use the . for concatenation not + like JS :-)
    // To recap:
    echo $loopCounter . "<br>"; // Works fine
    // Or using this PHP way with ":
    echo "$loopCounter <br>"; // Works fine
    echo '$loopCounter <br>'; // the literal text "$loopCounter" not the variable value!
}

echo "<hr>";
// A simple loop to print 10 to 1:
// We can just use "i" as the loop counter variable (iteration)
for ($i = 10; $i >= 1; $i--) {
  echo "<br>$i";
}

echo "<hr>";
// Task: write a for loop to print only the even numbers only from 0 to 10
// for short we will create a simple variable like $i
// 0 then +2 => 2 then +2 => 4 then +2 =>6
// so we can NOT use $i++ in the increment
// we can write: $i=$i+2 OR $i+=2
for ( $i = 0; $i <= 10; $i += 2 ) {
  echo "<br>$i";
}

echo "<hr>";

/*
Task: 
Find (output) the times table of any number (from 1 to 10),
Starting from typing the result of 5*1, then 5*2, and so on till 5*10
you can hardcode the value of the number => Example: $myNumber = 5;
Using "for" loop

5
10
15
20
*/

// text then value then text
// let's start with 5 * 1 = 5 using one echo statement:
// function or formulas need to be written outside the "
echo "$myNumber * 1 = " . $myNumber . "<br>";
// OR:
echo "$myNumber*1=".($myNumber*1)."<br>";
echo "$myNumber*2=".($myNumber*2)."<br>";
echo "$myNumber*3=".($myNumber*3)."<br>";
echo "$myNumber*4=".($myNumber*4)."<br>";
echo "$myNumber*5=".($myNumber*5)."<br>";
echo "$myNumber*6=".($myNumber*6)."<br>";
echo "$myNumber*7=".($myNumber*7)."<br>";
echo "$myNumber*8=".($myNumber*8)."<br>";
echo "$myNumber*9=".($myNumber*9)."<br>";
echo "$myNumber*10=".($myNumber*10)."<br>";
/*
instead of typing the syntax 10 times, we need to use for loop:
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop</title>
</head>
<body>
</body>
</html>