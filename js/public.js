$(function(){
    // 恢复a元素的跳转
    // 要保证a标签的功能在页面一上来就具有跳转功能
    // 动态生成的结构需要用事件委托来做
    $("body").on("tap","a",function(){
        // mui.openWindow()方法就是用来跳转页面的
        mui.openWindow({
            url:$(this).attr("href")
        });
    })
});