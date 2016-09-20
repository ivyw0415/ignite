<?php
require_once __DIR__."/TimerController.php";

$controller = new TimerController();
$res = $controller->getTime();
header('Content-type: application/json');
echo json_encode(array("time"=>$res[0]));
?>