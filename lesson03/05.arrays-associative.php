<?php
    // Using Arrays in PHP:
    // Two types of arrays:
    // Indexed Array (we did the same in JavaScript)
    // Associative Array

    // Indexed Array: 
    // -------------
    // 1. Each element/item in the array has a unique numeric id or value called "index"
    // 2. The first index value is 0 (counting from 0 not from 1) for the first element/item in the array
    $myLuckyNumbers = [ 90, 34, 17, 21, 12 ];
    
    /*
        php.net: Associative Array
        An array can be created using the array() language construct.

        This type of array doesn't have numeric index values like indexed arrays
        Example:
        $descriptions = array ('key'=>'value')
        the key is a string data type and the value can be string data type or other types

        It takes any number of comma-separated key => value pairs as arguments.

        array(
            key1  => value1,
            key2 => value2,
            key3 => value3,
            ...
        )

        The comma after the last array element is "optional" and can be omitted
        ==========================================================================

        As we have two different ways to create an indexed array:
            - $myArray = [1,2,3,4,...]
            - $myArray = array(1,2,3,4,...)

        We have also two different ways to create an associative array
    */

        // Creating an associative array using way#1: array()
        /*
        in our CBC:
        APA Program going to class# 7
        DMWD Program going to class# 8
        MDM Program going to class# 13
        SE Program going to class# 9
        FSSD Program going to class# 11
        */  
    
        $classroomNumbers = array(
            "APA" => 7,
            "DMWD" => 8,
            "MDM" => 13,
            "SE" => 9,
            "FSSD" => 11
        );

        var_dump($classroomNumbers);

        // Creating an associative array using way#2: [ ]
        $modules = [
            "module1" => "HTML and CSS",
            "module2" => "JavaScript",
            "module3" => "PHP"
        ];

        // More Examples:
        $descriptions = array(
            'HTML' => 'Display the page content',
            'CSS' => 'Style the page content',
            'JavaScript' => 'Interact with the user input',
            'PHP' => 'Create Dynamic Pages'
        );

        echo '<hr>';
        print_r( $descriptions );
        echo "<br>";
        var_dump( $descriptions );
        echo '<hr>';

        echo '<hr>';
        // another example of using associative array:
        $cars = array(
          'Honda' => 'Made in Japan',
          'Kia' => 'Made in Korea',
          'Dodge' => 'Made in USA'
        );
        print_r( $cars );

        // Adding elements to Associative Arrays:
        // let's add a new module named "Python" to modules array:
        $modules['module4']="Python";

        
        // add a new element/item (car) to the cars array:
        // add: "BMW" as the key with the value of  "Made in Germany"
        // We will have the key to be "BMW" and its value will be "Made in Germany"
        // The syntax: arrayName['the_key'] = 'the value'
        $cars[ 'BMW' ] = 'Made in Germany';
        echo '<hr>';
        print_r( $cars );

        // Printing Elements from the Associative:
        echo '<hr>';
        // to print an item from the cars array:
        // below we will output the value of the key "Honda":
        echo $cars[ 'Honda' ]; // Made in Japan

        // Very Important Note:
        // In previous lectures, we talked about using the "" with echo or print to output the value of any variable!
        // This rule will not work with arrays:
        /*
        echo "Honda is a good car! $cars['Honda']"; // Error in syntax
        print "Honda is a good car! $cars['Honda']"; // Error in syntax
        */
        echo "<br>";
        // Solution1: We can use the classical way of concatenating with dot symbol:
        echo "Honda is a good car! ".$cars['Honda']." It's made in Japan."; // Honda is a good car! Made in Japan
        echo "<br>";
        // Question => is there any other way better/easier than using " " and the dot symbol?
        // Yes, we can use { } like in JS:
        // so in PHP, to fix it => adding curly brackets:
        // Solution2: we can just wrap our variables in between { and }
        echo "Honda is a good car! {$cars['Honda']}. It's made in Japan.";

        echo "<br>";
        
        // more example about creating an associative array:
        // using the shorthand [ ] instead of the keyword "array" with ()
        $book = [
            'title' => "Beginning JavaScript, 5th Edition",
            'author' => 'Jeremy McPeak',
            'description' => 'shows you how to work effectively with JavaScript frameworks, functions, and modern browsers, and teaches more effective coding practices using HTML5.',
            'released' => 'March 2015',
            'pages' => '768',
            'isbn' => '978-1-118-90333-9',
            'category' => 'Web Site Development',
        ];

        // The following code will generate and error
        // echo $book[0]; // Notice: Undefined offset: 0 in ....

        /*
        Let's try to create an indexed array using the associative array syntax :-)

        Yes we can simply just write: $officeApps = ["Word","PowerPoint","Excel","Access"];

        The keys of this associative array are integer values starting from 0
        */
        $officeApps = [
            0 => "Word",
            1 => "PowerPoint",
            2 => "Excel",
            3 => "Access"
        ];
        var_dump($officeApps);
        /*
        Output:
        array(4) { 
            [0]=> string(4) "Word" 
            [1]=> string(10) "PowerPoint" 
            [2]=> string(5) "Excel" 
            [3]=> string(6) "Access" }
        */

        // Let's try to output "Word":
        echo "<p>".$officeApps[0]."</p>";



    ?>

<!-- Let's add the HTML full content -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays in PHP</title>
    <style>
        /* Styling the table cells (th or td) */
        th,td {
            border: 1px groove blue;
        }
    </style>
</head>
<body>
    <!-- 
        Task: Display the full information about our book
        so we have to use { } with associative array
    -->
    <h1>Book Title: <?php echo $book['title']; ?></h1>
    <!-- display the full info using the dot for concatenation -->
    <h2> <?php echo $book['title']." by ". $book['author']; ?> </h2>
    <!-- Or using { } -->
    <h1> <?php echo "{$book['title']} by {$book['author']}"; ?> </h1>
    <p>Description: <?php echo "{$book['description']}" ?> </p>
    <!-- Or -->
    <p> <?php echo ' "' . $book['title'] . '" is ' . $book['description']; ?> .</p>
    
    <!-- nice review for inline CSS :-) -->
    <table style="border: 2px solid red">
        <!-- First Row -->
        <tr>
            <!-- Each row can have th (table headings) or td (table data) -->
            <th>Group Name</th>
            <th>Classroom#</th>
        </tr>
        <tr>
            <td>APA</td>
            <!--
                Instead of typing "7", we will get this value by calling its array "classroomNumbers"

                Please don't forget the php tags to write any php code
            -->
            <td><?php echo $classroomNumbers['APA'] ?></td>
        </tr>
        <tr>
            <td>DMWD</td>
            <td><?php echo $classroomNumbers['DMWD']; ?></td>
        </tr>
        <tr>
            <td>MDM</td>
            <td><?php echo $classroomNumbers['MDM']; ?></td>
        </tr>
        <tr>
            <td>Software Eng.</td>
            <td><?php echo $classroomNumbers['SE']; ?></td>
        </tr>
        <tr>
            <td>FSSD</td>
            <td><?php echo $classroomNumbers['FSSD']; ?></td>
        </tr>
    </table>
</body>
</html>