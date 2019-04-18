$(function(){
    function savephoto(){
        //拿取图片的路径 方法2

        var file = this.files[0];
        console.log(file)
        // jquery是无法直接把文件上传的，需要formdata配合上传
        var data = new FormData();
        // data.append("键","值")
        data.append("file",file);
        $.ajax({
            url:"api/_savephoto.php",
            type:"post",
            data:data,
            // 需要配置两个参数，设置jquery才能把文件带回服务器
            contentType:false,//只有设置这个参数，jquery才能把文件带回服务器
            processData:false,//告诉jq不要序列化我们的参数
            success:function(res){

            },
        });
}
})