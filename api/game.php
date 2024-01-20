<?php
    include './com/common.php';

    $game_id = $_GET['game_id'];
    $event_id = $_GET['event_id'];
    if(!$game_id){
        echo json_encode(['result'=>['status' => 'fail', 'message' => '遊戲ID不正確']]);
        return;  
    }
    $sql =<<<EOF

    SELECT g.*, r.start_time, r.end_time FROM q0011_game g INNER JOIN q0013_event_game_rel r ON g.id = r.q0011_id WHERE r.q0012_id = :event_id AND g.id = :game_id

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":event_id" =>$event_id,":game_id" => $game_id ]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    if(!$row){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '遊戲ID不正確']]);
        return;  
    }
    $sql =<<<EOF

    SELECT q.id , q.question, 
        IFNULL(q.image,'') AS image,
        IFNULL(q.choices1,'') AS choices1 , 
        IFNULL(q.choices2,'') AS choices2 ,
        IFNULL(q.choices3,'') AS choices3 ,
        IFNULL(q.choices4,'') AS choices4 , 
        q.answer, 
    CASE 
	WHEN q.image IS NULL  
	    THEN ''
	    ELSE CONCAT('/images/', q.q0011_id, '/', q.image)
    END AS image_ur
    FROM q0021_question q  WHERE q.q0011_id = :id 

EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":id" => $row['id']]); 
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。

    $row['questions'] = $questions;


    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '遊戲資訊'
            ]
        ,
        'data'=> $row
        ];
    echo json_encode($response);

?>