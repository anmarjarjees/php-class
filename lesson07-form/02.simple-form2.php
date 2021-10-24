<?php
// my php code to handle the form is written here (instead of using another/external php file):
// I want to handle the form (manipulate the user input) in this same page (file):
// I want to write my php code here below:


/* NOTE:**********************************************
The PHP script for handling the form  can be added at the top of the HTML page,
in such case we need use if statement to test whether the form has been submitted or no.
// ***************************************************/

// Just for testing => output a simple text:
// echo "Da! da! you submitted the from! Congratulation!";
// echo "<hr>";
// Above is the issue that we need to fix (very easy to fix):
// We need to use if condition to check if the submit button is clicked => it means the form is submitted
// Then can our code for the form...

// To review again: The super global array "$_SERVER" 
// testing $_SERVER
// var_dump($_SERVER); // A complex associative array about the server/hosting full info
/*
It has many keys and values, as PHP programmers we use this key "PHP_SELF":
["PHP_SELF"]=> string(37) "/client-website/lesson07/02.simple-form2.php"
*/
echo "<hr>";
// Testing $_POST
// print_r($_POST);
// Empty Array => Array ( ) if the form is not submitted yet or method="GET"
echo "<hr>";

// Testing $_GET
// print_r($_GET);
// Empty Array => Array ( ) if the form is not submitted yet or method="POST"

/*
When the form is empty (when the user just visit/open the page for the first time, refresh the page)
this will be any empty: array(0) { }
the array is empty because the form is not submitted yet!

But after filling the from and click submit,
you should see the full information based on the var_dump() function:

array(5) {
["name"]=> string(12) "Martin Smith"
["email"]=> string(16) "masmith@yahoo.ca"
["phone"]=> string(7) "1324567"
["comments"]=> string(8) "nothing important!"
["send"]=> string(13) "Send Comments"
}

The result above is the PHP Supper Global Associative array "$_POST"
This associative has: key=>value (like $_GET)
the keys will be the values of the name attributes
the values will be the values of each field based on the user input
*/


// The time for fixing the issue for checking if the form is submitted => start manipulating the form:
// One of the ways (not the ideal solution or not the only one, we will check another one later):
// We can use if condition to check if $_POST() has any value then we can start getting the user input
// OR else if $_GET[] has any value then we can start getting the user input
// if POST Array has a value (or if it's true)
// if $_POST array has any value:
// so when $_POST is empty => it means the form is not submitted yet   
if ($_POST) { // Since we used method="POST" => $_POST has some data => TRUE
    print_r( $_POST );
    // 1. Getting the user full name:
    $fullName = $_POST['name'];
    // 2. Getting the user email:
    $email = $_POST['email'];
    echo "<hr>";
    echo "<br>Thank you, $fullName for submitting the form!";
    echo "<br>Notice that this email address: $email will not be shared with other clients.";
} elseif ($_GET) { // Since we used method="GET" => $_GET has no data (empty) => FALSE
    print_r( $_GET );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Simple Form Handling 2</title>
</head>
<body>  
    <!--
    action attribute tells the browser where to send the from data after being submitted
    which is the address of the script for handling the data 
    like sending it using email or save it to the database etc...

    - action = "form-process.php" => a file named form-process.php will handle the form
     as did in the previous example
    
    OR instead of submitting the form into a different PHP file where we need to write our code,
    we can simply submit the form to the same page (our php code is written in the same page at the top)
    [As you will do in your second assignment (no need to create a separate file!)]
    
    Three options/solutions
    Option 1: action = "" => it will submit the form to the same page (Not recommended with HTML5)*
    * Yes, it works fine with PHP, but not with HTML5 validation
    * Note: In html5, the action attribute MUST always have a value!
    * HTML5 validation will complaint about having the attribute "action" without any value
    * Error: Bad value for attribute action on element form: Must be non-empty.
    
    Option 2: action ="same file name" 
    in our example, the file name is 02.simple-form2.php
    so the action value will be: action="02.simple-form2.php"

    Option 3: (ideal choice): 
    remember the super global array $_SERVER contains all the information about the server
    and the current file!

    To recap:
    $_SERVER is a "Super Global Array" which is always available in any script
    the names of super global arrays are always in upper case and all begin with _ after $
    this type of array gets information from the web server

    So using PHP_SELF instead of hard coding the file name
    is useful because we don't need to worry of changing its value when renaming the file
    or when we upload our code into a real serve
    
    We have the key named "PHP_SELF" => this key returns the file name with its full path!
    $_SERVER['PHP_SELF'] => this value will be the file name with its full path

    NOTES:
    - $_SERVER['PHP_SELF'] is a php code => it has to be wrapped with < ?php AND ? >
    - $_SERVER['PHP_SELF'] is a php variable => we have to print/output its value
    - the ; at the end is optional as it's only one statement


    Note :-), by the way we tried to remove the action attribute completely 
    and it was still working in PHP and it was valid in W3C.    
    -->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="my-form">
        <!-- s
            Yes, we can use the HTML5 property "required"
         -->
        <div>
        <label for="name">Full Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone">
        </div>

        <div>
            <label for="comments">Comments:</label>
            <textarea name="comments" id="comments"></textarea>
        </div>

        <div>
            <!-- 
                In order to submit this form which means to be sent to the server side,
                we have to use the type of "submit" (we can NOT type="button" as we did in some examples of JS)

                The other important point for the next examples: name="send"
                in this file/example, yes we can remove this attribute name="send"
                and still our php code will work fine
                because we are not using this key "send" in the associative array $_POST in our PHP code

                But Notice that we do need to add a name for the submitting button!
                Why we need to add the key "send" of the submit button to $_POST[] or $_GET[]?

                The answer: we can also check if the form is submitted or not
                by checking the value of "send" key!

                so if $_POST['send'] or $_GET['send'] has a value => the form is being submitted
             -->
            <input type="submit" name="send"  id="send" value="Send Comments">
                <!-- 
                    we don't need to add: name="reset" for the reset button! 
                    even if we add it, it will be ignored by PHP
                -->
            <input type="reset" id="reset" value="Clear Form">
        </div>
    </form>
</body>
</html>