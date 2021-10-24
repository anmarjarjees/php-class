<?php
// here is my code to handle the form input:
// Since our form => method="POST"


// var_dump($_POST);
/*
If the form is submitted without any values, we have this associative array "$_POST":
It has only the keys but no values:

array(8) { 
    ["first-name"]=> string(0) "" 
    ["last-name"]=> string(0) "" 
    ["email"]=> string(0) "" 
    ["address"]=> string(0) "" 
    ["city"]=> string(0) "" 
    ["province"]=> string(0) "" 
    ["membership"]=> string(2) "pm" 
    ["submit"]=> string(6) "Submit" 
}

After filling the form and submit it:
Array ( 
[first-name] => Alex 
[last-name] => Chow 
[email] => alex@email.ca
[address] => 123 Yonge St.
[city] => Toronto 
[province] => On 
[membership] => bm 
[submit] => Submit 
) 

Conclusion:
==========
[key]=value
- key is the value of the "name" attribute for each field
- value is just the value of the user input

Checking if the form is submitted:
==================================
I want to use if condition to check whether the form is submitted or no
if the form is submitted so go ahead and get the user input etc...

The PHP logic:
> if the input field of type submit (<input type="submit>) has a value?
if yes (true) => this button was clicked => the form has been submitted
else no (false) => this button was not clicked => the form has not been submitted

Q) How can we check if this variable or this array key has a value in PHP?
A) We can use a built-in function named isset() => if this variable is set to any value

Q) How can we use isset() to check of the input of type "submit" is has a value or no
A) By checking it's key in the $_POST[] array

NOTICE that isset() function will return a boolean value:
- true => if the variable we are testing has a value
- false => if the variable we are testing has no value, false, empty

You can read more about isset() function: 
https://www.w3schools.com/php/func_var_isset.asp

OR you can just check the examples below:
*/
// Let's try to learn how to use isset() first:
$test = "Just Testing"; // Just a literal text => string data type
// output the returned value of isset() function
echo isset( $test ); // 1
echo "<br>";
$myCollege = "CBC";
echo isset( $myCollege ); // echo 1 because $myCollege has a value
echo "<br>";

echo isset( $exam1 ); // will not echo anything which means false because $exam1 is not defined
echo "<br>";
// myLuckyNumber has not been defined! it has no value?
echo isset( $myLuckyNumber ); // nothing to print because it has NO value
echo "<br>";
echo isset( $myCity ); // nothing to display no value

/*
To continue with our real answer to handle the form:
Since we have all the form elements saved into the $_POST[] array 
including the submit button that has name="submit";
We can test if the submit button is clicked or not clicked by testing $_POST['submit']

php has a built-in function named "isset()":
isset() function ==> return 1 if it's true (the variable has a value) ==> handle the form
isset() function ==> empty it's false ==> skip this code
*/

// if $_POST array of the 'submit' key has a value => the form is submitted
if (isset($_POST['submit'])) {
    // We do need to start working with the from elements after the submission
    // and that's why we should place all our code inside this if block only
    // for testing:
    echo "Wow! you submitted the form, finally!" ; 
    
    // Start by getting the user input:
    // We can use the same $_POST[] array to access each value for every form field
    // Or we can assign the value of each element in $_POST[] to a simple PHP variable:
    $fName = $_POST['first-name'];
    $lName = $_POST['last-name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST[ 'province' ];
    $membership = $_POST[ 'membership' ];	
    
    // For learning:
    // $_POST['user-age']; // Error => Undefined index: user-age => we don't have this key

    // Then we can print all of them within HTML elements:
    echo "<p>Thank you $fName $lName for submitting the form</p>";
    echo "<p>email: $email</p>";
    echo "<p>Address: $address</p>";
    echo "<p>City: $city</p>";
    echo "<p>Province: $province</p>";
    echo "<p>Membership Type: $membership</p>";
    echo "<hr>";

    // Now if we don't use other PHP variables for each key, we can just access the $_POST
    echo "<p>Thank you ".$_POST['first-name']." ". $_POST['first-name']." for submitting the form</p>";
    echo "<p>email: ".$_POST['email']."</p>";
    echo "<p>Address: ".$_POST['address']."</p>";
    echo "<p>City: ".$_POST['city']."</p>";
    echo "<p>Province:".$_POST['province']."</p>";
    echo "<p>Membership Type: ".$_POST['membership']."</p>";
} // end if (form is submitted)

/*
Please be advised that we don't put any PHP code to handle the form outside the if condition!
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <!--
        In order for PHP to be able to take the values of all the form
        elements (controls), each form element has to have the "name" 
        attribute with a unique value.

        Note:
        You can write "POST" or "post" or "GET" or "get"

        Notice that since we are going to submit the form to the same page 
        because we placed all the PHP code to handle the form at the 
        top within the same file "03.user-form.php",
        so in such case you can the proper way which to echo $_SERVER['PHP_SELF']    
        -->
        <div> 
            First Name:
            <input type="text" id="first-name" maxlength="30" name="first-name" placeholder="First Name">
        </div>

        <div> 
            Last Name:
            <input type="text" id="last-name" maxlength="30" name="last-name" placeholder="Last Name">
        </div>

        <div> 
            Email Address:
            <input type="email" id="email" maxlength="50" name="email" placeholder="Email Address">
        </div>

        <div> 
            Address:
            <input type="text" id="address" maxlength="80" name="address" placeholder="Address">
        </div>

        <div> 
            City:
            <input type="text" id="city" maxlength="20" name="city" placeholder="City">
        </div>

        <div> 
            Province:
            <input type="text" id="province" maxlength="20" name="province" placeholder="Province">
        </div>
        
        <div> 
            Membership: <br>
            <!-- At least one item and only one item should be selected in radio buttons -->
            <input type="radio" name="membership" checked value="pm">
            Premium Membership <br>
            <input type="radio" name="membership" value="sm">
            Standard Membership <br>
            <input type="radio" name="membership" value="bm">
            Basic Membership </div>
        <br>
        <div> 
            <!-- 
        Very Important Note:
        with PHP we do need to have the input type to be:
        input="submit" instead of input="button"
        <input type="submit"> automatically submits the form
        <input type="button"> does not automatically submit the form, you need to use JavaScript to submit it
        -->
            <input type="submit" value="Submit" name="submit">
            <!-- 
        No need to add "name" attribute for reset button
        because this button is just for clearing the form
        Even if we add name="reset", PHP will ignore it
        it will not add it to $_POST[] array
        -->
            <input type="reset" name="reset" value="Cancel">
        </div>
    </form>
</body>
</html>