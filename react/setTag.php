<?php

require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();

$tag = $_POST['tag'];
$q_id = intval($_POST[q_id]);

$res = $loader->setTag($tag, $q_id);
header('Content-type: application/json');
echo json_encode($res);
?>