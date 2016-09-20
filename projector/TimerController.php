<?php

class TimerController {
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
    
    public function delTime() {
        $query = "UPDATE timer SET time=NULL WHERE name='starttime'";
        $res = null;
        if($res = $this->_conn->query($query)) {
            return $res;
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
    
    public function getTime() {
        $query = "SELECT time FROM timer WHERE name='starttime'";

        if($res = $this->_conn->query($query)) {
            return $res->fetch_row();
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
    
    public function setTime($time) {
        $query = "UPDATE timer SET time='" . $time . "' where name='starttime'";

        if($res = $this->_conn->query($query)) {
            return $res;
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
}
?>