<?php
if ( isset( $_POST[ 'submit' ] ) ) {
    // all the code to handle the form has to be inside this if condition
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basic Form Template</title>
</head>
<body>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <!-- writing all the form fields here -->
                
        <input type="submit" name="submit" value="Any Text You Want">
        <input type="reset" value="clear">
    </form>
    
</body>
</html>