<?php
    include './com/common.php';

    // POSTデータを受け取る
    $data = json_decode(file_get_contents("php://input"), true);
    //nameとpasswordをdbからとる。この場合ANDでかつとなる
    $sql =<<<EOF

    SELECT * FROM q0012_event WHERE DATE_FORMAT(event_date, '%Y%m%d') = DATE_FORMAT(NOW(), '%Y%m%d') 

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    $stmt->execute(); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    if(!$row){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '今天沒有活動']]);
        return;  
    }  
    $sql =<<<EOF

    SELECT g.*, r.start_time, r.end_time FROM q0011_game g INNER JOIN q0013_event_game_rel r ON g.id = r.q0011_id WHERE r.q0012_id = :id 

EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":id" => $row['id']]); 
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。

    $row['games'] = $games;


    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '今天的活動'
            ]
        ,
        'data'=> $row
        ];
    echo json_encode($response);

?>