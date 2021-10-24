  <!-- Now we need to use php code to include the header.php file -->          
  <?php
/* 
Using a php built-in function to embed/insert the header.php or any php code, why?
Because "header.php" contains the top repeated part (code) in every page

The include(): statement includes and evaluates the specified file.

Example: Below we put 3 times include, the code will be included 3 times
include 'templates/header.php';
include 'templates/header.php';
include 'templates/header.php';

include_once(): 
if the code from a file has already been included, 
it will not be included again. As the name suggests, it will be included just once. 

Example: Below we put 2 times include_once, but the code will be included only one time
include_once 'templates/header.php';
include_once 'templates/header.php';
*/

// include 'templates/header.php';

// include_once 'templates/header.php'; // we can use it with or without ( )
// OR:
// include_once ('templates/header.php'); // This code will NOT be included

/*
Beside the two functions:
- include()
- include_once()

PHP also giving us these two functions:
- require()
- require_once()

They work the same as include and include_once but with only very important difference
*/
// require 'templates/header.php'; // we can use it with or without ( )
// require 'templates/header.php';
// Even if the code below is written 3 times, it will run only one time => "_once"
require_once 'templates/header.php';
require_once 'templates/header.php';
require_once 'templates/header.php';
  ?>
        
            <h2>Welcome to our amazing Spa</h2>
            <p>Welcome to The Striped Umbrella — a full-service resort and spa just steps from the Gulf of Mexico and ten miles
                east of Crab Key, Florida. Come enjoy the best of both worlds, a secluded sandy beach populated with beautiful
                birds, yet a short drive down the road from world-class shopping, restaurants, and entertainment. Bring a
                good book and leave your laptop at the office. You won't want to go home.
            </p>
            <img class="img-centre" src="assets/images/pool.jpg" alt="spa Hotel" title="spa Pool" />

            <video controls width="400" height="300" preload="auto" loop poster="assets/images/sea_spa_logo.jpg">
                <source src="assets/media/w3schooldemo.mp4">
                <source src="assets/media/w3schooldemo.WebM">
                <source src="assets/media/w3schooldemo.ogg">
                <p>This browser does not support our video format.</p>
            </video>
            <?php

                // Look on how many way or syntax we can use :-)
                /*
                include ('templates/footer.php');
                include 'templates/footer.php';
                include_once ('templates/footer.php');
                include_once 'templates/footer.php';

                require ('templates/footer.php');
                require 'templates/footer.php';
                require_once ('templates/footer.php');
                */
                require_once 'templates/footer.php';
            ?>