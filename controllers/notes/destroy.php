<?php

/*
 * Destroy is where the destroy form (in edit.view.php) will submit. Destroys a specific note
 */

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 2;

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
