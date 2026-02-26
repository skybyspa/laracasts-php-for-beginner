<?php

$router->get('/websites/demo/', 'index.php');
$router->get('/websites/demo/about', 'about.php');
$router->get('/websites/demo/contact', 'contact.php');

$router->get('/websites/demo/notes', 'notes/index.php')->only('auth');
$router->get('/websites/demo/note', 'notes/show.php');
$router->delete('/websites/demo/note', 'notes/destroy.php');

$router->get('/websites/demo/note/edit', 'notes/edit.php');
$router->patch('/websites/demo/note', 'notes/update.php');


$router->get('/websites/demo/notes/create', 'notes/create.view.php');
$router->post('/websites/demo/notes', 'notes/store.php');

$router->get('/websites/demo/register', 'registration/create.php')->only('guest');
$router->post('/websites/demo/register', 'registration/store.php')->only('guest');

$router->get('/websites/demo/login', 'session/create.php')->only('guest');
$router->post('/websites/demo/session', 'session/store.php')->only('guest');
$router->delete('/websites/demo/session', 'session/destroy.php')->only('auth');