<?php
require_once __DIR__."/FactController.php";

$controller = new FactController();
$res = $controller->getLockedCount();
$count = array("count" => $res['cc']);

header('Content-type: application/json');
echo json_encode($count);
?>