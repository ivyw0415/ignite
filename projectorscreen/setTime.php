<?php
require_once __DIR__."/TimerController.php";

$controller = new TimerController();
$time = $_POST['time'];
$res = $controller->setTime($time);
header('Content-type: application/json');
echo json_encode($res);
?>