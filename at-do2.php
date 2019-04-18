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
    <link rel="stylesheet" href="css/at-category.css">

    <script src="assets/mui/js/mui.min.js"></script>
    <script src="assets/zepto/zepto.min.js"></script>
    <script src="js/public.js"></script>
    <script src="js/at-category.js"></script>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

        <h1 class="mui-title">乐</h1>
        <!-- mui-pull-right右浮动 -->
        <!-- <a class="mui-icon mui-icon-search mui-pull-right"></a> -->
    </header>
    <nav class="mui-bar mui-bar-tab my-footer">
        <a class="mui-tab-item mui-active" href="index.html">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item" href="test.html">
            <span class="mui-icon fa fa-heartbeat"></span>
            <span class="mui-tab-label">体质检测</span>
        </a>
        <a class="mui-tab-item" href="news.html">
            <!-- fa fa-shopping-cart  使用fontawesome图标
            mui-icon加上后图标变为横向 -->
            <span class="mui-icon fa fa-map-o"></span>
            <span class="mui-tab-label">公告咨询</span>
        </a>
        <a class="mui-tab-item" href="user.html">
            <span class="mui-icon mui-icon-person"></span>
            <span class="mui-tab-label">个人中心</span>
        </a>
    </nav>
    <div class="mui-content">
        <!-- 不出现是由于头部，底部都用固定定位， -->
        <!-- 默认宽度为内容宽度 -->
        <!-- ddd -->
        <!-- 左侧固定  右边自适应 -->
        <div class="category-left">
            <!-- shezhixinagduidingwei  -->
            <!-- 滚动条 -->
            <div class="mui-scroll-wrapper">
                <div class="mui-scroll">
                    <!--这里放置真实显示的DOM内容-->
                    <div class="links" id="links">
                        <a href="#" class="active">居家生活</a>
                        <a href="#">面部护理</a>
                        <a href="#">防辐射</a>
                        <a href="#">出行</a>
                        <a href="#">头发护理</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                        <a href="#">男士关</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="category-right">
                <!-- 滚动条 -->
                <div class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                        <!--这里放置真实显示的DOM内容-->
                        <!-- 记住给ul清除浮动 -->
                        <ul class="brand-list mui-clearfix">
    
                             <li>
                                <a href="#">
                                    <!-- <img src="images/brand2.png" alt=""> -->
                                    <p>耐克</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- <img src="images/brand3.png" alt=""> -->
                                    <p>耐克</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- <img src="images/brand4.png" alt=""> -->
                                    <p>耐克</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <!-- <img src="images/brand5.png" alt=""> -->
                                    <p>耐克</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>

</body>

</html>