<?php 
	require_once "../all/config.php";
	require_once "../all/functions.php";
	//  连接数据库，查询分类相关数据，返回给前端

	// 
	$connect = connect();
	// 
	$sql ="SELECT * FROM zixunnews";
	// 
	$queryResult = query($connect,$sql);
	// print_r($queryResult);

	$response = ["code"=>0,"msg"=>"操作失败"];
	if($queryResult){
		$response["code"] =1;
		$response["msg"] ="操作成功";
		$response["data"] = $queryResult;
	}
	header("content-type:application/json;charset=utf-8");
	echo json_encode($response);

 ?>