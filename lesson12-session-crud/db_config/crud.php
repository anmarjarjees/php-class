<?php
/*
This php file is just for instantiate our object from the Database Class
to do the CRUD operation, so let's name it $crud
*/
require_once 'db_conn.php'; // to get the object "$pdo"
require_once 'Database.php'; // to get our class "Database"

// we can also name our main custom object $crud
$crud = new Database($pdo);