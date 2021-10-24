<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'templates/header.php';

/*
We can change our if condition logic:
    asking if no value has been set to username AND no value has been set to password => direct the user to the home
*/
if ( !isset( $_SESSION[ 'username' ] ) && !isset( $_SESSION[ 'password' ] ) ) {
  // if the user is not logged-in, we have to redirect them to the home page or the login page
  header( "location: index.php" );
  exit();
}

// We need to get the client info from the database:
$memberInfoArray = $crud->getOneMember( $_SESSION[ 'username' ] );

if ( isset( $_POST[ 'submit' ] ) ) {
  // testing:

  echo "<br>All form inputs:<br>";
  print_r( $_POST );


  // The user is sure for removing his account:
  $isDone = $crud->deleteOneMember( $_SESSION[ 'username' ] );

  // If the user's account is removed successfully
  if ( $isDone ) {
    // Two things to do after deleting this record:
    // 1. Destroy the current session (logging out the user)
    // 2. Redirect them to the home page

    // Step1: 
    // Removing session data
    // using the built-in php unset()
    unset( $_SESSION[ "username" ] );
    unset( $_SESSION[ "password" ] );

    // Step2:
    header( "location: index.php" );
    exit();
  }
} // end if form is submitted
?>

<!-- here is the HTML content of this page -->
<p>Are sure you want to remove your account completely!</p>
<!-- 
    Submit the page form to the same page itself:
    action="< ? php echo $_SERVER['PHP_SELF'] ? >"
 -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="delete-form">
  <div>
    <label for="first-name">First Name:</label>
    <input type="text" id="first-name" name="first-name" readonly maxlength="30" size="30"
        value="<?php  echo $memberInfoArray['first_name']; ?>">
  </div>
  
  <!-- Adding another div element as a container for the last name -->
  <div>
    <label> Last Name:
      <input type="text" id="last-name" name="last-name" readonly maxlength="30" size="30"
            value="<?php  echo $memberInfoArray['last_name']; ?>">
    </label>
  </div>
  
  <!-- Adding another div element as a container for the email field -->
  <div>
    <label>Email: 
      <!-- 
            Notice any browser that supports HTML5 will validate the email field
            the pattern must be anyText@anyText.anyText

            With HTML5, we can also add the new attribute "placeholder"
            -->
      <input type="email" readonly name="email" placeholder="name@example.com" maxlength="50"
                size="30"
                value="<?php  echo $memberInfoArray['email']; ?>">
    </label>
  </div>
  <input type="submit" name="submit" value="Remove" >
  <!-- <input type="reset" name="cancel" value="Cancel">     -->
  <button>
  <a href="client.php">Cancel</a>
  </button>
</form>
<hr>

<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'templates/footer.php';
?>
