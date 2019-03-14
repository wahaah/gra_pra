// 此方法用于js中
/* window.onload=function(){

} */

// jq中  zepto适用于移动端
// 当页面的dom结构加载完后，执行回调函数中代码
$(function(){
    //滚动条 初始化区域
    mui('.mui-scroll-wrapper').scroll({
        deceleration: 0.0005 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
    });

    // 获取一级分类数据
    $.ajax({
        url:"/category/queryTopCategory",
        type:"get",
        success:function(res){
            /* 模板引擎作用是 */
            console.log(res);
            /* 将数据和HTML做拼接
            1HTML模板
            2数据
            3告诉模板引擎 HTML模板 数据
            两个如何连接
             */
            // result  相当数组   模板中第二个参数为对象
            var html = template("category-first",{result:res.rows});
            // console.log(html);
            $(".links").html(html);

            /* 一获取数据默认选中第一个 */
            // 如果一级分类有数据的话
            if(res.rows.length){
                // 给第一个一级分类添加选中状态样式
                $('#links').find('a').eq(0).addClass("active");

                // 获取第一个一级分类的id
                var id = res.rows[0].id;
                /* 此时再调用二级页面的加载 */
                getSecondCategory(id);

              /*   $.ajax({
                    type:"get",
                    url:"/category/querySecondCategory",
                    data:{
                        id:id
                    },
                    success:function(res){
                        console.log(res);
                        var html = template("category-second",res);
                            // 返回的就是对象类型
                        // console.log(html);
                        $(".brand-list").html(html);
                        
                    }
            
                }); */
            }
        }
    });


    /* 点击一级分类数据获取二类数据 */
    /* 1一级分类添加点击事件
    2事件处理函数中获得一级id
    3.调用二级分类接口获取对应数据
    4将数据展示到对应位置
    5如果接口中没有数据，要在页面中显示暂无数据 */

    /*1.一级分类的a标签一开始没在页面中 列表是动态渲染的，用事件委托来做 */
   $("#links").on("click","a",function(){
    //    2.获取当前点击的一级分类id
    var id = $(this).attr('data-id');
    // console.log(id);
    /* 给当前点击的一级分类添加选中状态 */
    $(this).addClass('active').siblings().removeClass("active");
   
    // 3.调用接口获取数据
    getSecondCategory(id);
    // $.ajax({
    //     type:"get",
    //     url:"/category/querySecondCategory",
    //     data:{
    //         id:id
    //     },
    //     success:function(res){
    //         console.log(res);
    //         var html = template("category-second",res);
    //             // 返回的就是对象类型
    //         // console.log(html);
    //         $(".brand-list").html(html);
            
    //     }

    // });
    
   });

});

/* 根据一级分类id获取二级分类 */
function getSecondCategory(id){
    $.ajax({
        type:"get",
        url:"/category/querySecondCategory",
        data:{
            id:id
        },
        success:function(res){
            /* 用mui('.mui-scroll-wrapper').scroll() 在控制台输入可返回使用的滚动条*/

            // 为了当一个页面滑倒底部防止点击另一个则出现空白,需要调回顶部
            
            // 由于页面用了两个滚动条,类名相同,要加[1]  第三个参数可省略
            // mui('.mui-scroll-wrapper').scroll()[1].scrollTo(0,0,1000);//100毫秒滚动到顶
            mui('.mui-scroll-wrapper').scroll()[1].scrollTo(0,0);//100毫秒滚动到顶
            // console.log(res);
            var html = template("category-second",res);
                // 返回的就是对象类型
            console.log(html);
            $(".brand-list").html(html);
            
        }

    });
}