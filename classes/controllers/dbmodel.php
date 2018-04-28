<?php

 abstract class dbmodel
{
private $db;
public static $dbh;
private $stmt;

  private function __construct(){}

    //Using a singleton pattern to avoid duplication database connection
    public function db(){
      if(!self::$dbh){
          self::$dbh = new PDO("mysql:host=localhost;dbname=rsschooldb", 'root', "");
          self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }
      return self::$dbh;
    }

  public function query($query)
  {
    $this->db = $this->db();
    $this->stmt = $this->db->prepare($query);
  }

  public function bind($param, $value, $type = null)
  {
    if(is_null($type))
    {
      switch ($value) {
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
        break;
      }
    }
    $this->stmt->bindValue($param,$value,$type);
  }

  public function executer()
  {
   $this->stmt->execute();
   return $this->stmt;
  }

  public function resultset()
  {
    $this->executer();
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function lastIdinsert()
  {
    return $this->db->lastInsertId();
  }

}


?>
