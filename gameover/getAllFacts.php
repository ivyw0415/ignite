<?php
require_once __DIR__."/FactController.php";

$controller = new FactController();
$res = $controller->getAllFacts();
$facts = array();
foreach($res as $f) {
    $facts[] = array(
        "id" => $f['fact_id'],
        "content" => $f['fact_content'],
        "status" => $f['fact_status'],
        "q_id" => $f['q_id'],
        "q_content"=>$f['q_content'],
        "user_name"=>$f['user_name']
    );
}

header('Content-type: application/json');
echo json_encode($facts);
?>