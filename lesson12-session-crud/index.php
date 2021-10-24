<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'templates/header.php';

// starting the form code (manipulate the form):
// Yes, we need to make sure that the form is submitted:
/*
if (the from is submitted ) {
    our code for manipulating the form
}
*/

/*
Creating a flag variable
let's name it isExist (if the user is exist)
we give it an initial value of false assuming the user is not exit
*/
$isExist = false; /* assume that the user is not exist first! */
$msg = "";
if ( isset( $_POST[ 'submit' ] ) ) {
  $userName = $_POST[ 'username' ];
  $password = $_POST[ 'password' ];

  // Validation ***************  
  $membersPDOStmtObject = $crud->getMembers();

  while ( $row = $membersPDOStmtObject->fetch() ) {
    // remember each $row will be an associative array:
    // for learning
    // $row will be an associative array that represents one record 
    // print_r ($row); echo "<hr>";  

    // for testing:
    /*
    echo $row['username'].'<br>'; 
    echo $row['password'].'<br>';
    */
    if ( $userName == $row[ 'username' ] && $password == $row[ 'password' ] ) {
      // testing:
      // echo "<br>The user is exist";
      /* change the value of $isExist to true because the user is exist */
      $isExist = true;
      $fullName = $row[ 'first_name' ] . " " . $row[ 'last_name' ];
    }
  } // end while loop

  if ( $isExist ) {
    // Before working with session, it needs to start:
    // session_start(); // No need
    // we moved session_start() to the header.php so it's available in every page

    // SESSION is a Global Associative Array:
    // So we need to specify the index for this array
    $_SESSION[ 'username' ] = $userName;
    $_SESSION[ 'password' ] = $password;
    $_SESSION[ 'fullName' ] = $fullName;
    // after log in, we need to redirect the user to the client page:
    header( "location: client.php" );
    exit();
  } else {
    $msg = "Sorry, username or password is/are incorrect!";
  }

  // echo "<br>Session Info:</br>";
  // var_dump($_SESSION); // if it's empty => array(0) { }
} // end if form is submitted
?>

<!-- here is the HTML content of this page -->
<h1>Welcome to our company</h1>
<p>You will find all your hardware needs!</p>
<?php
/*
if ( is set SESSION of username and password) {
display: You already logged
} else {
display: The entire form element
}
*/
if ( isset( $_SESSION[ 'username' ] ) && isset( $_SESSION[ 'password' ] ) ) {
  echo "<p>You already logged in<p>";
} else {
  ?>
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
    <input type="text" name="username" placeholder="Your Username" required>
    <br>
    <input type="password" name="password" placeholder="Your Password" required>
    <p class="warning">
      <?php
      if ( !$isExist ) {
        echo $msg;
      }
      ?>
    </p>
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

<?php } ?>
<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'templates/footer.php';
?>