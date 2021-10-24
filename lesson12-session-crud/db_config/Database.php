<?php
// It's just a class file
// This class will be used to: 
// 1. Apply all the CRUD functions for our Database
// We have to pass our "PDO object" when we create/instantiate an object from this class
class Database {
    // this will be the private variable (variable in class is called "property")
    // it will represent the $pdo object that we created in the database configuration/connection file
    private $db; // should receive the value of $pdo = new PDO($dsn, $user, $password);
    /*
    Define the special magical function for any class which is called "Constructor"
    In PHP => __construct()

    We need the constructor to set values to any private property 
    when we first initialize a new object out of this class

    In Object Oriented language, a class has super method called constructor
    this method are being called when we create an object
    
    Notice we don't have to use/override/modify/write the constructor method
    if we don't need to pass or set an value for class properties when we instantiate an object

    NOTE: Please refer to my OOP in PHP lectures for more clarifications if needed

    this function (method) accept the following parameter
    $connection => for database connection

    the __construct() method will be called/triggered automatically when writing new ClassName()
    myObj = new ClassName($requiredArgument)
    */   

    function __construct($pdoConnObj) {
        /*
        To access any property of a class, we use the "this" keyword:
        the syntax: $this->propertyName = value;
        */
        $this->db=$pdoConnObj;
    } // end __construct()
    
    // First CRUD Function: Create (INSERT) a new record
    // We need to identify this function to be "public"
    // so we can access it with the class object in the main script in other files
    // insertMember() function should accept parameter about what values to insert:
    public function insertMember($fName, $lName, $username, $email, $password) {
        try {
            // Step#1: Create and define the sql statement
            // this statement contains a pure SQL statement but with placeholders instead of inserting static values directly
            // Placeholders: using PDO named parameters OR PDO anonymous parameters
            // Please refer to my lecture PDO Intro for more clarifications if needed

            /*
            Remember that our table is named "members"
            and its columns (fields) are:
            - member_id <=> No need as it's set to be auto_incremented
            - first_name
            - last_name
            - email
            - password

            Using the named parameter => :identifier_name
            identifier_name are just variables (placeholders) for the real values
            so they could be the same name as the table fields or similar
            in our case they have to be variable that we are passing to this function as listed in the parameters:
            1. the function parameter $fname => will have a placeholder (named parameter) :fname
            2. the function parameter $lname => will have a placeholder (named parameter) :lname
            */

            // Step#1:
            $sql ="INSERT INTO members
                  (first_name, last_name, username, email, password)
                   VALUES
                  (:first_name, :last_name, :username, :email, :password)";
            
            /*
                PDO Prepare Statement for avoiding SQL Injection Attack

                Preparing the sql statement for:
                1. receiving the required parameters (binding the parameters)
                2. for execution the sql statements after receiving the required parameter

                The prepare syntax: pdoObject->prepare();
                calling the $this->db that refers to the PDO object to run all its methods
                prepare() method needs one parameter which is the SQL statement

                NOTE:
                We can embed the full sql statement above directly into prepare() method as an argument
                But doing the task in two steps make it easier to read/understand/debug :-)

                declaring another variable to receive the returned object of the prepare() method
                by convention, we can name it $stmt
            */

            // Step#2:
            $stmt = $this->db->prepare($sql);

            // Step#3: bind all placeholders (named parameters) to the actual values (the function arguments)
            /*
                If the prepared statement included parameter markers, either:
                - PDOStatement::bindParam() and/or PDOStatement::bindValue() has to be called
                to bind either variables or values (respectively) to the parameter markers.
               

                Read more: https://www.php.net/manual/en/pdo.prepared-statements.php

                Based on the PHP.NET article we will use bindParam() method:
               - First argument: is a string for the named parameter => :identifier_name
               - Second argument: the value that we want to pass/assign to it
            */

            // Remember the names of these:
            // 1. Our method parameters: insertMember($fName, $lName, $username, $email, $password)
            // 2. Out named identifiers:  (:first_name, :last_name, :username, :email, :password)";
            $stmt->bindParam(':first_name',$fName); // first_name
            $stmt->bindParam(':last_name',$lName); // last_name
            $stmt->bindParam(':username',$username);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);

            // Step#4: The final step is to execute statement "$stmt"
            $stmt->execute();

            return true; // to terminate the function after finishing the insert command successfully
            // Yes, we can also return $stmt->execute(); since execute() method returns a bool value (You can try it)
            // https://www.php.net/manual/en/pdostatement.execute.php#refsect1-pdostatement.execute-returnvalues
            // Or better to return the row numbers as we did before by calling the method rowCount()
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false; // to terminate the function after failing to insert the data, that's why returning false
        }
    } // end method insertMember()

    // Second CRUD Function: Read (SELECT) records
    public function getMembers() {
        // $sql = "SELECT * FROM members"; 
        // calling the PDO object which is saved into the private property "db" 
        // and we can access it using "$this->db"
        $result = $this->db->query('SELECT * FROM members');
        // $result will be a PDOStatement Object the contains the result set
        // $result will contain all the columns from members:
        
        // testing:
        // var_dump($result);

        return $result; // we are returning the PDOStatement Object

    } // end method getMembers()

    // Creating another version for the Second CRUD Function: Read (SELECT) a specific record
    public function getOneMember($username) {
        try {
            $sql = 'SELECT * FROM members WHERE username=:username';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username',$username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result; // this function/method will return an associative array for the current member
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    } // end method getOneMember()

    // Third CRUD Function: Update a record (Client/Member):
    public function updateMember($fName, $lName, $email, $password, $username) {
        try {
            $sql = 'UPDATE members
                    SET 
                    first_name=:first_name,
                    last_name=:last_name,
                    email=:email,
                    password=:password
                    WHERE username=:username';

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':first_name',$fName); // first_name
            $stmt->bindParam(':last_name',$lName); // last_name
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $stmt->bindParam(':username',$username);

            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false; // to terminate the function after failing to insert the data, that's why returning false
        }
    } // end method updateMember()

    // Fourth CRUD Function: Delete a record (Client/Member): 
    public function deleteOneMember($username) {
        try {
            $sql = 'DELETE FROM members WHERE username=:username';
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username',$username);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false; // to terminate the function after failing to delete the data, that's why returning false
        }
    } // end method deleteOneMember() 
} // end Database