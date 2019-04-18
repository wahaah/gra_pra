<?php
    session_start();
    // print_r($_SESSION);
    // print_r($_POST);
    // print_r($_FILES);
    
    // ----------------------------------------------------------------
/*     php中合并数组方法一
    $x = $_SESSION;
    $y = $_POST;
    $z = $_FILES;
    $all=$x+$y+$z;
    print_r($all); */

    // 把上传回来的文件保存到服务器
    // 获取上传回来的文件
    $file = $_FILES['file'];
    // 把文件保存到指定目录
    // 获取后缀名
    // strchr（"字符串"，符号）
    $ext = strrchr($file['name'],".");
    // echo $ext;
    $fileName = time().rand(10000,99999).$ext;
    // $fileName = time().rand(1000,9999).$ext;
	// echo $fileName;
    // 把文件保存到指定目录
	move_uploaded_file($file['tmp_name'],"../img/". $fileName );


     // php中合并数组方法2  array_merge()
     $all = array_merge($_SESSION,$_POST,$_FILES['file']);
    //  print_r($all);
    array_splice($all,3,5);
    
    //  print_r($all);
    //  print_r($file['name']);
     $a = "img/";
    //  $a.= $file['name'];
     $a.= $fileName;


     $arr_img = ["name"=>$a];
    //  print_r($arr_img);

     $all = array_merge($all,$arr_img);
    //  print_r($all);
     /* Array
    (
        [islogin] => 1
        [user_id] => 1
        [ctime] => 2019-04-09 05:52:12
        [name] => img/微信图片_20190409110026.jpg
    ) */


    // ---------------------------------------------------------------------
    /* $all = array_merge($_SESSION,$_POST);
    print_r($all); */


    

    require_once "../all/config.php";
    require_once "../all/functions.php";

    // session_start();
    // $userId = $_SESSION["user_id"];
    // 查询数据库
    $connect = connect();

    // 调用封装好的函数来完成插入操作
    $addResult = insert($connect,"chanjian",$all);
        
   
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