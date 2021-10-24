<?php
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
for ($i = 10; $i >= 1; $i--) {
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