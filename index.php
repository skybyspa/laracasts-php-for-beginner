<?php

require 'functions.php';

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/websites/demo/') {
    require 'controllers/index.php';
} else if ($uri === '/websites/demo/about') {
    require 'controllers/about.php';
} else if ($uri  === '/websites/demo/contact') {
    require 'controllers/contact.php';
}