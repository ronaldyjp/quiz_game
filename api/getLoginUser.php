<?php
    include './com/common.php';
    $row =  $_SESSION["user"];
    $response = [
    'result'=>
        [
            'status' => 'success',
            'message' => ''
        ]
    ,
    'data'=> $row
    ];
echo json_encode($response);



?>