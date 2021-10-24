<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'templates/header.php';

// We will write the PHP code for inserting a new record in the same file:
// add the if form is submitted:
if ( isset( $_POST[ 'register' ] ) ) {
  // create variables to get the value of each field:
  $firstName = $_POST[ 'first-name' ];
  $lastName = $_POST[ 'last-name' ];
  $username = $_POST[ 'username' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];

  /*
  another way to save all user input in one variable
  array: $userInfo
  */
  $userInfo = []; // define an empty array
  // Don't forget the nice feature of PHP, by adding the index values automatically
  $userInfo[] = $_POST[ 'first-name' ]; // in index 0
  $userInfo[] = $_POST[ 'last-name' ]; //  in index 1
  $userInfo[] = $_POST[ 'username' ]; // in index 2
  $userInfo[] = $_POST[ 'email' ]; // in index 3
  $userInfo[] = $_POST[ 'password' ]; // in index 4

  // Testing:
  // var_dump($userInfo);

  // First validation: Not empty field


  /*
  Assuming that we don't have any empty field
  */
  $isEmpty = false;
  // looping through the array
  for ( $i = 0; $i < count( $userInfo ); $i++ ) {
    if ( empty( $userInfo[ $i ] ) ) {
      $isEmpty = true;
      break; // we can stop the loop since we got an empty field
    }
  } // end for loop 


  /*
  The code logic if we are not using array
  if any variable (field) is empty => alert the user:
  */
  /*
  $isEmpty = false;
  if (empty($firstName) || empty($lastName) and so on for the rest) {
     $isEmpty = true;
  } // end if any field is empty
  */

  if ( $isEmpty ) {
    echo "<p class='warning'>Sorry, all fields are required!</p>";
  } else {
    // Now we need to call our object "crud" 
    // and using its method insertMember() to insert the values into our database:
    // We set the method to return a boolean value:
    // - true if the insert statement done!
    // - false if the insert statement failed
    // so we can assign the returned value to another varaible named "isDone" for example
    // our method requires 5 arguments:
    /*
    NOTE: 
    If you are going to use array only for passing the values,
    it's better to pass the array as whole object:
    insertMember($userInfo)

    In such case we need to modify our method to accept one argument only
    */

    /*
    Finally, we need to check if the username has taken/used before!
    */

    // Validation: Make sure the username is not used/taken
    $membersPDOStmtObject = $crud->getMembers();

    /*
        Assuming that we don't have the username or the email in use
        we need to define this to be a global variable
    */
    $isExist = false;
    while ( $row = $membersPDOStmtObject->fetch() ) {
      // remember each $row will be an associative array:
      // for learning
      // $row will be an associative array that represents one record 
      // print_r ($row); echo "<hr>";  

      // for testing:
      /*
      echo $row['username'].'<br>'; 
      echo $row['email'].'<br>';
      */

      /*
          We checking using the variable $username and the varaible $email
          We can check the $userInfo[2]:
           if ($userInfo[2]==$row['username'])
      */
      if ( $username == $row[ 'username' ] || $email == $row[ 'email' ] ) {
        // testing:
        // echo "<br>The user is exist";
        /* change the value of $isExist to true because the user is exist */
        $isExist = true;
        break;
      }
    } // end while loop

    // Checking if we can get the value of the variable $isExist:
    // echo "<hr>isExist<br>";
    // var_dump($isExist); // True => 1, False => nothing to display

    // We have to check that the username value is not used then we can insert the new member:
    if ( $isExist ) {
      $existUserMsg = "Sorry, either username or the email already taken!";
    } else {
      // placing our main code to insert the new record:
      $isDone = $crud->insertMember( $userInfo[ 0 ], $userInfo[ 1 ], $userInfo[ 2 ], $userInfo[ 3 ], $userInfo[ 4 ] );
      // OR:
      // $crud->insertMember($fName,$lName,$email,$password);
      if ( $isDone ) {
        $regMsg = 'Thank you for registering in our Website! 
            You can visit the <a href="client.php">client</a> page';
        // SESSION is a Global Associative Array:
        // So we need to specify the index for this array
        $_SESSION[ 'username' ] = $username;
        $_SESSION[ 'password' ] = $password;
        $_SESSION[ 'fullName' ] = $firstName . " " . $lastName;
        $firstName = $lastName = $email = $username = '';
      } else {
        $regMsg = "Sorry we were unable to register you, please try again!";
      }

    } // end else username is available

  } // end main else all fields are filled

} // end if form is submitted
?>

<!-- here is the HTML content of this page -->
<h1>Sign Up Now!</h1>
<p>Please take few moments to register with our website</p>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
  
  <!-- Adding another div element as a container for the last name -->
  <div>
    <label> username:*
      <input type="text" id="username" name="username" required maxlength="30" size="30"
                        value="<?php if (isset($username)) { echo $username; } ?>">
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
  <?php
  if ( isset( $existUserMsg ) ) {
    echo "<p>$existUserMsg</p>";
  }

  if ( isset( $isDone ) ) {
    echo "<p>$regMsg</p>";
  }
  ?>
  <input type="submit" value="Register" name="register">
  <!-- To clear all the form fields: type="reset" -->
  <input type="reset" name="reset" value="Clear">
</form>
<hr>
<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'templates/footer.php';
?>