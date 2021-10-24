<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Concatenation in PHP</title>
</head>
<body>
    <?php
    /*
       The same like in JavaScript, in PHP:

       We can wrap any string with ' or "

       so we can use echo with " "
       or 
       we can use echo with ' ' 
    */
    $book1 = "Andrea's Guide to PHP Programming"; 
    // OR using '
    // $book1 = 'Andrea's Guide to PHP Programming'; 
    // we have to \ to escape ' before s in the following example (Exactly same rules and symbol like JS)
    // \ => Escape Character
    $book2 = 'Walton\'s Guide to JavaScript Programming';

    $myOpinion = "Andrea\'s Guide to PHP Programming is a \"very good book\" to read now!"; // it works but it has too many escape

    // Very Important Note:
    // In JS used the ` and ${ } to output the value of any variable without using the + for concatenating
    // In PHP we can just use double quotations " and place our variables inside the " to have their values printed
    echo "<p>My two main programming books are $book1 and $book2</p>";
     
    // Notice that using single quote will give me $book1 as a text not as value
    echo '<p>My two main programming books are $book1 and $book2</p>';
    echo '<p>I really like $book1 book, it\'s very interesting!</p>';

    echo '<br><br>';

    
    // Based on what we learnt in PHP by using the dot for concatenating (which the same as using + in JS):
    // We can still use .
    echo '<p>I really like '.$book1.' book, it\'s very interesting!</p>';
    // using double quotes will be an easier way to print the value of a variable! :-)
    echo "<p>I really like $book1 book, it's very interesting!</p>";
    // and the same rules for print also:
    print( '<h3>I really like $book1 book, it\'s very interesting!</h3>' );
    print( "<h2>I really like $book1 book, it's very interesting!</h2>" );

    /*
    To summarize:
    This is the vital difference between using single and double quotes. 
    Anything enclosed in single quotes is treated as literal text. 
    */
	
    echo 'I love $book1 book'; // display the $book
    echo '<br>';
    echo "I love $book1 book"; // display the value of the variable

    echo "<p>I have these 2 books: $book1 and $book2</p>";
    // the same output with .
    echo "<p>I have these 2 books: ".$book1." and ". $book2."</p>";
        
    ?>
</body>
</html>