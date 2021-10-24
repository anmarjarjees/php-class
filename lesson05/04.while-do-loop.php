<?php
// let's make it just pure php file:

// While Loop and Do While

// let's take the first initial example we had in for loop:
// To print from 1 to 10:
// We will use the standard for loop first:
for ($i=1; $i<11; $i++) {
    echo "$i<br>"; // the right code to write the numbers with line break
    // echo '$i<br>'; // this will give us: $i
    // if you want to use single quote ':
    // echo $i.'<br>'; // Also the right code to write the numbers with line break
}

/*
NOTE: 
Please remember to modify/update/change the while loop counter variable inside the while block
otherwise we will have infinite loop
*/

echo "<hr>";
// Then repeat the same example but with using While loop
// initialize the loop counter:
$i = 1;
// keep looping/repeating the same code while the condition is "true"
while ($i<11) {
	echo "$i<br>";
    // increment the loop counter equation is written inside while() loop
    $i++; // $i=2, $i=3, $i=4, and soon but $i=11 => 11<11 => False => stop loop
}
echo "<hr>";

// example of printing 10 to 1:
$i = 10;
while ( $i >= 1 ) {
  echo $i . '<br>';
  // decrement the loop counter
  $i--;
 // 9 - 8 - 7 - and so on... till $i became 0 => 0 is not greater than/equal to 1
}
echo "<hr>";

// **********************************************************
// Problem: Output even numbers from 0 to 10 using while loop
// **********************************************************

// First solution: starting at 0 by incrementing the loop counter by 2
$i = 0;
while ( $i <= 10 ) {
  echo $i . '<br>';
  // increment the loop counter by 2: 2 then 4 then 6 till 10
  $i += 2; // instead of typing the long formula/equation $i = $i + 2;
}
echo "<hr>";

// Second solution: using the modulo % operation (you will use this operator in part1 assignment1)
$i = 0; // we need to reset the loop counter to 0
while ( $i <= 10 ) {
  /* check the $i variable, if the number ($i) is even then print it */
  /*
  we can check if the number is even by scanning its remainder value.
  In Math, any even number has no remainder when it's divided by 2
  if the remainder is 0 => it's an even number
  else (it means it's not 0) => its an odd number
  To solve this problem (like JS), we can use the modulo operator %
  
  In computing, the modulo operation returns the remainder or signed remainder of a division, 
  after one number is divided by another (called the modulus of the operation).
  
  Note: 
  this logic for finding if the number is even or odd 
  by using the modulo operator will be used in your first assignment
  
  if number/value % 2 is equal to 0 => even number
  if number/value % 2 is NOT equal to 0 => odd number
  */
  if ( $i % 2 == 0 ) {
    echo $i . '<br>';
  } // end if condition

  // increment the loop counter (outside the if condition but inside while loop)
  $i++;
} // end while loop
echo "<hr>";

// ************************************************
// Below if we want to print only the "odd" numbers:
// Third solution: the same like the second one just by using the Not operator !=
$i = 0;
while ( $i <= 10 ) {
  // != is NOT equal to
  // if $i % 2 not equal to 0, $i is not even (it's odd number)
  if ( $i % 2 != 0 ) {
    echo $i . '<br>'; // 1 3 5 7 9
  }
  // increment the loop counter
  $i++;
}
echo "<hr>";



// While (more examples):
// The loop will never run if the condition is false**
// initialize the loop counter:
$i = 1;
while ( $i < 11 ) {
  echo "$i<br>";
  // increment the loop counter
  $i++;
}

// Do while:
// The loop will run at least one time even if the condition is false**
$i = 12;
do {
  echo "$i<br>"; // 12
  // increment the loop counter
  $i++; // 13
} while ( $i < 11 ); // this condition is false

/*
We have two keywords that we can use with loops (for, while, do-while):
- continue => will just skip the rest of the code for current iteration
- break => will break/stop the loop
*/

// Third solution of printing the even numbers(0-10): using the keyword "continue"
$i = 0;
while ( $i <= 10 ) {
    // Below we are checking if the number is not even!
  if ( $i % 2 != 0 ) {
    // increment the loop counter
    $i++; // Jump to the next number
    continue; // this will skip the rest of the loop block and just jump to while condition again
  } else {
    echo $i . '<br>'; // 0 2
  }
  // increment the loop counter
  $i++;
}
echo "<hr>";

// Using "break"
$i = 1;
while ( $i <= 10 ) {
  echo $i . '<br>';
  // increment the loop counter
  $i++;
  // below is the change
  if ( $i == 6 ) {
    break; // when the loop counter "$i" became 6 => break keyword will stop/terminate the loop
  }
}

/*
Example of using break
username = martinos
password = m123456

for (record=1; record<1000; record++) {
    if (username and password are both exists and valid) {
        break our loop =< "break"
        direct the user to the member home page, for example
    }
}
*/




