<?php

/*
 * Update is where the edit form will submit. Updates a specific note.
 */

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// find the corresponding note
$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorise that the current user can edit the note
authorise($note['user_id'] == $currentUserId);

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 10)){
    $errors['body'] = "A body of no more than 1000 characters is required";
}

// if we do have validation errors, return the page
if (count($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// if we do not have validation errors, update the record in the notes database table
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

// redirect the user
header('location: /websites/demo/notes');
die();