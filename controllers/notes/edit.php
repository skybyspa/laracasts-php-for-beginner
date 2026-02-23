<?php

echo 'hi';

view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => []
]);