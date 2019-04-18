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
    <title>BMI曲线图</title>
    <!-- 为了设置视口 -->
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="stylesheet" href="assets/mui/css/mui.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css">
    <script src="assets/mui/js/mui.min.js"></script>
    <script src="assets/zepto/zepto.min.js"></script>
    <script src="js/public.js"></script>

    <script src="assets/js/template-native.js"></script>

    <style>
        .chart {
            height: 200px;
            margin: 0px;
            padding: 0px;
        }

        h5 {
            margin-top: 30px;
            font-weight: bold;
        }

        h5:first-child {
            margin-top: 15px;
        }
        .bmi-desc{
            color: pink;
        }
    </style>
</head>

<body>
    <header class="mui-bar mui-bar-nav my-header">
        <a href="#" class="mui-icon mui-icon-arrowleft mui-pull-left"></a>

        <h1 class="mui-title">曲线图</h1>
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
        <div class="mui-content-padded">
            <p style="text-indent: 22px;">
                <!-- 这是mui集成百度ECharts的图表示例，ECharts的详细用法及 API 请参考其官方网站: -->
                <!-- <a id='echarts' data-url='http://echarts.baidu.com'>http://echarts.baidu.com</a> -->
                <a id='echarts' class="bmi-desc" data-url='' href='bmi-desc.php'>BMI曲线图</a>
                <!-- BMI曲线图BMI曲线图S -->
            </p>
        </div>
        <div class="mui-content-padded">
            <h5>线图示例</h5>
            <div class="chart" id="lineChart"></div>
        </div>

    </div>
    <script src="assets/mui/js/echarts-all.js"></script>
    <script>
    // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        
        var getOption = function (chartType) {
            //利用三目判断根据图形的样式选取不同类型的数据，bar和line的数据格式相同，pie格式与前两者不同
            var chartOption = chartType == 'pie' ? {
                calculable: false,
                series: [{
                    name: '访问来源',
                    type: 'pie',
                    radius: '70%', //管理图形大小占比的
                    center: ['50%', '50%'], //管理图形水平位置的
                    data: [{
                        value: 335,
                        name: '直接访问'
                    }, {
                        value: 310,
                        name: '邮件营销'
                    }, {
                        value: 234,
                        name: '联盟广告'
                    }, {
                        value: 135,
                        name: '视频广告'
                    }, {
                        value: 1548,
                        name: '搜索引擎'
                    }]
                }]
            } : {
                legend: { //标题
                    // data: ['体重', '体温']
                    data: ['体重(kg)','体温(℃)','高压(mmgh)','低压(mmgh)','心率(跳)']
                },
                color:[
                    '#FF3333',    //温度曲线颜色
                    '#53FF53',    //湿度曲线颜色
                    '#B15BFF',    //压强图颜色
                    '#68CFE8',    //雨量图颜色
                    '#FFDC35',   //风速曲线颜色
                ],
                grid: {
                    x: 35,
                    x2: 10,
                    y: 30,
                    y2: 25
                },
                toolbox: { //工具箱
                    show: false,
                    feature: {
                        mark: {
                            show: true
                        },
                        dataView: {
                            show: true,
                            readOnly: false
                        },
                        magicType: {
                            show: true,
                            type: ['line', 'bar']
                        },
                        restore: {
                            show: true
                        },
                        saveAsImage: {
                            show: true
                        }
                    }
                },
                calculable: false,
                //横纵轴刻度
                // xAxis: [{
                // 		type: 'category',
                // 		data: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
                // 	}],
                xAxis: [{//x轴
                    type: 'category',
                    // data: ['1号', '2号', '3号', '4号', '5号', '6号', '7号', '8号', '9号', '10号',
                    //     '11号', '12号', '13号', '14号', '15号', '16号', '17号', '18号', '19号', '20号',
                    //     '21号', '22号', '23号', '24号', '25号', '26号', '27号', '28号', '29号', '30号'
                    // ],
                    data: [] //先设置数据值为空，后面用Ajax获取动态数据填入
                }],
                yAxis: [{
                    type: 'value',
                    // splitArea: {
                        // show: true,
                        // min: 35,
                        // max: 40,
                        name : '体温',
                        axisLabel : {
                            formatter: '{value} ℃'    //控制输出格式
                        // }
                    }
                },
                    {
                            //第二个（右边）Y轴，yAxisIndex为1
                             type : 'value',
                             name : '血压',
                             scale: true,
                             axisLabel : {
                                 formatter: '{value} mmhg'
                             }
                }],
                //显示数据  此处数据名的名称还要与标题的名称相对应，否则无法显示
                series: [//系列（内容）列表     
                        {
                        name: '体重',
                        // type: chartType,
                        type: 'line',
                        symbol:'emptycircle',    //设置折线图中表示每个坐标点的符号；emptycircle：空心圆；emptyrect：空心矩形；circle：实心圆；emptydiamond：菱形     
                        data: [
                        //     112.0, 114.9, 114.0, 117.2, 113.6, 116.7, 115.6, 112.2, 112.6, 117.0,
                        //  116.4, 113.3, 117.0, 113.2, 115.6, 116.7, 115.6, 112.2, 112.6, 115.0,
                        //  116.4, 113.3, 117.0, 114.2, 115.6,116.7, 115.6, 112.2, 112.6, 120.0,
                         ],
                         
                    },
                    {
                        name: '体温',
                        // type: chartType,
                        type: 'line',
                        symbol:'emptycircle',
                        // data: [36.6, 35.9, 37.0, 36.4, 36.7, 36.7, 35.9, 36.2, 36.7, 36.8,
                        //     36.0, 37.0, 36.8, 37.4, 38.0, 38.2, 37.6, 37.0, 37.0, 36.8,
                        //     36.0, 36.3, 36.0, 36.4, 36.7, 36.7, 35.6, 36.2, 36.7, 36.8
                        // ],
                        data:[],
                      
                    },
                    {
                        name: '高压',
                        // type: chartType,
                        type: 'line',
                        symbol:'circle',
                        data:[],
                      
                    },
                    {
                        name: '低压',
                        // type: chartType,
                        type: 'line',
                        symbol:'circle',
                        data:[],
                      
                    },
                    {
                        name: '心率',
                        // type: chartType,
                        type: 'line',
                            symbol:'emptydiamond',
                        data:[],
                      
                    },
                ]
            };
            return chartOption;
        };
        // myChart.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var weight=[];        //温度数组（存放服务器返回的所有温度值）
         var tems=[];        //湿度数组
         var gaoya=[];        //压强数组
         var diya=[];        //雨量数组
         var heart=[];    //风速数组
         var ctime=[];        //时间数组
         $.ajax({
            url:"api/_getTestData.php",
            type:"get",
            success:function(res){
                
                console.log(res.data[i].weight);
                if(res.code == 1){
                    
                    for(var i=0;i<res.data.length;i++){
                        weight.push(res.data[i].weight);
                        tems.push(res.data[i].tem);
                        gaoya.push(res.data[i].gao_blood);
                        diya.push(res.data[i].di_blood);
                        heart.push(res.data[i].heart);
                        ctime.push(res.data[i].ctime);
                    }
                    myChart.setOption({        //载入数据
                        xAxis: {
                            data: ctime    //填入X轴数据
                        },
                        series: [    //填入系列（内容）数据
                                      {
                                    // 根据名字对应到相应的系列
                                    name: '体重',
                                    data: weight
                                },
                                      {
                                    name: '体重',
                                    data: tems
                                },
                                    {
                                    name: '高压',
                                    data: gaoya
                                },
                                    {
                                    name: '低压',
                                    data: diya
                                },
                                    {
                                name: '时间',
                                data: ctime
                               },
                       ]
                    });
                    
             },
            //  else {
            //      //返回的数据为空时显示提示信息
            //      alert("图表请求数据为空，可能服务器暂未录入近五天的观测数据，您可以稍后再试！");
            //        myChart.hideLoading();
            //  }
         
        }),
                // }
                
                // console.log(res.data);
                // myChart.hideLoading();    //隐藏加载动画
                
            // }
        })

        var byId = function (id) {
            return document.getElementById(id);
        };
        // var barChart = echarts.init(byId('barChart'));
        // barChart.setOption(getOption('bar'));
        var lineChart = echarts.init(byId('lineChart'));
        lineChart.setOption(getOption('line'));
        // var pieChart = echarts.init(byId('pieChart'));
        // pieChart.setOption(getOption('pie'));
        byId("echarts").addEventListener('tap', function () {
            var url = this.getAttribute('data-url');
            plus.runtime.openURL(url);
        }, false);
    </script>
</body>
<script>
    $(function(){
        // $.ajax({
        //     url:"api/_getTestData.php",
        //     type:"get",
        //     success:function(res){
        //         console.log(res);
                
        //     }
        // })
    })
</script>

</html>