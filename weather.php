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
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="js/public.js"></script>
    <style>
        .show{
             display:block;
        }
        .button{
            display: block;
            border: none;
            height: 25px;
           
        }
        .button i{
            font-style: normal;
            display: inline-block;
            /* vertical-align: middle; */
        }
        .button span{
            display:inline-block;
            vertical-align: middle;
        }
        
        .mui-icon-arrowdown:before {
            font-size: 14px;
            vertical-align: middle;
        }
        .mui-table span {
            font-size: 14px;
        }
        
        .de {
            font-size: 14px;
        }
        .mui-title {
            position: static;
            margin: -1px;
        }
        .mui-icon-search:before {
            position: absolute;
            right: 12px;
            top: 50px;
            color: #fff;
        }
    </style>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

        <h1 class="mui-title">天气提醒</h1>
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
            <span class="mui-icon fa fa-map-o"></span>
            <span class="mui-tab-label">公告咨询</span>
        </a>
        <a class="mui-tab-item mui-active" href="user.php">
            <span class="mui-icon mui-icon-person"></span>
            <span class="mui-tab-label">个人中心</span>
        </a>
    </nav>
    <div class="mui-content">
        <h1 class="mui-title">
                    <!-- 顶部搜索部分 -->
                    <div class="mui-input-row">
                            <input type="search" id="input-serach" class="mui-input-clear" placeholder="请输入你要搜索的城市">
                    </div>
                    <!-- 搜索结束 -->
            </h1>
                <!-- mui-pull-right右浮动 -->
            <a class="mui-icon mui-icon-search mui-pull-right"></a>
        <table>
            <tbody>
                <!-- <tr>
                            <td>周三 03月20日 (实时：19℃)</td>
                            <td>
                                <img src="http://api.map.baidu.com/images/weather/day/duoyun.png" alt="">
                            </td>
                            <td>
                                <img src="http://api.map.baidu.com/images/weather/night/fuchen.png" alt="">
                            </td>
                            <td>25 ~ 8℃</td>
                            <td>多云转浮尘</td>
                            <td>南风3-4级</td>
                    </tr> -->

            </tbody>

            <!-- <tfoot> -->
            <!-- <p class="p">详情<span class=""></span></p> -->
            <!-- <div class="show">
                    <h5>pm:</h5>
                    <ul>建议：
                        <li><a href="#">aa</a></li>
                        <li><a href="#">ss</a></li>
                        <li><a href="#">dd</a></li>
                        <li><a href="#">ff</a></li>
                        <li><a href="#">gg</a></li>
                    </ul>
                </div> -->

            <!-- <% for(var j=0;j<item.length;j++){ %>
                    <p class="p">详情<span class=""></span></p>
                        <div class="show">
                            <h5>pm:2</h5>
                            <ul>建议：
                                    
                                <li><a href="#">描述：<%=item[j].des%></a></li>
                                <li><a href="#">标题：</a></li>
                                <li><a href="#">提示：</a></li>
                                <li><a href="#">结果：</a></li>
                            </ul>
                        </div>
                    <% } %> -->
            <!-- </tfoot> -->
        </table>
    </div>
</body>
<script src="assets/js/template-native.js"></script>

<script type="text/template" id="weatherTemp">
    <!-- 数组以items做一个包装 -->
    <!-- <button  class="button">
        <i>今日详情</i> 
        <span class="mui-icon mui-icon-arrowdown"></span>
    </button> -->
        <% for(var i=0;i<items.length;i++){ %>
                <ul class="mui-table-view mui-table-view-striped mui-table-view-condensed">
                        <li class="mui-table-view-cell">
                            <div class="mui-table">
                                <div class="mui-table-cell mui-col-xs-10"> 
                                    <span> 白天</span><img src="<%=items[i].dayPictureUrl%>" alt="">
                                    <span>夜间</span><img src="<%=items[i].nightPictureUrl%>" alt="">
                                    <h5>温度：<%=items[i].temperature%></h5>
                                    <p class="mui-h5 mui-ellipsis">天气：<%=items[i].weather%></p>
                                    <p class='mui-ellipsis'>风：<%=items[i].wind%></p>
                                </div>
                                <div class="mui-table-cell mui-col-xs-5 mui-text-right">
                                    <span class="mui-h5"><%=items[i].date%></span>
                                </div>
                            </div>
                            <div id="foot">
                                <button  class="button">
                                    <i>今日详情</i> 
                                    <span class="mui-icon mui-icon-arrowdown"></span></button>
                                <div id="detail-box" class="show">
                                   
                                </div>
                            </div>
                        </li>
                </ul>                  
        <% } %>
        </script>
<script type="text/template" id="detailTemp">
    <div style="height:2px;width:100%;background-color:pink;margin: 0 auto"></div>
    <p class="de">生活小提示：</p>
    <% for(var j=0;j<item1.length;j++){ %>
            <!-- <div class="show"> -->
            <!-- <h5>pm:2</h5> -->
            <ul>
            <li class="de"><%=j+1%>:<%=item1[j].des%></li>
            </ul>
            <!-- </div> -->
    <% } %>
</script>


<script type="text/javascript">
    // $(function(){
    //     var isrun = false;
    //     while (isrun = false) {
    //     var button = document.getElementById("button");
    //     button.innerHTML="详情";
    //     var container = document.getElementById('foot'); //2、找到父级元素
    //     container.insertBefore(span,container.childNodes[0]);
    // }
    // if (isrun == false) {
    //     $(".button").css("display", "block");
    //     isrun = true;
    // }
    // })
</script>

<script>
$(function(){
        $("#input-serach").on("change",function(){
        var city = $("#input-serach").val();
        console.log(city);
        $.ajax({
            // 跨域只能通过get来请求
            type: "post",
            url:"http://api.map.baidu.com/telematics/v3/weather?location="+city,
            // url: "http://api.map.baidu.com/telematics/v3/weather",
            data: {
                "ak": "zVo5SStav7IUiVON0kuCogecm87lonOj",
                // "location": "渭南",
                "output": 'json'
            },
            dataType: 'jsonp',
            // 默认使用success
            success: function (result) {
                console.log(result);
                // console.log(result.results[0].index)
                var html = template("weatherTemp", {
                    "items": result.results[0].weather_data,
                });
    
                document.querySelector("tbody").innerHTML = html;
            }
    
            })
        })
})
</script>
<script>
$(function(){
    // var isClick = true;
    //     // $("#input-serach").on("change",function(){
    //     $("tbody").on("click",function(){
    //         var city = $("#input-serach").val();


    var isClick = true;
    $("tbody").on("tap", "button", function () {
        var city = $("#input-serach").val();
        $.ajax({
            // 跨域只能通过get来请求
            type: "post",
            url: "http://api.map.baidu.com/telematics/v3/weather?location="+city,
            data: {
                "ak": "zVo5SStav7IUiVON0kuCogecm87lonOj",
                // "location": "渭南",
                "output": 'json'
            },
            dataType: 'jsonp',
            // 默认使用success
            success: function (result) {
                // console.log(result);
                // console.log(result.results[0].index)
                var html1 = template("detailTemp", {
                    "item1": result.results[0].index
                });
                document.querySelector("#detail-box").innerHTML = html1;
            }
        })

        if (isClick) {
            $(".show").css("display", "block");
            isClick = false;
        } else {
            $(".show").css("display", "none");
            isClick = true;
        }

    });
})







   
</script>

<script>
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });
</script>

</html>