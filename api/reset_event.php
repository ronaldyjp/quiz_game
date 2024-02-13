<?php
    include './com/common.php';
    $event_id = $_GET['event_id'];;
    try {
        $delQueRec =<<<EOF
        DELETE rec
        FROM q0022_question_show_record rec
        INNER JOIN q0021_question q
        ON q.id = rec.q0021_id
        INNER JOIN q0013_event_game_rel rel
        ON rel.q0012_id = rel.q0012_id AND rel.q0011_id = q.q0011_id
         WHERE rec.q0012_id = ?
EOF;
        $stmt = $dbh->prepare($delQueRec);
        $stmt->execute([$event_id]);

        $delAns =<<<EOF
        DELETE rec
        FROM q0004_user_answer rec
        INNER JOIN q0021_question q
        ON q.id = rec.q0021_id
        INNER JOIN q0013_event_game_rel rel
        ON rel.q0012_id = rel.q0012_id AND rel.q0011_id = q.q0011_id
         WHERE rec.q0012_id = ?
EOF;
        $stmt = $dbh->prepare($delAns);
        $stmt->execute([$event_id]);
        echo json_encode(['result'=>['status' => 'success', 'message' => '成功']]);
    } catch (\Throwable $th) {
        echo json_encode(['result'=>['status' => 'fail', 'message' => '失敗']]);
    }

?>