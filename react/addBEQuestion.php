<?php

require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();

$content = $_POST['q_content'];
$tag = $_POST['q_tag'];
$kind = $_POST['q_kind'];

$res = $loader->addBEQuestion($content, $tag, $kind);
header('Content-type: application/json');
echo json_encode($res);
?>