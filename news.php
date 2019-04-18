<?php
    require_once 'all/config.php';
    require_once 'all/functions.php';
    // 验证是否已经登录
    checkLogin();
?>
<?php 
    /* 
        1.连接数据库
        2.查询出所有分类的数据
        3.根据数据库的数据生成结构
    */

      // 调用已封装好的
    //   checklogin();

	require_once 'all/config.php';
    // echo DB_HOST;
    // 链接数据库
    // mysqli_connect()
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
     // 准备sql语句
     $sql="SELECT * FROM zixuncate";
    // 执行查询操作
    $result = mysqli_query($connect,$sql);  
    //数据集合 转换为二维数组
    $arr = [];
    // 遍历
    while($row = mysqli_fetch_assoc($result)){
      $arr[] = $row;
    }
    // print_r($arr);
?>

<?php 
// 全部新闻

    /* 
        1.连接数据库
        2.查询出所有分类的数据
        3.根据数据库的数据生成结构
    */

      // 调用已封装好的
    //   checklogin();

	require_once 'all/config.php';
    // echo DB_HOST;
    // 链接数据库
    // mysqli_connect()
    $connectAll = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
     // 准备sql语句
     $sqlAll="SELECT n.title,n.img,n.content,c.name FROM zixunnews n
     LEFT JOIN zixuncate c on c.id = n.c_id";
    // 执行查询操作
    $resultAll = mysqli_query($connectAll,$sqlAll);  
    //数据集合 转换为二维数组
    $arrAll = [];
    // 遍历
    while($rowAll = mysqli_fetch_assoc($resultAll)){
      $arrAll[] = $rowAll;
    }
    // print_r($arrAll);
?>

<?php 
   // 调用已封装好的
    //   checklogin();


// 依据分类查找
        require_once './all/config.php';
    /* 
        1.获取分类id
        2.根据分类id查询数据库
        3.动态生成结构
    */
        // 1.获取分类id  通过url传参拿到  用$_get获取
        $cateId = $_GET["cateId"];
        // 2.根据分类id查询数据库
         // 链接数据库
         // mysqli_connect()
         $connect1 = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
         // 准备sql语句
         $sql1="SELECT n.title,n.img,n.content,c.name FROM zixunnews n
                LEFT JOIN zixuncate c on c.id = n.c_id
                WHERE n.c_id = {$cateId}
                LIMIT 3";
        // 执行查询操作
        $result1 = mysqli_query($connect1,$sql1);  
        //数据集合 转换为二维数组
        $arr1 = [];
        // 遍历
        while($row1 = mysqli_fetch_assoc($result1)){
          $arr1[] = $row1 ;
        }
        // print_r($arr1);
   
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
        * {
            touch-action: pan-y;
        }

        .mui-control-content {
            background-color: white;
            min-height: 435px;
        }

        .mui-control-content .mui-loading {
            margin-top: 50px;
        }
        .mui-segmented-control.mui-segmented-control-inverted~.mui-slider-progress-bar {
        background-color: #fff;
        }
        .mui-col-xs-4 {
            width: 25%;
        }
        /* .mui-scroll{
            height:100%;
        }
        .mui-table-view {
            height: 500px;
        } */
        
      
        
    </style>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>
        <!-- 搜索 -->

        <h1 class="mui-title">
            <!-- 顶部搜索部分 -->
            <div class="mui-input-row ">
					<input type="search" class="mui-input-clear" placeholder="最新动态">
				</div>
            <!-- 搜索结束 -->
        </h1>
        <!-- mui-pull-right右浮动 -->
        <a class="mui-icon mui-icon-search mui-pull-right"></a>
    </header>
    <nav class="mui-bar mui-bar-tab my-footer">
        <a class="mui-tab-item " href="index.php">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item" href="test.php">
            <span class="mui-icon fa fa-heartbeat"></span>
            <span class="mui-tab-label">体质检测</span>
        </a>
        <a class="mui-tab-item mui-active" href="news.php?cateId=1">
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


    <!-- <style>
            .mui-control-content {
                    background-color: white;
                    min-height: 215px;
                }
                .mui-control-content .mui-loading {
                    margin-top: 50px;
                }
            </style> -->
    <!-- <header class="mui-bar mui-bar-nav">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
            <h1 class="mui-title">顶部选项卡-可左右拖动(div)</h1>
        </header> -->
    <div class="mui-content">
        <div id="slider" class="mui-slider">
            <div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                <!-- <a class="mui-control-item" href="#item1mobile">
                    饮食
                </a>
                <a class="mui-control-item" href="#item2mobile">
                    运动
                </a>
                <a class="mui-control-item" href="#item3mobile">
                    胎教
                </a>
                <a class="mui-control-item" href="#item4mobile">
                    圈子
                </a> -->
                <!-- 遍历二维数组生成结构 -->
                <!-- <div> -->
                <?php foreach($arr as $value): ?>
                    <!-- <a class="mui-control-item" href="#item4mobile"> -->
                    <a class="mui-control-item" href="news.php?cateId=<?php echo $value['id'] ?>">
                        <!-- 圈子 -->
                        <?php echo $value['name'] ?>
                    </a> 
                <?php endforeach ?>
                
            </div>

            <div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-4"></div>
            <div class="mui-slider-group">
                <div id="itemmobile+"{$cateId} class="mui-slider-item mui-control-content mui-active">
                    <div id="scroll+"{$cateId} class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <ul class="mui-table-view">
                            <?php foreach($arr1 as $value1): ?>
                                    <li class="mui-table-view-cell mui-media">
                                        <a href="javascript:;">
                                            <img class="mui-media-object mui-pull-left" src="<?php echo $value1['img'] ?>">
                                            <div class="mui-media-body">
                                                <?php echo $value1['title'] ?>
                                                <p class='mui-ellipsis'><?php echo $value1['content'] ?></p>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
                <!-- <div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
                    <div id="scroll1" class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <ul class="mui-table-view">
                                <li class="mui-table-view-cell mui-media">
                                    <a href="javascript:;">
                                        <img class="mui-media-object mui-pull-left" src="./img/icon-07.png">
                                        <div class="mui-media-body">
                                            幸福
                                            <p class='mui-ellipsis'>能和心爱的人一起睡觉，是件幸福的事情；可是，打呼噜怎么办？</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mui-table-view-cell mui-media">
                                    <a href="javascript:;">
                                        <img class="mui-media-object mui-pull-left" src="./img/icon-07.png">
                                        <div class="mui-media-body">
                                            木屋
                                            <p class='mui-ellipsis'>想要这样一间小木屋，夏天挫冰吃瓜，冬天围炉取暖.</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mui-table-view-cell mui-media">
                                    <a href="javascript:;">
                                        <img class="mui-media-object mui-pull-left" src="./img/icon-07.png">
                                        <div class="mui-media-body">
                                            CBD
                                            <p class='mui-ellipsis'>烤炉模式的城，到黄昏，如同打翻的调色盘一般.</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mui-table-view-cell mui-media">
                                    <a href="javascript:;">
                                        <img class="mui-media-object mui-pull-left" src="./img/icon-07.png">
                                        <div class="mui-media-body">
                                            CBD
                                            <p class='mui-ellipsis'>烤炉模式的城，到黄昏，如同打翻的调色盘一般.</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="mui-table-view-cell mui-media">
                                    <a href="javascript:;">
                                        <img class="mui-media-object mui-pull-left" src="./img/icon-07.png">
                                        <div class="mui-media-body">
                                            CBD
                                            <p class='mui-ellipsis'>烤炉模式的城，到黄昏，如同打翻的调色盘一般.</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="item2mobile" class="mui-slider-item mui-control-content">
                    <div id="scroll2" class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="item3mobile" class="mui-slider-item mui-control-content">
                    <div id="scroll3" class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div id="item4mobile" class="mui-slider-item mui-control-content">
                    <div id="scroll4" class="mui-scroll-wrapper">
                        <div class="mui-scroll">
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                
            
        
    </div>
    <script src="assets/mui/js/mui.min.js"></script>
    <script>
        mui.init({
            swipeBack: false
        });
        (function ($) {
            $('.mui-scroll-wrapper').scroll({
                indicators: true //是否显示滚动条
            });
            // var html2 =
            //     '<ul class="mui-table-view"><li class="mui-table-view-cell">第饮食个选项卡子项-1</li><li class="mui-table-view-cell">第饮食个选项卡子项-2</li><li class="mui-table-view-cell">第饮食个选项卡子项-3</li><li class="mui-table-view-cell">第饮食个选项卡子项-4</li><li class="mui-table-view-cell">第饮食个选项卡子项-5</li></ul>';
            // var html3 =
            //     '<ul class="mui-table-view"><li class="mui-table-view-cell">第注意个选项卡子项-1</li><li class="mui-table-view-cell">第注意个选项卡子项-2</li><li class="mui-table-view-cell">第注意个选项卡子项-3</li><li class="mui-table-view-cell">第注意个选项卡子项-4</li><li class="mui-table-view-cell">第注意个选项卡子项-5</li></ul>';
            // var html4 =
            //     '<ul class="mui-table-view"><li class="mui-table-view-cell">第4个选项卡子项-1</li><li class="mui-table-view-cell">第4个选项卡子项-2</li><li class="mui-table-view-cell">第4个选项卡子项-3</li><li class="mui-table-view-cell">第4个选项卡子项-4</li><li class="mui-table-view-cell">第4个选项卡子项-4</li></ul>';
            // var html5 =
            //     '<ul class="mui-table-view"><li class="mui-table-view-cell">第5个选项卡子项-1</li><li class="mui-table-view-cell">第5个选项卡子项-2</li><li class="mui-table-view-cell">第5个选项卡子项-3</li><li class="mui-table-view-cell">第5个选项卡子项-5</li><li class="mui-table-view-cell">第4个选项卡子项-5</li></ul>';

            // var item2 = document.getElementById('item2mobile');
            // var item3 = document.getElementById('item3mobile');
            // var item4 = document.getElementById('item4mobile');
            // var item5 = document.getElementById('item5mobile');
            // document.getElementById('slider').addEventListener('slide', function (e) {
            //     if (e.detail.slideNumber === 1) {
            //         if (item2.querySelector('.mui-loading')) {
            //             setTimeout(function () {
            //                 item2.querySelector('.mui-scroll').innerHTML = html2;
            //             }, 500);
            //         }
            //     } else if (e.detail.slideNumber === 2) {
            //         if (item3.querySelector('.mui-loading')) {
            //             setTimeout(function () {
            //                 item3.querySelector('.mui-scroll').innerHTML = html3;
            //             }, 500);
            //         }
            //     } else if (e.detail.slideNumber === 3) {
            //         if (item4.querySelector('.mui-loading')) {
            //             setTimeout(function () {
            //                 item4.querySelector('.mui-scroll').innerHTML = html4;
            //             }, 500);
            //         }
            //     } else if (e.detail.slideNumber === 4) {
            //         if (item5.querySelector('.mui-loading')) {
            //             setTimeout(function () {
            //                 item5.querySelector('.mui-scroll').innerHTML = html5;
            //             }, 500);
            //         }
            //     }
            // });
            // var sliderSegmentedControl = document.getElementById('sliderSegmentedControl');
            // // $('.mui-input-group').on('change', 'a', function () {
            // //     // if (this.checked) {
            // //         sliderSegmentedControl.className =
            // //             'mui-slider-indicator mui-segmented-control mui-segmented-control-inverted mui-segmented-control-' +
            // //             this.value;
            // //         sliderProgressBar.setAttribute('style', sliderProgressBar.getAttribute('style'));
            // //     // }
            // // });

            // });
        })(mui);
    </script>
   

</body>

</html>