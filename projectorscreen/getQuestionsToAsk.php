<?php

$host = "localhost";
$user = "ignite";
$pass = "g4c2016etc";
$db = "ignite";

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$query = "
SELECT q_id, q_content, q_vote, kind_id, user_name FROM questions, users 
WHERE (kind_id=4 OR kind_id=7) and questions.user_id = users.user_id 
ORDER BY pop_time ASC;
";

$questions = array();

if($res = $conn->query($query)) {
    while($row = $res->fetch_assoc()) {
        $questions[] = array(
            "content" => $row['q_content'],
            "id" => $row['q_id'],
            "vote" => $row['q_vote'],
            "kind" => $row['kind_id'],
            "user_name" => $row['user_name']
        );
    }
    header("Content-type: application/json");
    echo json_encode($questions);
}
else {
    header("Content-type: application/json");
    echo json_encode("ERROR: " . $query . " RESULT: " . $res); 
}

?>