<?php
// NOTE: before start using $_SESSION[], we have to use/call this function session_start()
// This topic wil covered in details with login system lecture
// Starting the session and has to be to first line to run
session_start();
/*
Super Global Variables (Associative Arrays):
They are like associative arrays (in written in capital letters)
- $_GET => a super global associative array: with form if the method="GET" 
- $_POST => a super global associative array: with form if the method="POST"
- $_SERVER => a super global associative array: to refer to the hosting server for our website and the current file
- $_SESSION => a super global associative array: to save the user session between different pages of the same website

These two super global arrays will be used with the HTML form to get the user input
Depending the method attribute value of the form element:
- method="POST" OR method="post" 
- method="GET" OR method="get" 

Just remember if there is no method="post" or no method="get"
By default the form will use method="get"
*/

// GET[] info can be accessed through the URL:
// let's put GET[] and POST[] into practice in the next files:

var_dump($_GET); // Empty! => array(0) { }
echo "<hr>";
var_dump($_POST); // Empty! => array(0) { }
echo "<hr>";
// var_dump($_SERVER); // Notice that we commented this line because of it's too much output :-)
/*
$_SERVER:
It's a very complex associative array with too many keys and complex values:
The most important key in this associative array is ["PHP_SELF"]
Example: ["PHP_SELF"] => string(41) "/php-class/lesson07/00.super-global-var.php"
*/
echo "<hr>";
// so let's try test this key/value again:
echo $_SERVER['PHP_SELF']; // "/main-php/lesson07/00.super-global-var.php"
echo "<hr>";
var_dump($_SESSION); // array(0) { }

/*
Trying to access the SGA (Super Global Array) "$_GET" using a key named "module"
An associative array of variables passed to the current script via the URL parameters.
*/
$module_name = $_GET['module'];
echo "My module is: $module_name"; // Notice: Undefined index: module in ...
/*
Running the code, will generate these errors:
Notice: Undefined index: module in...

Because we echoing/outputting something not defined yet!
there is no such key named "module" inside $_GET[], this array is empty

We know that key/values of this array $_GET[] are from the URL
So let's add to the address the following urls (try them):

The normal/basic full url: https://localhost/main-php/lesson07/00.super-global-var.php

let's try to add information by using "?"
- Type: https://localhost/main-php/lesson07/00.super-global-var.php/?module="PHP"
- Then press Enter to see the printed result:
echo $module_name; => will give us "PHP"

More Example from "https://www.tutorialrepublic.com/"
In GET method the data is sent as URL parameters that are usually 
strings of name and value pairs separated by ampersands (&). 
In general, a URL with GET data will look like this:
http://www.example.com/action.php?name=john&age=24

- Type: https://localhost/main-php/lesson07/00.super-global-var.php/?module="HTML and CSS"
- Then press Enter to see the printed result:
echo $module_name; => will give us "HTML and CSS"
The browser cannot accepts spaces or other characters:
- The browser will change " to  %22
- The browser will change the space to  %20
https://localhost/main-php/lesson07/00.super-global-var.php/?module=%22HTML%20and%20CSS%22


- Type: https://localhost/main-php/lesson07/00.super-global-var.php/?module='Python and MySQL'
- Then press Enter to see the printed result:
echo $module_name; => will give us: 'Python and MySQL'
The browser cannot accepts spaces or other characters:
- The browser will change ' to  %27
- The browser will change the space to %20
https://localhost/main-php/lesson07/00.super-global-var.php/?module=%27Python%20and%20MySQL%27
*/

// let's try to add more information:
$program_name = $_GET['program'];
echo "<br>My program is: $program_name";
/*
Notice: Undefined index: program in ...

Notice: Undefined variable: ...
My program is:
*/

/*
Let's try to fix it by adding the two key/value to the URL:
- adding the same key "module" with a new value of Adobe Dreamweaver
- and adding a new key "program" with the value of "DMWD"
NOTE: we need to use the symbol "&"

Then you can write the following full URL and press enter key:
https://localhost/main-php/lesson07/00.super-global-var.php/?module=Adobe Dreamweaver&program=DMWD

Then the browser will modify the URL to be:
https://localhost/main-php/lesson07/00.super-global-var.php/?module=Adobe%20Dreamweaver&program=DMWD

array(0) { } My module is: Adobe Dreamweaver
My program is: DMWD

So GET_[] as an associative array, is used to pass variables through the URL:
*/
echo "<hr>";
// for testing:
var_dump($_GET);
/*
array(2) { ["module"]=> string(17) "Adobe Dreamweaver" ["program"]=> string(4) "DMWD" }

The normal URL: https://localhost/main-php/lesson07/00.super-global-var.php/

==========================================================================================
If we type this address:
https://localhost/main-php/lesson07/00.super-global-var.php/?module=Adobe Dreamweaver&program=DMWD&weeks=4

- The base URL: https://localhost/main-php/lesson07/00.super-global-var.php/
- The parameters that we added at the end: ?module=Adobe Dreamweaver&program=DMWD&weeks=4

And we saw that the browser will convert the URL or mainly our parameters to:
?module=Adobe%20Dreamweaver&program=DMWD&weeks=4

The var_dump() will give us:
array(3) { 
    ["module"]=> string(17) "Adobe Dreamweaver" 
    ["program"]=> string(4) "DMWD" 
    ["weeks"]=> string(1) "4" 
}
*/


/*
The Adv. and disadvantage of GET and POST:
https://www.tutorialrepublic.com/php-tutorial/php-get-and-post.php
*/