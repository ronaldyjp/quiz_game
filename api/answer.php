<?php
    include './com/common.php';
    $data = json_decode(file_get_contents("php://input"), true);
    $sql =<<<EOF

   INSERT q0004_user_answer (q0001_id, q0012_id, q0021_id,answer,created_at) VALUES (?, ?, ?, ?, NOW());

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    $result = $stmt->execute([$_GET['user_id'], $_GET['event_id'], $_GET['question_id'],$_GET['answer']]); 
    //executeで$_GETを使って、取得して、$sqlの「?」に代入する（左から）
    if($result == 0){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '回答失敗']]);
    }else{
        echo json_encode(['result'=>['status' => 'success', 'message' => '回答成功']]);
    }

?>