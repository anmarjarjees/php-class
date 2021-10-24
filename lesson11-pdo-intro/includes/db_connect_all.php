<?php
/*
NOTE: 
This file is just for connection our php application to any database
we can name it anything meaningful, examples:
db_connect.php
db_link.php
db_config.php
pdo_connect.php
etc... 

General Notes for any Relational Database Driven Website:
- The very first thing to do always is to connect our current php app. to our database 
- We need to have these information ready:
a- the server name (hosting name) => usually "localhost" by default
b- the database name => Our current example: "pdo_intro"
c- the database credentials: the username and the password
-- username: root (by default when installing XAMPP) => User: root@localhost
-- password: "" (Null by default installing XAMPP)

For practising what we have in a real world project, 
we will modify the phpMyAdmin to change its default settings
we will add a simple password instead of using an empty one
for simplicity, we will use the password "root123"
please refer to my in-class notes for changing/modifying the password

as conclusion:
username: root (the same by default)
password: root123

These will be the "global" credential (username and password) to access all the databases in
phpMyAdmin of "localhost".
*/

/*
Dear Students,

Please be advised that I had to set a different PORT number/value to run MySQL DBMS.
The default PORT Number that is used by XAMPP to run MySQL (PHPMyAdmin) is: 3306
But I had to change it to 3307 because 3306 is used by MySQL Workbench DBMS
For this reason, my host value will be 'localhost:3307' instead of just 'localhost'

Thanks,
Anmar Jarjees
*/


/*
USING PDO:
In our code example we will focus on using PDO API (refer to my in-class notes for for details)
PDO can support many databases: https://www.php.net/manual/en/pdo.drivers.php#pdo.drivers
*/

// First Way: We can save all the above mentioned needed info into php varaibles:
// ******************************************************************************
// $host= 'localhost'; // the default value for most of you (you will use this value)
// in my pc, the phpMyAdmin => Server: 127.0.0.1:3307
// with using PDO, as a php programmer, we have two options:

// Option1: Attaching the port number to the localhost
// $host='localhost:3307'; // only for me! you can remove the 3307

// Option2: we can leave the host name to be "localhost" but we have to identify/add the port number to the dsn
// I will show this option later.
$host='localhost'; // I didn't add the port number here
$dbname = 'pdo_intro';
$user='root';
$password = 'root123'; // remember that we changed the default password from empty to "root123"

// Second Way: The other nice way is to save these information into constants!
// ***************************************************************************
// In PHP, constants are written in UPPERCASE by convention
// Required Database credentials as Constants values:
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root123');
define('DB_NAME', 'pdo_intro');

/*
Setting the DSN:
DSN is for "Data Source Name" which a nice way to save the required information
for initializing our pdo object to connect to our database

The DSN is just a string varaible that contains the following as a string value:
1- The Database type (Prefix), if using MySQL, we have to specify => databaseType:
    example: mysql:
2- The host name => host = ?
3- The database => dbname = ?
*/


// Creating the DSN varaible:
/*
DSN value contains text and varaible, we need to concatenate them
In PHP we can use either one of these following two ways to create a dsn, please pick only one for sure!
for demo and learning purposes I put the two ways below:
*/

// Way#1: We can set the variables and values of "dsn" variable using concatenating with .:
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

// Way#2: Or you can just use the ":
$dsn = "mysql:host=$host;dbname=$dbname";

/*
If your port number is not the default one which is 3306
And you didn't add your port number to the local host like "localhost:3307"
We have to specify it with the dsn value by adding another parameter name "port":
*/
$dsn = "mysql:host=$host;dbname=$dbname; port=3307"; // notice that this value will override the previous ones

// please don't forget to remove the port if you run this code in your computer
// If you have the default port: $dsn = "mysql:host=$host;dbname=$dbname"; 

// Some of you might like to create the DSN as Constant!
// let's do it :-), we can name this constant to be "PDO_DSN"
// using define() function:
// define(DSN Constant Name, DSN string value)
define('PDO_DSN',"mysql:host=$host;dbname=$dbname");

/*
Examples of connecting to other databases: 

- SQLite (is just a simple db file that are being saved locally inside its project folder whether in the server or in our computers)
- the file extension is .db
// with SQLite, we need to specify the full path:
$dsn= 'sqlite:c:/xampp/htdocs/main-php/lesson11/pdo_intro.db'

You can check/download this simple GUI Application "DB Browser SQLite" to create SQLite databases if you like (no need!):
https://sqlitebrowser.org/
*/

/*
yes, you can skip the steps of creating a variable or a constant for DSN,
and just inject the values directly:
$pdo = new PDO("mysql:host=hostname;dbname=database", "username", "password");
*/

/*
To create a pdo object or in other words: Create the PDO instance (Object) from the PDO class
let's name the object "$pdo" by convention:
We will use the PDO() constructor
PDO constructor method requires 3 arguments:

$pdo = new PDO(argument1, argument2, argument3)
- argument1: Will be the DSN (we will create this variable below)
- argument2: The username
- argument3: The password
*/

/*
NOTE:
instead of just writing this code directly: $pdo = new PDO($dsn, $user, $password);
it's better to write it with try and catch block:
*/

try {
    // You can comment one of them and try the other two just for learning and demo:
    $pdo = new PDO($dsn,$user,$password); 
    // $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    // $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);

    // testing:
    // var_dump($pdo); // object(PDO)#1 (0) { }
    // echo "Database Connection Done!";
    
    // Using PDOException class to check the error message:
    /*
        NOTE: 
        Since we are using PDO code,
        so most of the exception/error that might occur will be related to PDO
        and that's why we are using the specific exception called "PDOException"
        
        Yes, you can also use the general exception called "Exception"
        and it will work fine also :-)
    */
} catch(PDOException $e) {
    // using the class PDOException and assign any returned error to an object named $e then using its method getMessage()
    // we can output the error message and continue loading our application
    // in such case we can use a simple echo message 
    echo "Database Connection failed: " . $e->getMessage();

    // or we can output the error message and stop the application from being loaded
    // by using throw()
    throw new PDOException($e->getMessage());
}

// No HTML content in this file

