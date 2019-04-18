<?php
    require_once 'all/config.php';
    require_once 'all/functions.php';
    // 验证是否已经登录
    checkLogin();
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

	<style>
		input[name='sex'] {
			display: inline-block;
		}
	</style>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
		<h1 class="mui-title">注册页面</h1>
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
		<a class="mui-tab-item" href="news.php?cateId=1">
			<span class="mui-icon fa fa-map-o"></span>
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
				<input type="text" class="mui-input-clear" name="username" placeholder="请输入用户名">
			</div>
			<div class="mui-input-row">
				<label>手机号</label>
				<input type="text" class="mui-input-clear" name="mobile" placeholder="请输入手机号">
			</div>
			<div class="mui-input-row">
				<label>密码</label>
				<input type="password" class="mui-input-password" name="password" placeholder="请输入密码">
			</div>
			<div class="mui-input-row">
				<label>确认密码</label>
				<input type="password" class="mui-input-password" name="againpass" placeholder="请输入密码">
			</div>	
			
			<div class="mui-input-row">
				<label>住址 </label>
				<input type="text" class="mui-input-clear" name="address" placeholder="请输入家庭住址">
			</div>
			<!-- <div class="mui-input-row">
				<label>认证码</label>
				<input type="text" class="mui-input-clear" name="checkCode" placeholder="认证码">
				<a href="javascript:;" class="getCode" id="getCode">获取认证码</a>
			</div> -->
			<div class="mui-button-row">
				<button id="reg-btn" type="button" class="mui-btn mui-btn-primary">注册</button>
				<!-- <button typec="button" class="mui-btn mui-btn-danger">取消</button> -->
			</div>
		</form>
		<a href="login.php" class="login-now">立即登陆</a>
	</div>
</body>


<script>
	$(function(){


$('#regBtn').on('tap',function(){

	var This = $(this);

	var data = {
		username: $.trim($('[name="username"]').val()),
		mobile:$.trim($('[name="mobile"]').val()),
		password:$.trim($('[name="password"]').val()),
		password:$.trim($('[name="address"]').val()),
		vCode:$.trim($('[name="checkCode"]').val())
	}

	var againPass = $.trim($('[name="againPass"]').val())

	if(!data.username){

		mui.toast('请输入用户名');

		return;

	}

	if(!/^1[4578]\d{9}$/.test(data.mobile)){

		mui.toast('请输入正确格式的手机号');

		return;

	}

	if(!data.password){

		mui.toast('请输入密码');

		return;

	}

	if(!againPass){

		mui.toast('请输入确认密码');

		return;
	}

	if(data.password != againPass){

		mui.toast('两次密码输入的不相同');

		return;

	}

	if(!/^\d{6}$/.test(data.vCode)){

		mui.toast('验证码输入的格式不正确');

		return;

	}

	$.ajax({
		type:'post',
		url:'api/_register.php',
		data:data,
		beforeSend:function(){

			This.html('正在提交数据...');

		},
		success:function(result){

			if(result.success){

				mui.toast('注册成功');

				setTimeout(function(){

					location.href = "login.php";

				},2000)
				
			}else{

				mui.toast('注册失败');

				This.html('注册');

			}
		}
	});

});

// $('#getCode').on('tap',getCheckCode);


});
</script>
</html>