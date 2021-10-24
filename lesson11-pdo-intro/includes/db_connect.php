<?php

// $host='localhost:3307'; // Just if you have another port number
$host='localhost'; // I didn't add the port number here (Only in my PC)
$dbname = 'pdo_intro';
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

} catch(PDOException $e) {
    // If there is an error in database connection, this message will be printed and the application will continue loading
    echo "Database Connection failed: " . $e->getMessage();
    // Using the keyword "throw" to stop the execution of our app and display the error message
    throw new PDOException($e->getMessage());
}
