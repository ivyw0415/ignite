<?php

class StatusController {
    private $_host = "localhost";
    private $_user = "ignite";
    private $_pass = "g4c2016etc";
    private $_db = "ignite";
    private $_conn = null;
    
    public function __construct() {
        $this->_conn = mysqli_connect($this->_host, $this->_user, $this->_pass, $this->_db);
    }
    
    public function __destruct() {
        $this->_conn->close();
    }
    
    public function setStatus($id, $value) {
        $query = "
        UPDATE status SET status_n=" . $value . "
        WHERE status_id=" . $id . ";
        ";
        if($res = $this->_conn->query($query)) {
            return $res;
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
    
    public function getStatus($id) {
        $query = "
        SELECT status_id, status_name, status_n
        FROM status WHERE status_id=" . $id . ";
        ";

        if($res = $this->_conn->query($query)) {
            return $res->fetch_assoc();
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
}
?>