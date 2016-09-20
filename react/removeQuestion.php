<?php

require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();
$q_id = intval($_POST['q_id']);
$res = $loader->deleteQuestion($q_id);

header('Content-type: application/json');
echo json_encode($res);
?>