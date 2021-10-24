<!-- 
    In this file we contains only the HTML content
    all the php required code are inside a separate file named "script.php"

    We need to access all the code in "script.php"

    
    We don't use HTML element to link to any PHP file
    This is the link for an external PHP file 
    We can use any one of these PHP built-in functions:
    - include fileName.php => if the file is not exist => we have an error message and the program continues (The page will be loaded)
    - require fileName.php => if the file is not exist => we have an error message and the program stops (The page will stop loading)
 -->
 <?php
    // include ('script.php'); // We can write include as a function with ( )
    // or we can write the function include without brackets (as we did with echo):
    include 'script.php';


    /*
    We can practice the require function:
    */
    // require 'script.php';
    // require ('script.php');
    // require 'my-code.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>

    <!-- linking to external CSS: -->
    <link rel="stylesheet" href="style.css">
 
</head>
    
    <div>
        <h2>My Home Page</h2>
        <p>You picked the number <?php echo $num ?>, <?php echo $result?></p>
    </div>

    <!-- This is the link for an external JS file -->
    <script src="script.js"></script>
<body>

</body>

</html>