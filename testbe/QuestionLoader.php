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
    
    public function getAllQuestions() {
        $ques = array();
        $query = "
        SELECT q_id, q_content, q_vote
        FROM questions
        WHERE kind_id=1 or kind_id=4 or kind_id=7
        ORDER BY q_time;
        ";
        
        $res = $this->_conn->query($query);
        while($row = $res->fetch_assoc()) {
            $ques[] = $row;
        }
        
        return $ques;
    }
}
?>