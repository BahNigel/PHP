<?php

// require MySQL Connection
require ('Config/Database.php');
// require Todo_controller Class
require ('Controller/Todo_Controller.php');


// Database object
$db = new Database();

$Todo = new Todo_Controller($db );

?>