<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/*
Second Way: the named placeholders
A named placeholder begins with a colon (:) followed by an identifier (column name)
Below we are filling the placeholders "column_name = :identifier" with these values $author and $tile

Below we will named placholders, each one with a unique name:
Previously, we used only two ? marks, but now we use names
*/

// Writing my SQL Statement:
/*
Notice below, I am using named identifiers:
- "post_author" => the named identifier (label) for the searched value of the table column "author"
- "post_title"  => the named identifier (label) for the searched value of the table column "title"
to show you that these identifiers could be any variable names 
that we define in our PHP code to retrieve/save/use the user's value
Although by convention PHP programmers usually use the same name as the table columns names 
*/
$sql = "SELECT * FROM posts WHERE author = :post_author OR title = :post_title";

/*
So Yes, we can use the same names as the columns names for our identifiers:
 - "author" => the named identifier (label) for the searched value of the table column "author"
- "title"  => the named identifier (label) for the searched value of the table column "title"  
*/
// $sql = "SELECT * FROM posts WHERE author = :author OR title = :title";

// Stage#1. using PDO method named "prepared()"
$stmt=$pdo->prepare($sql); // Yes, we can place/pass the entire SQL statement as an argument to prepare()

// Stage#2. using PDO method named "execute()"
/*
With named placeholder, we need to use the associative array syntax:

$mmArray = 
[
    'module' => 'PHP Programming',
    'length' => '4 weeks',
    'program' => 'DMWD'
]

Very Important Note:
The "keys" will be the "identifiers" that we set in our SQL statement, we have two => :author and :title
The "values" will be the "user input" (the variables) => that we need to assign to the named identifiers
*/

// We can use an array with "assuming" the following values:
// Yes, it just an assumption, in real project we will receive values for the user's forms
$author = "Martin Smith";
$title = "Back-End Development with PHP and MySQL";
$stmt->execute(['post_author'=>$author, 'post_title'=>$title]);

$post = $stmt->fetch();
// for testing:
echo "<br>First Select Result:<br>";
print_r($post);
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
echo "<br>Second Example:<br>";
// Another Example:
// Select the record/row/post with that has the title "PHP and MySQL"
// The simple SQL statement: 
// SELECT * FROM posts WHERE title='PHP and MySQL'

// our PHP variable to have the value of "PHP and MySQL" as hard-coded value
// the variable is named $pTitle short for "post title"
$pTitle = "PHP and MySQL"; // In real application => $pTitle = $_POST['post_title'];

// You can try to change it to:
$pTitle = "PHP and MySQL Programming"; // We don't have a post with this title

// Notice below, the identifier name is ":title" as the column name to speed the process
// we can name it $x, $y, etc...

$sql = 'SELECT * FROM posts WHERE title = :title';
// 1. using PDO method named "prepared()"
$stmt = $pdo->prepare($sql);
// Or just one line code (many developers prefer this short way):
$stmt = $pdo->prepare('SELECT * FROM posts WHERE title = :title');
// for testing:
    var_dump($stmt);
    echo "<hr>";
/*
Output: 
object(PDOStatement)#2 (1) 
{ 
    ["queryString"]=> string(40) "SELECT * FROM posts WHERE title = :title" 
}
*/

// 2. using PDO method named "execute()"
/*
Again we will use the associative array syntax with with named placeholder as we did above
- The keys will be the identifiers that we set in our SQL statement, we have only one => :title
- The values will be the user input (the variables) that we need to assign to the named identifier

Trying something else,
Remember that execute() returns: Returns "true" on success or "false" on failure.
*/
$isFound = $stmt->execute(['title'=>$pTitle]);

// $post=false; // no need for this line
if ($isFound) {
    $titlePost = $stmt->fetch();
}

echo "<hr>";
// Another Example: Fetching all the records (same code like anonymous):
$stmt = $pdo->prepare('SELECT * FROM posts');
$isThereAnyRecord = $stmt->execute();
if ($isThereAnyRecord) {
    $allPosts = $stmt->fetchAll();
}

$count=1;
foreach($allPosts as $post) {
    echo "<br>Post#: ".$count++."<br>"; // We don't want to use the id value for counting
    echo "<br>Title: ".$post['title']."<br>";
    echo "<br>Content: ".$post['body']."<br>";
    echo "<br>Author: ".$post['author']."<br>";
    echo "<br>Date: ".$post['released']."<br>";
    echo "<hr>";
}
echo "<hr><hr><hr>";

/*
PDOStatement Object Method "rowCount()"
=======================================
PDOStatement::rowCount() returns the "number" of rows 
affected by the last DELETE, INSERT, or UPDATE statement 
executed by the corresponding PDOStatement object.

PHP.NET => https://www.php.net/manual/en/pdostatement.rowcount
*/

// Example of using "rowCount()": How many records we have in our table based on the SQL Query Statement
// Selecting all records without exceptions
// $sql = SELECT * FROM posts 
// $stmt = $pdo->prepare($sql);

// 1. using PDO method named "prepared()"
$stmt = $pdo->prepare('SELECT * FROM posts');
// Remember that $stmt => PDOStatement Object

// 2. using PDO method named "execute()"
/*
This time we select everything so no placeholders for the prepare() method
which means no arguments for execute() method
*/
$stmt->execute();

/* Return number of rows that were selected */
print("Return number of rows that were selected:\n");
$count = $stmt->rowCount();
echo "<br>";
print("We have $count rows (records) in our table.\n");
echo "<hr>";

// Again one more time :-)
$postCount = $stmt->rowCount();
echo "<br>We have $postCount posts in our database."; // We have 4 posts in our database.
echo "<hr>";
// Challenge Your Knowledge:
// -------------------------
// Two Tasks:
// Yes, we can use HTML template to format the output for both tasks

// Task1:
// Try to use this example: Select only all the published posts
// The posts that have the bool value of true for the field "published"
// Using this varaible below:
$is_published = true;

// Task2:
// Try to use this example: Select only one post which is based on its id value
// The post that have the value of "1" for the field "post_id"
// NOTE: In this example we use fetch() instead of fetchAll() as we are getting only one record
// Using this varaible below:
$id = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Prepared Statement 2</title>
</head>
<body>
    <h1>PDO Examples Inside Our HTML Official Template (inside the body element)</h1>
    <?php
        // $post will be an associative array for the selected record
        // if $post has any value then go ahead and print them 
        if ($titlePost) {
            echo "<br>Title: ".$titlePost['title']."<br>";
            echo "<br>Content: ".$titlePost['body']."<br>";
            echo "<br>Author: ".$titlePost['author']."<br>";
            echo "<br>Date: ".$titlePost['released']."<br>";
        } else {
            echo "Sorry, there is no such title/article in our database!";
        }
    ?>
</body>
</html>