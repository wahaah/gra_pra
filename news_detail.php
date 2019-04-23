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
        .mui-content {
            padding : 0 5px;
        }
        .mui-content h1{
            font-size :18px;
            line-height: 26px;
            margin-bottom: 15px;
        }
        .mui-content img {
            width :100%;
        }
        .footer {
            height : 40px;
            line-height:40px;
            background-color:#eee;
            display: flex;
        }
        .footer p {
            text-align : center;
            flex:1;
            /* float: left; */
        }
    </style>
</head>

<body>
	<header class="mui-bar mui-bar-nav my-header">
            <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

		<h1 class="mui-title">资讯</h1>
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
        <!-- <h1>孕期饮食禁忌，这三种食物不仅胎儿不喜欢,对孕妈也不好,别吃了</h1>
        <div class="content">
            <p>女人怀孕之后，为了能让宝宝发育更加健康，所以在饮食上会变得小心翼翼，因为怀孕的女人大多都听说过，孕期有很多饮食禁忌的，所以女人在怀孕之后一定要掌握好自己能吃什么，不能吃什么。今天小编就给大家介绍一下孕期的三项饮食禁忌，孕妈就别吃了。</p>
            <img src="img/news/1.jpg" alt="">
            <p>孕期饮食禁忌，这3种食物不仅胎儿不喜欢，对孕妈也不好，别吃了</p>

            <p>第一种：杏仁
                怀孕后孕妈为了确保胎宝宝的健康发育，所以要经常食用一些坚果，特别是胎宝宝大脑发育的关键时期，吃一些果更有利于胎儿的大脑发育，促进补充体内的营养物质。
                但是坚果也是有一些是不能吃的，特别是微信之后还有神经性毒素，吃了可能会伤害到宝宝的健康，特别是苦杏仁，还有这毒素是比较多的，很有可能会造成胎儿流产。</p>
            <img src="img/news/2.jpg" alt="" srcset="">
            <p>第二种：发芽的土豆
                相信生活中很多人都特别喜欢吃土豆，特别是土豆丝受我们的喜爱。土豆是有很多好处的，不仅能够增加饱腹感，减少其他食物摄入，有利于减肥，而且土豆中含有大量的营养物质，吃多了也不会长肉。但是我们一定要注意土豆不要吃发芽的，因为发芽的土豆可能会导致人体中毒，进而伤害到了胎儿的健康。</p>
            <img src="img/news/3.jpg" alt="">
            <p>第三种：地瓜皮
                冬天是一个吃地瓜的季节，在街上可能经常看到那些卖地瓜的老大爷，很多人根本抵抗不住烤地瓜的浓浓香气。虽然说孕妈可以杀了吃地瓜，但是吃地瓜的时候尽量不要吃到地瓜皮，因为地瓜皮是在土里生长的，可能会有一些细菌和病毒的地瓜皮上，孕妈最好不要吃。</p>
            <img src="img/news/4.jpg" alt="">
        </div> -->
        <div class="footer">
            <p>👍赞</p>
            <p>😔不感兴趣</p>
        </div>
	</div>
    </body>
    <script>
        $(function(){
            var url = window.location.search;//?id=2
            // console.log(url);
            // var id = url.substr(4);
            var id = Number(url.substr(4));
            // console.log(id);
            $.ajax({
                type:"post",
                url:"api/_getnewsDetail.php",
                data:{
                    id:id,
                },
                success:function(res){
                    console.log(res);
                    if(res.code == 1){
                        // 遍历数组，动态生成结构
                        var data = res.data;
                        console.log(data);
                        
                        $.each(data,function(index,val){
                            var str = `<h1>${val['title']}</h1>
                                      <img style="height:220px;" src="${val['img']}" alt="">
                                <div class="content">
                                    <p>${val['t1']}</p>
                                    <img src="${val['img1']}" alt="">
                                    <p>${val['con1']}</p>

                                    <p>${val['t2']}</p>
                                    <img src="${val['img2']}" alt="">
                                    <p>${val['con2']}</p>
                                    
                                    <p>${val['t3']}</p>
                                    <img src="${val['img3']}" alt="">
                                    <p>${val['con3']}</p>

                                    <p>${val['t4']}</p>
                                    <img src="${val['img4']}" alt="">
                                    <p>${val['con4']}</p>
                                </div>`;
                        var detailItem = $(str);
                        // console.log(foodsItem);
                        detailItem.insertBefore('.footer');


                        })
                    }

                }
            })
        })
    </script>
	</html>