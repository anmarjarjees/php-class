<?php
// if the form is submitted:
// we can check if the form is submitted if there is a 'submit' value
// inside the $_POST[] array using a php built-in function named isset
// since the submit button has name="submit" so we can use it
if ( isset( $_POST[ 'submit' ] ) ) {
  /*
   all the code to handle the form has to be placed here!
  
   the form is using POST method,
  
   we have to use $_POST[] array to access the form fields

  
  $_POST[] is an associative array
  that contains all the names attributes values of the submitted form

  $_POST[
    'numbers' => values that user typed in this input field of name="numbers,
    'operation'=> value that user has checked for this input field of name="operation"
    'submit' => value when the user clicks the submit button for this field of name="submit",
    'result' => is empty no value 
  ]
*/

  /*
	JavaScript Review:
  Here is the code of JS second assignment:
	numberStr = numberStr.trim(); // to remove the extra spaces before/after the user input
  var numberArr = numberStr.split(' '); // to convert this string to an array object

  In php is the same logic:
  - these are built-in methods for string object in JS: .trim() and .split()
  - these are built-in functions for string object in PHP: trim() and explode()
	*/

  // Step 1: we need to take the user input (a string of spaces and numbers):
  // remember that all the user's input fields and value are saved into $_POST[]
  // based on our HTML form, the input field for the user's number
  // has the name of "numbers" => name="numbers"
  // so we can access the values through this key: $_POST['numbers']

  // A.	Getting the user input (the string of numbers) and save it into a variable with any name:
  // B.	Trim the spaces before and after the user input in case if there is any, you will use the required PHP built-in function:
  // C. We do need to convert this string of numbers into an array of numbers

  // remove the spaces before/after the input by using "trim()" function
  // trim(): Strip whitespace (or other characters) from the beginning and end of a string
  // $myVariable = trim("myText")
  // it's a string (text) that contains spaces and numbers: "8 10 12 45 80 70"

  $numberString = trim($_POST['numbers']); // getting and trimming the value at the same line

  // for testing:
  var_dump($numberString);

  /*
  Step 2:
  Imagine if we can take this string "8 10 12 45 80 70"
  and convert it into any array = [8,10,12,45,80,70]
  PHP has a built-in function named "explode":
  explode() function will return an array
  Because we put spaces between numbers:
  so we will use a space as the first argument for explode function

  "4 5 7 89 10" as a string ==> array using explode() function ==> [4, 5, 7, 89, 10]
  > first parameter is the delimiter (the symbol that we put in between the numbers)
  > second parameter is the string that we want to explode
  
  Example from php.net:
  $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
  $pieces = explode(" ", $pizza);
  echo $pieces[0]; // piece1
  echo $pieces[1]; // piece2
  $pieces[2]; // piece3
  */
  $numbersArray = explode(' ', $numberString);

  // for testing, we can use print_r()
  // print_r($numbersArray);
  // we can also use: var_dump() and will give us more details
  var_dump( $numbersArray );
  /*
    If this was our input: string(17) "1 2 3 4 5" 
    The result will be:
    array(9) { 
      [0]=> string(1) "1" 
      [1]=> string(1) "2" 
      [2]=> string(1) "3" 
      [3]=> string(1) "4" 
      [4]=> string(1) "5" 
     }
  */

    /*
        NOTE: if the user adds more than one space between any two numbers,
        the minimum built-in function will not work and also you will have empty elements in your array!

        We can create another array out of the current one but with no spaces
        using the same idea of the first assignment-part 1

        This step is important for your second assignment:
      */
      $finalNumbersArr=[]; // define a new empty array to be populated later on the fly through the loop
      // start looping through the original array "$numbersArray"
      for ($i=0; $i<count($numbersArray); $i++) {
        // We need to check:
        // if the current item/element is not empty and is numeric then do the if block
        if ($numbersArray[$i]!="" && is_numeric($numbersArray[$i])) { 
          // notice that we don't have to specify an index value for finalNumbersArr
          // we can just leave it empty [] and php will figure out the current index automatically
          $finalNumbersArr[]= $numbersArray[$i];
          /*
          In JS, the answer: finalNumberArr.push(numbersArray[i]);
          In PHP, there is a built-in function named push( arrayName, value)
          */
          // push( $finalNumbersArr, $numbersArray[$i]);
        } // end if condition
      } // end for loop
   
      // for testing:
      echo "<hr> Our Final Array: ";
      var_dump($finalNumbersArr);

      // Creating our 4 functions to ready for being called/executed according to the use option
      // first one for doing the addition named "addNumbers"
      // second one for doing the multiplication named "multNumbers"
      // both functions accept one arguments(parameter) as array for the input value
      // both functions have to return the result

      // This function "addNumbers()" for adding the numbers
      // is the same as your first assignment function => "autoSum()"
      function addNumbers( $tempArray ) {
        // Your assignment Task
        return "Enjoy your assignment :-)";
      }

      // creating our multiplication function
      // $tempArray is just a placeholder (parameter) to be replaced with the real value (argument)
      function multNumbers( $tempArray ) {
        // The same logic as your first assignment
        $result = 1;
        for ( $index = 0; $index < count( $tempArray ); $index++ ) {
          // keep adding the values to our $total varaible
          $result *= $tempArray[ $index ];
        }
        return $result; // return the result of multiplication
      }

      /*
        IMPORTANT NOTE FRO SIMPLIFYING OUR CODE:
        Notice that we don't have to create a full custom function
        just to call the PHP built-in function to find the maximum value in an array
        For learning purpose, another solution without using built-in function:
        The same logic can be written in any programming language!
      */
      // The following functions are for your second assignment
      function maximum(  $tempArray ) {
        // We can write our logic or using a PHP built-in function
        // Assuming that the number in the first index "0" is the maximum:
        $maxNumber = $tempArray[0]; // It could True or False
        // we will loop through the rest of the array to check the other numbers:
        // we can start from the next number with index "1"
        for ($i=1; $i<count($tempArray); $i++ )  {
            if ($maxNumber<$tempArray[$i]) {
                $maxNumber = $tempArray[$i];
            }
        }
        return $maxNumber;
      }

      // The following functions are for your second assignment
      function minimum(  $tempArray ) {
        // We can write our logic or using a PHP built-in function
        return "The same as minimum coding :-)";
      }

      // The rest of the code is the same logic as we had before:
      // we need to get the value of the radio button
      // we have all the values inside $_POST[] array
      $op = $_POST[ 'operation' ];

      // the user choice is saved into a varaible named $op
      // $op = 1 ==> if the user clicked the first radio button
      // $op = 2 ==> if the user clicked the second radio button
     
      // for testing:
      // echo "<br> The operation value is: " . $op;

      // use switch statement:
      /*
          Step5: Using switch statement to call the required function based on
          the user selection of the radio buttons
      */

      switch ( $op ) {
        case 1:
          // the user has selected "Add..." ==> call addNumbers function
          // save the returned value of Add function to a variable named $result
          $answer = addNumbers( $finalNumbersArr );
        break;

        case 2:
          // the user has selected "Mult..." ==> call multNumbers function
          // save the returned value of Mult function to a variable named $result
          $answer = multNumbers( $finalNumbersArr );
        break;

        case 3:
          // the user has selected "Mult..." ==> call multNumbers function
          // save the returned value of Mult function to a variable named $result
          $answer = maximum( $finalNumbersArr );
          // Or just call your PHP built-in function
          // $answer = PHP-function(array);
        break;

        case 4:
          // the user has selected "Mult..." ==> call multNumbers function
          // save the returned value of Mult function to a variable named $result
          $answer = minimum( $finalNumbersArr );
          // Or just call your PHP built-in function
          // $answer = PHP-function(array);
          // for learning:
          $answer = min($finalNumbersArr);
        break;
      } // end switch
	
	/*
	Good To know!
	In PHP, we can use this function "array-sum()" to get the total of array elements
	read more: https://www.php.net/manual/en/function.array-sum.php
	*/
} // end of the main if statement (if the form is submitted)

// nothing is here (no code is written outside the if condition)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
        <!-- Applying Internal Styles: -->
        <style>
            form {
                width: 80%;
                margin: auto;
                background-color: #ADC6CF;
                color: #080743;
                border: 2px solid #080743;
                padding: 5px;
            }

            form h3 {
                text-align: center;
                border-bottom: 2px solid #080743;
                margin-top: 0;
            }
        </style>
</head>

<body>
<!--
  method="POST" ==> either "POST" or "GET"
  in PHP, we have two global arrays one for post and one for get

  action="" ==> to specify the target file or the target PHP code 
  to handle the user input
-->
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<h3>Simple Calculator</h3>
  <!-- 
    Task:
    1. Using HTML form to ask the user to enter all his/her numeric values.
    2. Using PHP to take these values and remove the white spaces before and after 
    3. find the total, multiplication of these values based on the user choice.
  --> 
  <label for="numbers">Enter your all numeric values with spaces:</label>
  <!-- 
    inside the php block for "value" attribute
    We can write this code: 
    
    if (isset($finalNumbersArr)) { 
      echo $finalNumbersArr; 
    }
    
    So using the ternary operator might be a better choice in this case:
     
    echo (our condition)? the code if it's true : the code if it's false
    echo isset($numberString) ?  $numberString : ""
   -->
  <input type="text" name="numbers" id="numbers" value="
    <?php 
      echo isset($numberString) ?  $numberString : "" 
    ?>">
  <br>
  <!-- we can set the value of "value" attribute to any simple value -->
  <input type="radio" name="operation" checked value="1" id="add">
  <label for="add">Add all the numbers</label>
  <br>

  <input type="radio" name="operation" value="2" id="mul">
  <label for="mul">Multiply all the numbers</label>
  <br>

  <input type="radio" name="operation" value="3" id="max">
  <label for="max">The maximum number</label>
  <br>

  <input type="radio" name="operation" value="4" id="min">
  <label for="min">The minimum number </label>
  <br>
  <br>
  <!-- we need to add name attribute for the submit button
		to check if the form is submitted or not
	-->
  <input type="submit" name="submit" value="The result">
  <br>
  <br>
  <!-- 
        Below we are outputting (echo statement) the value of $answer,
        When the page is opened for the first time, $answer var has no value
        So it will give us an error "Undefined variable".

        We can repeat the same function "isset()" to check:
        if the variable has any value => then echo it
    --> 
  The result:
  <!-- 
    using php block with if condition to print the value of the variable answer if it's available 
    value=" writing our PHP code here "
  -->
  <input type="text" name="result" readonly value="
    <?php
			if (isset($answer)) { 
				echo $answer;
			} 
	  ?>">
</from>
</body>
</html>