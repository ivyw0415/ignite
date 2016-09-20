<?php
require_once __DIR__."/FactController.php";

$controller = new FactController();
$res = $controller->countFacts();
$count=0;
foreach($res as $f) {
    $count = "counts"=>$f['counts'];
}

header('Content-type: application/json');
echo json_encode($count);
?>