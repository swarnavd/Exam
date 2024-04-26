<?php
require_once __DIR__ . '/Query.php';

// Assuming Query.php contains the necessary database insertion logic.
$ob = new Query();
$player = $ob->showPlayer();
?>
<table border="1" width="100%">
  <thead>
    <tr>
      <th>Name</th>
      <th>Ball faced</th>
      <th>Run</th>
      <th>Strike rate</th>
    </tr>
  </thead>
  <
  <?php foreach ($player as $x) : ?>
    <tr>
      <td><?php echo $x['name'] ?></td>
      <td><?php echo $x['run'] ?></td>
      <td><?php echo $x['ball'] ?></td>
      <td><?php echo $x['strike_rate'] ?></td>
    </tr>
  <?php endforeach ?>
</table>
