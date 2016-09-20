<?php
//session_start();
require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();

//$user_id = $_SESSION['usr_id'];


$res = $loader->toggleVotes(1, intval($_POST['q_id']));
header('Content-type: application/json');
echo json_encode($res);
?>