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

	<link rel="stylesheet" href="css/detail.css">
	<script src="assets/mui/js/mui.zoom.js"></script>
	<script src="assets/mui/js/mui.previewimage.js"></script>
	
	
	<script src="assets/artTemplate/template-native.js"></script>

    <style>
			h5{
		        padding-top: 8px;
		        padding-bottom: 8px;
		        text-indent: 12px;
		    }
		    
			.mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body{
				font-size: 12px;
				margin-top:8px;
				color: #333;
			}
            
            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-object{
                 width: 143px;
                 height: 108px;
            }
		</style>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
            <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

		<h1 class="mui-title">产检报告</h1>
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
		<!-- <button><a href="at-test1.php">上传图片</a></button> -->
            <div class="mui-content" style="background-color:#fff">
                    <h5 style="background-color:#efeff4">全部产检报告</h5>
                    <ul class="mui-table-view mui-grid-view">
                         <!--<li class="mui-table-view-cell mui-media mui-col-xs-6">
                            <a href="#">
                                <img class="mui-media-object" data-preview-src="" data-preview-group="1" src="img/cj1.jpg">
                                <div class="mui-media-body">2018-12</div></a></li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-6">
                            <a href="#">
                                <img class="mui-media-object"  data-preview-src="" data-preview-group="1" src="img/cj2.jpg">
                                <div class="mui-media-body">2019-01</div></a></li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-6">
                            <a href="#"><img class="mui-media-object" data-preview-src="" data-preview-group="1" src="img/cj3.jpg">
                                <div class="mui-media-body">2019-02</div></a></li>
                        <li class="mui-table-view-cell mui-media mui-col-xs-6">
                            <a href="#">
                                <img class="mui-media-object" data-preview-src="" data-preview-group="1" src="img/cj4.jpg">
                                <div class="mui-media-body">2019-03</div></a></li> -->
					</ul>    
					<div class="chanjianlist"></div>
                </div>
	</div>
	</body>
	<script type="text/template" id="chanjianTemp">
        <% for(var i=0; i< items.length;i++){ %>
			<li class="mui-table-view-cell mui-media mui-col-xs-6">
                <a href="#">
                    <img class="mui-media-object" data-preview-src="" data-preview-group="1" src="<%=items[i].name%>">
                    <div class="mui-media-body">上传时间：<%=items[i].ctime%></div></a></li>  
        <% } %>
        </script>
    <script>
            mui.init({
                swipeBack:true //启用右滑关闭功能
			});
			
			$(function () {
                mui.previewImage();
                mui.plusReady(function () {})

            })
	</script>
	<script src="js/chanjianbaogao.js"></script>
	<script>
		$(function(){
			// getPhoto();
		// $.ajax({
		// 	type:"POST",
		// 	url:"api/_chanjian.php",
		// 	success:function(res){
		// 		// console.log(res.data);
		// 		if(res.code ==1){
		// 				var html = template("chanjianTemp", {
        //            			 "items": res.data,
        //        			 });
        //         		document.querySelector(".mui-table-view").innerHTML = html;
						
        //                 // 遍历数组，动态生成结构
        //                 // var data = res.data;
        //                 // // jquery方法each
        //                 // $.each(data,function(index,val){
		// 				// 	var str = '<li class="mui-table-view-cell mui-media mui-col-xs-6">\
        //                 //     <a href="#">\
        //                 //         <img class="mui-media-object"  data-preview-src="" data-preview-group="1" src="'+val['img']+'">\
        //                 //         <div class="mui-media-body">'+val['ctime']+'</div></a></li>';
                           
        //                 //         var chanjianItem = $(str);
        //                 //         // console.log(foodsItem);
        //                 //         // console.log(chanjianItem);
		// 				// 		// chanjianItem.insertAfter('.mui-grid-view');
        //                 //         chanjianItem.insertBefore('.chanjianlist');
		// 				// })

						
        //             }
		// 	}
		
		// })
	})
	</script>
	</html>