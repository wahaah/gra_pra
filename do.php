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
		.mui-row.mui-fullscreen>[class*="mui-col-"] {
			height: 100%;
		}

		.mui-col-xs-3,
		.mui-control-content {
			overflow-y: auto;
			height: 100%;
		}

		.mui-segmented-control .mui-control-item {
			line-height: 50px;
			width: 100%;
		}

		.mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active {
			background-color: #fff;
		}

		.mui-fullscreen {
			top: 45px;
		}
	</style>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
		<a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

		<h1 class="mui-title">能不能做</h1>
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
		<div class="mui-content mui-row mui-fullscreen">
			<div class="mui-col-xs-3">
				<div id="segmentedControls" class="mui-segmented-control mui-segmented-control-inverted mui-segmented-control-vertical">
				</div>
			</div>
			<div id="segmentedControlContents" class="mui-col-xs-9" style="border-left: 1px solid #c8c7cc;">
				<div id="item1" class="mui-control-content mui-active">
				</div>
				<div id="item2" class="mui-control-content">
				</div>
				<div id="item3" class="mui-control-content">
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	mui.init({
		swipeBack: true //启用右滑关闭功能
	});
	var controls = document.getElementById("segmentedControls");
	var contents = document.getElementById("segmentedControlContents");
	var html = [];
	var i = 1,
		j = 1,
		m = 16, //左侧选项卡数量+1
		n = 21; //每个选项卡列表数量+1
	for (; i < m; i++) {
		// html.push('<a class="mui-control-item" href="#content' + i + '">选项' + i + '</a>');
		html.push('<a class="mui-control-item" href="#content' + i + '">选项' + i + '</a>');
	}
	// html = ['居家生活','辐射']
	controls.innerHTML = html.join('');
	html = [];
	for (i = 1; i < m; i++) {
		html.push('<div id="content' + i + '" class="mui-control-content"><ul class="mui-table-view">');
		for (j = 1; j < n; j++) {
			html.push('<li class="mui-table-view-cell">第' + i + '个选项卡子项-' + j + '</li>');
		}
		html.push('</ul></div>');
	}
	contents.innerHTML = html.join('');
	//默认选中第一个
	controls.querySelector('.mui-control-item').classList.add('mui-active');
	contents.querySelector('.mui-control-content').classList.add('mui-active');


	

</script>

</html>