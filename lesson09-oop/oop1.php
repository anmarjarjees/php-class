<?php
/*
Object Oriented Programming (OOP):
TutorialRepublic: https://www.tutorialrepublic.com/php-tutorial/php-classes-and-objects.php
W3Schools: https://www.w3schools.com/php/php_oop_what_is.asp


In real world,  an architect uses "blueprint" to create identical buildings, houses, cars, etc..
Classes (Blueprint) and Objects (samples from the blueprint)
Class is like a template for creating objects
Class is used by programmer to recreate an object and its functions repeatedly
object is the instance of class
object has related data and functions that can be used to manipulate these data


Example from our real life:
anything can be an object like a dog, a cat, a car, a pen, etc...
any object like a dog can have:
- characteristics (color, age, name, type, etc)
- actions (sleep, run, etc...)

In the programming language any object in our programming langues like a dog in our real life can have:
(attributes/properties/fields) in Programming => similar to characteristics (specifications) in our life
methods (functions) in Programming => similar to actions/behaviour in our life

OOP:
====
A way of programming to encapsulate our code
more organized way to create objects
PHP is not a pure Object Oriented Language, it can be used as a procedural language also
C# and Java are strictly OOL

OOP Approach helps us to create a nice and clean code and easier to maintain. 

Classes and Objects
- A class is a blueprint for an object
- Multiple objects can be instantiated from (created out of) the class
- A class can also have variables and functions
- Variables inside a class are called "properties" or "attributes"
- Functions inside a class are called "methods"


Life Example - Project:
Let's assume we have a "social club" for our organization
Create an application to track all our club members:
So each user/member has his/her own list of info (data) saved in our system
*/

// Creating our first class:
// Make a class named "Member"
// this first example will be a very simple class
// Class name should start with upper case or using UpperCamel case "it's a good practice"

/* 
Below are examples of the recommended and not recommended way to name our classes in PHP:
class Address {} // OK
class PhysicalAddress {} // OK
class Physical_Address {} // OK
class physical_address {} // Oh! Oh! it's not ok
class 12_Address() {} // Oh! NO it's invalid
*/
class Member { // this is the blueprint to create multiple members
    /*
    Class can have properties and methods:
    - properties: are attributes in the from of variables (like any normal PHP varaible)
    variables inside a class are called "properties"
    
    Examples:
    member's name => $memberName
    member's age => $memberAge, 
    data of birth, address, etc.

    - methods: are just functions inside a class
    */

    /*
    Task1: Create/add properties to this class:
    ===========================================
    Adding properties (variables inside a class)
    properties can have extra keywords when we declare them are called "Access Modifiers"

    
    To set the access privileges for class properties and methods,
    we use "access modifiers" which are PHP keywords to specify the type of access or visibility.
    
    We have 3 main types (scopes) of Access Modifiers:
    
    - public (the default for methods)=> We can access this (property/method) from anywhere outside of the class through its object

    - private => We can access this (property/method) only in this class (within the current class block)
    NOTE: This type of "Access Modifier" cannot be accessed outside the class through the object and also cannot be inherited 
    (as we are going to learn next...)

    - protected => We can access this (property/method) only in this class and other classes that extend this class  
    NOTE: This type of "Access Modifier" cannot be accessed outside the class through the object but it can be inherited 

    Other types of "Access Modifiers":
    - abstract: is only used for PHP classes and its member functions.
    - final: it means this property/methods cannot be changed or overridden by any subclass (later...)    

    Notes:  
    - If we don't specify the type of "Access Modifiers":
    Parse error: syntax error, unexpected variable "$name", expecting "function" or "const" in...

    - A better coding practice is to make all the class properties "private"
      Then make public method to access/read or set their values (later...)
      In OOP, these public methods are called: "getters" and "setters" (later...)

    Read more about "PHP OOP - Access Modifiers":
    https://www.w3schools.com/php/php_oop_access_modifiers.asp
    */

    // naming the Class variables (properties) with lower case
    public $name; /* We set the $name to be public, however it's public by default also! */
    public $city = "Toronto"; /* We are declaring a property and setting its value to "Toronto" */
    public $email; /* We haven't specify any type of "Access Modifiers", so by default it will be set to be "public" */

    // Let's try using "private":
    private $age=65; // give it a default/initial value of 65
    private $province="Ontario"; // give it a default/initial value of "Ontario"

    // Let's try using "protected":
    protected $memberShipType = "Basic";


    /*
    Task2: Create/add methods for this class:

    the same "Access Modifiers" rules can be applied on methods
    Please be advised that function/methods are set to be "Public" by default even if we don't specify:
    */

    // defining a method (same design as function)
    function welcomeMember() {
        // like any function: printing a result or returning a value
        return 'Welcome to our club!';
    }

    // creating another method to output any text message:
    public function showClubTime() {
        echo "<br>Club Time:<br> Monday to Friday: from 9:00 AM to 9:00 PM";
    }

    
    // creating another method to return the value of the city property:
    function showCity() {
        // We need to access the class property "$province"
        /*
        In JS:
        Remember that in JavaScript:
        To access any object members (properties/methods) within this object itself
        we need to use a JS keyword "this" (it's better than using the object name itself)

        To access any property/method within the class itself,
        we use the keyword "this" plus ->

        In other OOP: use the keyword "this" plus .
        */
        return $this->city;
    }
    
    // creating another method to return the value of the province property:
    function showProvince() {
        // We need to access the class property "$province"
        return $this->province;
    }
} // end Class


// Our main code (script) below:
/*
NOTE:
To check if the class has been defined (created or not)
we can use a built-in function class_exists()
- class_exists() return a boolean
- true if it's exists and false if it's not
*/
if (class_exists('Member')) {
    echo "The class has been defined<br>";
} else {
    echo "The class has not been defined<br>";
}

/*


Creating an object(s) from the class "Member"
Instantiate a Member object from the "Member" class
an object can also called an instance of a class

So in Object Programming Terms, this step is called:
- Create an instance of a class
- Or Instantiate and object

Syntax: objectName = new ClassName()

This statement (code) involves using the class's constructor method => Member() 
with the "new" operator and storing the object in a variable named "member1" in our example below

As you see, the constructor method "Member()" has the same name as the class
Since methods are basically functions,
So this constructor method can also accept one or more arguments for initializing the object's properties (if needed)
We do in the next coming files.
*/
$member1 = new Member();

// for testing:
var_dump($member1);
echo "<hr>";
/*
Output:
object(Member)#1 (3) { 
    ["name"]=> NULL 
    ["city"]=> string(7) "Toronto" 
    ["email"]=> NULL 
}
*/

/*
now since the Member class has two public properties $name and $email
so we can access these two public properties inside our main script through its instance "member1":

In JS:
In other programming languages like as we learnt in JavaScript, we use the dot notation with objects:
document.title => property
document.write() => method

In PHP, to access any <property> or <method>, we use the arrow operator ->
$objectName -> propertyName
$objectName -> methodName()
*/

// In PHP we use -> while in other languages we use the dot notation
// Set value for the name property:
// Notice that we CANNOT use this syntax: $member1->$name= "Alex Chow";
$member1->name= "Alex Chow";
$member1->email="alexchow@cbc.ca";
// for testing:
var_dump($member1);
echo "<hr>";
/*
object(Member)#1 (3) { 
    ["name"]=> string(9) "Alex Chow" 
    ["city"]=> string(7) "Toronto" 
    ["email"]=> string(15) "alexchow@cbc.ca" 
}
*/

echo $member1->welcomeMember();

$member1->showClubTime();
echo "<hr>";
// Trying to access the private property "age"
// echo $member1->age;
// Error: Fatal error: Uncaught Error: Cannot access private property Member::$age in

// Trying to access the private property "memberShipType"
// echo $member1->memberShipType;
// Fatal error: Uncaught Error: Cannot access protected property Member::$memberShipType in...

echo $member1->showCity();
echo "<hr>";
echo $member1->showProvince();

echo "<hr>";
// We can create as many objects/instances from the same class as we want
$user2 = new Member();
$user2->name='Jeff';
echo $user2->name;
echo '<br>';
echo "<hr>";

// Extra Topics:
/*
PHP has this built-in function "method_exists":
- Checks if the class method exists
- It needs two arguments: class name then method name
- It returns a bool value 

*/
if (method_exists('Member', 'showProvince')) {
    echo "Method does exist.<br />";
} else {
    echo "Method does not exist.<br />";
}

/*
Another interesting function:
get_declared_classes() => Returns an array with the name of the defined classes
This function doesn't accept any arguments
get_declared_classes(void): array
*/
$classes = get_declared_classes();
var_dump($classes); // Output all the native PHP classes and finally our Member class
echo "<hr>";
// since it's an array, we can use for / foreach:
foreach ($classes as $className) {
    echo $className."<br />";
}
/*
This will output the names of all the available classes:

Including: PDO classes (PHP Database Object)
- PDOException
- PDO
- PDOStatement

and finally our class: Member
*/

// Finally:
/*
$methods = get_class_methods('Member'); // create an array with all the methods names
foreach($methods as $method) {
    echo $method."<br />";
}
*/