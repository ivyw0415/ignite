<?php

require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();
$ques = $loader->getProjectorQues();
$response = array();
if(!empty($ques)) {;
    foreach ($ques as $q) {
        $id = intval($q['q_id']);
        $content = htmlentities($q['q_content'], ENT_NOQUOTES);
        $vote = intval($q['q_vote']);
        $tag = htmlentities($q['q_tag'], ENT_NOQUOTES);
        $kind = intval($q['kind_id']);
        $response[] = array(
            "id" => $id,
            "content" => $content,
            "vote" => $vote,
            "tag" => $tag,
            "kind" => $kind
        );
    };
}

header('Content-type: application/json');
echo json_encode($response);
?>