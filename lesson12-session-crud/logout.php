<?php
// this is page doesn't need a real full html content!!!!
// this page for containing the ONLY php code to close/end (destroy) the session

/*
NOTE:
If you want to remove certain session data, 
simply unset the corresponding key of the $_SESSION associative array, 
as shown in the following example:
*/

// Removing session data
if ( isset( $_SESSION[ "username" ] ) && isset( $_SESSION[ "password" ] ) ) {
  // using the built-in php unset()
  unset( $_SESSION[ "username" ] );
  unset( $_SESSION[ "password" ] );
}

// session_destroy — Destroys all data registered to a session
/*
session_start() => a mandatory function to be available anytime we need to use $_SESSION
*/
session_start();

session_destroy(); // end an existing session
/*
Any time we work with session, we have to start it first!
Error: Warning: session_destroy(): Trying to destroy uninitialized session in
*/
header( "location: index.php" );
exit();
?>