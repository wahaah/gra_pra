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
	<link rel="stylesheet" href="css/user.css">
	<script src="assets/mui/js/mui.min.js"></script>
	<script src="assets/zepto/zepto.min.js"></script>
	<script src="js/public.js"></script>

	<link rel="stylesheet" type="text/css" href="css/feedback.css" />
	<!-- 字体图标 -->
	<style>
		.fa-umbrella:before {
			font-size: 25px;
			color: gold;
		}

		.fa-calendar-minus-o:before {
			font-size: 25px;
			color: plum;
		}

		.fa-bell-o:before {
			font-size: 25px;
			color: navy;
		}

		.mui-icon-compose:before {
			font-size: 25px;
			color: sienna;
		}

		.fa-plus-square:before {
			font-size: 25px;
			color: green;
		}

		.fa-line-chart:before {
			font-size: 25px;
		}
	</style>
	<!--  -->
	<style>
		html,
		body {
			background-color: #efeff4;
		}

		.mui-views,
		.mui-view,
		.mui-pages,
		.mui-page,
		.mui-page-content {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			width: 100%;
			height: 100%;
			background-color: #efeff4;
		}

		.mui-pages {
			top: 46px;
			height: auto;
		}

		.mui-scroll-wrapper,
		.mui-scroll {
			background-color: #efeff4;
		}

		.mui-page.mui-transitioning {
			-webkit-transition: -webkit-transform 300ms ease;
			transition: transform 300ms ease;
		}

		.mui-page-left {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0);
		}

		.mui-ios .mui-page-left {
			-webkit-transform: translate3d(-20%, 0, 0);
			transform: translate3d(-20%, 0, 0);
		}

		.mui-navbar {
			position: fixed;
			right: 0;
			left: 0;
			z-index: 10;
			height: 44px;
			background-color: #f7f7f8;
		}

		.mui-navbar .mui-bar {
			position: absolute;
			background: transparent;
			text-align: center;
		}

		.mui-android .mui-navbar-inner.mui-navbar-left {
			opacity: 0;
		}

		.mui-ios .mui-navbar-left .mui-left,
		.mui-ios .mui-navbar-left .mui-center,
		.mui-ios .mui-navbar-left .mui-right {
			opacity: 0;
		}

		.mui-navbar .mui-btn-nav {
			-webkit-transition: none;
			transition: none;
			-webkit-transition-duration: .0s;
			transition-duration: .0s;
		}

		.mui-navbar .mui-bar .mui-title {
			display: inline-block;
			width: auto;
		}

		.mui-page-shadow {
			position: absolute;
			right: 100%;
			top: 0;
			width: 16px;
			height: 100%;
			z-index: -1;
			content: '';
		}

		.mui-page-shadow {
			background: -webkit-linear-gradient(left, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
			background: linear-gradient(to right, rgba(0, 0, 0, 0) 0, rgba(0, 0, 0, 0) 10%, rgba(0, 0, 0, .01) 50%, rgba(0, 0, 0, .2) 100%);
		}

		.mui-navbar-inner.mui-transitioning,
		.mui-navbar-inner .mui-transitioning {
			-webkit-transition: opacity 300ms ease, -webkit-transform 300ms ease;
			transition: opacity 300ms ease, transform 300ms ease;
		}

		.mui-page {
			display: none;
		}

		.mui-pages .mui-page {
			display: block;
		}

		.mui-page .mui-table-view:first-child {
			margin-top: 15px;
		}

		.mui-page .mui-table-view:last-child {
			margin-bottom: 30px;
		}

		.mui-table-view {
			margin-top: 20px;
		}

		.mui-table-view span.mui-pull-right {
			color: #999;
		}

		.mui-table-view-divider {
			background-color: #efeff4;
			font-size: 14px;
		}

		.mui-table-view-divider:before,
		.mui-table-view-divider:after {
			height: 0;
		}

		.head {
			height: 40px;
		}

		#head {
			line-height: 40px;
		}

		.head-img {
			width: 40px;
			height: 40px;
		}

		#head-img1 {
			position: absolute;
			bottom: 10px;
			right: 40px;
			width: 40px;
			height: 40px;
		}

		.update {
			font-style: normal;
			color: #999999;
			margin-right: -25px;
			font-size: 15px
		}

		.mui-fullscreen {
			position: fixed;
			z-index: 20;
			background-color: #000;
		}

		.mui-ios .mui-navbar .mui-bar .mui-title {
			position: static;
		}

		/*问题反馈在setting页面单独的css*/
		#feedback .mui-popover {
			position: fixed;
		}

		#feedback .mui-table-view:last-child {
			margin-bottom: 0px;
		}

		#feedback .mui-table-view:first-child {
			margin-top: 0px;
		}

		.mui-plus.mui-plus-stream .mui-stream-hidden {
			display: none !important;
		}

		/*问题反馈在setting页面单独的css==end*/
	</style>
	<style>
		.mui-views,
		.mui-view,
		.mui-pages,
		.mui-page,
		.mui-page-content {
			top: 40px;
		}
	</style>
	<style>
		.mui-table-view .mui-media-object {
    		line-height: 70px;
    		max-width: 70px;
    		height: 70px;
		}

		.mui-navigate-right img {
    		width: 70px;
    		height: 70px;
		}
	</style>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
		<a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>
		<h1 class="mui-title">我的</h1>
		<!-- mui-pull-right右浮动 -->
		<!-- <a class="mui-icon mui-icon-search mui-pull-right"></a> -->
	</header>
	<nav class="mui-bar mui-bar-tab my-footer">
		<a class="mui-tab-item" href="index.php">
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
		<a class="mui-tab-item mui-active" href="user.php">
			<span class="mui-icon mui-icon-person"></span>
			<span class="mui-tab-label">个人中心</span>
		</a>
	</nav>
	<div class="mui-content">
		<div class="mui-page-content">
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul class="mui-table-view mui-table-view-chevron">
						<li class="mui-table-view-cell mui-media">
							<a class="mui-navigate-right" href="#account">
								<img class="mui-media-object mui-pull-left head-img" id="head-img"
									src="img/1.jpg">
								<div class="mui-media-body">
									<span class="uname">用户名：</span>
									<p class='mui-ellipsis1'>联系方式:</p>
									<p class='mui-ellipsis2'>住址:</p>
								</div>
							</a>
						</li>
					</ul>

					<ul class="mui-table-view mui-table-view-chevron">
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="weather.php"><span
									class="mui-icon fa fa-umbrella"></span> 天气变化</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="mine.php"><span
									class="mui-icon  fa fa-calendar-minus-o"></span> 预产期</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="beiwanglu.php"><span
									class="mui-icon fa fa-bell-o"></span>
								日程提醒</a>
						</li>
						<li class="mui-table-view-cell">
							<a href="modify.php" class="mui-navigate-right"><span
									class="mui-icon mui-icon-compose"></span>
								修改密码</a>
						</li>

						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="chanjianbaogao.php"><span
									class="mui-icon  fa fa-plus-square"></span>
								产检报告</a>
						</li>
						<li class="mui-table-view-cell">
							<a class="mui-navigate-right" href="test_zhexiantu.php"><span
									class="mui-icon fa fa-line-chart"></span>我的体质监测</a>
						</li>
					</ul>
					
					<ul class="mui-table-view">
						<li class="mui-table-view-cell" style="text-align: center;">
							<a>退出登录</a>
						</li>
					</ul>
				</div>
			</div>
		</div>		
	</div>
</body>
<script>
	// mui('body').on('tap', 'a', function() {
	// 	window.top.location.href = this.href;
	// });
	//解决 所有a标签 导航不能跳转页面
	// mui.init(); 
	// mui('body').on('tap','a',function(){document.location.href=this.href;});
</script>
<script>
	$(function(){
		$.ajax({
			type:"POST",
			url:"api/_getavator.php",
			success:function(res){
				// console.log(res.uname);
				if(res.code==1){
					var profile = $(".mui-navigate-right");
					profile.children('img').attr("src",res.avator);
					var profile1 = $(".mui-media-body")
					profile1.children('.uname').text("用户名： "+res.uname);
					// profile.children('.uname').attr("text",res.uname);
					profile1.children('.mui-ellipsis1').text("联系方式： "+res.tel);
					profile1.children('.mui-ellipsis2').text("住址： "+res.address);
				}
			}
		
		})
	})
</script>

</html>