<?php

require_once __DIR__ . '/StatusController.php';
$loader = new StatusController();

$id = intval($_POST['status_id']);

$res = $loader->getStatus($id);
header('Content-type: application/json');
echo json_encode(array(
    "status" => $res['status_n']
    ));
?>