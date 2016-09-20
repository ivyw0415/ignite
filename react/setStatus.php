<?php

require_once __DIR__ . '/StatusController.php';
$loader = new StatusController();

$id = intval($_POST['status_id']);
$value = intval($_POST['value']);

$res = $loader->setStatus($id, $value);
header('Content-type: application/json');
echo json_encode($res);
?>