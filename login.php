<?php
	/* 登录功能
	1.用户输入用户名和密码，点击登录
	2.收集用户的数据，发送到服务器
	3.把用户数据和数据库数据进行对比
	4.把登陆结果通知前台

	前端：
	登录按钮注册点击事件
	收集用户数据，ajax发送到服务器
	登录成功，跳转
	失败，提示
	后端
	得到用户名和密码
	去数据库中查找
	通知前台是否登陆成功

	 */
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- 为了设置视口 -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/mui/css/mui.min.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css">
	<script src="assets/mui/js/mui.min.js"></script>
	<script src="assets/zepto/zepto.min.js"></script>
	<script src="js/public.js"></script>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
            <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>
		<h1 class="mui-title">用户登录</h1>
		<!-- mui-pull-right右浮动 -->
		<!-- <a class="mui-icon mui-icon-search mui-pull-right"></a> -->
	</header>
	<nav class="mui-bar mui-bar-tab my-footer">
		<!-- <a class="mui-tab-item mui-active" href="index.php">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">首页</span>
			</a>
		<a class="mui-tab-item" href="test.php">
			<span class="mui-icon fa fa-heartbeat"></span>
			<span class="mui-tab-label">体质检测</span>
		</a>
		<a class="mui-tab-item" href="news.php?cateId=1"> -->
			<!-- fa fa-shopping-cart  使用fontawesome图标
            mui-icon加上后图标变为横向 -->
			<!-- <span class="mui-icon fa fa-map-o"></span>
			<span class="mui-tab-label">公告咨询</span>
		</a>
		<a class="mui-tab-item" href="user.php">
			<span class="mui-icon mui-icon-person"></span>
			<span class="mui-tab-label">个人中心</span>
		</a> -->
	</nav>
	<div class="mui-content">
		<!-- 输入表单模块 -->
		<form class="mui-input-group">
                <div class="mui-input-row">
                    <label>用户名</label>
                    <input type="text" id="uname" class="mui-input-clear" name="username" placeholder="请输入用户名">
                </div>
                
                <div class="mui-input-row">
                    <label>密码</label>
                    <input type="password" id="upass" class="mui-input-password" name="password" placeholder="请输入密码">
                </div>
                
                <div class="mui-button-row">
                    <button id="login-btn" type="button" class=" mui-btn mui-btn-primary">登陆</button>
                    <!-- <button typec="button" class="mui-btn mui-btn-danger">取消</button> -->
                </div>
            </form>
            <a href="register.php" class="login-now">免费注册</a>
    
	</div>
	</body>
	<script>
		$(function(){
			 /* 用户登录
        		1获取登录按钮并添加点击事件
        		2获取用户输入的表单信息
        		3调用登录接口实现表单登陆
        		4如果用户登陆成功跳转到会员中心
			*/
			$("#login-btn").on("click",function(){
				// console.log(111);
				
				//收集数据
				var uname = $("#uname").val();
				var upass = $("#upass").val();
				// 简单数据校验
				 // trim()去除字符串两边的空格
				//  console.log(uname);

				 if(!uname){
    			     mui.toast("请输入用户名");
    			     return;
    			 }
    			 if(!upass){
    			     mui.toast("请输入密码");
    			     return;
    			 }
				// 正确则发送到服务端
				$.ajax({
        			url:"api/_login.php",
        			type:"post",
        			data:{
        			    uname:uname,
        			    upass:upass
        			},
        			// beforeSend有时会有问题 return false 会触发error函数
        			//  $("#login-btn").html("正在登陆。。。。");  可写外面
        			// beforeSend:function(){
        			//     $("#login").html("正在登陆...");
        			// },
        			success:function(res){
        			    // console.log(res);
        			    //注意此处   没有进行数据验证  未做判断  不健壮
        			    // mui.toast("登陆成功");
						// 登陆成功后按钮内容修改为登陆
						// $("#login-btn").html("登陆");
        			    // setTimeout(function(){
        			        // location.href="index.php";
						// },2000);
						
						if(res.code==1){
							location.href="index.php";
						}
						else{
							mui.toast("登陆失败,用户名或密码错误");
						}
        			    
					}
					
        			});
			});
		});
	</script>
	</html>