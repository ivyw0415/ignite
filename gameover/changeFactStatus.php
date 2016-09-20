<?php
require_once __DIR__."/FactController.php";

$controller = new FactController();

$fact_id = intval($_POST['fact_id']);
$status = intval($_POST['status']);
$res = $controller->changeFactStatus($fact_id, $status);

header('Content-type: application/json');
echo json_encode($res);
?>