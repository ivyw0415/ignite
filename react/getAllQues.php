<?php

require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();
$ques = $loader->getAllQuestions($_POST['order']);
$ques_html = array();

$response = null;
if(!empty($ques)) {;
    foreach ($ques as $q) {
        $id = intval($q['q_id']);
        $content = htmlentities($q['q_content'], ENT_NOQUOTES);
        $vote = intval($q['q_vote']);
        $tag = htmlentities($q['q_tag'], ENT_NOQUOTES);
        $ques_html[] = array(
            "id" => $id,
            "content" => $content,
            "vote" => $vote,
            "tag" => $tag
        );
    };
    $response = $ques_html;
}

header('Content-type: application/json');
echo json_encode($response);
?>