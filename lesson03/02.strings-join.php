<!-- Our first PHP block to set the variables -->
<?php
 $book1 = "Andrea's Guide to PHP Programming";  
 $book2 = 'Walton\'s Guide to JavaScript Programming';

 $book1;
 $book2;

// Joining Strings:
$firstName = 'Martin';
$lastName = 'Smith';

// In JS: var fullName = firstName + " " + lastName
$fullName = $firstName." ".$lastName;

$title="PHP Programming";
$author = 'Andrea Tory';
$pages= 723;

$message = "Full Name: ".$fullName."<br>"; 

// it has many " and "
// OR:
$message .= "Full Name: $fullName <br>";
$message .="Book: $title <br>";
$message .="Author: $author<br>";
$message .="Number of Pages: $pages</br>";
// Remember in JS we also used +=
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Strings</title>
</head>
<body>
    <!-- We can access our PHP variables in the body -->
    <h1>My Books</h1>
	<p>
		My first book to read this semester was <?php echo $book1 ?>. 
        It was a good book. My Second book that I am still reading right now is <?php  echo $book2 ?>.
	</p>

    <?php 
		// We will do it with 3 echo functions
		echo "Title: ". $title."<br>";
		echo "Author: ". $author."<br>";
		echo "Pages: ".$pages;
	?>

    <p>
		<?php echo $message ?>
	</p>
</body>
</html>