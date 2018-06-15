<?php

class Schools extends Logger
{

    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get_schools()
    {
        try {
            $query = "SELECT * FROM schools";
            $this->query($query);
            $stmt = $this->executer();
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <option value="<?php echo $school_id ?>"><?php echo $school_name ?></option>
                    <?php
                }
            }
        } catch (Error $e) {
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

    public function get_schools_by_category($category_id)
    {
        try {
            $query = "SELECT * FROM schools WHERE school_category_id = $category_id";
            $this->query($query);
            $stmt = $this->executer();
            if ($stmt->rowCount() > 0) {
                echo '<option disabled="true" selected="">Select a school from here to get latest information</option>';
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <option value="<?php echo $school_id ?>"><?php echo $school_name ?></option>
                    <?php
                }
            }
        } catch (Error $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
        }
    }

    public function get_school_name_by_id($id)
    {
        try {
            $query = "SELECT school_name FROM schools WHERE school_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $school_name;
        } catch (Error $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }


    public function get_school_abbr_by_id($id)
    {
        try {
            $query = "SELECT school_abbr FROM schools WHERE school_id = $id";
            $this->query($query);
            $row = $this->resultset();
            extract($row);
            return $school_abbr;
        } catch (Error $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

}
