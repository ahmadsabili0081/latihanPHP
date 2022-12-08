<?php

class Database
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;
  private $dbh;
  private $stmt;


  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
    // koneksi ke database butuh satu parameter baru. Yaitu option
    // option ini biasanya digunakan ketika kita ingin mengoptimasi koneksi ke database kita 
    $option = [
      //pdo:: ini adalah parameter dari konfigurasi database 
      // attr_persistent digunakan untuk untuk membuat database kita koneksinya terjaga terus
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    ];
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }
  // binding datanya
  // siapa tau ada where nya 
  public function bind($paramater, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }
    $this->stmt->bindValue($paramater, $value, $type);
  }
  public function execute()
  {
    $this->stmt->execute();
  }
  // klo ingin datanya ditampilkan datanya banyak
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  // klo ingin datanya satu
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function rowCount()
  {
    // row count yang ditulis dibawah punya pdo
    return $this->stmt->rowCount();
  }
}
