<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/*
PHP MySQL Prepared Statements:
Is simply a SQL query template containing placeholder instead of the actual parameter values. 
These placeholders will be replaced by the actual values at the time of execution of the statement.

The idea of using a prepared statement is separating the SQL statements
from the the variables that contains the actual data.

So "Prepared statements" is very useful when you execute a particular statement multiple times with different values, 
for example, a series of INSERT statements (later...)

Also remember that these variables might contain SQL statements/instructions
that the hacker might use to attack the databases and what it's called "SQL Injection"
So "Prepared statements" also provide strong protection against this type of attack "SQL injection"

Learn more about "https://www.tutorialrepublic.com/sql-tutorial/sql-injection.php"

To learn more about PDO Prepared Statements: 
- TR: https://www.tutorialrepublic.com/php-tutorial/php-mysql-prepared-statements.php
- PHP.NET: https://www.php.net/manual/en/pdo.prepare


The prepared statement execution consists of two stages: prepare then execute.
Stage#1. Prepare: => prepare()
-----------------
SQL statement template is created and sent to the database server. 
The server parses the statement template, performs a syntax check and query optimization, 
and stores it for later use.

Stage#2. Execute: => execute()
----------------
During execute the parameter values are sent to the server. 
The server creates a statement from the statement template and these values to execute it.

First Step: using prepare()
To prepare the SQL statement, we use a PDO Class method named "prepare()"
Don't forget that our object that created/instantiated from the PDO class called "$pdo"
so we can use the syntax: 
$pdo->prepare(query)
query: This must be a valid SQL statement template for the target database server.

The prepare() Method Return Values:
Case1: 
If the database server successfully prepares the statement, 
PDO::prepare() returns a "PDOStatement" object. 
Notice that this  "PDOStatement" object will be used to execute the statement by calling its method execute()

Case2:
If the database server cannot successfully prepare the statement, 
PDO::prepare() returns "false" or emits PDOException (depending on error handling).

Second Step: using execute()
Then we can run the execute() method
This method accept an array structure as an argument
The element(s) of this array will be the real/actual to placed on the placeholders of the prepared statement

The execute() Method Return Values:
Returns "true" on success or "false" on failure.

PHP.NET: https://www.php.net/manual/en/pdostatement.execute.php
*/

/*
Action#1: The Basic Way (With OUT using Prepared Statements/Bad Example)
Getting information form the user and run them against our database
Let's use a variable to save the sql statement:
*/

/*
We are hard coding the value for quick demo,
but we can get the value from the user form
then we will pass the varaible "author" to the statement (This way is not recommended and it's unsafe)
*/
$author = "Alex Chow";
$sql1 = "SELECT * FROM posts WHERE author ='$author'";
// Or many other SQL Statements as we have learnt before:
/*
Our table "posts" has the following structure/field/columns:
            1-	post_id
            2-	title	
            3-	body	
            4-	author
            5-	published
            6-  released
*/
$title="PDO Prepared Statement";
$body="Yes, it's a long article!";
$author="PHP Superman";
$published=1;
$released="2021-10-05";
$sql2 = "INSERT INTO posts (title,body,author,published,released) VALUES($title,$body,$author,$published,$released";

echo "<p>the SQL statement is: $sql1</p>";
echo "<p>the SQL statement is: $sql2</p>";
echo "<hr>";
/*
Action#2: The Official Way (With using Prepared Statements)

There two ways to implement the "Prepare Statement":
- Anonymous Positional Placeholder (?) => Also works with MySQLi
- Named Placeholders => ONLY for PDO

NOTE:
MySQLi supports the use of anonymous positional placeholder (?) only
While, PDO supports both "anonymous positional placeholder (?)", as well as the "named placeholders".
A named placeholder begins with a colon (:) followed by an identifier (any variable name), like these examples:

In this example, we doing the "SELECT" Statement from the CRUD Operation which refers to the R for "Read" 

Example1 of using Anonymous Placeholders Template:
--------------------------------------------------
INSERT INTO table_name (column1, column2, column3) VALUES (?, ?, ?);

Example2 of using Anonymous Named Placeholders:
-----------------------------------------------
INSERT INTO table_name (column1, column2, column3) VALUES (:name_identifier1, :name_identifier2, :name_identifier3);
These "Name Identifiers" are just varaibles, and we can pick any names make sense to us


These examples for the next file:
Template Example1:
INSERT INTO table_name (column1, column2, column3)
VALUES (:any_var_name1, :any_var_name1, :any_var_name1);

Example2:
INSERT INTO persons (first_name, last_name, email)
VALUES (:first_name, :last_name, :email);

Example3:
INSERT INTO persons (first_name, last_name, email)
VALUES (:fName, :lName, :email);

NOTES:
- Both anonymous placeholders and named placeholders can be used only to save the column values (not for column names)
- Both anonymous placeholders and named placeholders are not wrapped in quotes so make it easy to place them within any string
- Please note that the name of an identifier doesn't necessarily need to be same as the column (field) name in our database
*/


// Working with PDO Prepared Statement:
// ************************************

// ===================================================
// First Way: Applying the Anonymous Placholders: (?)
// ===================================================
// Step1: Prepare an SQL (select, insert, delete, update) statement using "Anonymous Positional Parameter" ==> ? (using ?)
// The simple SQL Statement: 
// SELECT * FROM posts WHERE author ='Martin Smith' OR title='Back-End Development with PHP and MySQ';
// The ? will act as a placeholder
$sqlQuery = "SELECT * FROM posts WHERE author=? OR title=?"; // Just my SQL statement with the placeholders

// Stage#1: Prepare: 
// using PDO method named "prepared()"
// Saving the returned filtered/secured statement into a variable named stmt (for statement)
// This $stmt is the "PDOStatement" object that we need in order to run the execute() method
$stmt=$pdo->prepare($sqlQuery);

// Fot testing:
echo "<br>dump stmt:<br>";
var_dump($stmt); // object(PDOStatement)#2 (1) { ["queryString"]=> string(46) "SELECT * FROM posts WHERE author =? OR title=?" }

// We can use an array with "assuming" the following values:
// Yes, it just an assumption, in real project we will receive values for the user's forms
$author = "Martin Smith";
$title = "Back-End Development with PHP and MySQL";

// Stage#2: Execute the statement:
/*
The template: PDOStatement_Object->execute()
The "PDOStatement_Object" is $stmt

Below we are filling the placeholders "?" with these values $author and $tile
Please be advised that order is matter here
Based on our sql statement, the first ? is for the "author" and the second ? is for the "title"
So we can pass these two values using array format:

NOTE: Don't forget that execute() method returns "true" on success or "false" on failure.
In such case, as programers we can take this nice feature as we are going to see in the next examples:-)
*/
$stmt->execute([$author, $title]);
echo "<hr>";

// Fot testing:
echo "<br>Second dump stmt:<br>";
var_dump($stmt);

/*
Output: Notice it's the same result we receive from using query() method, but this one is more secured/professional
object(PDOStatement)#2 (1) { 
    ["queryString"]=> string(46) "SELECT * FROM posts WHERE author =? OR title=?"
}
*/

echo "<hr>";
/*
As PHP programmers, we need to parse the object(PDOStatement) into something manageable by PHP code,
Yes, we can use fetch() again:
*/
$post = $stmt->fetch();
// for testing:
echo "<br>First Select Result:<br>";
print_r($post);
/*
Array ( 
    [post_id] => 2 
    [title] => PHP and MySQL 
    [body] => PHP is the language that was designed to create web applications. it's compatible to work with MySQL. 
    [author] => Martin Smith [published] => 1 [released] => 2021-09-01 )
*/

echo "<hr>";
// Let's try to search for another existing data:
// And also let's use different varaible names (no need to be the same as the column names)
$postAuthor = "Alex Chow"; // We have the author "Alex Chow"
$postTitle = "Back-End Development with PHP and MySQL"; // We don't have this tile
// NOTE: Notice that you don't need to prepare the statement again!
// $stmt=$pdo->prepare($sqlQuery); 
// Just execute the statement with new arguments:
$stmt->execute([$postAuthor, $postTitle]);
$post = $stmt->fetch();
// for testing:
echo "<br>Second Select Result:<br>";
print_r($post);
/*
Array ( [post_id] => 1 [title] => Why Learning JavaScript? [body] => JavaScript is the most important language that any developer or programmer should learn. [author] => Alex Chow [published] => 1 [released] => 2021-09-01 )
*/

echo "<hr><hr><hr><hr>";
// Another example for all the steps together: 
// Task: Selecting only the published articles:
// Simple SQL Statement (MySQL) in phpMyAdmin: SELECT * FROM posts WHERE published=1;

// Write our statement and save it to variable OR we can just place/pass the entire SQL statement to the method prepare():
// prepare: returns an object "PDOStatement Object"
$stmt=$pdo->prepare("SELECT * FROM posts WHERE published=?");
// execute: accepts the required values as an array structure
// the number of the elements in this array is exactly the same as the number of the ? marks 
$stmt->execute([1]);

/*
Notice this query might return more than one single post,
We can use fetchAll();
Fetching all the records out of the "$stmt" which is PDO statement object:
Remember below, the default parameter for fetchAll() is "PDO::FETCH_ASSOC"
Based on what we have set initially
*/
$publishedPosts = $stmt->fetchAll();
/*
Based on the condition that we set for the WHERE clause in our SELECT statement and our data,
We will have 3 records (be carful this might be changed depending on what we have in our database)
*/

// for testing:
var_dump($publishedPosts);
/*
array(3) { 
    [0]=> array(6) { 
        ["post_id"]=> string(1) "1" ["title"]=> string(24) "Why Learning JavaScript?" ["body"]=> string(88) "JavaScript is the most important language that any developer or programmer should learn." ["author"]=> string(9) "Alex Chow" ["published"]=> string(1) "1" ["released"]=> string(10) "2021-09-01" 
    } 
    
    [1]=> array(6) { 
        ["post_id"]=> string(1) "2" ["title"]=> string(13) "PHP and MySQL" ["body"]=> string(101) "PHP is the language that was designed to create web applications. it's compatible to work with MySQL." ["author"]=> string(12) "Martin Smith" ["published"]=> string(1) "1" ["released"]=> string(10) "2021-09-01
    } 
        
    [2]=> array(6) { ["post_id"]=> string(1) "4" ["title"]=> string(15) "Learning Python" ["body"]=> string(93) "Python became a very popular language. It's built-in in English verses and supports the OOP. " ["author"]=> string(13) "Sarah Grayson" ["published"]=> string(1) "1" ["released"]=> string(10) "2021-09-06" 
    }
}
*/

// Final example:
// Task: Selecting all the posts:
// Simple SQL Statement (MySQL) in phpMyAdmin: SELECT * FROM posts;
$stmt=$pdo->prepare("SELECT * FROM posts");
$stmt->execute();

/*
Remember if you like to try fetching the rows as objects
we can pass this mode as a argument to execute() method
*/
$allPosts = $stmt->fetchAll(PDO::FETCH_OBJ);

// ===================================================
// Second Way: the named identifiers as placeholders: => We will do it in the next file :-)
// ===================================================
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Prepared Statement 1</title>
</head>
<body>
    <h1>PDO Prepared Statement</h1>
    <h2>Published Posts</h2>
    <!-- Render the posts array nicely for our clients: -->
    <?php
    // publishedPosts is an associative array:
    foreach ($publishedPosts as $post) {
        echo "<br>Title: ".$post['title']."<br>";
        echo "<br>Article: ". $post['body']. "</br>";
        echo "<br>Author: ". $post['author']. "</br>";
        echo "<br>Released: ". $post['released']. "</br>";
        echo "<hr>";
    }

    echo "<h2>All Posts</h2>";
    // allPosts is an object:
    foreach ($allPosts as $post) {
        echo "<br>Title: ".$post->title."<br>";
        echo "<br>Article: ". $post->body. "</br>";
        echo "<br>Author: ". $post->author. "</br>";
        echo "<br>Released: ". $post->released. "</br>";
        echo "<hr>";
    }
    ?>
</body>
</html>