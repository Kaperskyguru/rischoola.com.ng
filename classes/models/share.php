<?php

class ShareModel extends Model {

    function Index() {
        $this->query("SELECT * FROM schools");
        $rows = $this->resultset();
        print_r($rows);
        return $rows;
    }

    function add() {
        return;
    }

}
