<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'templates/header.php';

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
    asking if NO value has been set to username AND NO value has been set to password 
    Then => direct the user to the home page "index.php"
*/
if ( !isset( $_SESSION[ 'username' ] ) && !isset( $_SESSION[ 'password' ] ) ) {
  // if the user is not logged-in, we have to redirect them to the home page or the login page
  header( "location: index.php" );
  exit();
}


// We need to get the client info from the database:
$memberInfoArray = $crud->getOneMember( $_SESSION[ 'username' ] );

// testing:
/*
print_r($memberInfoArray);
echo "<hr>";
*/

/*
Output:
Array ( 
    [member_id] => 12 
    [first_name] => Martin 
    [last_name] => Smith 
    [username] => msmith 
    [email] => martinsmith@goingwithphpisfun.ca 
    [password] => 1234
)
*/
$firstName = $memberInfoArray[ 'first_name' ];
$lastName = $memberInfoArray[ 'last_name' ];
$email = $memberInfoArray[ 'email' ];
?>

<!-- here is the HTML content of this page -->
<h1>Welcome to our amazing features</h1>
<p>This page is only for our clients!</p>
<!-- 
    NOTE: 
    You will receive this error: Warning: Undefined variable $_SESSION in...
    If you don't start the session, but we already placed the code for starting a session in the header
 -->
<p>Welcome: <?php echo $_SESSION['fullName'] ?></p>
<p>Username: <?php echo $_SESSION['username']; ?></p>
<hr>
<hr>
<p>You can update your profile</p>
<p> Please be advised that all fields are required. 
  if no changes have been made or if any field has been left empty,
  The application will just keep the original data from the database.
  in other words the data will be set to the original values by default if any field is empty </p>
<form action="process-update.php" method="post">
  <div>
    <label for="first-name">First Name:*</label>
    <input type="text" id="first-name" name="first-name" required maxlength="30" size="30"
        value="<?php if (isset($firstName)) { echo $firstName; } ?>">
  </div>
  
  <!-- Adding another div element as a container for the last name -->
  <div>
    <label> Last Name:*
      <input type="text" id="last-name" name="last-name" required maxlength="30" size="30"
            value="<?php if (isset($lastName)) { echo $lastName; } ?>">
    </label>
  </div>
  
  <!-- Adding another div element as a container for the email field -->
  <div>
    <label>Email:* 
      <!-- 
            Notice any browser that supports HTML5 will validate the email field
            the pattern must be anyText@anyText.anyText

            With HTML5, we can also add the new attribute "placeholder"
            -->
      <input type="email" required name="email" placeholder="name@example.com" maxlength="50"
                size="30"
                value="<?php if (isset($email)) { echo $email; } ?>">
    </label>
  </div>
  <div>
    <label for="password">Password:*</label>
    <!-- 
        notice that type="password" hides the characters when the user enters password 
        -->
    <input type="password" id="password" name="password" maxlength="12" size="15">
  </div>
  <input type="submit" value="Update" name="update">
  <!-- To clear all the form fields: type="reset" -->
  <input type="reset" name="reset" value="Reset">
</form>
<p>Dear <?php echo "$firstName $lastName"; ?>, You can remove your account from our website anytime.</p>
<p>You can click <a href="remove-client.php">"Remove Account"</a> to proceed with removing your data from our system</p>

<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'templates/footer.php';
?>
