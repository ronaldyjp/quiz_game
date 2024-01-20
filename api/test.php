<?php
    include './com/common.php';

    // POSTデータを受け取る
    $data = json_decode(file_get_contents("php://input"), true);
    //nameとpasswordをdbからとる。この場合ANDでかつとなる
    $sql =<<<EOF

    SELECT name, email,birthday,surname, givenname FROM user WHERE name = :name AND password = :password

EOF;

    //$stmt = $dbh -> prepare($sql);
    $stmt = $dbh -> prepare($sql);
    $stmt -> execute( [
        ':name'=>$data['name'],
        ':password'=>$data['password']
    ]); 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOCは、結果セットに 返された際のカラム名で添字を付けた配列を返します。
    if($row > 0){ //データベースに同じものがある場合
        $response = [
        'result'=>
            ['message' => 'ログイン認証完了', 
            'confirm' => 'pass'
            ]
        ,
        'data'=> $row
        ];
        echo json_encode($response);
        //echo json_encode($arr, JSON_PRETTY_PRINT);
        return;  
    }
    echo json_encode(['result'=>['message' => 'ユーザー名またはパスワードが違います', 'confirm' => 'fail']]);

?>