<?php
    include './com/common.php';
    $event_id = $_GET['event_id'];
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