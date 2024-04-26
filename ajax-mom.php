<?php
require_once __DIR__ . '/Query.php';

// Assuming Query.php contains the necessary database insertion logic.
$ob = new Query();
$player = $ob->calculateStrike();
foreach($player as $x) {
  echo "Man of the match" . " " . $x['name'];
}
?>
