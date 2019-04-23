<?php
     require_once "../all/config.php";
     require_once "../all/functions.php";
     // $categoryId = $_POST["categoryId"];
    
    //  需要用户id
    // session_start();
    // $userId = $_SESSION["user_id"];
    // echo $userId;

    // print_r($_POST);
    $id = $_POST['id'];

    // 根据id查头像
    $connect = connect();

    // 
    $sql = "SELECT * from news_detail WHERE id = '{$id}'";
    // 
    $arr = query($connect,$sql);
    $response = ["code"=>0,"msg"=>"操作失败"];
    // // 3判断查询的结果是不有数据
    if($arr){
        $response["code"] =1;
        $response["msg"] ="操作成功";
        $response["data"] = $arr;
    }
    // // 4以json格式返回数据
    header("content-type:application/json;charset=utf-8");
	echo json_encode($response);
?>