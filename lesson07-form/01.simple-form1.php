<?php
// our entire php code to handle the form can be written here 
// we can place our code here instead of using another/external php file
// In this example, we used the php file "form-process.php" to receive the form submission
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Simple Form Handling 1</title>
</head>
<body>
    <!-- 
    To recap/review to what we have covered in HTML and CSS module:

    HTML <form> element:
    Every form should have the following two main types of attributes:
           - action
           - method

    method attribute values:
    - GET
    - POST

    Method attribute:
    two main (common) types of methods that are used by PHP Developers when we submit the form:
    - GET: (the default if you don't specify)
    * method="get" or method="GET" (The Default)
    * is less secured (the info will be attached to the URL)
    * can handle few data (simple forms)
    * doesn't support file upload feature
    * is usually used for the "Search Form" only

    - POST:
    * method="post" or method="POST"
    * is more secured (the info will be imbedded with the page) 
    * can handle large amount of data (simple to more complex forms)
    * supports file upload feature
    * is used for contact us form, registration form, login from etc. (except search form)

    You can read more:
    https://www.tutorialrepublic.com/php-tutorial/php-get-and-post.php

    Action attribute: 
    This attribute tells the browser where to send the data
    which could be the address of the file that contains the script/code 
    for handling the data either by sending it using email or save it to the database

    In our example it will be "the file" on the server (localhost server) 
    to handle the form request. 

    The file that contains the code for handling the form, it is written in a programming language like:
    - PHP (the most popular web programming language - our current module)
    - C#
    - JAVA
    - Python
    - Ruby
    - etc… 
    
    action = "filename.extension"

    Examples of action values:
    - action="process.php" => a file named process.php will handle the form
    process.php is just an external file (if it's exist) to handle the form 

    File examples: process.php or register.php are just example names!
    ========================================================================

    Creating our normal HTML form:
    We should specify the action value (there is no default value for action attribute)
    The method value is always set to "GET" by default if we don't specify

    Question: What could happen if we don't give any value to action attribute: action=""
    Answer: The from will be submitted to the same current page

    In the example below: action="form-process.php"
    Yes, we need to create a dedicated file named "form-process.php" to handle the form
    to be opened/loaded after the form being submitted

    Yes, we can add id="my-form"
    if you like to use it with JS or CSS

    Remember:
    - $_GET => a super global associative array is used with form if the method="GET" 
    - $_POST => a super global associative array is used with form if the method="POST"

    let's use method="get" in this example

    form-process.php is the file to write our code for this form
    -->

    <!--
    Creating our normal HTML form:
    We need to specify the action value (there is no default value for action attribute)
    the method value is set to "GET" by default

    Notice that id and class attributes are not required for our PHP code
    For PHP we only need method and action
    -->
    <form action="form-process.php" method="get" id="my-form">
        <!--
            Each form field that will be used/need to be used in our PHP code
            has to have a "name" attribute with a unique value

            The "name" attribute of each form input/field will be used by PHP code
            it will be used as the key for the PHP associative array
            wether we use $_GET[] or $_POST[]


            With forms, PHP provides for us 2 Global Associative Arrays:
            -> $_POST[] => we have to use/access/call the associative array $_POST[]
            if our method="POST"
            -> $_GET[]  => we have to use/access/call the associative array $_GET[]
            if our method="GET"

            Our current form field(s):	5 input fields and 1 textarea field.
            The 4 input fields (elements):
            - type="text"
            - type="email"
            - type="tel"
            - type="submit"
            - type="rest"
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
                we have to use the type of "submit"
             -->
            <input type="submit" name="send" id="send" value="Send Comments">
                <!-- we don't need to add: name="reset" for the reset button! -->
            <input type="reset" id="reset" value="Clear Form">
        </div>
    </form>
</body>
</html>