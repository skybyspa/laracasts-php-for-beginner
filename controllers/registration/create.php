<?php

if ($_SESSION['user'] ?? false) {
    header("location: /websites/demo/");
    exit();
}

view('registration/create.view.php');