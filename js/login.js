$(function(){
    /* 用户登录
        1获取登录按钮并添加点击事件
        2获取用户输入的表单信息
        3调用登录接口实现表单登陆
        4如果用户登陆成功跳转到会员中心
*/
$("#login-btn").on('click',function(){
    // trim()去除字符串两边的空格
    var username = $.trim($("[name='username']").val());
    var password = $.trim($("[name='password']").val());
    if(!username){
        mui.toast("请输入用户名");
        return;
    }
    if(!password){
        mui.toast("请输入密码");
        return;
    }

    $.ajax({
        url:"/user/login",
        type:"post",
        data:{
            username:username,
            password:password
        },
        // beforeSend有时会有问题 return false 会触发error函数
        //  $("#login-btn").html("正在登陆。。。。");  可写外面
        beforeSend:function(){
            $("#login-btn").html("正在登陆...");
        },
        success:function(res){
            console.log(res);
            //注意此处   没有进行数据验证  未做判断  不健壮
            mui.toast("登陆成功");
            // 登陆成功后按钮内容修改为登陆
            $("#login-btn").html("登陆");
    
            setTimeout(function(){
                location.href="user.html";
            },2000);
            }
    
        });
});


});