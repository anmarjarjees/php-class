<?php
// Include database config file => to get our PDO object 
require_once 'includes/db_connect.php';
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

/*
MySQLi: 
By default, MySQLi can run Multiple queries at once,
PDO is not but we can make PDO acting the same if emulation mode is turned on in PDO
so in PDO, we need to set this option to true if we want to use it

php.net:
PDO::ATTR_EMULATE_PREPARES Enables or disables emulation of prepared statements. 
Some drivers do not support native prepared statements or have limited support for them. 
Use this setting to force PDO to either always emulate prepared statements 
(if true and emulated prepares are supported by the driver), 
or to try to use native prepared statements (if false). 
It will always fall back to emulating the prepared statement 
if the driver cannot successfully prepare the current query. Requires bool.

MS Docs: 
- https://docs.microsoft.com/en-us/sql/connect/php/pdo-prepare?view=sql-server-ver15
- https://docs.microsoft.com/en-us/sql/connect/php/pdo-prepare?view=sql-server-ver15#emulate-prepare

Code Example:
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false); // It's false by default
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, true);
*/
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false);

$sql = 'SELECT * FROM posts LIMIT 3'; // Will retrieve only first 3 records

// 1. using PDO method named "prepared()"
$stmt = $pdo->prepare($sql);

// 2. using PDO method named "execute()"
/*
This time we select everything so no arguments for execute() method
*/
// $stmt->execute([$authorName]);
$stmt->execute();

$posts = $stmt->fetchAll();
echo "<h1>Results as Associative Array</h1>";
foreach($posts as $post) {
    echo '<br>Title: '.$post['title'].'<br>';
}

echo "<hr>";
// We need to rerun the execute() method
$stmt->execute();
// Using the same sentence but passing the "mode" FETCH_OBJ
// Remember that "FETCH_OBJ" is a static CONSTANT for PDO class
// Calling any static class member (property, constant, method):
// ClassName::memberName (:: => "Scope Resolution Operator")
$posts = $stmt->fetchAll(PDO::FETCH_OBJ);
echo "<h1>Results as Object</h1>";
foreach($posts as $post) {
    echo '<br>Title: '.$post->title.'<br>';
}


