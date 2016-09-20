<?php
require_once __DIR__."/TimerController.php";

$controller = new TimerController();
$res = $controller->delTime();
header('Content-type: application/json');
echo json_encode($res);
?>