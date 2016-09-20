<?php

require_once __DIR__ . '/QuestionLoader.php';
$loader = new QuestionLoader();
$ques = $loader->getAllQuestions();
$ques_html = array();

if(!empty($ques)) {;
    foreach ($ques as $q) {
        $id = intval($q['q_id']);
        $content = htmlentities($q['q_content'], ENT_NOQUOTES);
        $vote = intval($q['q_vote']);
        $ques_html[] = array(
            "id" => $id,
            "content" => $content,
            "vote" => $vote
        );
    };
    $response = json_encode($ques_html);
}

header('Content-type: application/json');
echo $response;
?>