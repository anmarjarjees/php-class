<?php
/* ***************************
For Loops with Indexed Arrays:
****************************** */

// creating a new array named "subjects":
// has these four subject (values/elements/items):
// HTML, CSS, JavaScript, PHP, Python
// we can use ' or " with string values
$subjects = [ 'HTML', 'CSS', 'JavaScript', 'PHP', 'Python' ];
// to output the content of this array without for loop as we learnt before
// We can use these two functions as Developers
print_r( $subjects );
echo "<hr>";
var_dump( $subjects );

/*
In JS:
for (var i=0; i<subjects.length; i++) {
    document.write("<br>"+subjects[i]);
}

Notice in JS we used an array property named "length"
This property returns the length of the array
*/

echo "<hr>";
// Using For Loop
// In JavaScript: arrayName.length
// we will use a built-in php function to count how many elements we have in the array :-)
// The function name is: count() to give us how many elements does this array have:
// our loop counter will start with 0 as the array first index value:
// count($subjects) = 5

/*
We cannot place an array or a function inside " and " for echo or print as we do with normal variables
*/
// echo "We have count($subjects) subjects to learn!"; // Error: Notice: Array to string conversion in ...

// Using the concatenation way:
echo "We have ".count($subjects)." subjects to learn!"; // We have 5 subjects to learn!

for ( $i = 0; $i < count( $subjects ); $i++ ) {
    echo "<br>$subjects[$i]"; // $i=0, 1, 2, 3, 4
}

echo "<hr>";
/*
To recap, we have used this pattern of if condition:

if (my condition check):
  // my code goes here
elseif:
  // my other code goes here
endif;

Notice that with PHP we can also use ":" and "endfor" (as we used : and endif)
*/
for ( $i = 0; $i < count( $subjects ); $i++ ):
  echo "<br>$subjects[$i]"; // $i=0, 1, 2, 3, 4
endfor;

echo "<hr>";
// A simple loop to print ONLY the even numbers: 0 to 10
// $i +=2 => $i = $i + 2;
for ( $i = 0; $i <= 10; $i += 2 ) {
  echo "<br>$i";
}

echo "<hr>";
/*
Creating an array for program codes:
*/
$allSubjectsCode = [ 890, 100, 500, 750, 200, 250,300 ];

// Task: for loop to display its element
for ( $i=0 ; $i < count($allSubjectsCode) ; $i++  ) {
  echo $allSubjectsCode[$i]."<br>";
}

/*
Let's suppose we need to create another new array
that contains all the subject code value that are more than 300

in other words, the new array will have all the values that
are more than 300 from $allSubjectsCode array
*/
// let's name the new array to be "HighSubjectsCode":
$highSubjectsCode = [];

// now we can use the  for loop to scan each value in $allSubjectsCode:

/*
in JS we used to work on length property of an array object

in PHP we can use a built-in function (method) named "count()"
example:

count(arrayName) ==> 7
*/
// we need to loop through the main first array
// count($allSubjectsCode) ==> 
for ($i=0; $i<count($allSubjectsCode); $i++) {
	if ($allSubjectsCode[$i]>300) {
		// we will populate the values of the second array on the fly
		$highSubjectsCode[]=$allSubjectsCode[$i];
	}
}

// to print the result array:
print_r($highSubjectsCode);
echo "<hr>";

// Let's try to create 2 Dim array and loop through its item as we did in JS just for learning:
    // Another example of two dimensional array:
    $officeApps = [
        ["Word", "2 Weeks", "2 Assignments"],
        ["PowerPoint", "1 Week1", "1 Assignment"],
        ["Excel", "2 Weeks", "1 Assignment"]
    ];
  
      // Output "PowerPoint"
      echo $officeApps[2][0];
  
    /*
      In JS:
      for (var i = 0; i < officeApps.length; i++) {
        for (var j = 0; j < officeApps[i].length; j++) {
          console.log(officeApps[i][j]);
        }
      }
    */

    // In PHP:
    for ($i = 0; $i < count($officeApps); $i++) {
      for ($j = 0; $j < count($officeApps[$i]); $j++) {
        echo $officeApps[$i][$j]."<br>";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For Loop With Arrays</title>
</head>
<body>
    <h1>My Modules</h1>
    <!-- use <ul> element without PHP, just pure HTML: -->
    <ul>
        <li>HTML</li>
        <li>CSS</li>
        <li>JavaScript</li>
        <li>PHP</li>
        <li>Python</li>
    </ul>

    <h1>My Modules</h1>
    <!--
    Using <ul> to print the modules names
    1) either put the <ul> outside php block as a normal HTML element,
    2) or we can echo/print the ul element inside php block
    -->

    <!-- 
      The code below is a bad way of coding!
      - There is repetition: echo $subjects[0] .... echo $subjects[3]
      - Outputting the array elements till index 3, what if the array contents has been changed adding/removing elements
    -->
    <ul>
        <li><?php echo $subjects[0] ?></li>
        <li><?php echo $subjects[1] ?></li>
        <li><?php echo $subjects[2] ?></li>
        <li><?php echo $subjects[3] ?></li>
    </ul>

    <!-- We should use a loop -->
    <ul>
      <?php
        for ( $i = 0; $i <count($subjects); $i++ ) {
          echo "<li>$subjects[$i]</li>";
        }
      ?>
    </ul>

    <!-- another way by placing all our code inside php elements -->
    <?php
        echo "<ul>";
            for ($i=0; $i<count($subjects); $i++) {
                echo "<li>$subjects[$i]</li>";
            }
        echo "</ul>";
    ?>

    <!-- another way by using for: and endfor -->
    <ul>
        <?php for ($i=0; $i<count($subjects); $i++): ?>
            <li><?php echo $subjects[$i] ?></li>
        <?php endfor; ?>
    </ul>


    <?php
    // Using a user friendly way to output this to the main page:
    /*
        In JS:
        document.write("<ul>");
        for (var i = 0; i < officeApps.length; i++) {
            for (var j = 0; j < officeApps[i].length; j++) {
            document.write("<li>" + officeApps[i][j] + "</li>");
            }
            document.write("<hr>");
        }
        document.write("</ul>");
    */  

    // Let's try it without for loop:
    echo "<ul>";
      // echo "<li>$officeApps[0][0]</li>" // Error: Notice: Array to string conversion in 
      echo "<li>".$officeApps[0][0]."</li>"; // Word
      echo "<li>".$officeApps[0][1]."</li>"; // 2 Weeks"
      echo "<li>".$officeApps[0][2]."</li>"; // 2 Assignments
      // for PPT:
      echo "<li>".$officeApps[1][0]."</li>"; // PowerPoint
      echo "<li>".$officeApps[1][1]."</li>"; // 1 Week
      echo "<li>".$officeApps[1][2]."</li>"; // 1 Assignment
      // same idea for Excel...
    echo "</ul>";

    echo "<hr>";
    
    echo "<ul>";
    /*
      First loop with i is for the main elements of "officeApps" array
      When i=0 => we have this element in index 0:  ["Word", "2 Weeks", "2 Assignments"]
      When i=1 => we have this element in index 1:  ["PowerPoint", "1 Week", "1 Assignment"]
      When i=2 => we have this element in index 2:  ["Excel", "2 Weeks", "1 Assignment"]
    */
    for ($i = 0; $i < count($officeApps); $i++) {
      for ($j = 0; $j < count($officeApps[$i]); $j++) {
        echo "<li>".$officeApps[$i][$j]."</li>";
      }
    }
    echo "</ul>";

    // Or using this format (more complex but it's more user friendly):
    /*
      First loop with i is for the main elements of "officeApps" array
      When i=0 => we have this element in index 0:  ["Word", "2 Weeks", "2 Assignments"]
      When i=1 => we have this element in index 1:  ["PowerPoint", "1 Week", "1 Assignment"]
      When i=2 => we have this element in index 2:  ["Excel", "2 Weeks", "1 Assignment"]

      •	Word:
        o	2 Weeks
        o	2 Assignments
      •	PowerPoint:
        o	1 Week1
        o	1 Assignment
      •	Excel:
        o	2 Weeks
        o	1 Assignment
    */
    echo "<ul>";
    for ($i = 0; $i < count($officeApps); $i++) {
      echo "<li>".$officeApps[$i][0].":<ul>";
      for ($j = 1; $j < count($officeApps[$i]); $j++) {
        echo "<li>".$officeApps[$i][$j]."</li>";
      }
      echo "</ul></li>";
    }
    echo "</ul>"; 
    ?>

</body>
</html>