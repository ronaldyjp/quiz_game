<?php
    include './com/common.php';
    $data = json_decode(file_get_contents("php://input"), true);
    $sql =<<<EOF

   INSERT q0004_user_answer (q0001_id, q0012_id, q0021_id,answer,created_at) VALUES (?, ?, ?, ?, NOW());

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    try {
        $result = $stmt->execute([$_GET['user_id'], $_GET['event_id'], $_GET['question_id'],$_GET['answer']]); 
        echo json_encode(['result'=>['status' => 'success', 'message' => '回答成功']]);
    } catch (\Throwable $th) {
        echo json_encode(['result'=>['status' => 'fail', 'message' => '回答失敗']]);
    }

?>