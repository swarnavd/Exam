<?php
require_once __DIR__ . '/Query.php';
require_once __DIR__ . '/Validation.php';
// Creating object for Query class.
$ob = new Query();
// Creating object for validation class.
$validation = new Validation();
// Assuming Query.php contains the necessary database insertion logic.
$name = $_POST['fullname'] ?? null;
$ball = $_POST['ball'] ?? null;
$run = $_POST['run'] ?? null;
// Strike is initialized.
$strike = "";
// Checks if all the field is filled or not.
if ($name !== null && $ball !== null && $run !== null) {
  $strike = ($run/$ball)*100;
  if ($ob->playerCount()) {
    if($validation->validFullName($name) && $validation->validNumber($ball) && !$validation->validNumber($run) && $ob->isExistingPlayer($name)) {
      $ob->insertion($name, $ball, $run, $strike);
    }
    else {
      $message = "Please follow correct format";
    }
  }
  else {
    $message = "Player is already 11.";
  }
}
else {
  $message = "Please fill all data";
}
