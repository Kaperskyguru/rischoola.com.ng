<?php

 abstract class dbmodel
{
private $db;
public  $dbh;
private $stmt;

  public function __construct()
  {
    $this->dbh = new PDO("mysql:host=localhost;dbname=rsschooldb", 'root', "");
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function db()
    {
      if(is_null($this->dbh))
      {
          $this->dbh = new PDO("mysql:host=localhost;dbname=rsschooldb", 'root', "");
          $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }
      return;
    }

  public function query($query)
  {
    $this->db();
    $this->stmt = $this->dbh->prepare($query);
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
    return $this->dbh->lastInsertId();
  }

}


?>
