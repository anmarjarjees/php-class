<?php
/* Make sure that "display_errors" is "on" in your php.ini file: 

We can check if it's on/off by running the following php function
*/
phpinfo(); // display_errors = on (for older versions)

/*
for the current versions:
; display_errors
; Default Value: On

Note: Please be advised that any change we make on "php.ini" we need to restart apache [stop apache server and start it again (using the XAMPP Control Window)]
*/


/*
In case if it's off we need to open This file (php.ini) which is located inside:
- MS Windows: c:\xampp\php
- Mac OS: /Applications/XAMPP/Xamppfiles/etc

You can open the file with any basic text editor like notpad or notpad++ (Windows)

and change "on" to "off"
*/


/* 
its good practice not to use the ending tag at the end of a file that contains php code only 

?>
*/


