<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <title>BMI曲线图</title> -->
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   <!-- 在IE运行最新的渲染模式 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">    <!-- 初始化移动浏览显示  -->
        <meta name="Author" content="Dreamer-1.">        
        <link rel="stylesheet" href="assets/mui/css/mui.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="assets/fontAwesome/css/font-awesome.css">
    <script src="assets/mui/js/mui.min.js"></script>
    <script src="assets/zepto/zepto.min.js"></script>
    <script src="js/public.js"></script>

        
        <script src="assets/js/jquery-1.8.3.min.js"></script>
        <!-- <script src="assets/mui/js/echarts-all.js"></script> -->
        <script type="text/javascript" src="js/echarts.common.min.js"></script>
    
        <!-- <script type="text/javascript" src="js/jquery-1.12.3.min.js"></script> -->
        <!-- <script type="text/javascript" src="js/echarts.common.min.js"></script> -->
    
    <title>- 观测数据 -</title>
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
        <!-- 显示Echarts图表 -->
        <div style="height:410px;min-height:100px;margin:0 auto;" id="main"></div>                        
                    
      
    </div>
        <script type="text/javascript">
            
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {    //图表标题
                text: '过去数据图表'
            },
            tooltip: {
                trigger: 'axis', //坐标轴触发提示框，多用于柱状、折线图中
              
            },
            dataZoom: [
                 {
                     type: 'slider',    //支持鼠标滚轮缩放
                     start: 0,            //默认数据初始缩放范围为10%到90%
                     end: 100
                 },
                 {
                     type: 'inside',    //支持单独的滑动条缩放
                     start: 0,            //默认数据初始缩放范围为10%到90%
                     end: 100
                 }
            ],
            legend: {    //图表上方的类别显示               
                show:true,
                data: ['体重(kg)','体温(℃)','高压(mmgh)','低压(mmgh)','心率(跳)']
                },
            color:[
                   '#FF3333',    //曲线颜色
                   '#53FF53',    //曲线颜色
                   '#B15BFF',    //图颜色
                   '#68CFE8',    //图颜色
                   '#FFDC35'    //曲线颜色
                   ],
            toolbox: {    //工具栏显示             
                show: true,
                feature: {                
                    saveAsImage: {}        //显示“另存为图片”工具
                }
            },
            xAxis:  {    //X轴           
                type : 'category',
                data : []    //先设置数据值为空，后面用Ajax获取动态数据填入
            },
            yAxis : [    //Y轴（这里我设置了两个Y轴，左右各一个）
                        {
                            //第一个（左边）Y轴，yAxisIndex为0
                             type : 'value',
                            //  name : '体温',
                             name : '刻度',
                             /* max: 120,
                             min: -40, */
                            //  axisLabel : {
                            //      formatter: '{value} ℃'    //控制输出格式
                            //  }
                         },
                        //  {
                        //     //第二个（右边）Y轴，yAxisIndex为1
                        //      type : 'value',
                        //      name : '血压',
                        //      scale: true,
                        //      axisLabel : {
                        //          formatter: '{value} mmgh'
                        //      }
                        //  }
                     
            ],
            series : [    //系列（内容）列表
                    {
                        name: '体重(kg)',
                        type: 'line',
                        symbol:'emptycircle',    //设置折线图中表示每个坐标点的符号；emptycircle：空心圆；emptyrect：空心矩形；circle：实心圆；emptydiamond：菱形     
                        data: [],
                         
                    },
                    {
                        name: '体温(℃)',
                        type: 'line',
                        symbol:'emptycircle',
                        data:[],
                      
                    },
                    {
                        name: '高压(mmhg)',
                        type: 'line',
                        symbol:'circle',
                        data:[],
                      
                    },
                    {
                        name: '低压(mmhg)',
                        type: 'line',
                        symbol:'circle',
                        data:[],
                      
                    },
                    {
                        name: '心率(跳)',
                        type: 'line',
                        symbol:'emptydiamond',
                        data:[],
                      
                    }
                ]
        };
         
        myChart.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
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
                // console.log(res.data[i].weight);
                if(res.code == 1){
                    
                    for(var i=0;i<res.data.length;i++) {
                        weight.push(res.data[i].weight);
                        tems.push(res.data[i].tem);
                        gaoya.push(res.data[i].gao_blood);
                        diya.push(res.data[i].di_blood);
                        heart.push(res.data[i].heart);
                        ctime.push(res.data[i].ctime);
                    }
                    myChart.hideLoading();    //隐藏加载动画
                    
                    myChart.setOption({        //载入数据
                        xAxis: {
                            data: ctime     //填入X轴数据
                        },
                         series: [    //填入系列（内容）数据
                                      {
                                    // 根据名字对应到相应的系列
                                    name: '体重',
                                    data: weight
                                },
                                      {
                                    name: '体温',
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
                                name: '心率',
                                data: heart
                               },
                       ]
                    });
                    
             }
             else {
                 //返回的数据为空时显示提示信息
                 alert("图表请求数据为空，可能服务器暂未录入近五天的观测数据，您可以稍后再试！");
                   myChart.hideLoading();
             }
        },
         error : function(errorMsg) {
             //请求失败时执行该函数
             alert("图表请求数据失败，可能是服务器开小差了");
             myChart.hideLoading();        
         }
    })

    myChart.setOption(option);    //载入图表
         
    </script>
        
    </body>
</html>