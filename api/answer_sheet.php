<?php
    include './com/common.php';

    $game_id = $_GET['game_id'];
    $sql =<<<EOF

    SELECT q.id 
    FROM q0021_question q  WHERE q.q0011_id = :id ORDER BY q.view_order ASC

EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":id" => $game_id]); 
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。


    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '遊戲資訊'
            ]
        ,
        'data'=> $questions
        ];
    echo json_encode($response);

?>