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
    $eventuser = null;
    $quizUser = null;
    $team = null;
    $partner = null;
    $event = null;

    $event = findCurEvent($dbh);

    if(!$event){
        echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有活動']]);
        return;
    }
    $eventuser = findEventUser($dbh,$email,$event['ref_id']);
    if(!$eventuser){
        echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有報名資料']]);
        return;
    }
    $quizUser = findOrCreatQuizUser($dbh,$eventuser,$event);
    // echo json_encode($quizUser);
    $team = findOrCreateTeam($dbh,$quizUser,$eventuser,$event);
    // echo json_encode($teamRow);
    // return;
    $partner = null;
    // echo $quizUserRow['id'] . '==' . $teamRow['leader_id'];
    if($quizUser['id'] == $team['leader_id'] ){
        // echo "call findQuizUser";
        $partner = findQuizUser($dbh, $team['other_email']);
    }else{
        // echo "call findQuizUserById";
        $partner = findQuizUserById($dbh, $team['leader_id']);
    }
    /*
    return;

    
    $sql =<<<EOF

    SELECT 
    e.id AS event_id, e.name as event_name,
    IFNULL(t.team_id,0) as team_id , IFNULL(t.team_name,'') as team_name, IFNULL(t.team_school,'') as team_school,
    a.id as user_id , a.a_name as user_name 
from jstudy_t0010_apply a 
inner join q0012_event e 
     on e.active = 1
left join
     (select a.id as team_id , t.name as team_name, t.school as team_school, t.q0012_id as event_id
     from jstudy_t0010_apply a
     inner join q0002_team t
     on t.leader_id = a.id
     where a.id = a.ref_apply_id
    ) t
    on e.id = t.event_id AND t.team_id = a.ref_apply_id
where a.a_email = :email

EOF;

    if($event_id){
        $sql =<<<EOF

        SELECT 
        e.id AS event_id, e.name as event_name,
        IFNULL(t.team_id,0) as team_id , IFNULL(t.team_name,'') as team_name, IFNULL(t.team_school,'') as team_school,
        a.id as user_id , a.a_name as user_name 
    from jstudy_t0010_apply a 
    inner join q0012_event e 
         on e.id = $event_id
    left join
         (select a.id as team_id , t.name as team_name, t.school as team_school, t.q0012_id as event_id
         from jstudy_t0010_apply a
         inner join q0002_team t
         on t.leader_id = a.id
         where a.id = a.ref_apply_id
        ) t
        on e.id = t.event_id AND t.team_id = a.ref_apply_id
    where a.a_email = :email
EOF;
    }

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':email' => $email]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    if(!$row){ //データベースに同じものがある場合
        echo json_encode(['result'=>['status' => 'fail', 'message' => '沒有用戶資料']]);
        return;  
    }
    */
    $sql =<<<EOF

    SELECT g.id, r.name , r.start_time, r.end_time FROM q0011_game g INNER JOIN q0013_event_game_rel r ON g.id = r.q0011_id WHERE r.q0012_id = :id 

EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":id" => $event['id']]); 
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。



    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '活動和用戶資訊'
            ]
        ,
        'data'=> ['games' => $games, 'event' => $event, 'user' => $quizUser, 'team' => $team, 'partner' => $partner]
        ];
    echo json_encode($response);

// function
function test(){
    return 'test';
}
function findCurEvent($dbh){
    $sql =<<<EOF
        select * from q0012_event where active = 1
EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute(); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function findEventUser($dbh,$email,$ref_id){
    $sql =<<<EOF
    select * from jstudy_t0010_apply where ( a_email = :email or a_tel like :tel )and ref_id = :ref_id
EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':email' => $email,':tel' => '%' . $email , ':ref_id' => $ref_id]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function findOrCreatQuizUser($dbh,$userRow,$eventRow){
    $quizUserRow = findQuizUser($dbh,$userRow['a_email']);
    if(!$quizUserRow){
        // insert user 
        $sql =<<<EOF
        INSERT INTO q0001_user ( name,email,phone)
        VALUES (:name,:email,:tel)
EOF;
            
        $stmt = $dbh->prepare($sql);
        $stmt->execute([ ':name' => $userRow['a_name'],':email' =>$userRow['a_email'],':tel' =>$userRow['a_tel']]); 
    }
    $quizUserRow = findQuizUser($dbh,$userRow['a_email']);

    return $quizUserRow;


}

function findQuizUser($dbh,$email){
    $sql =<<<EOF
    select * from q0001_user where email = :email or phone = :phone
EOF;

    $stmt = $dbh->prepare($sql);
    $stmt->execute([':email' => $email,':phone' => $email]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ;
}
function findQuizUserById($dbh,$id){
    $sql =<<<EOF
    select * from q0001_user where id = :id
EOF;

    $stmt = $dbh->prepare($sql);
    $stmt->execute([':id' => $id]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ;
}

function findOrCreateTeam($dbh,$quizUserRow,$eventUserRow,$eventRow){
    $teamRow = findTeam($dbh,$quizUserRow,$eventRow);
    if(!$teamRow){
          // insert team  
    $sql =<<<EOF
    INSERT INTO q0002_team( q0012_id,leader_id,name,school,other_email)
    VALUES(:event_id,:leader_id,:name,:school,:email)
EOF;
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':event_id' => $eventRow['id'],':leader_id'=> $quizUserRow['id'], ':name'=> $eventUserRow['a_school'] . '-' . $eventUserRow['a_name'] , ':school'=> $eventUserRow['a_school'],':email' => $eventUserRow['b_email']]); 
    }
    $teamRow = findTeam($dbh,$quizUserRow,$eventRow);
    return $teamRow;
}
function findTeam($dbh,$userRow,$eventRow){
    $sql =<<<EOF
    select * from q0002_team where (leader_id = :leader_id or other_email = :email )  and q0012_id = :event_id
EOF;
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':leader_id' => $userRow['id'], ':email' => $userRow['email'],':event_id' => $eventRow['id']]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ;
}


?>
