<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'includes/header.php';

// starting the form code (manipulate the form):
// Yes, we need to make sure that the form is submitted:
/*
if (the from is submitted ) {
    our code for manipulating the form
}
*/

if (isset($_POST['submit'])) {
    // for checking/testing/reviewing:
    print_r($_POST);
    /*
        Output:
        Array ( [username] => alexchow [password] => alex123 [submit] => Login )
    */

    $userName = $_POST['username'];
    $password = $_POST['password'];
	// echo "$userName and $password";

    /*
        In the final project, we need to check if these two values (credentials)
        are both exist in our database

        if both are valid ==> start a session for that logged-in user.

        Because right now, we don't have a database created yet
        we will assume that we have a database and this user (whatever info we have)
        is exist in our database. (We will database in the coming lectures).


        in this example:
        username => alexchow
        password => alex123

        and are both valid :-)

        so now we can start the session for this user
    */

    // Before working with session, it needs to be started:
    // NOTE: We had to comment the session_start() after adding this line in the header.php
    // as no need to run this function twice! PHP can generate a warning because of that 
    // session_start(); // Start new or resume existing session
    // if we don't call this function first: session_start():
    // Error: Warning: Undefined variable $_SESSION in 
    // Conclusion: In any page that we need to access the session, we have to start it first!!
    // Note: The session_start() function must be the very first thing in your document. Before any HTML tags.
    /*
        $_SESSION =>is a Supper Global Associative/index(rare) Array:
        - PHP.net: https://www.php.net/manual/en/reserved.variables.session
        - https://www.tutorialrepublic.com/php-tutorial/php-sessions.php
        - https://www.w3schools.com/php/php_sessions.asp
    */
    echo "<br>Session Info:</br>";
    var_dump($_SESSION); // if it's empty => array(0) { }

    /*
        We will insert the data in this session,
        for example, let's try to save the username and the password
    */

    // So we need to specify the index for the $_SESSION array:
    // We can also store the values into the session using the index as the keys ==> not commonly used (rare)!
    /*
    $_SESSION[0]=$userName;
    $_SESSION[1]=$password;
    echo "<br>Our SESSION Array: <br>";
    var_dump($_SESSION); // array(0) { } array(2) { [0]=> string(8) "alexchow" [1]=> string(7) "alex123" }
    for ($i=0; $i<count($_SESSION); $i++) {
        echo "<br>".$_SESSION[$i];
    }
    echo "<hr>";
    */

    // It's better to use the keys as string values (Associative Array)
    $_SESSION['username']=$userName;
	$_SESSION['password']=$password;
    // testing:
    echo "Username: ".$_SESSION['username'];

    // After logged-in, we need to redirect the member/client to the client page!
    // leaving this page "index.php" and jumping to "client.php"
    // You can simply use the PHP header() function to redirect a user to a different page.
    // The syntax: header("location: URL")
    // https://www.tutorialrepublic.com/faq/how-to-make-a-redirect-in-php.php
    header ('location: client.php'); // it works with capital L (Location) or l (location)
    // it's recommended to add the php function exit() to officially leave/exit this page completely 
    exit();
} // end if form is submitted
?>

<!-- here is the HTML content of this page -->
<h1>Welcome to our company</h1>
<p>You will find all your hardware needs!</p>
<!-- simple html form for the user to login-->
<p>If you are already a member, you can login now to access your portfolio:</p>

<!-- 
   PHP form needs two attributes:
   method
   action		
-->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <!-- 
        form elements need one attribute: name
    -->
        <div>
            <input type="text" name="username" placeholder="Your Username">
            <br>
            <input type="password" name="password" placeholder="Your Password">
        </div>
        <div>
            <input type="submit" name="submit" value="Login">
            <input type="reset" value="Clear">
        </div>
    </form>

    <p>You can <a href="register.php">register</a> for free to enroll yourself in our website.</p>
<!-- 
   PHP form needs two attributes:
   method
   action		
-->


<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'includes/footer.php';
?>