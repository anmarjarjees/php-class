<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'includes/header.php';

// The next logical step is to start our session:
// NOTE: We had to comment the session_start() after adding this line in the header.php
// session_start();

/*
After starting our session, we need to check first if this user/visiter is already logged-in
Then we can proceed with display the full page content

Q) How do we know/check if the user is logged-in (he/she is already a member)?
A) We can just check the value of $_SESSION['username'] and also to make sure 100% we can check the second value $_SESSION['password']

Q) How can we check if there are values in these array's keys: username and password
A) we can use the same function isset()
*/

/*
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    // You can just leave it empty and continue loading the page
} else {
    // if the user is not logged-in, we have to redirect them to the home page or the login page
    header("location: index.php");
    exit();
}
*/

/*
We can change our if condition logic:
    asking if no value has been set to username AND no value has been set to password => direct the user to the home
*/
if ( !isset($_SESSION['username']) && !isset($_SESSION['password'])) {
     // if the user is not logged-in, we have to redirect them to the home page or the login page
     header("location: index.php");
     exit();
}
?>

<!-- here is the HTML content of this page -->
<h1>Welcome to our amazing features</h1>
<p>This page is only for our client!</p>
<p>Username: <?php echo $_SESSION['username']; ?></p>
<!-- 
    NOTE:
    You will receive this error: Warning: Undefined variable $_SESSION in...
 -->

<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'includes/footer.php';
?>
