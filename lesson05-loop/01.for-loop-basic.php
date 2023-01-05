<?php
// print from 1 to 10:
echo "1<br>"; // in HTML <br>
echo "2<br>";
echo "3<br>";
echo "4<br>";
// and so on till 10... Bad idea!!!

/*
for loop structure:
for (part1; part2; part3) {
    // the for loop code goes here
}
part1: The initial value of the loop counter (The start counting number)
part2: The condition to keep the loop "running"=> I want to keep looping since this condition is true
part3: The increment/decrement operation for the loop counter
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