<?php
class Member {
// Static Methods & Properties
/*
The keyword "static":
The syntax: access-modifier static propertyName;

Examples:
public static $name;
public static $email;
public static $address;
public static $jobTitle;


Accessing any static member (Property or Methods)
is not relative or related or connected to an object/instance of that class!
it's relative to the class itself

In other words, We don't have to create an object/instance of that class to access any static members (properties and method)
We just write the class name then :: then the static member name (property or method) to access it in the main script

We can access/use these static members without the need to instantiate and object out this class.
*/

    // setting different properties:
    private $name;
    private $email;
    public $hobby;

    // Adding the keyword "static" for the following properties
    public static $minAge = 20;
    public static $location = "GTA";
    
     // we also need the password as programmers to register every member in our database:
    // $minPassLength = 8; // Error
    public static $minPassLength = 8;

    // We can declare a constant inside a class using the "const" keyword.
    const CLUB='ABC Members Club';
    /*
        NOTES:
        - CONSTANT are global
        - We can access a constant from outside the class by using:
        The class name followed by the "Scope Resolution Operator" (::) followed by the constant name

        Read more: https://www.w3schools.com/php/php_oop_constants.asp
    */

    /*
    NOTE To Review:
    Any property (a class variable) has to have an access modifier, otherwise we will receive the following error:
    Parse error: syntax error, unexpected variable "$minPassLength", expecting "function" or "const"
    PHP reminding us that only functions and constant no need to add the access modifier,
    Because it will set be set to be "public" by default.

    To summarize:
    You can see form this example that we don't make changeable properties "static"
    so every user can have different name or email (not all the users have the same name and email!)

    While the property $minPassLength for minimum Password Length is always fixed 8 character for any user
    such kind of property we can set it to be "static"

    The same for the value of the minimum age => fixed at least 20 years old
    we can set this property to be static

    The same for the value of the location => all members have to be residents of any city in GTA 
    we can set this property to be static
    */

    // We can also have a static method also:
    public static function validatePassword($password) {
        // we can check if the password is minimum 8 characters:
        /*
            We need to check how many characters the string variable "$password" has?
            In JS:
            string is an object like array == (using length property)==> myString.length ==> numeric value

            In PHP:
            most of the methods and the properties we used in JS,
            are functions in PHP, so we have a built-in function to return the string length named "strlen()"

            in the example below, instead of writing number 8
            we can access the property "minPassLength" to get the value of 8
            remember that "minPassLength" is a static property 

            We can access a static property using this normal syntax: $this->minPassLength
            We know that the keyword "this" refers to the current object that we create from the class "Member"
            Error => Fatal error: Uncaught Error: Using $this when not in object context in
            we trying to access the static property inside the class "Member" itself!
            The right syntax to access any static property: self::$staticPropertyName
        */
        if (strlen($password)>=self::$minPassLength) {
            return true;
        } else {
            return false;
        }
    } // end validatePassword()


    // more examples:
    /*
    let's add another function and also make it "static"
    so no need to instantiate an object in order to access this function,
    we can just access it by identify its class in our main script
    */
    public static function getLocation() {
        /*
        This syntax which the one we used: $this->location
        will not work here because the property "location" is set to be static
        return $this->location;
        */

        // we can still use the same syntax that we use inside the main script to access any static property inside the class:
        // return Member::$location;  
        
        // But since we want to access this static property "location" within the class itself, we can use the keyword "self"
        // let's think like "self" means the class "Member" itself (or any class name)      
        return self::$location; 
    }

} // end class Member


// The main PHP script:

// echo $hobby; // Error!!!! => Warning: Undefined variable $hobby in
/*
$member1 = new Member();

// $member1->name = "Alex Chow"; // Fatal error: Uncaught Error: Cannot access private property Member::$name

$member1->hobby ="Sport";
echo "<br>Member1 likes $member1->hobby";
*/

/*
we can access any static member of our class "Member" 
without the need of instantiating an object from that class
Examples below:
*/
// let's try to access static property:
echo "<br>Your password must be at least 8 characters!<br>";
echo "<br>";
// The syntax: ClassName::staticPropertyName
// The syntax: ClassName::staticMethodName()
// The syntax: ClassName::staticCONSTANT
echo Member::$minPassLength; // 8

// Review: Below are different techniques to out our text:
// First Way: Concatenating:
echo "<br>1. Your password must be at least ".Member::$minPassLength." characters!<br>";

// Second Way: Using simple variable with ":
$pl= Member::$minPassLength;
echo "<br>2. Your password must be at least $pl characters!<br>";

// Third Way: Using printf (exactly like Python): 
printf ("<br>3. Your password must be at least %s characters!<br>", Member::$minPassLength);
// another example of using "printf":
printf ("<br>To register in our website, you have to be at least %s years old. Your password must be at least %s characters!<br>",
Member::$minAge, Member::$minPassLength);

// Fourth Way: Complex Syntax (like in JavaScript => ` and ${ })
// Checking the use of { } with string "complex syntax"
// The complex syntax can be recognized by the curly braces surrounding the expression.
// You can read more: https://www.php.net/manual/en/language.types.string.php#language.types.string.parsing

// Example (PHP.NET):
$juice = "apple";
echo "<br>He drank some juice made of ${juice}s.<br>";

// Now applying the same logic (syntax/template) to our code:
$age = Member::$minAge;
echo "<br>To register in our website, you have to be at least ${age} years old!<br>";


// testing our static method "validatePassword()"
$user_pass = "alex12345";
// We need to check the user password using the 'static' method "validatePassword" from our class "Member"
if (Member::validatePassword($user_pass)) {
    echo '<br>Valid Password';
} else {
    echo '<br>Invalid Password';
}

// accessing a public/static method named "getLocation" from our "Member";
echo "<br>All our members live in ".Member::getLocation();

// Finally: Accessing the class constant "CLUB"
/*
To recap:
We can access a constant from outside the class by using:
The class name followed by the "Scope Resolution Operator" (::) followed by the constant name
*/
echo "<br>Our club name is: ".Member::CLUB;


