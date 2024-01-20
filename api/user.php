<?php
    include './com/common.php';
    $email = $_GET['email'];

    $sql =<<<EOF

SELECT 
    e.id AS event_id, e.name as event_name,
    t.id as team_id , t.name as team_name, t.school as team_school ,
    u.id as user_id , u.name as user_name 
FROM q0012_event e 
INNER JOIN q0002_team t 
     ON e.id = t.q0012_id
INNER JOIN q0001_user u 
   ON u.id = t.q0012_id
WHERE  
    DATE_FORMAT(event_date, '%Y%m%d') = DATE_FORMAT(NOW(), '%Y%m%d')  AND 
    u.email = :email

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':email' => $email]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    if(!$row){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有用戶資料']]);
        return;  
    }
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