<?php
require_once  'Connection.php';
class Query {
  /**
   * A function to insert the details of a particular user into database.
   *
   * @param string $name
   *  Particular player's name.
   * @param int $run
   *  Stores particular player's run.
   * @param int $ball
   *  Stores particular player's faced ball.
   * * @param int $strike
   *  Stores particular player's strike-rate.
   *
   * @return void
   */
  public function insertion(string $name, int $run, int $ball, int $strike) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("INSERT INTO player (name, run, ball, strike_rate) VALUES(:name, :run, :ball, :strike_rate)");
      $sql->execute(array(':name' => $name, ':run' => $run, ':ball' => $ball, ':strike_rate'=>$strike));
    }
    catch (Exception $e) {
      echo $e;
    }
  }
  /**
   * A function to check if user is already registered or not.
   *
   * @param string $email
   * Admin's email id.
   *
   * @return boolean
   *  Returns true if admin's email is existed else false.
   */
  public function isExistingUser(String $email) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM admin WHERE email = '$email'");
      $sql->execute();
      $row = $sql->rowCount();
      if ($row > 0) {
        return 1;
      }
      else {
        return 0;
      }
    }
    catch (Exception $e) {
      echo $e;
    }
  }
  /**
   * A function to check if user is already registered or not.
   *
   * @param string $name
   * Player's name.
   *
   * @return boolean
   *  Returns true if player is existed else false.
   */
  public function isExistingPlayer(String $name) {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM player WHERE name = '$name'");
      $sql->execute();
      $row = $sql->rowCount();
      if ($row > 0) {
        return 1;
      }
      else {
        return 0;
      }
    } catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to check if user is exists in database or not.
   *
   * @param string $email
   *  Admin's email id.
   *
   * @return void
   */
  public function validUser(String $email)
  {
    $ob = new Connection();
    try {
      $sql = $ob->conn->prepare("SELECT * FROM admin WHERE email = '$email'");
      $sql->execute();
      $user = $sql->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
    catch (Exception $e) {
      echo $e;
    }
  }

  /**
   * A function to add generated hashed token into database.
   *
   * @param string $email
   *  Admin's email id.
   *
   * @return string
   *  Returns generated token hash.
   */
  public function addToken(string $email)
  {
    $ob = new Connection();
    $token = bin2hex(random_bytes(16));
    $tokenHash = hash("sha256", $token);
    try {
      $sql = $ob->conn->prepare("UPDATE admin set token_hash='$tokenHash' where email='$email'");
      $sql->execute();
    }
    catch (Exception $e) {
      echo $e;
    }
    return $tokenHash;
  }

  /**
   * A function to update new password to the user's existing account.
   *
   * @param string $token
   *  Generated token hash.
   * @param string $hash
   *  Hash of admin's updated password.
   * @param string $email
   *  admin's respective email id.
   *
   * @return void
   */
  public function resetPassword(string $token, string $hash, string $email)
  {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM admin WHERE token_hash = '{$token}'");
    $sql->execute();
    $user = $sql->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      $sql = $ob->conn->prepare("UPDATE admin SET password=:hash, token_hash=NULL WHERE email=:email");
      $sql->bindParam(':hash', $hash, PDO::PARAM_STR);
      $sql->bindParam(':email', $email, PDO::PARAM_STR);
      $sql->execute();
    }
    else {
      $error = "Email id not found.";
    }
  }
  /**
   * A function to show all players in a tabular form.
   *
   * @return void
   */
  public function showPlayer() {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM player");
    $sql->execute();
    $user = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $user;
  }
  /**
   * A function to count number of players.
   *
   * @return bool
   *  If number of player is less than 11 then returns true else false.
   */
  public function playerCount() {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM player");
    $sql->execute();
    $row = $sql->rowCount();
    if ($row > 11) {
      return FALSE;
    }
  }
  /**
   * A function to fetch all the details who have highest strike-rate.
   *
   * @return void
   */
  public function calculateStrike() {
    $ob = new Connection();
    $sql = $ob->conn->prepare("SELECT * FROM player WHERE strike_rate = (SELECT MAX(strike_rate) FROM player)");
    $sql->execute();
    $player = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $player;

  }
}
