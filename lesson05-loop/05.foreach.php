<?php
// Review:
// creating an array of actors 
// indexed array:
$actors = array( 'Martin', 'Alex', 'Dave', 'Marvin', 'Steve' );
// Or using the short way (most commonly used):
// $actors = ['Martin', 'Alex', 'Dave', 'Marvin', 'Steve'];

// 5 echo statement!!!
echo "<br> $actors[0]"; // Martin
echo "<br> $actors[1]"; // Alex
echo "<br> $actors[2]"; // Dave
echo "<br> $actors[3]"; // Marvin
echo "<br> $actors[4]"; // Steve

echo "<hr>";
// Use for loop to print the items in this array:
// iterate 
for ( $i = 0; $i < count( $actors ); $i++ ) {
  echo "<br> $actors[$i]";
}

// PHP Associative Arrays (Review):
// Associative arrays are arrays that use named keys that you assign to them.
/*
$arrayName = array(
 "key1"=>"value",
 "key2"=>"value",
 "key3"=>"value" 
 )
 
 in associative array, we can consider the key to be the index
*/

$ages = array(
    "Alex" => 35,
    "Martin" => 37,
    "Sarah" => 43
);
echo "<br>" . $ages[ 'Alex' ]; // 35 

// Another associative array:
/*
The first key "module1" => has the value of "HTML and CSS"
The second key "module2" => has the value of "JavaScript"
The third key "module3" => has the value of "PHP"
*/
$modules = [
    "module1" => "HTML and CSS",
    "module2" => "JavaScript",
    "module3" => "PHP"
];
echo "<hr>";
/*
foreach loop:
- can be use with associative arrays and indexed array
- can target the "values" and the "keys" of an associative array
- foreach ==> handling array and certain types of objects
- The template/pattern of "foreach":

foreach ($arrayName as $value) {
    // place our code to be run against the array
    // doing something with this value
}

- $arrayName => is the array name that we had already declared or defined in our project
- $value => we can pick any meaningful varaible name to represent the array's values

Examples
- if our array is named "employees" we can pick a variable name to be "employee"
- if our array is named "users" we can pick a variable name to be "user"
- if our array is named "clients" we can pick a variable name to be "client"

in our example, our associative array is called "actors"
so we can pick the variable to represent the value like actor!

Below we used $x to emphasize on using a temp variable
*/
 
// $actors: this is the name of our array
// $actor: this is just a general variable with any descriptive name
foreach ($actors as $x) {
    echo "<br>$x";
}
echo "<hr>";

// OR using the varaible $actor to refer to each value inside $actors array:
foreach ($actors as $actor) {
    echo "<br>$actor";
}
echo "<hr>";

// More examples about using foreach loop with indexed array:
$users = ['Arthur Smith','Alex Chow','Sarah Grayson'];
foreach ($users as $user) {
    echo "<br>$user";
}
echo "<hr>";

// Imagine writing the same task using our classical for loop:
for ( $i = 0; $i < count( $users ); $i++ ) {
    echo "<br> $users[$i]";
}   
echo "<hr>";

// with our array "ages"
foreach ($ages as $age) {
    echo "<br>$age";
}
echo "<hr>";


foreach ($modules as $module) {
    echo "<br>$module";
}
echo "<hr>";


// Let's take our previous example for creating two arrays out of "$letIntArray"
$letIntArray = [ 'a', 4, 'c', 75, 122, 'y', 100, 88, 'b', 'k', 'm', 7 ,'g'];
$intArray = []; 
$letterArray = [];

// Below is our previous solution:
/*
for ( $i = 0; $i < count( $letIntArray ); $i++ ) {  
    if (is_int($letIntArray[$i])) {
       $intArray[] = $letIntArray[ $i ];
    } else {
       $letterArray[] = $letIntArray[ $i ];
    }
} 
*/
foreach ($letIntArray as $item) {  
    if (is_int($item)) {
       $intArray[] = $item;
    } else {
       $letterArray[] = $item;
    }
} // end foreach

echo "<hr>";
echo "The mixed array (letters and numbers):<br>";
print_r( $letIntArray );
echo "<br>int array values:<br>";
print_r( $intArray );
echo "<br>letter array values:<br>";
print_r( $letterArray );
echo "<hr>";
echo "<hr>";
/*
To access the array keys and the value of each array element:

foreach ($array_name as $key=>$value) {
	// do something
}
*/

/*
We have created this array:
$ages = array(
    "Alex" => 35,
    "Martin" => 37,
    "Sarah" => 43
);
*/
// foreach loop to display the elements (not the keys)
foreach ($ages as $age) {
    echo "<br>$age";
}

// Our $array_name = $ages
// $key: it's just a variable name that refer to the keys of the $ages array =>  "Alex", "Martin", "Sarah"
// $value: it's just a variable name that refer to the value of each key => 35, 37, 43
foreach ($ages as $key=>$value) {
	echo "<br> the key is $key, the value of this key is $value";
}

// more examples:
$definitions = array(
    'HTML' => 'Display the page content',
    'CSS' => 'Style the page content',
    'JavaScript' => 'Interact with the user input',
    'PHP' => 'Create Dynamic Pages to talk to the database server'
);


// Since we have HTML contents below, we do need to close php tag
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreach Loop</title>
    
    <!-- Internal CSS -->
    <style>
        /* Adding some styles to dt elements of a definition list: */
        dl dt {
            font-weight: bold;
        }

        /* Adding some styles to dd elements of a definition list: */
        dl dd {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Our Main Modules</h2>
    <ul>
        <?php 
            foreach ($modules as $module) {
                echo "<li> $module</li>";
            }
        ?>
    </ul>
    
    <hr>
    <ul>
        <?php foreach ($modules as $module) : ?>
            <li><?php echo $module ?></li>
        <?php endforeach ?>
    </ul>

    <hr>
    <?php
        echo "<ul>";
        foreach ($modules as $module) {
            echo "<li> $module</li>";
        }
        echo "</ul>";
    ?>


    <!-- Example of formatting all the content of $modules array (including the keys and the values) using p element:  -->
    <?php
        foreach ($modules as $key=>$value) {
            echo "<p>$key is $value</p>";
        }
    ?>

    <!-- Example of formatting all the content of $modules array (including the keys and the values) using ul element:  -->
    <ul> 
        <?php
            foreach ($modules as $key=>$value) {
                echo "<li>$key is $value</li>";
            }
        ?>
    </ul>

      <!-- 
          Just for quick demo and to focus on PHP coding, I am using an obsolete attribute named "border" 
          Below is just an example of creating the table with names and their ages by typing them.
          we only picked two names for example
        -->
      <table border="1">
        <tr>
            <th>Names</th>
            <th>Ages</th>
        </tr>
        <tr>
            <td>Martin</td>
            <td>45</td>
        </tr>
        <tr>
            <td>Alex</td>
            <td>44</td>
        </tr>
    </table>
    <hr>

    <!--
        output the first name and the age => format the output using table element
        Since it's an associative => we have to use foreach
    -->
    <table border="1">
        <tr>
            <th>Names</th>
            <th>Ages</th>
        </tr>
        <?php
            foreach($ages as $name => $age) {
                echo "<tr>
                        <td>$name</td>
                        <td>$age</td>
                     </tr>";
            }
        ?>
    </table>

      <!-- 
          Creating a definition list: just a review :-) 
          dl => definition list
          dt => definition title
          dd => definition data
        -->
    <dl>
        <dt>title1</dt>
            <dd>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea voluptatem libero id suscipit, quo quod quis exercitationem dolorum officia, accusantium tempora fuga veritatis architecto, est alias amet quas voluptatum maxime!
            </dd>

        <dt>title2</dt>
            <dd>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto possimus voluptatum rem, dolore qui laborum temporibus odit culpa voluptate cum, nulla libero sed tenetur harum saepe impedit nam fugit? Minima.
            </dd>

        <dt>title3</dt>
            <dd>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto possimus voluptatum rem, dolore qui laborum temporibus odit culpa voluptate cum, nulla libero sed tenetur harum saepe impedit nam fugit? Minima.
            </dd>
    </dl>

    <hr>
    <!-- let's try to use dl element to format the output for our array $definitions -->
    <dl>
        <?php
            /*
            In the example below: 
            $definitions  => our array associative 
            $subject => will represent the keys
            $definition => will represent the value of each key (the array's element)
            */
            foreach ($definitions as $subject => $definition) {
                // Yes, we can write one echo statement to output/print keys and values
                // Or to make it easier to read, we can write two echo statements:
                echo "<dt>$subject:<dt>";
                echo "<dd>$definition</dd>";
            }
        ?>
    </dl>
    
    <script>
		// My JS codes
	</script>
</body>
</html>