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

    <link href="css/did/css/main.css" rel="stylesheet" type="text/css" />
    <link href="css/did/css/common.css" rel="stylesheet" type="text/css" />
    <style>
        .mui-icon-closeempty:before{
            font-size: 26px;
            color: red;
            font-weight: bold;
        }
        .mui-icon-checkmarkempty:before {
            font-size: 26px;
            color: green;
            font-weight: bold;
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
        <div class="Z_con2_2">
            <div class="F_wd_top_con2">
                <div class="F_wd_top_con2_l" id="wrapper">
                    <div>
                        <ul class="sy">
                            <li class="current">居家生活</li>
                            <li>面部护理</li>
                            <li>着装</li>
                            <li>出行</li>
                        </ul>
                    </div>
                </div>
                <div class="F_wd_top_con2_r" id="wrapper1">
                    <div class="content">
                        <ul class="by" style="display: block">
                            <li class="F_wd_top_con2_r_borb1 F_wd_top_con2_r_borb2">养宠物<span class="mui-icon mui-icon-closeempty"></span></li>
                            <li class="F_wd_top_con2_r_borb1">养植物<span class="mui-icon mui-icon-checkmarkempty"></span></li>
                            <li class="F_wd_top_con2_r_borb1">去ktv<span class="mui-icon mui-icon-closeempty"></span></li>
                            <li class="F_wd_top_con2_r_borb1">喷香水<span class="mui-icon mui-icon-closeempty"></span></li>
                        </ul>
                    </div>
                    <div class="content">
                        <ul class="by">
                            <li class="F_wd_top_con2_r_borb1 F_wd_top_con2_r_borb2">精剪</li>
                            <li class="F_wd_top_con2_r_borb1">面膜保湿</li>
                            <li class="F_wd_top_con2_r_borb1">去痘抗痘</li>
                            <li class="F_wd_top_con2_r_borb1">化妆品</li>
                        </ul>
                    </div>
                    <div class="content">
                        <ul class="by">
                            <li class="F_wd_top_con2_r_borb1 F_wd_top_con2_r_borb2">超市购物</li>
                            <li class="F_wd_top_con2_r_borb1">商场购物</li>
                        </ul>
                    </div>
                    <div class="content">
                        <ul class="by">
                            <li class="F_wd_top_con2_r_borb1 F_wd_top_con2_r_borb2">地图</li>
                            <li class="F_wd_top_con2_r_borb1">充值话费</li>
                            <li class="F_wd_top_con2_r_borb1">58同城</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="css/did/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="css/did/js/common.js" type="text/javascript"></script>

</body>

</html>