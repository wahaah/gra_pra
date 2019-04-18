$(function(){
    // 页面刚一加载就发送一次ajax请求
    getPhoto();
    function getPhoto(){
        $.ajax({
            type:"get",
            url:"api/_chanjian.php",
            success:function(res){
                if(res.code ==1){
                        var html = template("chanjianTemp", {
                                "items": res.data,
                            });
                        document.querySelector(".mui-table-view").innerHTML = html;
                    }
            }
        
        })
    }

/* function uploadsphoto(){
    $("#my_img").on("change",function(){

        // console.log(112);
        var ctime = moment().format("YYYY-MM-DD hh:mm:ss");

        // 拿取图片的路径  方法1
        var imgurl = $("#my_img").val();
        console.log(imgurl);//C:\fakepath\20150506094242_U2Fyj.jpeg
        var url = imgurl.substr(12);
        console.log(url);//20150506094242_U2Fyj.jpeg
        var img = "img/"+url;
        console.log(img);
        
        $.ajax({
            url:"api/_uploadfile.php",
            type:"post",
            data:{
                ctime:ctime,
                img:img,
            },
            success:function(res){
                if(res.code == 1){
                    getPhoto();
                }

            },
        });


    });
}; */



});