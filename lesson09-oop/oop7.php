<?php
class Member {
    // setting a private properties:
    /*
    private $name;
    private $email;
    */

    /*
    Very Important Note To Review#1:
    Using protected, we can access these two properties "name" and "email"
    in the sub-classes using our normal syntax:
    $this-name;
    $this-email;
    */
    protected $name;
    protected $email;

    /*
    Very Important Note To Review#2:
    Using private, we can NOT access these two properties "province" and "city"
    in the sub-classes using our normal syntax:
    $this-province;
    $this-city;
    */
    private $province="On";
    private $city="Toronto";

    public function __construct($name="", $email="") {
        $this->name = $name;
        $this->email = $email;
        echo 'The class "' . __CLASS__ . '" was initiated!<br>';
    }

    // another method
    public function getGeneralInfo() {
        $msg = "<br> Member Name: ".$this->name;
        $msg .= "<br> Member Email: ".$this->email;
        return $msg; 
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
When we create a new member, each member will have the same arguments: name and email as the shard arguments
but each one needs to have another unique argument to be added:
- BasicMember => employment id for the company that they work with
- StandardMember => company name (the name of the company they work with)
- PremiumMember => job title

Now, we cannot just use the constructor from the parent class as it's!
Because the constructor in the main class was created to accept only two arguments: name and email

But in these sub-classes, we need to pass another extra argument beside the original once (name and email):

Solution:
Step1: Override the main constructor from the parent class
- write the same function signiture again from the parent class
- adding the required unique parameter for this sub-class constructor
*/
class BasicMember extends Member {
    private $empID;
    /*
    PHP - Overriding Inherited Methods
    Inherited methods can be overridden by redefining the methods (use the same name) in the child class.
    Two functions:
    - __construct
    - getGeneralInfo
    */
    // Override the constructor function
    public function __construct($name="", $email="", $empID) {
        $this->empID = $empID;
        /*
        Now we need to assign the values that we receive in the function parameters to our properties
        
        Instead of repeating the same lines from the parent class for $name and $email as shown below:
        $this->name=$name;
        $this->email=$email;

        We can use the following:
        calling the full constructor from the parent/base class:

        To summarize: the sub-class (child) class can use/call any method from the parent class
        bu using the keyword "parent" then :: then method name

        The syntax: parent::functionName($x,$y,....)
        */

        // calling the parent class constructor:
        parent::__construct($name,$email);

        // testing the access modifiers "private" and "protected":
        echo "<hr>";
        echo "<br>name and email properties are protected - province and city properties are private:";
        echo "<br>Name: ".$this->name; // OK 
        echo "<br>Email: ".$this->email; // Ok
        echo "<br>Province: ".$this->province; // Warning: Undefined property: BasicMember::$province in 
        echo "<br>City: ".$this->city; // Warning: Undefined property: BasicMember::$city in
        echo "<hr>";
    }

    /*
    Yes, we can also create two public methods for getter and setter for empID Property.
    Enjoy coding it by yourselves :-)
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

    // Override the getGeneralInfo function
    public function getGeneralInfo() {
        $msg = parent::getGeneralInfo();
        $msg .= "<br> Employee ID: ".$this->empID;
        echo $msg;
    }
} // end class BasicMember

class StandardMember extends Member {
    private $compName; 

    // Override the constructor function
    public function __construct($name="", $email="", $companyName) {
        $this->compName = $companyName;

        // calling the parent class constructor:
        parent::__construct($name,$email);
    }

    /*
    Yes, we can also create two public methods for getter and setter for compName Property.
    Enjoy coding it by yourselves :-)
    */

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

    // Override the getGeneralInfo function
    public function getGeneralInfo() {
        $msg = parent::getGeneralInfo();
        $msg .= "<br> Company Name: ".$this->compName;
        echo $msg;
    }
} // end class StandardMember

class PremiumMember extends Member {
    private $jobTitle; 

    // Override the constructor function
    public function __construct($name="", $email="", $jobTitle) {
        $this->jobTitle = $jobTitle;

        // calling the parent class constructor:
        parent::__construct($name,$email);
    }

    /*
    Yes, we can also create two public methods for getter and setter for jobTitle Property.
    Enjoy coding it by yourselves :-)
    */

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

    // Override the getGeneralInfo function
    public function getGeneralInfo() {
        $msg = parent::getGeneralInfo();
        $msg .= "<br> Job Title: ".$this->jobTitle;
        echo $msg;
    }
} // end class PremiumMember

// PHP Main Script:

$member1 = new BasicMember("Sally Grayson","sgrayson@tryourcode.ca","E1782");

$member2 = new StandardMember("Alex Chow","achow@futuredesign.ca","Rogers");

$member3 = new PremiumMember("Martin Smith","msmith@advanedservices.ca","Web Developer");

echo "<hr><hr>";
// Now we can simply output these values by overriding the method "getGeneralInfo() in each sub-class:
$member1->getGeneralInfo();
echo "<hr>";
$member2->getGeneralInfo();
echo "<hr>";
$member3->getGeneralInfo();
