<?php
    include './com/common.php';
    $event_id = $_GET['event_id'];
    $sql =<<<EOF

    SELECT ROW_NUMBER() OVER (ORDER BY SUM(res.point) DESC, SUM(res.reply_min) ASC) AS rank ,res.team_id, SUM(res.point) AS point, SUM(res.reply_min) AS total_min, t.name, t.school FROM 
 (
    SELECT t.team_id, r.id AS rec_id, MIN(a.created_at) AS ans_time,
    CASE
     WHEN TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) <= 10 THEN 2
     ELSE 1
    END AS POINT,
    TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) AS reply_min
    FROM q0004_user_answer a
    inner join q0021_question q
        on q.id = a.q0021_id AND q.answer = a.answer
    inner join jstudy_t0010_apply u
        ON  u.id = a.q0001_id
    inner join q0022_question_show_record r
        ON r.q0021_id = a.q0021_id AND TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) >= 0 AND TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) < 30
    inner join
      (select a.id as ref_id , t.id AS team_id, a.a_email as email, t.name as team_name, t.school as team_school, t.q0012_id as event_id
         from jstudy_t0010_apply a
         inner join q0002_team t
         on t.leader_email = a.a_email
         where a.id = a.ref_apply_id
     ) t
     on t.ref_id = u.ref_apply_id
     where a.q0012_id = :event_id and u.ref_apply_id >0 
     GROUP BY t.team_id,r.id
) as res
     INNER JOIN q0002_team t 
     ON t.id = res.team_id
     GROUP BY res.team_id 
     
EOF; 
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":event_id" => $event_id]); 
    $team = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    $sql =<<<EOF

    SELECT ROW_NUMBER() OVER (ORDER BY SUM(res.point) DESC, SUM(res.reply_min) ASC) AS rank , SUM(res.point) AS point, SUM(res.reply_min) AS total_min, u.a_name AS name FROM 
    (
        SELECT u.id as user_id, r.id AS rec_id, MIN(a.created_at) AS ans_time,
        CASE
         WHEN TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) <= 10 THEN 2
         ELSE 1
        END AS POINT,
        TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) AS reply_min
        FROM q0004_user_answer a
        inner join q0021_question q
            on q.id = a.q0021_id AND q.answer = a.answer
        inner join jstudy_t0010_apply u
            ON  u.id = a.q0001_id
        inner join q0022_question_show_record r
            ON r.q0021_id = a.q0021_id AND TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) >= 0 AND TIMESTAMPDIFF(SECOND, r.created_at, a.created_at) < 30
         where a.q0012_id = :event_id and u.ref_apply_id is null
         GROUP BY u.id,r.id
    ) as res
         INNER JOIN jstudy_t0010_apply u
         ON u.id = res.user_id
         GROUP BY res.user_id ,u.a_name
         LIMIT 5
     
EOF; 
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":event_id" => $event_id]); 
    $person = $stmt->fetchAll(PDO::FETCH_ASSOC);



    $response = [
    'result'=>
        [
            'status' => 'success',
            'message' => '活動結果'
        ]
    ,
    'data'=> ['team'=>$team,'person'=>$person]
    ];
    echo json_encode($response);


?>