<?php

require_once "../all/config.php";
require_once "../all/functions.php";

session_start();
$userId = $_SESSION["user_id"];
// 查询数据库
$connect = connect();

// 调用封装好的函数来完成插入操作
// $addResult = insert($connect,"chanjian",$fileName);
    
$sql = "SELECT * FROM chanjian WHERE user_id = {$userId}";

// 
$arr = query($connect,$sql);
// print_r($arr);
$response = ["code"=>0,"msg"=>"操作失败"];
// // 3判断查询的结果是不有数据
if($arr){
    $response["code"] =1;
    $response["msg"] ="操作成功";
    $response["data"] = $arr;
    // $response["avator"] = $arr[0]['avator'];
    // $response["tel"] = $arr[0]['tel'];
    // $response["address"] = $arr[0]['address'];
    // $response["uname"] = $arr[0]['uname'];
}
header("content-type:application/json;charset=utf-8;");
echo json_encode($response);
?>