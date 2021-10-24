<!-- 
    This file is a pure PHP file (contains only php code, no html at all)
    ====================================================================

    NOTE: 
    In this file we will focus on learning "switch" statement
    I have no intention to display content inside my HTML page so need to prepare the HTML5 full template
    We can skip the full HTML5 template in this lesson about "switch"
    In development/learning mode: We only need: < ? php
    no need for HTML 5 template
    Also when we have an external PHP file for pure php code
    no need for HTML 5 template
-->
<?php
// We are hard coding the value of variable "fruit" to be "dates"
// We learn in the future how to get the user input
$fruit = "orange";
/*
In JS:
switch ( myVariable ) {
    case value1:
        // write our code 
        break;

    case value2:
        // write our code 
        break;

    case value3:
        // write our code 
        break;
    
    default:
        // write our code
        break; Optional
}
*/

switch ( $fruit ) {
    // in case if the value of $fruit is "orange"then run the code of this case:
    case 'orange': // with text values => we use either " or '
      echo 'So your favourite fruit is orange';
      break; // stop the code of going any further and jumping the next case!

    case 'apple':
      echo 'So your favourite fruit is apple';
      break;

    case 'banana':
      echo 'So your favourite fruit is banana';
      break;

    default:
      echo 'So your favourite fruit is ' . $fruit;
  } // end of switch


echo "<hr>";

$courseName = "Animate";

switch ($courseName) {
    case 'PHP':
        echo '<p>Now we are studying PHP</p>';
        // break; // stop the code of going any further
    case '<p>MySQL':
        echo 'We need to study MySQL after learning PHP code</p>';
        break;
    case '<p>SEO':
        echo '<p>Two weeks for learning Search Engine Optimization</p>';
        break;
    default:
        echo "<p>So your course is $courseName</p>";
} // end of switch


// NOTE:
// we can remove the entire HTML5 template if we don't want to use it
// In such case, when we have ONLY PHP code, PHP developers don't add the closing php tag (no need/optional)