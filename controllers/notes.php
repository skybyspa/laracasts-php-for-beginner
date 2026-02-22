<?php

$config = require('config.php');
//connect to MySQL database
$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('select * from notes where user_id = 2')->fetchAll();

require "views/notes.view.php"; //load
