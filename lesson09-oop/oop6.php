<?php
/*
Classes can inherit the properties and methods of another class using the "extends" keyword.

So the sub-class can extend the parent/base/super class,
in other words, all the properties/methods that we have in the main/parent class can be accessed by its sub-class


This process of extensibility is called inheritance. 
It is probably the most powerful reason behind using the object-oriented programming model.
*/

class Member {
    // setting a private properties:
    private $name;
    private $email;
    
    private $province="On";
    private $city="Toronto";

    /*
    To review:
    we are assigning empty strings as arguments for these parameters:
        - $name as a function parameter will have the default argument of empty string if we don't pass an argument to $name
        - $email as a function parameter will have the default argument of empty string if we don't pass an argument to $email
    */
    public function __construct($name="", $email="") {
        $this->name = $name;
        $this->email = $email;
        echo 'The class "' . __CLASS__ . '" was initiated!<br>';
    }

    // another method
    public function getGeneralInfo() {
        $msg = "<br> Member Name: ".$this->name;
        $msg .= "<br> Member Email: ".$this->email;
        echo "$msg<br>";
    }

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

/*
Creating a basic (derived/child/sub-class) named "Basic_Member" from the base (parent) class "Member"
We still need to follow the naming convention by starting with Uppercase:
We want to let this class "Basic_Member" inherits all the contents (members) from the base class "Member"
This child class can use (access) all the properties and methods from the parent class

A "sub class" inherits all its attributes (properties and methods)
from a "parent class" which also include the initializer method

As we assumed before, we have 3 types of membership:
- Basic Membership
- Standard Membership
- Premium Membership
*/


/*
Every subclass below has its own unique method:
- BasicMember => listBasicOptions()
- StandardMember => listStandardOptions()
- PremiumMember => listPremiumOptions()
*/
class BasicMember extends Member {

    /*
    private $name;
    private $email;
    
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
        // testing:
        echo 'The class "' . __CLASS__ . '" was initiated!<br>';
    }
    */

    // Adding a new method that only belongs to BasicMember
    public function listBasicOptions() {
        $msg = "<br><br> List of all the available options for Basic Member:";
        // In JS we used the +, we have to use . in PHP :-)
        $msg .= "<br> All the restaurants";
        $msg .= "<br> The meeting room B";
        $msg .= "<br> The Exercise room";
        echo $msg;
    } 
} // end class BasicMember

class StandardMember extends Member {
  
    // Adding a new method that only belongs to BasicMember
    public function listStandardOptions() {
        $msg = "<br><br> List of all the available options for Standard Member:";
        // In JS we used the +, we have to use . in PHP :-)
        $msg .= "<br> All the restaurants";
        $msg .= "<br> The meeting room A and B";
        $msg .= "<br> The Exercise room";
        $msg .= "<br> The Pool";
        echo $msg;
    } 
} // end class StandardMember

class PremiumMember extends Member {

    // Adding a new method that only belongs to BasicMember
    public function listPremiumOptions() {
        $msg = "<br><br> List of all the available options for Premium Member:";
        // In JS we used the +, we have to use . in PHP :-)
        $msg .= "<br> All the restaurants";
        $msg .= "<br> The meeting room A and B and VIP room";
        $msg .= "<br> The Exercise room";
        $msg .= "<br> The Pool";
        $msg .= "<br> The Golf Club";
        echo $msg;
    } 
} // end class PremiumMember

// for more practice, we can use:
// the class InitialMember extends the class BasicMember which extends the main class "Member"
class InitialMember extends BasicMember {

}

$member1 = new BasicMember("Sally Grayson","sgrayson@tryourcode.ca");

$member2 = new StandardMember("Alex Chow","achow@futuredesign.ca");

$member3 = new PremiumMember("Martin Smith","msmith@advanedservices.ca");

// testing:
// var_dump($member1); // object(BasicMember)#1 (0) { }

echo "<br>".$member1->getName()." - Email: ".$member1->getEmail();
echo "<br>".$member2->getName()." - Email: ".$member2->getEmail();
echo "<br>".$member3->getName()." - Email: ".$member3->getEmail();


$member1->listBasicOptions(); // this method will echo the result
$member2->listStandardOptions(); // this method will echo the result
$member3->listPremiumOptions(); // this method will echo the result

// accessing the method "getGeneralInfo()" from the parent class
$member1->getGeneralInfo();
$member2->getGeneralInfo();
$member3->getGeneralInfo();

echo "<hr>";
// creating member4 using the grandchild class "InitialMember" of the parent class "Member"
$member4 = new InitialMember("Sam Simpson","simpson@ilikephp.ca");
echo "<br>".$member4->getName()." - Email: ".$member4->getEmail();