<?php

class FactController {
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
    
    public function getAllFacts() {
        $query = "
        SELECT facts.fact_id, facts.fact_content, facts.fact_status, facts.q_id, 
            questions.q_content,
            users.user_name
            from facts  
            left join questions on facts.q_id=questions.q_id 
            left join users on users.user_id=questions.user_id;
        ";
        
        $facts = array();
        if($res = $this->_conn->query($query)) {
            while($row = $res->fetch_assoc()) {
                $facts[] = $row;
            }
            return $facts; 
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }

    
    
    public function changeFactStatus($fact_id, $value) {
        $query = "
        UPDATE facts SET fact_status=" . $value . "
        WHERE fact_id=" . $fact_id . ";
        ";

        if($res = $this->_conn->query($query)) {
            return $res;
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
    
    public function getLockedCount() {
        $query = "
            select count(*) as cc from facts where fact_status = 0;
        ";
        
        if($res = $this->_conn->query($query)) {
            return $res->fetch_assoc(); 
        }
        else {
            return "ERROR: " . $query . " RESULT: " . $res;
        }
    }
    
    public function getTotalCount () {
        $query = "
            select count(*) as cc from facts;
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