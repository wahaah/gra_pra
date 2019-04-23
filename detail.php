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
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="assets/mui/css/mui.imageviewer.css">

    <script src="assets/mui/js/mui.min.js"></script>
    <script src="assets/zepto/zepto.min.js"></script>

    <script src="assets/mui/js/mui.zoom.js"></script>
    <script src="assets/mui/js/mui.previewimage.js"></script>

    <script src="js/public.js"></script>
    <style>
        .mui-bar-nav~.mui-content {
          padding-top: 0px; 
        }
    </style>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

        <h1 class="mui-title">详细描述</h1>
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
        <!-- <div class="mui-content-padded">
            <p>别名：车厘子、玛瑙、含桃</p>
            <div class="img">
                <img src="img/yingtao.jpg" data-preview-src="" data-preview-group="1">
            </div>
            <p>孕妇适宜</p>
            <p class="des">樱桃富含维生素C、可促进矿物质和叶酸的吸收、还能降低雾霾伤害，增强孕妈免疫力。花青素、类胡萝卜素具有抗氧化的作用；褪黑素可改善孕期失眠症状，提高睡眠质量。</p>
        </div> -->
    </div>
</body>
<!-- <script src="js/detail.js"></script> -->
<script>
    
    
    
    $(function(){
        // var url = window.location.href;// http://gra.com:8081/detail.php?id=1
        var url = window.location.search;//?id=2
        // console.log(url);
        // var id = url.substr(4);
        var id = Number(url.substr(4));
        console.log(id);
        // console.log(url.substr(4));
        $.ajax({
            type:"post",
            url:"api/_getEatDetail.php",
            data:{
                id:id
            },
            success:function(res){
                console.log(res);
                if(res.code == 1){
                    // 遍历数组，动态生成结构
                    var data = res.data;

                    $.each(data,function(index,val){
                     var str = `<div class="mui-content-padded">
                        <p>别名：${val['alias']}</p>
                        <div class="img">
                            <img src="${val['img']}" data-preview-src="" data-preview-group="1">
                        </div>
                        <p class="des" style="color:red;">孕妇${val['eat']}</p>
                        <p class="des" style="color:black;">描述信息：<br />${val['des']}</p>
                    </div> `;
                    var detailItem = $(str);
                    // console.log(foodsItem);
                    detailItem.insertAfter('.mui-content');
                                

                    })
                }
                
            }
        })
    
    })

   
</script>
<script>
    $(function () {
        mui.previewImage();
        mui.plusReady(function () {})

    })
</script>


</html>