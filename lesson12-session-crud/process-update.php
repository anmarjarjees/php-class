<!-- We need to embed the header (include/header.php) at the top -->
<?php
// include() will continue loading the page even if the file is not found
require 'templates/header.php';

// our code for manipulating the update form:
// We don't have to check if the form is submitted using our normal if condition

$firstName = $_POST[ 'first-name' ];
$lastName = $_POST[ 'last-name' ];
$email = $_POST[ 'email' ];
$password = $_POST[ 'password' ];

/*
Our plan/logic/algorithm as programmers:
- We will check each field if it's empty or not
- if the field as a value (not empty), we can use this new value
- if any field is empty, we can just use the same value from the database
*/

// We need to get the client info from the database:
$memberInfoArray = $crud->getOneMember( $_SESSION[ 'username' ] );

if ( empty( $firstName ) ) {
  $firstName = $memberInfoArray[ 'first_name' ];
}

if ( empty( $lastName ) ) {
  $lastName = $memberInfoArray[ 'last_name' ];
}

if ( empty( $email ) ) {
  $email = $memberInfoArray[ 'email' ];
}

if ( empty( $password ) ) {
  $password = $memberInfoArray[ 'password' ];
}

$isDone = $crud->updateMember( $firstName, $lastName, $email, $password, $_SESSION[ 'username' ] );

// Override the value of $_SESSION['fullName'] in case if it's changed:
$_SESSION[ 'fullName' ] = $firstName . " " . $lastName;

if ( $isDone ) {
  // header("Location:client.php");
  // exit();
  echo "<h1>$firstName $lastName</h1>";
  echo '<p>Your profile has been updated.</p>';
} else {
  echo '<p>Sorry we were unable to update your information, please try again!</p>';
}

?>

<!-- We need to embed the footer (include/footer.php) at the bottom -->
<?php
require 'templates/footer.php';
?>