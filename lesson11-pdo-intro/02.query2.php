<?php
require_once 'includes/db_connect.php';

// PDO Query Method:
// Using the object "pdo" with its query() method
// We can just pass an sql statement as a text parameter to the query method:
$query = $pdo->query('SELECT * FROM posts');

/*
Based on the previous example:
$query will be the variable that contains the "Result Set"
*/

// testing
// print_r($query); // PDOStatement Object ( [queryString] => SELECT * FROM posts )

// we can use fetch() method for our object that contains the result set => $query
// we will pass the argument "PDO::FETCH_ASSOC"
// fetch() can return one row/record at time
$row1 = $query->fetch(PDO::FETCH_ASSOC); // returns the frist record/row => running for the first time
print_r($row1);
echo "<br><br>";

$row2 = $query->fetch(PDO::FETCH_ASSOC);  // returns the second record/row => running for the second time
print_r($row2);
echo "<br><br>";

$row3 = $query->fetch(PDO::FETCH_ASSOC);
print_r($row3);
echo "<br><br>";

$row4 = $query->fetch(PDO::FETCH_ASSOC);
print_r($row4);
echo "<br><br>";

// Below there is no record#5
$row5 = $query->fetch(PDO::FETCH_ASSOC);
print_r($row5); // it will just show the boolean value of "false" which is nothing
// for testing, we can use gettype() function:
// https://www.w3schools.com/php/func_var_gettype.asp
print(gettype($row5)); // boolean
echo "<br><br>";

/*
We need to use while loop to loop through all the table records and fetch them all,
not only the first/second/etc... records!

Using the same technique as the above examples, 
just by placing the syntax inside the while() loop condition:

    while (the condition is true) {
        // keep repeating the same code
    }
*/
echo "<hr><hr>";
// Yes, we do need to run our query again to rest the fetch() counter
$query = $pdo->query('SELECT * FROM posts'); // having a new result set into the variable $query
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    // remember each $row will be just simple associative array!
    print_r($row);
    echo "<br><br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Posts</title>
    <style>
        table, td, th {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <!-- lets' try to output all the fields in very simple/plain: -->
    <?php
    // Again :-) don't forget to rerun the query method:
    $query = $pdo->query('SELECT * FROM posts'); // having a new result set into the variable $query
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    // remember each $row will be just simple associative array (PDO::FETCH_ASSOC)!
    /*
        Each row will represent an associative array:
        - The keys will be the fields name (titles) that we defined in our table
        - The values will be the data that we have in each field of our table

        Our table "posts" has the following structure/field/columns:
        1-	post_id
        2-	title	
        3-	body	
        4-	author
        5-	published
        6-  released

        The above list of 6 items will be the keys of the assoc array $row
         so we can target the value of each column:
        $row['title'];
        $row['body'];
        $row['author'];
        $row['released'];

    */

    // We need to concatenate them properly :-)
    echo "Post ID: ". $row['post_id']. "<br>";
    echo "Post Title: ". $row['title']. "<br>";
    echo "Post Article: ". $row['body']. "<br>";
    echo "Post Author: ". $row['author']. "<br>";
    echo "Post Is Published: ". $row['published']. "<br>";
    echo "Post Release Date: ". $row['released']. "<br>";
    echo "<br>";
    }

    echo "<hr>";
    // Or we can fetch the content as objects
    // But again we do need to rerun the query:
    $query = $pdo->query('SELECT * FROM posts');
    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        // remember each $row will be just simple object (PDO::FETCH_OBJ)!
        /*
            Each row will represent an object:
            - The properties of this object will be the fields name (titles) that we defined in our table
            - The values will be the data that we have in each field of our table
    
            Our table "posts" has the following structure/field/columns:
            1-	post_id
            2-	title	
            3-	body	
            4-	author
            5-	published
            6-  released
    
            The above list of 6 items will be the properties of the object $row
            so we can target the value of each column:
            $row->post_id;
            $row->title;
            $row->body;
            $row->author;   
            
            We are fetching our data as object,
            so we cannot use the array syntax to get a value of an object!

            PHP will give use this error:
            Fatal error: Uncaught Error: Cannot use object of type stdClass as array in
        
            // echo $row['title'].'<br>';
        */
    
        // We need to concatenate them properly :-)
        echo "Post ID: ". $row->post_id. "<br>";
        echo "Post Title: ". $row->title. "<br>";
        echo "Post Article: ". $row->body ."<br>";
        echo "Post Author: ". $row->author. "<br>";
        echo "Post Is Published: ". $row->published. "<br>";
        echo "Post Release Date: ". $row->released. "<br>";
        echo "<br>";
        }
    
    ?>

    <!-- Or we can use a table (more advanced formatting) -->
    <table>
        <tr>
            <th>Post Title</th>
            <th>Post Article</th>
            <th>Post Author</th>
            <th>Post Release Date</th>
        </tr>
        <?php
           // Again :-) don't forget to rerun the query method:
            $query = $pdo->query('SELECT * FROM posts'); // having a new result set into the variable $query
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
                // We need to concatenate them properly :-)
                echo "<tr>";
                echo "<td>". $row['title']. "</td>";
                echo "<td>". $row['body']. "</td>";
                echo "<td>". $row['author']. "</td>";
                echo "<td>". $row['released']. "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <!-- Maybe using definition list (dl) might be better than using table, you can try it (enjoy) :-) -->
</body>
</html>



