<?php
    include './com/common.php';
    $email = $_GET['email'];
    $phone = $_GET['phone'];
//     $sql =<<<EOF
//     SELECT *
//     from q0001_user u 
//     where u.email = :email and u.phone = :phone
// EOF;
// $stmt = $dbh->prepare($sql);
// $stmt->execute([":email" => $email,":phone" => $phone ]); 


// $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
// if(!$row){ //データベースに同じものがある場合
//     echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有用戶資料']]);
//     return;  
// }
// //echo json_encode(['result'=>['status' => 'success', 'message' => 'ok']]);

    $sql =<<<EOF
    SELECT
    u.id AS user_id, u.name AS user_name, t.id AS team_id, t.name AS team_name, t.school AS school_name
from q0001_user u
inner join q0002_team t
    on t.id = u.q0002_id
where u.email = :email and u.phone = :phone

EOF;
$stmt = $dbh->prepare($sql);
$stmt->execute([":email" => $email,":phone" => $phone ]); 
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
$_SESSION["user"] = "helo by login";
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