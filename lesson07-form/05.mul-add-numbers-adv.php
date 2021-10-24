<?php
// First Check: if the form is submitted:
  if ( isset( $_POST[ 'submit' ] ) ) { 
    // all the code to handle the form has to be inside this if condition:
    /*
    In JS, we used .trim() as a "method" for a "string object" to remove extra spaces before and after.
    Because remember that everything is an object is JavaScript

    Example: myString.trim()

    In PHP, we use a built-in function named trim()
    trim() function => remove the extra spaces before/after the value

    */

    // we can get the user input then call the trim function later:
    $num1 = $_POST[ 'num1' ];
    /*
    Below we are writing this extra line just to use the trim() function
    while we can use them at the same line above
    */
    $num1 = trim( $num1 );

    // or we can attach/call trim function here when we get the user input (at the same line):
    $num2 = trim( $_POST[ 'num2' ] );
    // $num2 = trim( $num2 ); // this line is not needed

    /*
    After trimming the user's input values, 
    we need to check if both values are numeric or not.
            
    if one of them or both are NOT numeric ==> output "Invalid Input" message
    else ==> do the required operation to find the result for any operation
            
    In JS we used isNaN() to check if the value is Not a Number
    In PHP we can use this built-in function ==> is_numeric()
            
    Using the same logical symbols like in JS
    && ==> AND
    || ==> OR
            
    using the NOT operator !
    if it's not numeric ==> adding the symbol ! in front of the function is_numeric()
    !is_numeric($x) ==> checking if $x is not a numeric value
    */

        // Second Check: if both values are numeric
        // if both values are numeric then we start your code, no problem!
        if ( is_numeric( $num1 ) && is_numeric( $num2 ) ) {
        // all my major code should go here!
          // 1. create the function to add the two numbers
          function addNumbers($x, $y) {
            $result = $x + $y;
            return $result;
          }

          // 2. create the function to subtract the two numbers
          function subNumbers($x, $y) {
            return $x - $y;
            // notice that we did the same in JS
          }

          // 3. create the function to multiply the two numbers
          function mulNumbers($x, $y) {
          return $x * $y;
          // Just for learning, the following statements (code) will not run
          // because it's written after the return keyword (like JS)
          alert("I am the alert function!");
          echo "<h1>Here is my heading</h1>";
          }
        
          // 4. create the function to divide the two numbers
          function divNumbers($x, $y) {
              if ($y==0) {
                  return "Division by zero!"; // the function will stop at this line
                  /*
                  To recap, the return keyword has two actions:
                  1- return any result => in this example returning the text "Division by zero!"
                  2- Terminate (stop) my function, any code that come after the return will be ignored
                  */
              }
          return $x / $y;
          }

            $op = $_POST[ 'operation' ]; // the variable $op will be: 1, 2, 3, or 4
            switch ($op) {
              // NOTE: In php comparing 1 and "1" as values only so we can write case "1": or case 1:
              case 1: // or writing case "1": with quotations
                $answer = addNumbers($num1,$num2);
              break;

              case 2: // for sub => writing case 2: without quotations
                $answer = subNumbers( $num1, $num2 );
              break;

              case "3": // for multiplication, we are placing the value of 3 in between " and still working fine
                $answer = mulNumbers( $num1, $num2 );
              break;

              case "4": // for div
                $answer = divNumbers( $num1, $num2 );
              break;  
            } // end switch
        } // end if both values are numeric 
        else {
          /*
          Assigning a literal HTML content to the varaible answer:
          <span style='background-color: yellow; color:red;'>
            Invalid Input! Both values have to be numbers.
          </span>
          */
          $answer = "<span style='background-color: yellow; color:red;'>Invalid Input! Both values have to be numbers.</span>";
        } // end else block
  } // end of the main if condition (if the form is submitted)

  // NOTE: We don't place any PHP code regarding the form outside the main if condition?
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiply and Add Numbers with Validation</title>
</head>

<body>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    Enter your first numeric value:
    <!-- "name" attribute value is used by PHP to get the user input-->
    <input type="text" name="num1" required="required" value="<?php if (isset($num1)) { echo $num1; } ?>">
    <br>
    <br>
    Enter your second numeric value:
    <input type="text" name="num2" required value="<?php echo isset($num2) ?  $num2 : '' ?>">
    <br>
    <br>
    <input type="radio" name="operation" checked value="1">
    Addition <br>
    <input type="radio" name="operation" value="2">
    Subtraction <br>
    <input type="radio" name="operation" value="3">
    Multiplication <br>
    <input type="radio" name="operation" value="4">
    Division <br>
    <br>
    <input type="submit" name="submit" value="Start the Calculation">
    <br>
    <br>
    The result: 
    <?php 
    if (isset($answer)) { // if this condition is true, then print the answer
      echo $answer;
    }
    ?>
  </form>
</body>

</html>