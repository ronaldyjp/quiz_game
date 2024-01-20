<?php
    include './com/common.php';
    $data = json_decode(file_get_contents("php://input"), true);
    $sql =<<<EOF

    INSERT q0022_question_show_record (q0012_id, q0021_id, created_at) VALUES (?, ?, NOW());

EOF;
    $stmt = $dbh->prepare($sql);
    $result = $stmt->execute([$_GET['event_id'], $_GET['question_id']]); 
    if($result == 0){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '失敗']]);
    }else{
        echo json_encode(['result'=>['status' => 'success', 'message' => '成功']]);
    }

?>