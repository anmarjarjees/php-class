<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


// Searching for any record that has the first name of "Alex":
// Remember, we have two records: "Alex Chow" and "Alex Stevenson"
/*
Using the like operator with the wildcard "%" 
searching for the word "alex" => %alex%

Notice it's not case sensitive Alex or alex is the same in searching for data in the database
*/

$firstName = "martin"; 

// Using Anonymous Positional Parameters:
// Prepare:
$stmt = $pdo->prepare('SELECT * FROM posts WHERE author LIKE ?');

// Execute:
/*
Please, don't forget that execute() will return true
even if MySQL statement returned an empty result set!
true => only means that the SQL statement has been run successfully
*/

// I will leave this code for leaning and demo (useless to check the returned bool of execute())
$isFound = $stmt->execute(['%'.$firstName.'%']);
// testing:
echo "<br>Dumping isFound: ";
var_dump($isFound); 
echo "<br>";

// Yes Funny if condition :-)
if ($isFound) {
    echo "<h3>Selected Posts 1</h3>";
    $posts = $stmt->fetchAll();
    
    foreach ($posts as $post) {
        echo $post['title'].'<br>';
    }
}

echo "<hr>";
/*
Very Important Note To "Recap":
Running any type of fetch method will leave the cursor/pointer to the end of the table
Every time we run the the fetch method we need to execute the SQL statement 
*/

// Below we are re-executing the SQL statement for the second use of fetch method
$stmt->execute(['%'.$firstName.'%']);
// The official accurate correct way is using rowCount():
$count = $stmt->rowCount();
if ($count) {
    echo "<h3>Selected Posts 2</h3>";
    $posts = $stmt->fetchAll();
    
    foreach ($posts as $post) {
        echo $post['title'].'<br>';
        echo $post['author'].'<br>';
    }
}

// Task: Try to repeat the same code bu with using the keyword "LIMIT"
$rec_limit=1;

// we will skip the HTML template => we can skip the closing php tag
