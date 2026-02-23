<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'functions.php';

spl_autoload_register(function ($class) {
    require base_path("Core/{$class}.php");
});

require base_path('router.php');

//$config = require('config.php');
//connect to MySQL database
//$db = new Database($config['database']);

//
//$id = $_GET['id'];
//$query = "select * from posts where id = :id";
//$posts = $db->query($query, [':id' => $id])->fetch();
//
////dd($posts);