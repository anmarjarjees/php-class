<?php
class Member {
    
    /*
    To recap, We have 3 common/major access modifiers:
        > public — A public property or method can be accessed anywhere, from within the class and outside. 
        This is the default visibility for all class members in PHP.

        > protected — A protected property or method can only be accessed from within the class itself or in child or inherited classes i.e. classes that extends that class.

        > private — A private property or method is accessible only from within the class that defines it. 
        Even child or inherited classes cannot access private properties or methods.

        Setting our properties to be private to apply the OOP concept "encapsulation":
        - We cannot change or access these properties outside the class so it will give them more protection
        - We can create two methods:
        - Getter => to get the value of any private property
        - Setter => to set the value of any private property
    */

    // setting a private property:
    private $name;
    private $email; 

    /*
        After creating the class properties (class variables),
        We need to write the constructor:

        Below we did something else,
        we set default values of empty string if the user create an instance
    */
    public function __construct($name="", $email="") {
        // $this => Refers to the current object
        // we can use the same name for both: the property name and its value varaible:
        // LHS: (class property) Member.name by using the keyword "$this" 
        // RHS: (function parameter) $name
        $this->name = $name;
        $this->email = $email;
        echo 'The class "' . __CLASS__ . '" was initiated!<br>';
    }

    /*
    Getters and Setters:
    To access the value for any private property => we need to create a getter
    To modify the value of any private property => we need to create a setter

    1. Creating two public methods for getter to get the values of the properties name and email
    2. Creating two public methods for setters to set the values of the properties name and email
    */

    // 1. getters:
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    // 2. setters:
    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

} // end class Member

$member1 = new Member('Martin Smith','msmith@cbc.ca');

// Let's try to access the property name of the object "member1" using this way:
// The code below will generate an error because name is private=>We can only access it within the class 
// echo $member1->name;
// Error: Fatal error: Uncaught Error: Cannot access private property Member::$name in ...

// What if we want to set a value to the member1 email
// $member1->email = "msmith@cp24.com";
// Fatal error: Uncaught Error: Cannot access private property Member::$email in 

echo "<br>".$member1->getName();
echo "<br>".$member1->getEmail();

echo "<br>Hello ".$member1->getName().", we sent you the 'Club Registration' form to this email ".$member1->getEmail();

echo "<hr>";
// OR assign the returned values to simple variables:
$m1Name = $member1->getName();
$m1Email = $member1->getEmail();
echo "<br>Hello $m1Name, we sent you the 'Club Registration' form to this email $m1Email";


// We can modify the member1 name by using the setter method "setName"
// change "Martin Smith" to "Martinos Smith"
$member1->setName('Martinos Smith');

// We can modify the member1 email by using the setter method "setEmail"
// change msmith@cp24.com to msmith@ctv.com
$member1->setEmail('msmith@ctv.com');

// test by output the same message again:
echo "<br>Hello ".$member1->getName().", we sent you the 'Club Registration' form to this email ".$member1->getEmail();

/*
A destructor is called automatically when a scripts ends.
However, to explicitly trigger the destructor, you can destroy the object using the PHP unset() function, as follow:
*/
// Destroy the object
unset($member1);
