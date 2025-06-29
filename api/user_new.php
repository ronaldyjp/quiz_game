<?php
    include './com/common.php';
    function findUser($dbh,$email,$event_id){
        $sql =<<<EOF
        select * from q0001_user where email = :email
    EOF;
    
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':email' => $email]); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$row){ 
            createUser($dbh,$email,$event_id);
        }
        $stmt->execute([':email' => $email]); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    function createUser($dbh,$email,$event_id){

        // insert team  
        $sql =<<<EOF
INSERT INTO q0002_team( q0012_id,leader_id,name,school,other_email)
SELECT :event_id as event_id ,a.id as team_id, CONCAT(a.a_school, '-' ,a.a_name) as team_name,a.a_school as team_school,b_email
FROM jstudy_t0010_apply a INNER JOIN
(SELECT max(id) as id
FROM jstudy_t0010_apply where a_email = :email) map
ON a.id = map.id
EOF;
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':event_id' => $event_id,':email' => $email]); 

        // insert user 
        $sql =<<<EOF
INSERT INTO q0001_user ( q0002_id,name,email,phone)
SELECT a.id as team_id, a.a_name,a.a_email, a.a_tel
FROM jstudy_t0010_apply a INNER JOIN
(SELECT max(id) as id
FROM jstudy_t0010_apply where a_email = :email) map
ON a.id = map.id
EOF;
    
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':email' => $email]); 
    }



    $email = $_GET['email'];

    $event_id = '';
    if(isset($_GET['event_id'])){
        $event_id = $_GET['event_id'];
    }
    $row = findUser($dbh,$email,$event_id);

    
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
    $sql =<<<EOF

    SELECT g.id, r.name , r.start_time, r.end_time FROM q0011_game g INNER JOIN q0013_event_game_rel r ON g.id = r.q0011_id WHERE r.q0012_id = :id 

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