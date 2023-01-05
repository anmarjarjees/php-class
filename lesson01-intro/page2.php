<!-- 
    Review::
        - we used <style> </style> to embed css inside <head> element
        - we used <script> </script> to embed JavaScript code anywhere inside our HTML file
        - We can embed (insert) php code inside our .php file by using < ?php and ?>    
    
    Below is the opening/closing tags for writing PHP code 
    We can add these tags anywhere we like inside our HTML template

    Very Important Note:
    Anything we write in between the opening and the closing PHP tags
    will NOT be visible to the user => cannot be accessed/seen by the user's browser
    because PHP is a server-side language
-->
<?php
/* 
PHP has the same comment symbols like JavaScript.
*/

// One line comment (Like JS)
// Hi there! You can't see me the browser, so don't waste your time :-)


/*
Multiple-line comments
line 2
line 3

phpinfo():
Like JS, Java, or any programming language, PHP has its own set for built-in functions
the "phpinfo()" outputs information about PHP's configuration
We will type a built-in function "phpinfo" just to display all the information about the current php version that we have installed in our computers: 
*/

// Any PHP sentence/statement has to be ended with ; like in Java
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
    <!-- 
      Another PHP code can be added/embedded below: 
    -->
    <?php
        phpinfo(); // Display PHP version and other details
    ?>    
</body>
</html>