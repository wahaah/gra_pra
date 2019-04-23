<?php
    require_once 'all/config.php';
    require_once 'all/functions.php';
    // 验证是否已经登录
    checkLogin();
?>
<?php 
    require_once 'all/config.php';
    require_once 'all/functions.php';
    // 链接数据库
    $connect = connect();
    // sql语句
    $sql = "SELECT * FROM eating LIMIT 4";
    // 调用封装好的查询函数来进行查询
    $arr = query($connect,$sql);
    // print_r($arr);
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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css">
    <link rel="stylesheet" href="css/eat.css">

    <script src="assets/mui/js/mui.min.js"></script>
    <script src="assets/zepto/zepto.min.js"></script>
    <script src="js/public.js"></script>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>
        <h1 class="mui-title">能不能吃</h1>
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
            <span class="mui-icon fa fa-map-o"></span>
            <span class="mui-tab-label">公告咨询</span>
        </a>
        <a class="mui-tab-item" href="user.php">
            <span class="mui-icon mui-icon-person"></span>
            <span class="mui-tab-label">个人中心</span>
        </a>
    </nav>
    <div class="mui-content">
        <div class="foods-list">
            <?php foreach($arr as $value):?>
            <div class="foods-item">
                <a href="detail.php?id=<?php echo $value['id'] ?>">
                    <div class="food">
                        <img src="<?php echo $value['img'] ?>">
                    </div>
                </a>
                <div class="title"><?php echo $value['name'] ?></div>
                <div class="sub">
                    <p class="flag">
                        <span class=" '<?php echo $value['flag']==1 ?>?yes:no' mui-icon mui-icon-checkmarkempty">能吃</span>
                        <del><span class=" mui-icon mui-icon-closeempty">不能吃</span></del>
                    </p>
                </div>
            </div>
            <?php endforeach ?>
            <!-- <div class="foods-item">
                <div class="food">
                    <img src="img/樱桃.jpg">
                </div>
                <div class="title">樱桃</div>
                <div class="sub">
                    <p class="flag">
                        <span class="yes mui-icon mui-icon-checkmarkempty">能吃</span>
                        <del><span class="no mui-icon mui-icon-closeempty">不能吃</span></del>
                    </p>

                </div>
            </div>
            <div class="foods-item">
                <div class="food">
                    <img src="img/猕猴桃.jpg">
                </div>
                <div class="title">猕猴桃</div>
                <div class="sub">
                    <p class="flag">
                        <span class=" mui-icon mui-icon-checkmarkempty">能吃</span>
                        <del><span class="yes  mui-icon mui-icon-closeempty">不能吃</span></del>
                    </p>

                </div>
            </div>
            <div class="foods-item">
                <div class="food">
                    <img src="img/西瓜.jpg">
                </div>
                <div class="title">西瓜</div>
                <div class="sub">
                    <p class="flag">
                        <span class="mui-icon mui-icon-checkmarkempty">能吃</span>
                        <del><span class="yes mui-icon mui-icon-closeempty">不能吃</span></del>
                    </p>

                </div>
            </div> -->
            <div class="loadmore"></div>
        </div>
        <button type="danger" size="large" class="btn">加载更多...</button>
    </div>


</body>
<script>
    $(function(){
        // 定义一个变量，记录当前是第几次获取数据
        var currentPage = 1;
        // 给加载更多按钮注册点击事件
        $(".btn").on("tap",function(){
            // console.log(111);
            // 每次点击加载更多，都是获取下一次的数据
            currentPage++;
            // 请求后台，加载更多当前分类的数据
            
            $.ajax({
                url:"api/_getmore.php",
                type:"post",
                data:{
                    currentPage:currentPage,
                    pageSize:4
                },
                success:function(res){
                    console.log(res);
                    // 判断请求有没有数据
                    if(res.code ==1){
                        // 遍历数组，动态生成结构
                        var data = res.data;
                        
                        // jquery方法each
                        $.each(data,function(index,val){
                            var str = '<div class="foods-item">\
                                    <a href="detail.php?id='+val['id']+'">\
                                        <div class="food">\
                                            <img src="'+val['img']+'">\
                                        </div>\
                                    </a>\
                                    <div class="title">'+val['name']+'</div>\
                                <div class="sub">\
                                    <p class="flag">\
                                        <span class="yes mui-icon mui-icon-checkmarkempty">能吃</span>\
                                        <del><span class="no mui-icon mui-icon-closeempty">不能吃</span></del>\
                                    </p>\
                                </div>\
                                </div>';
                                var foodsItem = $(str);
                                // console.log(foodsItem);
                                foodsItem.insertBefore('.loadmore')
                                

                        })
                    }else{
                        mui.toast("数据已加载完毕")
                    }
                }

            });
        })
    });
</script>
</html>