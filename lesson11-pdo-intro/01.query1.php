<?php
// Include config file for connecting to our database:
// require_once ('includes/db_connect.php');    
// OR:
require_once 'includes/db_connect.php';

/*
Very Important Notes About PDO:
------------------------------
1- (To recap) In Object Oriented Programming (OOP), Classes can have:
--- Properties (Are just variables inside a class)
--- Methods (Are just functions inside a class)
--- CONSTANTS (Are variables that CANNOT be changed, are written all in capital by convention)

2- Class constants are often used as arguments
- In our database file, we used a built-in class named "PDO" =>  $pdo = new PDO($dsn,$user,$password); 
--- PDO (Native PHP Class) has many "static" constants
--- To access one of the predifined constants of the PDO, 
--- we can use this the OOP template: ClassName::CONSTANT_NAME
--- In our case the PHP Class name is "PDO" so our code will be:
    > PDO::CONSTANT_NAME
    > the double colon :: is called or known as the "Scope Resolution Operator"
    > https://www.w3schools.com/php/php_oop_constants.asp
--- PDO class has many methods
--- Calling any of the PDO methods will return an object
--- This returned object contains the result of a query or a prepared statement
*/

/*
For quick demo, we will use this direct way which is the "PDO Query" to get the data.
In a real application, it's better to use a prepared statement as we will do later
*/

// PDO First Basic Query:
// Using our object "pdo" that we have created before in the database connection/config file
// this PDO object has a query() method
// We can just pass an "SQL statement" as a text parameter to the query method:
$query = $pdo->query('SELECT * FROM posts');
// $query will be a PDOStatement Object the contains the result set
// let's check/examine the variable $query (checking its value and its datatype):
echo "<h3>Our variable query:</h3>";
var_dump($query);
/*
Output:
object(PDOStatement)#2 (1) { ["queryString"]=> string(19) "SELECT * FROM posts" }
*/

echo "<hr>";
// Let's use print_r()
print_r($query);
// Output: PDOStatement Object ( [queryString] => SELECT * FROM posts )

/*
Render the content to our page:
Remember that query() method will return a PDOStatement object that contains the results from the database
So we can just loop through this PDOStatement object and display its element(s)
In such case, we need to use while loop to place our condition for keep looping through this object elements
Calling a PDO method named "fetch()" to fetch the data in a format that we can parse as PHP developers

The fetch() method: PDOStatement::fetch — Fetches the next row from a result set
===================
Controls how the next row will be returned to the caller.
The returned value of this method must be one of the PDO::FETCH_* constants,
By default the value will be PDO::ATTR_DEFAULT_FETCH_MODE (which defaults to PDO::FETCH_BOTH).

The three commonly used returned types of fetch() method:
1. PDO::FETCH_BOTH (default):
returns an array indexed by both column name and 0-indexed column number as returned in your result set

2. PDO::FETCH_ASSOC:
returns an array indexed by column name as returned in your result set

3. PDO::FETCH_OBJ:
returns an anonymous object with property names that correspond to the column names returned in your result set

To learn about all the types: https://www.php.net/manual/en/pdostatement.fetch.php

NOTES:
- For a PDOStatement object representing a scrollable cursor, this value determines which row will be returned to the caller.
- The return value of this function on success depends on the fetch type. In all cases, false is returned on failure.

:-( Oh! what's going on!?
*/

/*
In other easy words :-)
***********************
We can use built-in method for the PDOStatement Object the contains the result set. 
In our case, the result set is saved to an object and we call it "$query".
This method is called fetch().

So the simplest pattern could be: $query->fetch()

fetch() method can fetch one record at a time from our table.
This method can return different values based on the arguments we pass to the function but we can focus on these 3 values:
1. PDO::FETCH_BOTH (default): Both indexed array and an associative array for each record in our database
2. PDO::FETCH_ASSOC: an associative array for each record in our database (the most commonly used)
3. PDO::FETCH_OBJ: an object for each record in our database

We will be checking the 3 ways of using PDO fetch() method of our Result Set object "query":
- $query->fetch()
- $query->fetch(PDO::FETCH_ASSOC)
- $query->fetch(PDO::FETCH_OBJ)

As programmers, we can determine which value we want to receive,
In general, the argument "PDO::FETCH_ASSOC" is more commonly used
because it returns the a row (record) in readable php format (associative array) that we can use as programmes

fetch like any other method/function, it can accept parameters, let's try to use fetch() without arguments, and with arguments
*/



echo "<hr>";
echo "<br>Our   PDOStatement Object is 'query': ";
print_r($query);
echo "Checking The Three Ways of Using fetch() method<br>";

// 1. PDO::FETCH_BOTH (default) => Calling the fetch() method without any passing any arguments
// This will return an Both: indexed array and an associative array for each record in our database
echo "Using fetch() without passing any argument. PDO will use the default: PDO::FETCH_BOTH <br>:";
$oneRow1 = $query->fetch();
print_r($oneRow1 ); // we got the first record after running the fetch() for the first time
/*
    Output:
    Array ( 
        [post_id] => 1 
        [0] => 1 
        
        [title] => Why Learning JavaScript? 
        [1] => Why Learning JavaScript? 
        
        [body] => JavaScript is the most important language that any developer or programmer should learn. 
        [2] => JavaScript is the most important language that any developer or programmer should learn. 
        
        [author] => Alex Chow 
        [3] => Alex Chow 
        
        [published] => 1 
        [4] => 1 
        
        [released] => 2021-09-01 
        [5] => 2021-09-01 
    )
*/

echo "<hr>";
// 2. PDO::FETCH_ASSOC: (Most Commonly Used)
echo "Using fetch() with argument: PDO::FETCH_ASSOC: <br>";
$oneRow2 = $query->fetch(PDO::FETCH_ASSOC);
print_r($oneRow2); // We will get the second record after running the fetch() for the second time
/*
    Output:
    Array ( 
        [post_id] => 2 
        [title] => PHP and MySQL 
        [body] => PHP is the language that was designed to create web applications. it's compatible to work with MySQL. 
        [author] => Martin Smith 
        [published] => 1 
        [released] => 2021-09-01 
    )
*/

echo "<hr>";
// 3. PDO::FETCH_OBJ:
echo "Using fetch() with argument: PDO::FETCH_OBJ: <br>";
$oneRow3 = $query->fetch(PDO::FETCH_OBJ);
print_r($oneRow3); // we will get the third record after running the fetch() for the third time
/*
    Output:

    stdClass Object ( 
        [post_id] => 3
        [title] => HTML5 and CSS3 
        [body] => Working with HTML5 which is the last version of HTML and using CSS Level 3 [author] => Alex Stevenson [published] => 0 
        [released] => 2021-09-06 
    )
*/

echo "<hr>";
// if we continue, we will get the record number 4:
echo "Using fetch() with argument: PDO::FETCH_ASSOC (Again): <br>";
$oneRow4 = $query->fetch(PDO::FETCH_ASSOC);
print_r($oneRow4); // We will get the forth record   

echo "<hr>";
// if we continue, we will get the record number 5 (but we only have 4 records):
echo "Using fetch() with argument: PDO::FETCH_ASSOC (Again): <br>";
// We can run the query again: $query = $pdo->query('SELECT * FROM posts');
// Otherwise, we get nothing
// $query = $pdo->query('SELECT * FROM posts');
$oneRow5 = $query->fetch(PDO::FETCH_ASSOC);
print_r($oneRow5); // No record 5 => will be just empty

/*
Finally: In all these examples we just returned one record as a single row,
we will use while loop to return all the records in the next file
*/

/*
Conclusion:
1- fetch() method can return only one record at a time. 
To retrieve all records we can place the fetch() in while loop (later)
2- fetch() method can accept arguments, the three major arguments
- No arguments => PDO::FETCH_BOTH => returns indexed and associative array
- PDO::FETCH_ASSOC => returns associative array
- PDO::FETCH_OBJ: => returns an object
3- every time we run the fetch() will stop in the next row

*/
// Fetch result row as an associative array with while loop to fetch all the records in our database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Introduction</title>
</head>
<body>
    <h1>Welcome to PDO Introduction</h1>
</body>
</html>