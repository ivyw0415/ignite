<?php
class QuestionLoader {
    private $_conn;
    private $_host = 'localhost';
    private $_user = 'ignite';
    private $_passwd = 'g4c2016etc';
    private $_dbname = 'ignite';
    
    public function __construct() {
        $this->_conn = new mysqli($this->_host, $this->_user, $this->_passwd, $this->_dbname);
        if($this->_conn->connect_error) {
            die('MySQL connection error!');
        }
    }
    
    public function __destruct() {
        $this->_conn->close();
    }
    
    public function getAllQuestions($order) {
        $ques = array();
        $asc = "DESC";
        $all = "";
        if($order === "q_time") {
            $asc = "ASC";
            $all = " OR kind_id=4 OR kind_id=7";
        }
        $query = "
        SELECT q_id, q_content, q_vote, q_tag
        FROM questions
        WHERE kind_id=1" . $all . "
        ORDER BY " . $order . " " . $asc . ";
        ";
        
        $res = $this->_conn->query($query);
        while($row = $res->fetch_assoc()) {
            $ques[] = $row;
        }
        
        return $ques;
    }
    
    public function setTag($tag, $q_id) {
        $query = "
        UPDATE questions SET q_tag='" . $tag . "'
        WHERE q_id=" . $q_id . "
        ;";
        $query2 = " 
        UPDATE facts set q_id =".$q_id." where fact_id=".intval($tag).";
        ";
        
        $res = $this->_conn->query($query);
        $res = $this->_conn->query($query2);
        return $query2 . $res;
    }
    
    public function addBEQuestion($q_content, $q_tag, $q_kind) {
        if($q_tag === '') $q_tag = "NULL";
        else $q_tag = "'" . $q_tag . "'";
        $query = "
        INSERT INTO questions
        (q_content, q_time, user_id, q_vote, kind_id, q_tag)
        VALUES
        ('" . $q_content . "', NOW(), 1, 0, " . $q_kind . ", " . $q_tag . ");
        ";
        
        $res = $this->_conn->query($query);
        header('Content-type: application/json');
        return json_encode($query);
    }
    
    public function getProjectorQues() {
        $ques = array();
        $query = "
        SELECT q_id, q_content, q_vote, q_tag, kind_id
        FROM questions
        WHERE kind_id=4 OR kind_id=7
        ORDER BY pop_time ASC;
        ";
        
        $res = $this->_conn->query($query);
        while($row = $res->fetch_assoc()) {
            $ques[] = $row;
        }
        
        return $ques;
    }
    
    public function pushActorQuestion($q_id) {
        $query = "
        UPDATE questions
        SET kind_id=7
        WHERE q_id=" . $q_id . "
        ";
        
        $res = $this->_conn->query($query);
        return $query . " : " . $res;
    }
    
    public function removeQuestion($q_id) {
        $query = "
        UPDATE questions
        SET kind_id=2
        WHERE q_id=" . $q_id . ";
        ";
        
        $res = $this->_conn->query($query);
        return $query . " : " . $res;
    }
    
    public function finishQuestion($q_id) {
        $query = "
        UPDATE questions
        SET kind_id=3
        WHERE q_id=" . $q_id . ";
        ";
        
        $res = $this->_conn->query($query);
        return $query . " : " . $res;
    }
    
    public function getUserQuestions($user_id) {
        $query = "
        SELECT q_id, q_content, q_vote, kind_id
        FROM questions
        WHERE user_id=" . $user_id . ";
        ";
        
        $ques = array();
        $res = $this->_conn->query($query);
        while ($row = $res->fetch_assoc()) {
            $ques[] = $row;
        }
        return $ques;
    }
}
?>