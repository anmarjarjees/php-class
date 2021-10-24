<?php

class Member {
    // This class has two public properties:
    public $name;
    public $email;

    // Creating the class constructor method:
    /*
    The __construct Function:
    the magic method __construct() (known as constructor) is executed automatically whenever a new object is created
    this method (function) will be run/triggered automatically when we create an object
    the constructor method will run when we instantiate an object (creating an instance)
    constructor can also take parameters like any other function (which is the main reason for constructors)
    which means we can use the constructor method to populate the properties of the current created object

    NOTE: 
    this is a special function that belongs to every class we create has a special name: __construct
    starting with double _ _ then the keyword "construct"

    W3Schools:
    The __destruct Function
    A destructor is called when the object is destructed or the script is stopped or exited.   
    If you create a __destruct() function, PHP will automatically call this function at the end of the script.

    To summarize:
    a __construct() function that is automatically called when you create an object from a class, 
    and a __destruct() function that is automatically called at the end of the script
    */

    /*
    NOTE: 
    Although we set this method (function) to be "public",
    but it's already public by default even if we don't specify

    Caution:
    All methods names starting with __ are reserved by PHP. 
    Therefore, it is not recommended to use such method names unless overriding PHP's behavior.
    */
    public function __construct($memberName, $memberEmail) {        
        // Using "$this" to access properties and methods within the class
        $this->name = $memberName;
        $this->email = $memberEmail;

        /*
        PHP Magic Constants: https://www.tutorialrepublic.com/php-tutorial/php-magic-constants.php

        The __CLASS__ constant returns the name of the current class.
        is a magic constant which contains the name of the class in which it is occur. 
        It is empty, if it occurs outside of the class. (check the line at the end of this file)
        */
        echo '<br>The class "' . __CLASS__ . '" was initiated!<br>'; // The class "Member" was initiated!
    }

    // defining a method (same design as function)
    // notice that we did add the access modifier "public", but it's already public by default
    // we should add public for emphasizing and confirming (like all the online examples)
    public function welcomeMember() {
        // Adding the current member name using the class/object property:
        echo '<br>Welcome '.$this->name.' to our club!';
    }

    /*
    the magic method __destruct() (known as destructor) is executed automatically when the object is destroyed. 
    A destructor function cleans up any resources allocated to an object once the object is destroyed.
    */
    // Destructor:
    public function __destruct(){
        echo '<br>The class "' . __CLASS__ . '" was destroyed.<br>';
    }
} // end class Member

// instead:
/*
$member1 = new Member();
// Fatal error: Uncaught ArgumentCountError: Too few arguments to function Member::__construct(), 0 passed in... 
$member1->name = "Martin Smith";
$member1->email = "msmith@cbc.ca";
*/

// We can use this short way since we have the constructor method
// Instantiate an object named "member2":
/*
Now we need to access the the class properties "name" and "email" to assign values to them.
Instead of accessing the class properties
through our main program using objectName -> propertyName

It's a better practice to use a constructor:

Constructor is a class methods that runs automatically 
when we instantiate an object
*/
$member2 = new Member('Alex Chow', 'achow@cbc.ca');

$member2->welcomeMember();

echo "<br>Hello $member2->name, we sent you the 'Club Registration' form to this email $member2->email";

// For testing
echo "<br>The class name: ".__CLASS__; // The class name:


// Just for fun:
/*
__FILE__
The __FILE__ constant returns full path and name of the PHP file that's being executed. 
If used inside an include, the name of the included file is returned.
*/
// Displays the absolute path of this file
echo "<b>The full path of this file is: " . __FILE__;