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
    <!-- <script src="js/test.js"></script> -->

    <!-- <link rel="stylesheet" href="./css/ruler.css">
    <script src="./js/ruler.js"></script>

    <link rel="stylesheet" href="css/ruler1.css">
    <script src="js/ruler1.js"></script>
    <script src="js/in01.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script> -->

    <style>
        .page .page-main {
            padding: 10px 0;
        }
    </style>

    <style type="text/css">
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .toBar {
            width: 100%;
            padding: 15px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            position: absolute;
            left: 0;
            top: 45px;
            z-index: 1;
        }

        .toBar label input {
            display: none;
        }

        .toBar label,
        .toBar button {
            display: inline-block;
            width: 100px;
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #fff;
            background: #8080ca;
            border-radius: 6px;
            cursor: pointer;
        }

        .toBar button {
            border: none;
            float: right;
        }

        .img_content,
        canvas {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        /* .img_content{
            width: 100%;
        } */
        .img_content img {
            /* width: 100%; */
            height: 200px;
        }

        canvas {
            border: 1px solid #333;
            /* background-color: rgb(181, 229, 241); */
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
        <a class="mui-tab-item " href="index.html">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item mui-active" href="test.html">
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

        <!-- 上传产检图片 -->
        <!-- <div class="mui-content-padded">
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


            <div id="picture" class="mui-popover mui-popover-action ">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <a href="#">拍照或录像</a>
                    </li>
                    <li class="mui-table-view-cell">
                        <a href="#">从相册中选择</a>
                    </li>
                </ul>
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <a href="#picture"><b>取消</b></a>
                    </li>
                </ul>
            </div>
            <p id="info"></p>
        </div> -->



        <div class="toBar">
            <label>
                拍照/选择图片
                <input type="file" />
            </label>
            <button type="button">使用</button>
        </div>
        <div class="img_content">
            <img src="img/bg1.jpg" />
        </div>
        <!--裁剪图片框。宽高为定义裁剪出的图片大小-->
        <canvas width="200px" height="200px"></canvas>

    </div>



</body>
<script src="js/img.js"></script>
<script src="js/require.js"></script>
<script src="js/main.js"></script>
<script>
    window.addEventListener("load", function () {
        var $input = document.querySelector("input");
        var $img = document.querySelector("img");
        var $canvas = document.querySelector("canvas");
        //选择图片
        $input.addEventListener("change", function () {
            $img.src = getFileUrl(this);
        }, false);



        var myCrop;
        require(["jquery", 'hammer', 'tomPlugin', "tomLib", 'hammer.fake', 'hammer.showtouch'], function ($,
            hammer,
            plugin, T) {
            document.addEventListener("touchmove", function (e) {
                e.preventDefault();
            });
            var opts = {
                    cropWidth: $canvas.width,
                    cropHeight: $canvas.height
                },
                previewStyle = {
                    x: 0,
                    y: 0,
                    scale: 1,
                    rotate: 0,
                    ratio: 1
                },
                transform = T.prefixStyle("transform"),
                myCrop = T.cropImage({
                    bindFile: $("input"),
                    enableRatio: false, //是否启用高清,高清得到的图片会比较大
                    canvas: $canvas, //放一个canvas对象
                    cropWidth: opts.cropWidth, //剪切大小
                    cropHeight: opts.cropHeight,
                    bindPreview: $("img"), //绑定一个预览的img标签
                    useHammer: true, //是否使用hammer手势，否的话将不支持缩放
                    oninit: function () {

                    },
                    onLoad: function (data) {
                        //用户每次选择图片后执行回调
                        resetUserOpts();
                        previewStyle.ratio = data.ratio;
                        $("img").attr("src", data.originSrc).css({
                            width: data.width,
                            height: data.height
                        }).css(transform, 'scale(' + 1 / previewStyle.ratio + ')');
                        myCrop.setCropStyle(previewStyle)
                    }
                });

            function resetUserOpts() {
                $("canvas").hammer('reset');
                previewStyle = {
                    scale: 1,
                    x: 0,
                    y: 0,
                    rotate: 0
                };
                $("img").attr("src", '');
            };
            $("canvas").hammer({
                gestureCb: function (o) {
                    //每次缩放拖拽的回调
                    $.extend(previewStyle, o);
                    console.log("用户修改图片", previewStyle)
                    $("img").css(transform, "translate3d(" + previewStyle.x + 'px,' +
                        previewStyle.y + "px,0) rotate(" +
                        previewStyle.rotate + "deg) scale(" + (previewStyle.scale /
                            previewStyle.ratio) + ")")
                }
            });

            $("button").on("click", function () {
                myCrop.setCropStyle(previewStyle)
                var src = myCrop.getCropFile({});
                window.location.href = src;
            });
        });


    }, false);
</script>
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



</html>