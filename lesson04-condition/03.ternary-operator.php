<?php
// Ternary Operator:
// ****************

// take a simple  example using if statement:
    $avg = 87;
    if ($avg>=60) {
        $result1="You passed the module.";
    } else {
        $result1="You can have supplementary assignment.";
    }

    echo $result1;


// Using Ternary Operator:
// instead of using if and else block
// we can summarize it into only one line!!!

// The syntax template: 
// $variable = (condition) ? the value if the condition is true : the value if it's false;
// $var = (condition) ? value/code if true : value/code if false;

$result2 = ($avg>=60) ? "you passed the module." : "you can have supplementary assignment.";

echo "<br>$result2";

echo "<hr>";

// Using Ternary with echo
echo ($avg>=60) ? "you passed the module." : "you can have supplementary assignment.";

echo "<hr>";
$age=20;
echo ($age>=18) ? "you can buy fireworks" : "you cannot buy fireworks";

// Below we do need to close the php because we have HTML content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ternary Operator</title>
</head>
<body>
<?php
    echo "<p>Based on your average which is: $avg, $result1</p>";
?>
</body>
</html>