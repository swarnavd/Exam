<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Dotenv.php';
/**
 * Connection class to establish database connection.
 */
class Connection
{
  /**
   * Conn variable use here to know if the database is Connected or not and
   * it return true or false.
   *
   * @var \PDO $conn
   */
  public $conn;
  public function __construct()
  {
    $env = new Dotenv();
    try {
      $this->conn = new PDO($_ENV['dbName'], $_ENV['user'], $_ENV['pass']);
    }
    catch (Exception $e) {
      die("Connection error:" . $e);
    }
  }
  /**
   * This function use here to close Connection with Database.
   *
   * @return NULL
   */
  public function closeConnection()
  {
    return $this->conn = NULL;
  }
}
