<?php
    include './com/common.php';
    $event_id = $_GET['event_id'];
    $sql =<<<EOF

    select u.id as user_id, u.a_name as user_name, t.team_id, t.team_name, t.team_school, sum(q.point) as point
    from q0022_question_show_record s
    inner join q0021_question q
        on q.id = s.q0021_id    
    inner join q0004_user_answer a
        on a.q0021_id = q.id
    inner join jstudy_t0010_apply u
        on a.q0001_id = u.id
    left join
      (select a.id as team_id , a.a_email as email, t.name as team_name, t.school as team_school, t.q0012_id as event_id
         from jstudy_t0010_apply a
         inner join q0002_team t
         on t.leader_email = a.a_email
         where a.id = a.ref_apply_id
     ) t
     on t.team_id = a.ref_apply_id
     where t.event_id = 1
    group by t.team_id
     
EOF;    

    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '活動結果'
            ]
        ,
        'data'=> [
            [
                "rank" => 1,
                'team_name' => 'team1_2',
                'team_school' => 'school1',
                "point"=> 400,
            ],
            [
                "rank" => 2,
                'team_name' => 'team1_1',
                'team_school' => 'school1',
                "point"=> 350,
            ],
            [
                "rank" => 3,
                'team_name' => 'team2_1',
                'team_school' => 'school2',
                "point"=> 300,
            ]

        ]
        ];
    echo json_encode($response);

?>