<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Using BindParam() and BindValue() for the first time!

/*
Below is "Auto generated" INSERT statement:
INSERT INTO `posts` 
(`post_id`, `title`, `body`, `author`, `published`, `released`) 
VALUES (NULL, 'PDO vs MySQLi', 'PDO is PHP API to talk to any DBMS while MySQLi can communicate with MySQL DBMS only.', 'Sarah Davidson', '1', '2021-10-08');
*/


// Assuming that we received these info from a user form
$postTitle = "PDO vs MySQLi";
$postBody ="PDO is PHP API to talk to any DBMS while MySQLi can communicate with MySQL DBMS only.";
$postAuthor = "Sarah Davidson";
$isPublished = "1";
$postCreatedDate = "2021-10-08";

// Just to recap, remember that we DON'T wrap named identifiers with quotations
$sql = 'INSERT INTO posts (title, body, author, published, released)
        VALUES (:title, :body, :author, :published, :released)';

// 1. Prepare:
$stmt = $pdo->prepare($sql);
/*
New Steps:
Before execute the prepared statement object "$stmt"
The next step is binding the values to our named parameters

In Prepared Statement, we bind values to placeholders using any of these two methods:
- bindParam() 
- bindValue()

- bindParam() => binding the variable not the value of the variable to its coresponding identifier
The syntax/pattern: 
$stmt->bindValue(':identifier', The variable that contains the value of form field, PDO::PARAM_STR);

- bindValue() => binding the value immediately (the values must be known)
The syntax/pattern: $stmt->bindValue(':identifier', The form field value for $_POST or $_GET);

The differences between these two methods:
1- bindParam() => works with variables only
- It CANNOT accept "Concatenation" (AKA: with . symbol):
    -- Concatenating string with another string => "First Name: "."Alex"
    -- Concatenating string to a variable => "First Name: ". $fName
- It CANNOT accept Expression such as a math calculation => ($x+$y)
- The values will NOT be evaluated UNTIL the statement is executed

2-bindValue() => works with values only 
- It CAN accept "Concatenation"
- It CAN accept Expression such as a math calculation => ($x+$y)
- The values will be evaluated immediately
- can be used for setting a field to "NULL"

Example: we have the named parameter called "id" and we can set it to "NULL" using this statement:
$stmt->bindValue(':id', NULL, PDO::PARAM_NULL);
First Argument: a string containing the named parameter (the identifier)
Second Argument: the "NULL" value
Third Argument (Optional): PDO constant "PARAM_NULL" for the NULL data type

To learn more about this "third argument":
https://www.php.net/manual/en/pdostatement.bindparam.php


For complete list of the PDO Constants (Predefined Constants) that can be used with the two binding methods:
- https://www.php.net/manual/en/pdo.constants.php

TR: https://www.tutorialrepublic.com/php-tutorial/php-mysql-prepared-statements.php
*/

// Bind parameters to statement object
$stmt->bindParam(':title',$postTitle, PDO::PARAM_STR);
$stmt->bindParam(':body',$postBody, PDO::PARAM_STR);
$stmt->bindValue(':author',"Sarah Davidson"); // it's better to use bindParam() with a varaible "$author"
$stmt->bindParam(':published',$isPublished, PDO::PARAM_STR);
$stmt->bindValue(':released','2021-10-08'); // it's better to use bindParam() with a varaible "$postCreatedDate"

// then we just need to execute the statement by calling execute() method with OUT any arguments!
$stmt->execute();


