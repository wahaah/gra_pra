<?php
    session_start();
    // print_r($_SESSION);
    // print_r($_POST);

    // php中删除数组中的元素
    //  array_splice($_SESSION,0,1);

     $array_test = array_merge($_POST,$_SESSION);
    //  print_r($array_test);
//     Array
// (
//     [age] => 26
//     [height] => 166
//     [weight] => 29.84
//     [tem] => 22
//     [blood] => 33
//     [heart] => 2
//     [ctime] => 2019-04-11
// )

     

    require_once "../all/config.php";
    require_once "../all/functions.php";

    // session_start();
    // $userId = $_SESSION["user_id"];
    // 查询数据库
    $connect = connect();

    // 调用封装好的函数来完成插入操作
    $addResult = insert($connect,"test",$array_test);
        
   
    $response = ["code"=>0,"msg"=>"操作失败"];
    // // 3判断查询的结果是不有数据
    if($addResult){
        // console.log($addResult);
        $response["code"] =1;
        $response["msg"] ="操作成功";
        $response["data"] = $addResult;
    }
    header("content-type:application/json;charset=utf-8;");
    echo json_encode($response);

        
    
   

    /* 一般在实际开发中，项目会约定好一个返回的结果
    {
        "code":请求的状态 约定如果是特定的数字，代表不同的状态
             比如：1代表成功   0代表失败
        "msg":想要返回给前台的一些信息
        "data":返回给前台的数据
    } */

?>