<?php
require_once __DIR__ . '/Sessioncheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Player entry</title>
  <link rel="stylesheet" href="./CSS/form-style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./JS/script.js"></script>
</head>
<body>
  <label for="fullname">Player's Name</label>
  <input type="text" id="fName" name="fName" placeholder="Player's name.." />
  <label for="ball">Numbers of ball faced:</label>
  <input type="number" id="ball" name="ball" placeholder="Number of balls" />
  <label for="run">Run made:</label>
  <input type="number" id="run" name="run" placeholder="Run.." />
  <button type="button" id="submit" name="submit">submit</button>
  <a href="/Logout">Logout</a>
  <table id="table-data" border="1" width="100%">
  </table>
</body>

</html>
