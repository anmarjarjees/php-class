<?php
class Member {
    // setting a private properties:
    private $name;
    private $email;
    
    // Adding more properties:
    private $province="On";
    private $city="Toronto";
    private $memberShipType; // assuming we have: Basic, Standard, Premium

    public function __construct($name="", $email="") {
        $this->name = $name;
        $this->email = $email;
        echo 'The class "' . __CLASS__ . '" was initiated!<br>';
    }

    // Step 1. Create  5 getters for the 5 properties:
    // Step 2. Create  5 setters for the 5 properties:
   
    /*
    We need to add getters and setters methods for these properties:
        - name
        - email
        - province
        - city
        - memberShipType
    
    Writing a function (method) for each property just for getting/setting a value is time consuming!
    Because in such case, we need to create 5 methods for getters and 5 methods for setters (total 5 methods!)

    Solution: Like any high level OOP Language, PHP provides two magical methods:
    __get() => is utilized for reading data from inaccessible (protected or private) or non-existing properties.
    __set() => is run when writing data to inaccessible (protected or private) or non-existing properties
    */

    // override the __get()
    public function __get($propertyName)
    {
        // for testing:
        // echo "Getting '$propertyName'\n";

        /*
        We need to check first if the propertyName is exists in our class?
        We have "property_exists" 
        property_exists — Checks if the object or class has a property

        The syntax:
        property_exists(objectName, propertyName) returns a bool

        to read more: https://www.php.net/manual/en/function.property-exists

        Yes, we can also put the current class name which is "Member" in our if condition:

        if (property_exists('Member',$propertyName)) {
            // our code
        }

        If we change the class name, we have to remember changing this condition!
        a better solution is using the lovely/magical keyword "$this"
        */
        if (property_exists($this,$propertyName)) {
            /*
            NOTE: Please be advised that in such case we do need to put the "$" in front of the "propertyName"
            Because "propertyName" is a variable that we are passing to this function
            */
            return $this->$propertyName;
        } else {
            return "Invalid property name!";
        }
    } // end __get()

    // override the __set()
   
    
    public function __set($propertyName, $value) {
        /*
            We need to check first if the propertyName is exists in our class?
            property_exists — Checks if the object or class has a property
        */
        if (property_exists($this,$propertyName)) {
            // same logic just by adding the assignment operator to assign a value to the existing property:
            $this->$propertyName = $value;
        } else {
            return "Invalid property name!";
        }
    } // end __set()
} // end class Member


// let's try to use __get()
$member1 = new Member('Sarah Grayson','sgrayson@globalnews.ca');

echo "<br>".$member1->__get('name'); // passing the argument "name" which is an existing property name
echo "<br>".$member1->__get('email');
echo "<br>".$member1->__get('province');
echo "<br>".$member1->__get('city');
echo "<br>".$member1->__get('age'); // We don't have such property name "age" => Invalid property name!
echo "<br>".$member1->__get('jobTitle'); // We don't have such property name "jobTitle" => Invalid property name!

echo "<hr>";
// let's try to use __set()
$member1->__set('name','Sarah Chow');
$member1->__set('email','sgrayson@canadianbusinesscollege.com');
echo "<br>".$member1->__get('name'); // passing the argument "name" which is an existing property name
echo "<br>".$member1->__get('email');
?>