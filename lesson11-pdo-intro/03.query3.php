<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';

/*
/*
    We can also add a predefined attributes to the PDO object:
    **********************************************************
    These predefined attributes can help us as programmers to control how PDO object is going to behave in certain ways
    
    PDO::setAttribute => Sets an attribute on the database handle
    Description: bool PDO::setAttribute ( $attribute, $value );
    setAttribute(ATTRIBUTE, OPTION);
    - setAttribute() is a method that belongs to the PDO object 
    - This method is used to set a predefined PDO attribute or a custom driver attribute
    - Returns true on success or false on failure

    We need to use this table in PHP.NET to learn/understand which attribute we can use and what are its possible values:
    https://www.php.net/manual/en/pdo.setattribute.php

    Also you can learn more about "PDO::setAttribute":
    https://docs.microsoft.com/en-us/sql/connect/php/pdo-setattribute?view=sql-server-ver15
*/


/*
NOTE: 
If we are going to use the fetch() with the mode (argument) "PDO::FETCH_OBJ" ONLY
We can set the default value of fetch() method to be "PDO::FETCH_OBJ" instead of the default value "PDO::FETCH_BOTH" that set by PHP:

We can do it by adding an attribute using "setAttribute" PDO Class method and passing these values:
- PDO::ATTR_DEFAULT_FETCH_MODE
- PDO::FETCH_OBJ
*/
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // fetch() will always return an object
// The same if we want to set the default mode to return an associative array:
// $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);   


// PDO Query Method:
$query = $pdo->query('SELECT * FROM posts');

/*
We need to use while loop to loop through all the database records and fetch them all:

We can use this way by specifying again the mode style "PDO::FETCH_OBJ)":
while ($row=$query->fetch(PDO::FETCH_OBJ))

But since we set mode of the fetch() method to be "PDO::FETCH_OBJ" by default even if we don't specify, so we can just use:
while ($row=$query->fetch())

Instead of:

while ($row=$query->fetch(PDO::FETCH_OBJ)) {
   echo $row->title.'<br>';
}
*/

// Look at the two examples below:

// Example1: With specifying the mode type which is "PDO::FETCH_OBJ" 
// Notice that it's Completely Unnecessary Code! We hade already set it to be "PDO::FETCH_OBJ" by default
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    // remember each $row will be an object
    echo $row->title.'<br>'; // for example, to get the post title
    echo "<br><br>";
}
echo "<hr>";

/*
Very Important NOTE to recap :-)
--------------------------------

After running the fetch() in the previous while block, the pointer will be reaching the last record
so we have to execute the sql statement again before every fetch...

In other word, don't forget that fetch() method will move to the next record each time we run it!
That's why we need to repeat the query code again
*/
$query = $pdo->query('SELECT * FROM posts');

// Example2:without specifying the fetch() mode:
while ($row = $query->fetch()) {
    // remember each $row will be an object
    echo $row->title.'<br>'; // for example, to get the post title
    echo "<br><br>";
}

// NO HTML Code, just focusing on PDO 