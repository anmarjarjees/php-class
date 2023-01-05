<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math in PHP</title>
</head>
<body>
    <?php
     /*
        General Math Rules:
        In PHP we have 5 operations (symbols) like JS:
        + for addition
        - for subtraction
        * for multiplication
        / for division
        % for the remainder of the division

        PEDMAS or BEDMAS:
        Like Any Programming language, JavaScript also follows the Math rules (like MS Excel):
        PEDMAS OR BEDMAS
        P => Parenthesis: ( and ) OR B => Brackets
        E => Exponent => example: 5 to the power of 2 which means 5 x 5 = 25
        D => Division
        M => Multiplication
        A => Addition
        S => Subtraction
     */
     $result1 = 5 / 2; // = 2.5 // ==> Normal division

     $exam1 = 90;
     $exam2 = 88;
     $avg = ( $exam1 + $exam2 ) / 2;
     echo "<br>The average is: $avg";

    // Modulo division symbol % (The remainder of division)
    /* 
    Based on math, the remainder of dividing any even number by 2 is always 0. 
    So this can be a good way to test if the number is even or odd 
    */
    $result2 = 5 % 2; // = 1 ==> Modulo division ==> the result 1, it is odd (number=5)
    
    $result3 = 4 % 2; // = 0 ==> Modulo division ==> the result 0, it is even (number=4)

    $number = 5;    
    $result4 = $number * 2; // 5 * 2 = 10;
    echo "<br>the variable result#4 value is: $result4";
    echo "<br>";

    /*
    Increment and Decrement Operators (Like JS):
    
    $variableName++ => $variableName = $variableName + 1
    $variableName-- => $variableName = $variableName - 1
    */

    echo "<br>";
    $myNumericValue1 = 10;
    $myNumericValue1++; // This will add only 1 to 10 => 11
    echo $myNumericValue1;
    echo "<br>";

    echo "<br>";
    $myNumericValue2 = 20;
    $myNumericValue2--; // This will deduct only 1 from 20 => 19
    echo $myNumericValue2;
    echo "<br>";

    $myNumber = 10;
    $multiply = $myNumber * 2;
    echo "<br>the variable 'multiply' value is: $multiply";
    
    $myNumber = 5;
    $multiply = $myNumber++ * 2;
    // It means 5 which is the value of the variable "$myNumber" will be multiplied by 2 to get the result of (5*2) 
    // and assign the value of 10 to $multiply
    // Then add 1 to the variable $myNumber later
    echo "<br>the variable 'multiply' value is: $multiply"; // 10

    $myNumber = 2;
    $multiply = ++$myNumber * 2;
    // It means 2 which is the value of the variable "$myNumber" will be changed by adding 1 => ++$myNumber => (1+2) => 3
    // Then multiply 3 by 2
    // and assign the value of 6 to $multiply
    /*
    $multiply = ++$myNumber * 2;
    $multiply = (1+2) * 2;
    $multiply = 3 * 2;
    $multiply = 6;
    */
    echo "<br>the variable 'multiply' value is: $multiply"; //6
    /*
    Please don't forget that the same rules/logic can applied to JS
    */

    // More Examples:
    $myValue = 5;
    $final = $myValue++ * 2; 
    // Notice above, we have the ++ after $myValue => it will not change the formula result
    // but it will change the variable $myValue itself after finishing the formula!
    echo "<br>the variable 'final' value is: $final"; // 10
    // so at the end of the formula, PHP will add 1 to the current value of the variable $myValue;
    echo "<br>the new value of 'myValue' is: $myValue"; // 6
    ?>

    <script>
    // Remember that JS is acting the same way!
    document.write("<h3>IN JAVASCRIPT</h3>");
     let myValue = 5;
     let final = myValue++ * 2; 
    document.write(`<br>the variable 'final' value is: ${final}`);
    document.write(`<br>the new value of 'myValue' is: ${myValue}`);
    </script>
</body>
</html>