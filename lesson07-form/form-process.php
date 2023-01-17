<!-- NOTE: This file is intended to be used with/by 01.simple-from1.php -->
<?php
// The pure php code for handling the form after being submitted:
// We can add the full HTML contents here or we can just use PHP

// Just for testing => output a simple text:
echo "Da! da! you submitted the from! Congratulation!";
echo "<hr>";

/*
Using our lovely function var_dumps()
Dumps information about a variable
*/
// testing: output the array $_POST()
var_dump($_POST); // Empty => array(0) { }
echo "<hr>";

// testing: output the array $_GET()
var_dump($_GET); // Is not empty, it has all the form input values 
/*
array(5) { 
    ["name"]=> string(9) "Alex Chow" 
    ["email"]=> string(36) "alexchow@canadianbusinesscollege.com"  
    ["phone"]=> string(8) "12345678" 
    ["comments"]=> string(18) "No thing important" 
    ["send"]=> string(13) "Send Comments" 
}

NOTE: 
Notice that we also have the key ["send"]=> string(13) "Send Comments", why?
Definitely, we do need to save its value "Send Comments" into our database!
But this key can be used to check if the form is being submitted or not yet (later)

And because of using "GET", all the information are being attached to the URL:
To make it easier to read, I put the url in separate lines:
You can see that URL character are bing coded by the browser:

For example:
    The value for name field: Alex Chow => Alex+Chow
    also the @ symbol for email field is changed to %40
    and etc...

https://localhost/main-php/lesson07/form-process.php
?name=Alex+Chow
&email=alexchow%40canadianbusinesscollege.com
&phone=12345678
&comments=No+thing+important
&send=Send+Comments
*/

// Let's keep going by getting the values of the $_GET associative array and save them into simple php variables:

// 1. Getting the user full name:
$fullName = $_GET['name'];

echo "<br>Thank you, $fullName for submitting the form!";
// based on what we have learnt before, we can NOT output the array object in between " Error:
// echo "<br>We will use this email $_GET['email'] to send you your authentication code.";

// Below is the solution, we need to concatenate both text and variables:
echo "<br>We will use this email ".$_GET['email']." to send you your authentication code.";

// OR using this way if you have the intention to reuse the value this field more than our time!
$email = $_GET['email'];
echo "<br>Notice that this email address: $email will not be shared with other clients.";

// We can have more fun or more examples:
// let's try to save each value of the user into an indexed array!
$userInfo=[];
foreach ($_GET as $value) {
    $userInfo[] = $value; 
}
echo "<hr>";

// For testing - to output any array, we can use print_r() or var_dump():
print_r($userInfo);
/*
Array ( 
    [0] => Alex Chow 
    [1] => alexchow@canadianbusinesscollege.com 
    [2] => 12345678 
    [3] => No thing important 
    [4] => Send Comments
)
*/
echo "<hr>";

// OR we can assign the $_GET associative array to another more descriptive name!
$info = $_GET;
print_r($info);
/*
Array ( 
    [name] => Alex Chow 
    [email] => alexchow@canadianbusinesscollege.com 
    [phone] => 12345678 
    [comments] => No thing important 
    [send] => Send Comments
)
*/

echo "<br>Ok, ".$info['name'].", please to contact us if you have any question!";
// OR:
echo "<br>Ok, ".$userInfo[0].", please to contact us if you have any question!";

/*
Both echo statements will output the same text:
Ok, Alex Chow, please to contact us if you have any question!
*/
echo "<br>*******************************************************";
echo "<hr><hr>";

// What if we want to add other keys or overriding a value of anther key in $_GET[]?
// We were able to do this kind of updating on any associative array:

// Modify the value of the key "name":
$_GET['name']="Martin Smith";
echo $_GET['name'];
echo "<br>";

// Adding another key with its value:
$_GET['website'] = "www.example.com";
echo $_GET['website'];
echo "<br>";

/*
Final Note:
in case if we changed the method value from "get" to "post"
we just need to rename every existence of $_GET with $_POST
*/