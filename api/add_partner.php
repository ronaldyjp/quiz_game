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

    $other_email = $_GET['other_email'];
    $team_id = $_GET['team_id'];
    addOtherEmail($dbh, $team_id,$other_email);
    $response = [
        'result'=>
            [
                'status' => 'success',
                'message' => '成功'
            ]
        ];
    echo json_encode($response);

// function
function addOtherEmail($dbh, $team_id,$other_email ){
    $sql =<<<EOF
    UPDATE q0002_team set other_email = :other_email where id = :team_id
EOF;
        $stmt = $dbh->prepare($sql);
        $stmt->execute([':other_email' => $other_email,':team_id'=> $team_id]); 

}

?>
