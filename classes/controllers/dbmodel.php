<?php
declare(strict_types=1);
abstract class dbmodel
{
    private $db;
    public static $dbh;
    private $stmt;

    private function __construct()
    {
    }

    //Using a singleton pattern to avoid duplication database connection
    public function db()
    {
        if (!self::$dbh) {
            try {
                self::$dbh = new PDO("mysql:host=localhost;dbname=rsschooldb", 'root', "Changeless11!");
                self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo $_SESSION['error'] = $e->getMessage();
            }
        }
        return self::$dbh;
    }

    public function query(String $query)
    {
        try {
            $this->db = $this->db();
            $this->stmt = $this->db->prepare($query);
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
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
        $this->stmt->bindValue($param, $value, $type);
    }

    public function executer()
    {
        try {
            $this->stmt->execute();
            return $this->stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    public function resultset()
    {
        try {
            $this->executer();
            $stmt = $this->stmt->fetch(PDO::FETCH_ASSOC);
            if ($this->stmt->rowCount() > 0) {
                return $stmt;
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    }

    public function lastIdinsert():int
    {
        return intval($this->db->lastInsertId());
    }


}


?>
