<?php

$router->get('/websites/demo/', 'controllers/index.php');
$router->get('/websites/demo/about', 'controllers/about.php');
$router->get('/websites/demo/contact', 'controllers/contact.php');

$router->get('/websites/demo/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/websites/demo/note', 'controllers/notes/show.php');
$router->delete('/websites/demo/note', 'controllers/notes/destroy.php');

$router->get('/websites/demo/note/edit', 'controllers/notes/edit.php');
$router->patch('/websites/demo/note', 'controllers/notes/update.php');


$router->get('/websites/demo/notes/create', 'controllers/notes/create.view.php');
$router->post('/websites/demo/notes', 'controllers/notes/store.php');

$router->get('/websites/demo/register', 'controllers/registration/create.php')->only('guest');
$router->post('/websites/demo/register', 'controllers/registration/store.php')->only('guest');

$router->get('/websites/demo/login', 'controllers/session/create.php')->only('guest');
$router->post('/websites/demo/session', 'controllers/session/store.php')->only('guest');
$router->delete('/websites/demo/session', 'controllers/session/destroy.php')->only('auth');