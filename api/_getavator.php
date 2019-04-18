<?php
     require_once "../all/config.php";
     require_once "../all/functions.php";
     // $categoryId = $_POST["categoryId"];
    
    //  需要用户id
    session_start();
    $userId = $_SESSION["user_id"];
    // echo $userId;

    // 根据id查头像
    $connect = connect();

    // 
$sql = "SELECT * FROM `user` WHERE uid = {$userId}";
    // 
    $arr = query($connect,$sql);
    $response = ["code"=>0,"msg"=>"操作失败"];
    // // 3判断查询的结果是不有数据
    if($arr){
        $response["code"] =1;
        $response["msg"] ="登录成功";
        $response["avator"] = $arr[0]['avator'];
        $response["tel"] = $arr[0]['tel'];
        $response["address"] = $arr[0]['address'];
        $response["uname"] = $arr[0]['uname'];
    }
    // // 4以json格式返回数据
    header("content-type:application/json;charset=utf-8");
	echo json_encode($response);
?>