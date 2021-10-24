<!-- 
    Here is my HTML comment as usual as we do in .html file 

    PHP files can have HTML and internal CSS or  internal JavaScript using <script>
    like any normal HTML file, we can still write any valid HTML/CSS/JavaScript code
    but plus PHP also!

    PHP language is designed/created to work for the web application ONLY

    Usually we put our major php code at the very top before the HTML template,
    But we can embed php code anywhere we like/need inside our html content

    so the .php file can have:
    - Full Valid HTML content
    - Internal CSS and JavaScript
    - for sure it can have PHP code (that's why it has the extension .php)

    Q) If we can use .php file to include all the normal code
    Why we cannot always use .PHP instead of using HTML?

    A) Remember that PHP is a server side language, 
    any .php file needs to have Apache server running in order to work
    while with .html file we just need to have a browser.

    So if you have NO intention to write any PHP code at all, 
    you should stay away from naming your files to .php
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to PHP</title>
    <!-- Below is the opening/closing style tags for writing our CSS -->
    <style>
        p {
            color: green;
        }
    </style>
</head>
<body>
    <h1>PHP Language</h1>
    <p>Learning PHP for the first time!</p>
    <p>Yes, the file extension is .php, but we can add HTML with internal CSS and JavaScript</p>
        <!-- below is our opening/closing script tags to write JS: -->
    <script>
		// our JS code

        /*
        Multiple-line comments
        line 2
        line 3
        */
        document.write("<p>We like PHP!</p>");
    </script>
</body>
</html>