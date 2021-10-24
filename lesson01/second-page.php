<!-- 
    Below is the opening/closing tags for writing PHP code 
    We can add these tags anywhere we like inside our HTML template

    Very Important Note:
    Anything we write in between the opening and the closing PHP tags
    will NOT be visible to the user => cannot be accessed/seen by the user
-->
<?php
// One line comment (Like JS)
// Hi there! You can't see me the browser, so don't waste your time :-)


/*
Multiple-line comments
line 2
line 3

// Like JS, any programming language has its own set for built-in functions
// We will run a built-in PHP function to return a full and complete info about our PHP:
// Outputs information about PHP's configuration
*/
phpinfo();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PHP elements</title>
</head>
<body>
    <h1>Normal Page Content</h1>
    <p>The rest of my HTML page!</p>
    <?php

    ?>    
</body>
</html>