<?php
/*
Hint: PHP has a built-in function named "is_numeric" to check if the value is numeric or not numeric.

example: 
is_numeric(45) => return true
is_numeric(abc) => return false
*/
// for testing and learning is_numeric function:
echo "<br>" . is_numeric( 45 ); // 1 means true
echo "<br>" . is_numeric( 45.78 ); // 1 means true
echo "<br>" . is_numeric( "abc" ); // nothing means false

// more example about how to use is_numeric():
$myVariable = "ABC";
if ( is_numeric( $myVariable ) ) {
  echo "<br>It's a numeric variable<br>";
} else {
  echo "<br>It's not a numeric variable<br>";
}

/*
For learning and for assignment 1 hint:
Let's modify the same function from the previous example to check if the array has any text value so it should stop the function return "Invalid Input! Please Enter numeric values only" else finish the job:
*/
$numbers = [ 25, 23, 54, 12, 8 ];
$myInvoiceItems = [ 9.12, 8.19, 10.67, 1.8, 5.32 ];
$myBookPrices = [ 45.74, 34.72, 32.12, 24.89 ];

function getTotalPrice( $anyArray ) {
  /*
  Task 1: Validate every element in the array, if any element contains a text value just terminate the function by returning 0, otherwise just continue to task 2
  */
  for ( $index = 0; $index < count( $anyArray ); $index++ ) {
    // if it's not numeric then return 0
    if ( !is_numeric( $anyArray[ $index ] ) ) {
      // We need to echo a message to the user:
      echo "<p style='color: red; background-color:yellow'>Invalid Input! Please Enter numeric values only<p>";
      return false; // FALSE, false, or any case we can use
      // or other idea is echo/print a message "Invalid Input!" instead of returning 0 (more user friendly)
    }
  } // end for loop1	

  /* 
  Task 2: Find the total 
  */
  $total = 0;
  for ( $index = 0; $index < count( $anyArray ); $index++ ) {
    $total += $anyArray[ $index ];
  } // end for loop2
  return $total;
} // end function getTotalPrice



$testingArray = [ 4, 5, 6, "ABC", 9, 2, 3 ];
// we don't want the total message to be displayed if the array contains any text:
if ( getTotalPrice( $testingArray ) ) {
  echo "The total of testing array is: " . getTotalPrice( $testingArray );
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
<title>Functions Part2</title>
</head>

<body>
</body>
</html>