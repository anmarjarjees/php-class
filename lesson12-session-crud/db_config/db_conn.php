<?php

// $host='localhost:3307'; // Just if you have another port number
$host='localhost'; // I didn't add the port number here (Only in my PC)
$dbname = 'session_lesson';
$user='root'; // The default username
$password = 'root123'; // Empty by default => in your computer

/*
My server is changed to "localhost:3307" 
That's why I added the new port value to my dsn value

Thanks,
Anmar
*/
$dsn = "mysql:host=$host;dbname=$dbname; port=3307"; 

try {
    // This object $pdo will the one to be used frequently through our CRUD operations
    // We can give it any name that makes sense to us
    $pdo = new PDO($dsn, $user, $password);
    // testing:
    // echo "Connection Done!";

    /*
    We can also add a predefined attributes to the PDO object:
    **********************************************************
    These predefined attributes can help us as programmers to control how PDO object is going to behave in certain ways
    
    PDO::setAttribute => Sets an attribute on the database handle
    Description: bool PDO::setAttribute ( $attribute, $value );
    - setAttribute() is a method that belongs to the PDO object 
    - This method is used to set a predefined PDO attribute or a custom driver attribute
    - Returns true on success or false on failure

    We need to use this table in PHP.NET to learn/understand which attribute we can use and what are its possible values:
    https://www.php.net/manual/en/pdo.setattribute.php

    Also you can learn more about "PDO::setAttribute":
    https://docs.microsoft.com/en-us/sql/connect/php/pdo-setattribute?view=sql-server-ver15

    Example:
    In this situation we want to set the PDO error mode/act/behaviour when we have an error 
    so we want PDO to stop the application execution and just throw an exception (error):
    
    One of the listed predefined attribute is "PDO::ATTR_ERRMODE:" for Error Reporting
    
    The possible values for this attribute are:
    - PDO::ERRMODE_SILENT: Just set error codes.
    - PDO::ERRMODE_WARNING: Raise E_WARNING.
    - PDO::ERRMODE_EXCEPTION: Throw exceptions.

    we will select the last one (commonly selected value) => PDO::ERRMODE_EXCEPTION

    Syntax: pdoObject->setAttribute(attributeName, value)
    */
    // this line is not mandatory to run our application but it's good for debugging :-)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    // If there is an error in database connection, this message will be printed and the application will continue loading
    echo "Database Connection failed: " . $e->getMessage();
    // Using the keyword "throw" to stop the execution of our app and display the error message
    throw new PDOException($e->getMessage());
}
