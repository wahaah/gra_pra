<?php
    require_once '../all/config.php';
    require_once '../all/functions.php';
    /* 后端
	得到用户名和密码
	去数据库中查找
    通知前台是否登陆成功 */
    // 1.获取邮箱和密码
    // print_r($_POST);

    $uname = $_POST["uname"];
    $upass = $_POST["upass"];
    // 2.根据用户名和密码到数据库中查找有无对应的数据
    // 2.1连接数据库
    $connect = connect();
    // 2.2准备sql语句
    $sql = "SELECT * FROM `user` WHERE uname = '{$uname}' and upass = '{$upass}'";
    // 2.3执行语句
    $arr = query($connect,$sql);
    // print_r($arr);
    
    $response = ["code"=>0,"msg"=>"操作失败"];
    // // 3判断查询的结果是不有数据
    if($arr){
        // print_r($arr);
    //     // 如果登录成功，记录登陆状态记录一下
    //     // session
        session_start();
        $_SESSION['islogin'] = 1;

        // 存储用户id以便后面使用
        $_SESSION['user_id'] = $arr[0]['uid'];

        $response["code"] =1;
        $response["msg"] ="登录成功";
    //     $response["data"] = $arr;
    }
    // // 4以json格式返回数据
    header("content-type:application/json;charset=utf-8");
	echo json_encode($response);
?>