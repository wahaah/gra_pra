<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="assets/mui/css/mui.min.css">
    <!-- <link rel="stylesheet" href="css/mui.min.css" /> -->

    
    <!-- <script src="assets/mui/js/mui.min.js"></script> -->
	<script src="assets/zepto/zepto.min.js"></script>
   
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/mui/js/mui.min.js"></script>
</head>
<body>
        <img class="mui-media-object mui-pull-left head-img" id="head-img" src="img/icon-40.png">

</body>
<script >
//   window.onload=function(){
      
//   }
$(function(){
    /*点击头像触发*/
document.getElementById('head-img').addEventListener('tap', function() {
    if(mui.os.plus) {
        var a = [{
            title: "拍照"
    }, {
        title: "从手机相册选择"
    }];
    plus.nativeUI.actionSheet({
        title: "修改用户头像",
        cancel: "取消",
        buttons: a
    }, function(b) { /*actionSheet 按钮点击事件*/
        switch(b.index) {
        case 0:
            break;
        case 1:
            getImage(); /*拍照*/
            break;
        case 2:
            galleryImg(); /*打开相册*/
            break;
        default:
            break;
        }
    })
    }
}, false);
//拍照
function getImage() {
    var cmr = plus.camera.getCamera();
    var res = cmr.supportedImageResolutions[0];
    var fmt = cmr.supportedImageFormats[0];
    cmr.captureImage(function(path) {
        //plus.io.resolveLocalFileSystemURL(path, function(entry) {  
    plus.io.resolveLocalFileSystemURL(path, function(entry) {
        var localUrl = entry.toLocalURL();
        uploadHead(localUrl + "?version=" + new Date().getTime());
    }, function(err) {
        console.error("拍照失败：" + err.message);
    }, {
        index: 1
    });
    });
} 
//本地相册选择
function galleryImg() {
    plus.gallery.pick(function(a) {
    plus.io.resolveLocalFileSystemURL(a, function(entry) {
        plus.io.resolveLocalFileSystemURL("_doc/", function(root) {
        root.getFile("head.png", {}, function(file) {
            //文件已存在
            file.remove(function() {
            console.log("file remove success");
            entry.copyTo(root, 'head.png', function(e) {
                var e = e.fullPath + "?version=" + new Date().getTime();
                uploadHead(e); /*上传图片*/
                //变更大图预览的src
                //目前仅有一张图片，暂时如此处理，后续需要通过标准组件实现
                },function(e) {
                            console.log('copy image fail:' + e.message);
            });
            }, function() {
            console.log("delete image fail:" + e.message);
            });
        }, function() {
            //文件不存在
            entry.copyTo(root, 'head.png', function(e) {
            var path = e.fullPath + "?version=" + new Date().getTime();
            uploadHead(path); /*上传图片*/
            },function(e) {
            console.log('copy image fail:' + e.message);
            });
        });
        }, function(e) {
        console.log("get _www folder fail");
        })
    }, function(e) {
        console.log("读取拍照文件错误：" + e.message);
    });
    }, function(a) {}, {
    filter: "image"
    })
};

//上传头像图片
function uploadHead(imgPath) {
    var image = new Image();
    image.src = imgPath;
    image.onload = function() {
    var imgData = getBase64Image(image);
    console.log(imgData);
    /*在这里调用上传接口*/
    //mui.ajax("图片上传接口", {
        //data: {
        //img: imgData
        //},
        //dataType: 'json',
        //type: 'post',
        //timeout: 10000,
        //success: function(data) {
        //mui.toast('上传成功',{
            //duration:'long',
            //type:'div'
        //});
                //document.getElementById('head-img').src = imgPath;
        //document.getElementById('head-img1').src = imgPath;
        //document.getElementById('head-img2').src=imgPath;
        //}, 
            //error: function(xhr, type, errorThrown) {
        //mui.toast('网络异常，请稍后再试！');
        //}
    //});
    }
}
//将图片压缩转成base64
function getBase64Image(img) {
    var canvas = document.createElement("canvas");
    var width = img.width;
    var height = img.height;
    // calculate the width and height, constraining the proportions
    if(width > height) {
    if(width > 100) {
        height = Math.round(height *= 100 / width);
        width = 100;
    }
    } else {
    if(height > 100) {
        width = Math.round(width *= 100 / height);
        height = 100;
    }
    }
    canvas.width = width; /*设置新的图片的宽度*/
    canvas.height = height; /*设置新的图片的长度*/
    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0, width, height); /*绘图*/
    var dataURL = canvas.toDataURL("image/png", 0.8);
    return dataURL.replace("data:image/png;base64,", "");
}
});
</script>
</html>