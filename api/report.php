<?php
    include './com/common.php';
    $event_id = $_GET['event_id'];
    $sql =<<<EOF

    select 
    FROM q0012_event e
    inner join q0013_event_game_rel r
     on e.id = r.q0012_id
    inner join q0022_question_show_record s
     on s.q0012_id = e.id 
    inner join q0011_game g
     on s.q0021_id = g.id
    inner join q0021_question q
     on q.q0011_id = g.id
    
    
    select from q0004_user_answer a
    inner join jstudy_t0010_apply u
     on u.id = a.q0001_id
    
     on a.q0012_id = e.id and a.q0021_id = q.id and a.answer = q.answer
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