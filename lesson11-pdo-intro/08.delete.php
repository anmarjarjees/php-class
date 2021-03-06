<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Below is just a copy of DELETE Statement Template Generated by MySQL (phpMyAdmin):
/*
DELETE FROM `posts` WHERE 0
*/

// Updating a record:
// Assuming that we will delete the record (post) with id value of "6" or any other value you try
$postId = 6; // This is the post id for the record that we need to delete

// Remember the post tile is "Learning Dreamweaver"
// We will delete the entire post :-(

// Prepare:
// For simplicity, developers use the same names for the table columns for their name identifiers
$stmt = $pdo->prepare('DELETE FROM posts WHERE post_id=:post_id');

// Execute:
$stmt->execute(['post_id'=>$postId]);

$count1 = $stmt->rowCount();
echo "<hr>Row Delete Count: ";
var_dump($count1); // will return 1 if the specific row has been deleted, return 0 if record not found
/*
Output: Row Update Count: int(0)
*/
echo "<hr>";
/*
Instead of checking if ($count==1)
we can just write if ($count)
in programming, the value of "1" is true and the value of "0" is false
*/
echo (($count1) ?  "<br>Post with id value of $postId has been deleted!" : "<br>Sorry no post has been deleted!");

echo "<hr>";
// One more example for more clarifications :-)
// Task: Delete any record whose author first name is "Alex"
// in our database, we have two records with first name "Alex":
// - Alex Chow
// - Alex Stevenson
/*
Simple SQL Statement: DELETE FROM post WHERE author LIKE "%alex%";

Delete any name that has these 4 letters "alex" at the beginning, middle, or end 
whatever the letter case (DB is insensitive)

Using the like operator with the wildcard "%" 
searching for the word "alex" => %alex%

Notice it's not case sensitive Alex or alex is the same in searching for data in the database
*/

// Overriding the previous PDOStatement object:
// Prepare:
$stmt = $pdo->prepare('DELETE FROM posts WHERE author LIKE :name');
$name="alex"; // again hard coding for quick demo

// Execute:
$stmt->execute(['name'=>'%'.$name.'%']);

$count2 = $stmt->rowCount();
// Checking "again the same logic as above":
/*
If count2 has any value other than 0:
But no need as both (true/false) will have the exactly same output message
*/
// echo (($count2) ?  "<br>$count2 record(s) has/have been deleted!" : "<br>$count2 record(s) has/have been deleted!");
echo "<br>$count2 record(s) has/have been deleted!";

// we will skip the HTML template => we can skip the closing php tag