<?php
    include './com/common.php';
    $email = $_GET['email'];

    $sql =<<<EOF

    SELECT 
    e.id AS event_id, e.name as event_name,
    NVL(t.team_id,0) as team_id , NVL(t.team_name,'') as team_name, NVL(t.team_school,'') as team_school,
    a.id as user_id , a.a_name as user_name 
    from jstudy_t0010_apply a 
        inner join q0012_event e 
        on DATE_FORMAT(event_date, '%Y%m%d') = DATE_FORMAT(NOW(), '%Y%m%d') 
    left join
     (select a.id as team_id , a.a_email as email, t.name as team_name, a.a_school as team_school, e.id as event_id
        from jstudy_t0010_apply a
        inner join q0002_team t
        on t.leader_email = a.a_email
        inner join q0012_event e
        on e.id = t.q0012_id
        where a.id = a.ref_apply_id
    ) t
    on e.id = t.event_id AND t.team_id = a.ref_apply_id
    where a.a_email = :email

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':email' => $email]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    if(!$row){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有用戶資料']]);
        return;  
    }
    $sql =<<<EOF

    SELECT g.*, r.start_time, r.end_time FROM q0011_game g INNER JOIN q0013_event_game_rel r ON g.id = r.q0011_id WHERE r.q0012_id = :id 

EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":id" => $row['event_id']]); 
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。

    $row['games'] = $games;

    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '活動和用戶資訊'
            ]
        ,
        'data'=> $row
        ];
    echo json_encode($response);

?>