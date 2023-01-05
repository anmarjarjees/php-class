<?php
// if you only want to learn and focus on PHP language
// you can ignore the HTML5 template page!
// but we just added it here for more demo and learning purposes

    // Creating variables for saving 3 users' full names:
    // Each variable can hold only value 
    $user1 = 'Arthur Smith';
    $user2 = 'Alex Chow';
    $user3 = 'Sarah Grayson';

    // Instead of creating 3 variables for saving the 3 full names
    // We can save them all into on variable using the concept of "Arrays"
    // Array variable can hold multiple values
    
    // Using Arrays in PHP:
    // Two types of arrays:
    // Indexed Array (we did the same in JavaScript)
    // Associative Array

    // Indexed Array: 
    // -------------
    // 1. Each element/item in the array has a unique numeric id or value called "index"
    // 2. The first index value is 0 (counting from 0 not from 1) for the first element/item in the array

    // Array: is a variable that can have/contains multiple values
    $users = array('Arthur Smith','Alex Chow','Sarah Grayson'); // the traditional way for creating an array in PHP
    /*
    So we list the array values as comma separated values, and because this array "$users" contains text so each text value has to be written inside either ' or "
    */

    /*
    In JS:
    var users = new Array('Arthur Smith','Alex Chow','Sarah Grayson');
    OR:
    var users = ['Arthur Smith','Alex Chow','Sarah Grayson'];
    */

    // now below is the short-hand for creating an array in PHP exactly like JavaScript:
    // $users = ['Arthur Smith','Alex Chow','Sarah Grayson'];

    // More Examples:
    $employees = [ 'Sam Simpson', 'Martin Smith', 'Alex Chow' ];

    $myLuckyNumbers = [ 90, 34, 17, 21, 12 ]; // In JS: let myLuckyNumbers = [ 90, 34, 17, 21, 12 ]; 
    /*
    In PHP, echo/print are used to print strings
    array is a complex object that cannot be printed by echo/print
    */
    echo($users); // Error => Notice: Array to string conversion
    echo($myLuckyNumbers); // Error => Notice: Array to string conversion
    print($users); // Same Error => Notice: Array to string conversion

    
    // Yes, we can use for loop to loop through the array elements (to be discussed later...)
    // We need to output the array temporary just for testing (by us as programmers):
    
    // we can use the built-in function print_r() [is used with arrays]:
    // prints human-readable information about a variable
    // displays the array's values and the array's indexes
    echo "<hr>";
    print_r($users);
    /*
        The output: Array ( [0] => Arthur Smith [1] => Alex Chow [2] => Sarah Grayson )
    */
    echo "<br>";
    print_r($myLuckyNumbers);
    /*
    The output: Array ( [0] => 90 [1] => 34 [2] => 17 [3] => 21 [4] => 12 )
    */
    echo "<hr>";
    
    // so print_r() function can be used for testing the array's value
    // that's why it can be used by the developers (not for our clients!)

    // There is another PHP built-in function to print/test any variable: var_dump();
    // Notice that var_dump() only of us as developer :-)
    var_dump($users);
    echo "<br>";
    var_dump($myLuckyNumbers);
    echo "<hr>";

    // Creating an array of mixed data types named "myMixedArray"
    $myMixedArray = ['PHP Language',true,100,89.78,false];
    var_dump($myMixedArray);
    /*
    The output:
    array(5) {
        [0]=> string(12) "PHP Language"
        [1]=> bool(true)
        [2]=> int(100)
        [3]=> float(89.78)
        [4]=> bool(false)
    }
    */

    // var_dump(); can be used to check if we have any problem with any variable in our code
    // that's why it can be used by the developers also (not for our clients):
    // the var_dump() is like console.log() in JS
    // var_dump() will print on the document, while console.log will print on the console window
    // var_dump( $characters ); // Undefined variable: characters
    echo "<br>";
    $total = 73.91;
    var_dump($total); // float(73.91)
    echo "<hr>";
    
    /*
    Task: Adding a new user "Martin Smith" to the array $users

    In JS: 
    since we have 3 elements in this array, so the next available index will be 3

    Because: 
    index 0 is for 'Arthur Smith'
    index 1 is for 'Alex Chow'
    index 2 is for 'Sarah Grayson'

    so we have index 3 is available:
    
    users[3]="Martin Smith";
    OR:
    users.push("Martin Smith");
    ======================================

    In PHP when we add a new item to the array, 
    we don't have to specify the index number like in JS!

    We can just use this syntax: $myArrayName[] = any value
    */

    // in the following two lines, PHP will just add these two new names to the end of the array
    // we can leave the box [] empty and php will figure out the last index! :-)
    $users[]="Martin Smith"; // PHP will place this name in index 3 automatically!!!!!
    // and keep adding:
    $users[]='Sally Wilson'; // PHP will place this name in index 4 automatically
    
    // for testing, we can user either print_r() or var_dump()
    print_r( $users ); // display all the values
    echo "<hr>";

    // More Examples :-)
    /*
    Like JS, in PHP we can create an empty array to be populated later:
    */
    // Creating an empty array named "myExams" first
    // then populate the array with any numbers:

    /*
    The code in JS:
    var myExams = [];  // just declaring an empty array
    
    // We can add the values to myExams array for each index (adding 5 exam marks):
    console.log(myExams); // [] => length: 0
    
    myExams[0] = 90;
    myExams[1] = 94;
    myExams[2] = 82;
    myExams[3] = 75;
    myExams[4] = 78;
    */

    // Now the same answer but in PHP:
    $myExams = [];
    // PHP can still accept the same idea/logic like in JS:
    // But since there is no need to specify the index, it's not mandatory
    // The following code still valid in PHP:
    /*
    $myExams[0] = 90;
    $myExams[1] = 94;
    $myExams[2] = 82;
    $myExams[3] = 75;
    $myExams[4] = 78;
    */

    // To add an element to an array in PHP => We don't have to specify the index value
    $myExams[] = 90; // PHP will automatically place 90 in the first index 0
    $myExams[] = 94; // PHP will automatically place 94 in the second index 1
    $myExams[] = 82; // and so on the rest...
    $myExams[] = 75;
    $myExams[] = 78;
    echo "The exams:<br>";
    print_r($myExams); // Array ( [0] => 90 [1] => 94 [2] => 82 [3] => 75 [4] => 78 )

    echo "<hr>";

    /*
    Just to review:
    in JS:
    myArray.anyBuiltinMethod()
    Example:
    myArray.push("HTML");

    in PHP:
    anyBuiltin-function(myArray);
    Example:
    array_push($myArray, "HTML");
    */

    /*
    NOTE:
    We can use many PHP built-in functions with arrays:
    https://www.tutorialrepublic.com/php-reference/php-array-functions.php
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays in PHP</title>
    <style>

    </style>
</head>
<body>
    <h2>Main Users</h2>
    <!--
    I want to list all the users inside our array $users:

    In JS:
    document.write(user[0]);
    document.write(user[1]);
    -->
    <ul>
        <li>
            <?php
            // using echo to display the first element which has the index of 0
            // if it's one sentence only we can omit the ; at the end (again it's the same in CSS and JS)
            echo $users[0]
            ?>
        </li>
        <li><?php echo $users[1]; ?></li>
        <li><?php echo $users[2]; ?></li>
        <li><?php echo $users[3]; ?></li>
        <li><?php echo $users[4]; ?></li>
           <!-- 
             below will give us Undefined offset: 5 
             because there is not index 5
            -->
        <li><?php echo $users [5]; ?></li>
    </ul>
</body>
</html>