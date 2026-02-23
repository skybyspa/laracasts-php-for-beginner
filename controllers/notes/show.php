<?php

use Core\Database;

$config = require base_path('config.php');
//connect to MySQL database
$db = new Database($config['database']);

$currentUserId = 2;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_POST['id']
    ])->findOrFail();

    authorise($note['user_id'] == $currentUserId);

    // form was submitted. Delete current note.
    $db->query('delete from notes where id = :id', [
        'id' => $_POST['id']
    ]);

    header('location: /websites/demo/notes');
    exit();
} else {

    $note = $db->query('select * from notes where id = :id', [
        'id' => $_GET['id']
    ])->findOrFail();

    authorise($note['user_id'] == $currentUserId);

    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}
