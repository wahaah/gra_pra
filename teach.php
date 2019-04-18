
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
	<link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css">
	<script src="assets/mui/js/mui.min.js"></script>
	<script src="assets/zepto/zepto.min.js"></script>
	<script src="js/public.js"></script>
	<style>
		video {
			width: 100%;
		}
		video poster{
			width:100%;
		}
		h4{
			font-size: 15px;
    		color: #fff;
    		font-weight: normal;
    		background-color: rgb(202, 237, 243);
    		/* padding: 10px; */
    		padding: 2px;
		}
		.mui-content span {
			margin-right: 5px;
			font-size: 28px;
			color: pink;
			font-weight: bold;
		}
	</style>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
		<a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

		<h1 class="mui-title">音频/视频</h1>
		<!-- mui-pull-right右浮动 -->
		<!-- <a class="mui-icon mui-icon-search mui-pull-right"></a> -->
	</header>
	<nav class="mui-bar mui-bar-tab my-footer">
		<a class="mui-tab-item mui-active" href="index.php">
			<span class="mui-icon mui-icon-home"></span>
			<span class="mui-tab-label">首页</span>
		</a>
		<a class="mui-tab-item" href="test.php">
			<span class="mui-icon fa fa-heartbeat"></span>
			<span class="mui-tab-label">体质检测</span>
		</a>
		<a class="mui-tab-item" href="news.php?cateId=1">
			<!-- fa fa-shopping-cart  使用fontawesome图标
            mui-icon加上后图标变为横向 -->
			<span class="mui-icon fa fa-map-o"></span>
			<span class="mui-tab-label">公告咨询</span>
		</a>
		<a class="mui-tab-item" href="user.php">
			<span class="mui-icon mui-icon-person"></span>
			<span class="mui-tab-label">个人中心</span>
		</a>
	</nav>

	<div class="mui-content">
			<h4><span class="mui-icon mui-icon-videocam"></span>  你我更亲近！！</h4>
			<video controls poster="img/ye.jpg">
				<source src="mp3/b.mp4" type="video/mp4">
			</video>
		<h4><span class="mui-icon mui-icon-chatbubble"></span> 陪伴宝宝成长视频</h4>
		<video controls poster="img/b.jpg">
			<source src="mp3/c.mp4" type="video/mp4">
		</video>
		
		<h4><span class="mui-icon mui-icon-image"></span>宝宝带给你的幸福快乐！！</h4>
		<video controls poster="img/ye.jpg">
			<source src="mp3/a.mp4" type="video/mp4">
		</video>
	</div>
</body>

</html>