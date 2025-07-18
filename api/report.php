<?php
    include './com/common.php';
        $sql =<<<EOF

        SELECT res.team_id, SUM(res.point) AS point, SUM(res.reply_min)/60 AS total_min, u.a_name AS name,  t.name as team_name, t.school FROM 
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
          (select t.leader_id , t.id AS team_id, a.a_email as email, t.name as team_name, t.school as team_school, t.q0012_id as event_id
             from jstudy_t0010_apply a
             inner join q0002_team t
             on t.leader_id = a.id
             where a.id = a.ref_apply_id
         ) t
         on t.leader_id = u.ref_apply_id
         inner join q0012_event e
         ON e.active = 1 and a.q0012_id = e.id 
         where u.ref_apply_id >0 
         GROUP BY t.team_id,r.id
    ) as res
         INNER JOIN q0002_team t 
         ON t.id = res.team_id
         INNER JOIN jstudy_t0010_apply u
         ON t.leader_id = u.id
         GROUP BY res.team_id 
         ORDER BY SUM(res.point) DESC, SUM(res.reply_min) ASC
EOF;
        $stmt = $dbh->prepare($sql);
        $stmt->execute(); 
        $team = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $sql =<<<EOF
        SELECT a.q0001_id,u.email,count(a.id) as cnt
  FROM q0004_user_answer a
	inner join q0012_event e
   		ON e.id = a.q0012_id  
 	inner join q0021_question q
                on q.id = a.q0021_id AND q.answer = a.answer 
	inner join q0001_user u
		ON u.id = a.q0001_id
        where a.q0012_id = 7
	GROUP BY a.q0001_id
EOF;
        

        $sql =<<<EOF
    
        SELECT SUM(res.point) AS point, SUM(res.reply_min)/60 AS total_min, u.a_name AS name FROM 
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
            inner join q0012_event e
                ON e.active = 1 and a.q0012_id = e.id 
             where u.ref_apply_id is null
             GROUP BY u.id,r.id
        ) as res
             INNER JOIN jstudy_t0010_apply u
             ON u.id = res.user_id
             GROUP BY res.user_id ,u.a_name
             ORDER BY SUM(res.point) DESC, SUM(res.reply_min) ASC
             LIMIT 5
         
EOF;
        $stmt = $dbh->prepare($sql);
        $stmt->execute(); 
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
