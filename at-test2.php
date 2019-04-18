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
    <link rel="stylesheet" href="assets/mui/css/mui.picker.min.css">

    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/test.css">


    <script src="laydate/laydate.js"></script>

    <script src="assets/mui/js/mui.min.js"></script>
    <script src="assets/mui/js/mui.picker.min.js"></script>

    <script src="assets/zepto/zepto.min.js"></script>
    <script src="js/public.js"></script>
    <script src="js/test.js"></script>

    <link rel="stylesheet" href="./css/ruler.css">
    <script src="./js/ruler.js"></script>

    <link rel="stylesheet" href="css/ruler1.css">
    <script src="js/ruler1.js"></script>
    <!-- <script src="js/in01.js"></script> -->
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    
    <style>
        .page .page-main{
            padding: 10px 0;
        }
    </style>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>
        <h1 class="mui-title">体质检测</h1>
        <!-- mui-pull-right右浮动 -->
        <!-- <a class="mui-icon mui-icon-search mui-pull-right"></a> -->
    </header>
    <nav class="mui-bar mui-bar-tab my-footer">
        <a class="mui-tab-item " href="index.php">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item mui-active" href="test.php">
            <span class="mui-icon fa fa-heartbeat"></span>
            <span class="mui-tab-label">体质检测</span>
        </a>
        <!-- <a class="mui-tab-item" href="news.php?cateId=1"> -->
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
        <div class="mui-content-padded">
            <h5 class="mui-content-padded">请选择记录的时间</h5>
            <button id="demo1" data-options="{}" class="btn mui-btn mui-btn-block">选择日期时间 ...</button>
            <div id="result" class="ui-alert"></div>
        </div>
        <h4><span class="mui-icon mui-icon-pengyouquan"></span> 体征状态</h4>
        <!-- 年龄/身高/体重 -->
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">年龄/身高/体重</a>
                <!-- <div class="mui-collapse-content">
                    <form class="mui-input-group">
                        <div class="mui-input-row">
                            <label>身高</label>
                            <input type="text" class="mui-input-clear" placeholder="请输入您的身高">
                        </div>

                       
                    </form>
                </div> -->

                <div class="mui-collapse-content">

                    <div class="page" data-page='profile1'>
                        <div class="page-main">
                            <input type="hidden" name="first_screen" value="30##150##50">
                            <div class="row">
                                <label for="" class="label">您的年龄 <span class="number age-num" initial-value="12" value="30">30</span><span
                                        class="letter">岁</span></label>
                                <div class="ruler ruler-age">
                                    <div class="main" value="-1">
                                        <ul data-initial='true'>
                                            <li><span class="num">18</span></li>
                                            <li><span class="num">19</span></li>
                                            <li><span class="num">20</span></li>
                                            <li><span class="num">21</span></li>
                                            <li><span class="num">22</span></li>
                                            <li><span class="num">23</span></li>
                                            <li><span class="num">24</span></li>
                                            <li><span class="num">25</span></li>
                                            <li><span class="num">26</span></li>
                                            <li><span class="num">27</span></li>
                                            <li><span class="num">28</span></li>
                                            <li><span class="num">29</span></li>
                                            <li><span class="num">30</span></li>
                                            <li><span class="num">31</span></li>
                                            <li><span class="num">32</span></li>
                                            <li><span class="num">33</span></li>
                                            <li><span class="num">34</span></li>
                                            <li><span class="num">35</span></li>
                                            <li><span class="num">36</span></li>
                                            <li><span class="num">37</span></li>
                                            <li><span class="num">38</span></li>
                                            <li><span class="num">39</span></li>
                                            <li><span class="num">40</span></li>
                                            <li><span class="num">41</span></li>
                                            <li><span class="num">42</span></li>
                                            <li><span class="num">43</span></li>
                                            <li><span class="num">44</span></li>
                                            <li><span class="num">45</span></li>
                                            <li><span class="num">46</span></li>
                                            <li><span class="num">47</span></li>
                                            <li><span class="num">48</span></li>
                                            <li><span class="num">49</span></li>
                                            <li><span class="num">50</span></li>
                                        </ul>
                                    </div>
                                    <div class="arrow"></div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="" class="label">您的身高 <span class="number height-num" initial-value="10"
                                        value="150">150</span><span class="letter">cm</span></label>
                                <div class="ruler ruler-height">
                                    <div class="main" value="-1">
                                        <ul data-initial='true'>
                                            <li><span class="num">140</span></li>
                                            <li><span class="num">150</span></li>
                                            <li><span class="num">160</span></li>
                                            <li><span class="num">170</span></li>
                                            <li><span class="num">180</span></li>
                                            <li><span class="num">190</span></li>
                                            <li><span class="num">200</span></li>
                                        </ul>
                                    </div>
                                    <div class="arrow"></div>
                                </div>
                            </div>

                            <form>
                                    <span class="tit">体重刻度（单位/kg）：
                                        <span id="num">0.00</span>kg
                                    </span>
                                    <div id="ruler-container">
                                        <div id="triangle"></div>
                                        <div id="ruler" data-offset="0">
                                            <ul id="ruler-ul">
                                                <li>
                                                    <span>10</span>
                                                </li>
                                                <li>
                                                    <span>20</span>
                                                </li>
                                                <li>
                                                    <span>30</span>
                                                </li>
                                                <li>
                                                    <span>40</span>
                                                </li>
                                                <li>
                                                    <span>50</span>
                                                </li>
                                                <li>
                                                    <span>60</span>
                                                </li>
                                                <li>
                                                    <span>70</span>
                                                </li>
                                                <li>
                                                    <span>80</span>
                                                </li>
                                                <li>
                                                    <span>90</span>
                                                </li>
                                                <li>
                                                    <span>100</span>
                                                </li>
                                            </ul>
                                        </div>
            
                                    </div>
                                    <div class="button">
                                        <a href="bmi.php">确定</a>
                                    </div>
                            </form>

                          
            
                        </div>
                    </div>



                   
                </div>
            </li>
        </ul>
        <!-- 体温 -->
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">体温</a>
                <div class="mui-collapse-content">
                    <form class="mui-input-group">
                        <div class="mui-input-row">
                            <label>体温</label>
                            <input type="text" class="mui-input-clear" placeholder="请输入您的体温指标">
                        </div>
                        <div class="mui-button-row">
                            <button type="button" class="mui-btn mui-btn-primary">确认</button>
                            <button type="button" class="mui-btn mui-btn-danger">取消</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
        <!-- 血压 -->
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">血压</a>
                <div class="mui-collapse-content">
                    <form class="mui-input-group">
                        <div class="mui-input-row">
                            <label>血压</label>
                            <input type="text" class="mui-input-clear" placeholder="请输入您的血压指标">
                        </div>
                        <div class="mui-button-row">
                            <button type="button" class="mui-btn mui-btn-primary">确认</button>
                            <button type="button" class="mui-btn mui-btn-danger">取消</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
        <!-- 心率 -->
        <ul class="mui-table-view">
            <li class="mui-table-view-cell mui-collapse">
                <a class="mui-navigate-right" href="#">心跳</a>
                <div class="mui-collapse-content">
                    <form class="mui-input-group">
                        <div class="mui-input-row">
                            <label>心率</label>
                            <input type="text" class="mui-input-clear" placeholder="请输入您的心率指标">
                        </div>
                        <div class="mui-button-row">
                            <button type="button" class="mui-btn mui-btn-primary">确认</button>
                            <button type="button" class="mui-btn mui-btn-danger">取消</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>

        <!-- 上传产检图片 -->
        <div class="mui-content-padded">
            <div class="photobox">
                <h4><span class="mui-icon mui-icon-download"></span> 产检报告备份</h4>
                <div class="pink">
                    <span class="mui-icon mui-icon-camera" style="fontSize:100px"></span>
                    <a href="#picture" class="mui-btn mui-btn-primary mui-btn-block mui-btn-outlined" style="padding: 5px 10px;">
                        上传产检报告
                    </a>
                    <p>产检报告最终会被医院收走，建议您拍照保存哦~~</p>
                </div>
            </div>
            <!-- <div id="picture" class="mui-popover mui-popover-action ">
                <ul class="mui-table-view imgmess">
                    <li  class="mui-table-view-cell pics">
                        <input type="file" id="my_img" />
                        
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <a href="#picture"><b>取消</b></a>
                    </li>
                </ul>
            </div> -->
            <div id="picture" class="mui-popover mui-popover-action ">
                <ul class="mui-table-view">
                    <li  class="mui-table-view-cell">
                      <!-- <a href="#"> -->
                        <input type="file" id="my_img" />
                    <!-- </a>  -->
                        
                    </li>
                    <!-- <li class="mui-table-view-cell">
                        <a href="#">从相册中选择</a>
                    </li> -->
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <a href="#picture"><b>取消</b></a>
                    </li>
                </ul>
            </div>
            <p id="info"></p>
        </div>

    </div>



</body>

    <!-- <script src="assets/js/js/jquery.min.js"></script>
    <script src="assets/js/js/localResizeIMG.js"></script>
    <script src="assets/js/js/mobileBUGFix.mini.js"></script>
    <script src="assets/js/js/ResizeIMG.js"></script> -->

<script>
    (function ($) {
        $.init();
        var result = $('#result')[0];
        var btns = $('.btn');
        btns.each(function (i, btn) {
            btn.addEventListener('tap', function () {
                var optionsJson = this.getAttribute('data-options') || '{}';
                var options = JSON.parse(optionsJson);
                var id = this.getAttribute('id');
                /*
                 * 首次显示时实例化组件
                 * 示例为了简洁，将 options 放在了按钮的 dom 上
                 * 也可以直接通过代码声明 optinos 用于实例化 DtPicker
                 */
                var picker = new $.DtPicker(options);
                picker.show(function (rs) {
                    /*
                     * rs.value 拼合后的 value
                     * rs.text 拼合后的 text
                     * rs.y 年，可以通过 rs.y.vaue 和 rs.y.text 获取值和文本
                     * rs.m 月，用法同年
                     * rs.d 日，用法同年
                     * rs.h 时，用法同年
                     * rs.i 分（minutes 的第二个字母），用法同年
                     */
                    result.innerText = '此刻时间为: ' + rs.text;
                    /* 
                     * 返回 false 可以阻止选择框的关闭
                     * return false;
                     */
                    /*
                     * 释放组件资源，释放后将将不能再操作组件
                     * 通常情况下，不需要示放组件，new DtPicker(options) 后，可以一直使用。
                     * 当前示例，因为内容较多，如不进行资原释放，在某些设备上会较慢。
                     * 所以每次用完便立即调用 dispose 进行释放，下次用时再创建新实例。
                     */
                    picker.dispose();
                });
            }, false);
        });
    })(mui);
</script>
<!--上传照片  -->
<script>
    // 文件上传不用click 一般用change
    $(function(){
        $("#my_img").on("change",function(){
            // console.log(112);

            var file = this.files[0];
            // console.log(file)
            // jquery是无法直接把文件上传的，需要formdata配合上传
            var data = new FormData();
            // data.append("键","值")
            data.append("file",file);
            $.ajax({
                url:"api/_uploadfile.php",
                type:"post",
                data:data,
                // 需要配置两个参数，设置jquery才能把文件带回服务器
                contentType:false,//只有设置这个参数，jquery才能把文件带回服务器
                processData:false,//告诉jq不要序列化我们的参数
                success:function(res){

                },
            });
        });
    });
</script>



</html>