<?php

$router->get('/websites/demo/', 'controllers/index.php');
$router->get('/websites/demo/about', 'controllers/about.php');
$router->get('/websites/demo/contact', 'controllers/contact.php');

$router->get('/websites/demo/notes', 'controllers/notes/index.php');
$router->get('/websites/demo/note', 'controllers/notes/show.php');
$router->delete('/websites/demo/note', 'controllers/notes/destroy.php');

$router->get('/websites/demo/note/edit', 'controllers/notes/edit.php');
$router->patch('/websites/demo/note', 'controllers/notes/update.php');


$router->get('/websites/demo/notes/create', 'controllers/notes/create.php');
$router->post('/websites/demo/notes', 'controllers/notes/store.php');

//$router->delete('/websites/demo/notes', 'controllers/notes/destroy.php');