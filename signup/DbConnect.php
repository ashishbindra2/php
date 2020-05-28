<?php
/**
*
*/
class DbConnect
{
  private $host = 'localhost';
  private $dbName = 'users';
  private $user = 'journals';
  private $pass = 'journals*001';

  function __construct()
  {
    // code...
  }
  public function connect()
  {
    try {
      // careate object of pdo class
      $conn = new PDO('mysql:host='.$this->host.'; dbname='.$this->dbName,$this->user,$this->pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException $e) {
      echo "Database Error: ".$e->getMessage();
    }
  }
}

?>
