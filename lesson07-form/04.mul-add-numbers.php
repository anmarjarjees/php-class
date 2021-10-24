<?php
/*
we do have to add a condition to scan or check the form if is submitted or no.
if the form is submitted ==> using a PHP built-in function named "isset()"
*/

/*
Since we used method="POST"
so we have to use the global array: $_POST[]

if we had used method="GET"
we have to use: $_GET[]
================================
- the "key" will the value of name attribute for each input field
- the "value" will be the input value from the user or the selected option

In our example:
$_POST[
'numbers' => the value that user will input for the field with name="numbers",
'operation'=> the value (Radio button) that user will check,
'submit' => value when the user clicks the submit button,
]
*/


// for testing and learning:
print_r( $_POST );
/*
Array ( 
  [num1] => 90 
  [num2] => 80 
  [operation] => 1 
  [submit] => Start the Calculation 
)
*/

/*
  since we have all the form elements saved in $_POST[]
  including the submit button because all of them have name attribute
  so we can use isset built-in function to check if the form is submitted by testing the $_POST['submit'] value with "if condition"

  in other words:
  - if the form is submitted:
  - we can check if the form is submitted if there is a 'submit' value
  - inside the $_POST[] array using a php built-in function named isset()
  - since the submit button has name="submit" so we can use it with $_POST[]
*/

  if ( isset( $_POST[ 'submit' ] ) ) { 
    // all the code to handle the form has to be inside this if condition:
    // Good idea to save the input into simple php variables
    $num1 = $_POST[ 'num1' ];
    $num2 = $_POST[ 'num2' ];

    // testing:
    echo "<br>First Number: $num1";
    // echo "<br>First Number: $_POST[ 'num2' ]";
    echo "<br>Second Number: ".$_POST[ 'num2'];
    echo "<hr>";

      // Let's try to review php custom functions by creating 4 functions:
      /*
      creating 4 different functions
      to find the result for the required operation (+,-,*,/)

      each function needs two numeric values to find the result like x and y
      (two arguments) then return the result

      so each function has a specific job to do the required operation.
      then just return the value (no echo statement - no printing)
      */

      // 1. create the function to add the two numbers
      function addNumbers($x, $y) {
        // assuming that x is num1 and y is num2
        // since this function is using two variable x and y
        // so we do have to pass them as arguments (parameters)
        // do the operation below then return the result
        $result = $x + $y;
        return $result;
      }

      // 2. create the function to subtract the two numbers
      function subNumbers($x, $y) {
        // we can also combine the two lines in one
        /*
        instead of typing:
        $result = $x - $y;
        then return $result
        we can just write the two lines in one only:
        */
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
        /*
        If $y will have the value of 0
        PHP will give us Warning: Division by zero in line....
        Any language will give us the same error when divide by zero
        Because dividing by zero is undefined in math
        */
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

      /*
  	based on the HTML form the user should see only the result for the selected operation (radio button):

  	if "Addition" radio button is selected => execute/call the function addNumbers()

  	if "Subtraction" radio button is selected => execute/call the function subNumbers()

    if "Multiplication" radio button is selected => execute/call the function multNumbers()

  	if "Division" radio button is selected => execute/call the function divNumbers()

  	first step: we need to scan or get the value of operation (we need to know which operation is selected)

  	so we will use the same $_POST[] array
  	Let's name our PHP variable for the operation: $op
  */
    $op = $_POST[ 'operation' ]; // the variable $op will be: 1, 2, 3, or 4
    // for testing
    // print ("<br>the operation value is: ".$op);
    
    // or using var_dump()
    // using var_dump($op) just to view any variable content
    // var_dump function will return the value and the data type of the variable
    // using var_dump() for testing is better than echo or print
    // it will show us the data type and the value of the varaible
    var_dump( $op ); // string(1) "4"

    /*
    Use switch statement to check the value of $op variable,
    and call the required function
    */
    switch ($op) {
      // NOTE: In php comparing 1 and "1" as values only so we can write case "1": or case 1:
      case 1: // or writing case "1": with quotations
        // for testing
        // echo "call add fun";
        // calling the required function:
        // so for option 1 => we need to call addNumbers()
        // echo( "<br>" . addNumbers($num1,$num2));
        $answer = addNumbers($num1,$num2);
      break;

      case 2: // for sub => writing case 2: without quotations
        // for testing
        // echo "call sub fun";
        // echo( "<br>" . subNumbers( $num1, $num2 ));
        $answer = subNumbers( $num1, $num2 );
      break;

      case "3": // for multiplication, we are placing the value of 3 in between " and still working fine
        // for testing
        // echo "call mult fun";
        // echo( "<br>" . multNumbers( $num1, $num2 ));
        $answer = mulNumbers( $num1, $num2 );
      break;

      case "4": // for div
        // for testing
        // echo "call div fun";
        // echo( "<br>" . divNumbers( $num1, $num2 ));
        $answer = divNumbers( $num1, $num2 );
      break;  
    } // end switch

    // bad way coding below (it was used just for a quick test):
    // echo "<h3>The result is: $answer </h3>";
    // We don't want to echo/print/write HTML5 elements outside the body!!!
  } // end of the main if condition (if the form is submitted)

  // NOTE: We don't place any PHP code regarding the form outside the main if condition?
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiply and Add Numbers</title>
</head>

<body>
  <!--
    method="POST" ==> either "POST" or "GET"
    in PHP, we have two global arrays one for post and one for get

    action="" ==> to specify the target file or the target PHP code 
    to handle the user input
  -->
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
  <!-- 
      1. Using HTML form to ask the user to enter two numeric
        values.
      2. Using PHP to take these two values and remove the white spaces before and after each one
      3. find the total, subtraction, multiplication, or division 
      of these two values based on the user choice.

    NOTE: Yes, it's better to use <label> elements
  -->
    Enter your first numeric value:
    <!-- "name" attribute value is used by PHP to get the user input-->
    <input type="text" name="num1" required="required" value="<?php if (isset($num1)) { echo $num1; } ?>">
    <br>
    <br>
    Enter your second numeric value:
    <!-- 
      We can repeat the same logic in between the "" of the value attribute:
      if (isset($num2)) { echo $num2; } 

      Using ternary operator!
      the syntax: (condition) ? the code if it's true : the code if it's false
      echo isset($num2) ? $num2 : ''
     -->
    <input type="text" name="num2" required value="<?php echo isset($num2) ?  $num2 : '' ?>">
    <br>
    <br>
    <!--
    With radio button we need to have at least one option selected or checked

      the new way of HTML5 ==> checked
      the classical way ==> checked="checked"

      since the user will not type anything with type="radio" like input="text".
      so it's our own responsibility to add the values by hard coding
      value="1" , or value="add", or value="addition"
      so we will use:
      1 ==> for addition
      2 ==> for subtraction
      and so on...
      -->
    <input type="radio" name="operation" checked value="1">
    Addition <br>
    <input type="radio" name="operation" value="2">
    Subtraction <br>
    <input type="radio" name="operation" value="3">
    Multiplication <br>
    <input type="radio" name="operation" value="4">
    Division <br>
    <br>
    <!-- we need to add name attribute for the submit button
		to check if the form is submitted or not
		-->
    <input type="submit" name="submit" value="Start the Calculation">
    <br>
    <br>
    <!--
      We don't want to always print/echo $answer
      We need first to check if there is any value is set to the variable $answer
      if there is a value => echo the answer

      otherwise, when we someone opens the page for the first time:
      The result: Notice: Undefined variable: answer in...

      To solve this issue, we need first to check:
      if the variable $answer has any value?
      in other words, if there is any value is set to a variable $answer
      then we can print it
    -->
    The result: 
    <?php 
    if (isset($answer)) { // if this condition is true, then print the answer
      echo $answer;
    }
    ?>
  </form>
</body>

</html>