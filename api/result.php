<?php
    //include './com/common.php';
    header("Access-Control-Allow-Origin: *"); //CORSのエラー対策
    header('Content-Type: application/json; charset=UTF-8');
    $default = [
        "dsn" =>"mysql:host=mysql712.db.sakura.ne.jp;dbname=familyline_asjas;charset=utf8",
        "user" => 'familyline',
        "password" => 'sole2628'
    ];
    $default_x = [
        "dsn" => "mysql:host=127.0.0.1;dbname=quiz_game;charset=utf8",
        "user" => 'root',
        "password" => ''
    ];

    $dbh = new PDO($default['dsn'], $default['user'], $default['password']);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// main
    /*
    $testStr = test();
    echo $testStr;
    return;
    */

    $email = $_GET['email'];

    $eventuser = findEventUser($dbh,$email);
    if(!$eventuser){
        echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有活動資料'], 'data'=>[]]);
        return;
    }

    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '參加活動和用戶資訊'
            ]
        ,
        'data'=> $eventuser
        ];
    echo json_encode($response);

// function

function findEventUser($dbh,$email){
    $sql =<<<EOF
SELECT e.name as event_name, e.result, e.id as event_id, g.name as game_name, g.game_date as game_date,e.city, u.name as name, u.email as email, t.school
 FROM q0001_user u 
  INNER JOIN q0002_team t
  ON t.leader_id = u.id or t.other_email = u.email
  INNER JOIN
 (SELECT q0001_id, q0012_id , q.q0011_id q0011_id FROM q0004_user_answer ua  
  INNER JOIN q0021_question q ON ua.q0021_id = q.id 
  group by q0001_id, q0012_id, q.q0011_id) ue
  ON ue.q0001_id = u.id
  INNER JOIN
 q0012_event e
  ON e.id = ue.q0012_id
  INNER JOIN
 q0013_event_game_rel g
  ON g.q0011_id = ue.q0011_id and g.q0012_id = e.id	
  WHERE u.email = ? 
 group by u.name, u.email, t.school
EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$email]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}


?>
