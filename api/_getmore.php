<?php
    /* 
        要知道当前是第几次获取，一共要获取多少条数据
            */
    require_once "../all/config.php";
    require_once "../all/functions.php";
    // $categoryId = $_POST["categoryId"];
    $currentPage = $_POST["currentPage"];
    $pageSize = $_POST["pageSize"];
    // 计算从哪里开始获取数据
    $offset = ($currentPage-1)* $pageSize;
    // 查询数据库
    $connect = connect();
    $sql = "SELECT * FROM eating LIMIT {$offset},{$pageSize}";
    $arr = query($connect,$sql);

    /* 一般在实际开发中，项目会约定好一个返回的结果
    {
        "code":请求的状态 约定如果是特定的数字，代表不同的状态
             比如：1代表成功   0代表失败
        "msg":想要返回给前台的一些信息
        "data":返回给前台的数据
    } */

    $response = ["code"=>0,"msg"=>"操作失败"];
    // 返回数据
    if($arr){
        $response["code"] = 1;
        $response["msg"] = "操作成功";
        $response["data"] = $arr;
    }
    header("content-type:application/json;charset=utf-8;");
    echo json_encode($response);
?>