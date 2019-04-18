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
    <script src="assets/js/jquery-1.8.3.min.js"></script>

    <script src="assets/zepto/zepto.min.js"></script>
    <script src="js/public.js"></script>
    <style>
			.imageup{ position: absolute; margin:auto;left:0px;top:0;right:0;bottom:0; width:100px; height: 36px; line-height:36px; color: #000; border-radius: 5px; border:1px #ddd solid; text-align:center;font-size:20px;;}
	</style>
</head>

<body>
    <?php include_once 'public/_header.php' ?>

    <!-- <header class="mui-bar mui-bar-nav my-header">
        <h1 class="mui-title">乐</h1>
        <a class="mui-icon mui-icon-search mui-pull-right"></a>
    </header>
    <nav class="mui-bar mui-bar-tab my-footer">
        <a class="mui-tab-item mui-active" href="index.html">
            <span class="mui-icon mui-icon-home"></span>
            <span class="mui-tab-label">首页</span>
        </a>
        <a class="mui-tab-item" href="test.html">
            <span class="mui-icon fa fa-heartbeat"></span>
            <span class="mui-tab-label">体质检测</span>
        </a>
        <a class="mui-tab-item" href="news.html">
            <span class="mui-icon fa fa-map-o"></span>
            <span class="mui-tab-label">公告咨询</span>
        </a>
        <a class="mui-tab-item" href="user.html">
            <span class="mui-icon mui-icon-person"></span>
            <span class="mui-tab-label">个人中心</span>
        </a>
    </nav> -->
    <div class="mui-content">
            <a href="javascript:void(0);" class="imageup">上传图片</a>


            <!-- <li class="mui-table-view-cell infoName">
                    <a class="mui-navigate-right" id="headImage"  href="#">头像</a>
                    <img class="userImg" src="./img/icon-40.png" />
                </li> -->

        <!-- <li class="mui-table-view-cell infoName">
            <a class="mui-navigate-right" id="userImg"  href="#">头像</a>
            <img class="userImg" src="./img/icon-40.png" />
        </li> -->


        <!-- <form action="" method="post" enctype="multipart/form-data">
            <input type="file" onchange="uploadImg(this,'behindeImg')" class="comFileBtn"  accept="image/*"/>
        </form> -->

        <!-- <label>
            　　　　<input style="opacity: 0;" type="file" accept="image/*" id="head_img_change" />
            　　　　<img id="headimg" src="./img/icon-40.png">
        </label> -->

    </div>
    <script>
            function plusReady(){
                  // 弹出系统选择按钮框
                  mui("body").on("tap",".imageup",function(){
                      page.imgUp();
                  })
                  
              }
               
              var page=null;
              page={
                  imgUp:function(){
                      var m=this;
                      plus.nativeUI.actionSheet({cancel:"取消",buttons:[
                          {title:"拍照"},
                          {title:"从相册中选择"}
                      ]}, function(e){//1 是拍照  2 从相册中选择
                          switch(e.index){
                              case 1:clickCamera();break;
                              case 2:clickGallery();break;
                          }
                      });
                  }
                  //摄像头
              }
              
              
       //发送照片
      
      function clickGallery() {
          plus.gallery.pick(function(path) {
              plus.zip.compressImage({
                  src: path,
                  dst: "_doc/chat/gallery/" + path,
                  quality: 20,
                  overwrite: true
              }, function(e) {
                  var task = plus.uploader.createUpload(server + "upload/chat", {
                      method: "post"
                  }, function(t, sta) {
                      console.log(JSON.stringify(t))
                      if(sta == 200) {
                          var msg = t.responseText;
                          var oImg = JSON.parse(msg);
                          var imgUrl = oImg.urls;
                          var re = new RegExp("\\\\", "g");
                          imgUrl = imgUrl.replace(re, "/");
                          uploadMsg(2, imgUrl);
                      }
                  });
                  task.addFile(e.target, {});
                  task.start();
              }, function(err) {
                  console.error("压缩失败：" + err.message);
              });
   
          }, function(err) {});
      };
      
      
      // 拍照
      
      function clickCamera() {
          var cmr = plus.camera.getCamera();
          var res = cmr.supportedImageResolutions[0];
          var fmt = cmr.supportedImageFormats[0];
          cmr.captureImage(function(path) {
              //plus.io.resolveLocalFileSystemURL(path, function(entry) {
              plus.io.resolveLocalFileSystemURL(path, function(entry) {
                  var localUrl = entry.toLocalURL();
                  plus.zip.compressImage({
                      src: localUrl,
                      dst: "_doc/chat/camera/" + localUrl,
                      quality: 20,
                      overwrite: true
                  }, function(e) {
                      var task = plus.uploader.createUpload(server + "upload/chat", {
                          method: "post"
                      }, function(t, sta) {
                          if(sta == 200) {
                              var msg = t.responseText;
                              var oImg = JSON.parse(msg);
                              var imgUrl = oImg.urls;
                              var re = new RegExp("\\\\", "g");
                              imgUrl = imgUrl.replace(re, "/");
                              console.log(imgUrl);
                              uploadMsg(2, imgUrl);
                          }
                      });
                      task.addFile(e.target, {});
                      task.start();
                  }, function(err) {
                      console.log("压缩失败：  " + err.message);
                  });
              });
          }, function(err) {
              console.error("拍照失败：" + err.message);
          }, {
              index: 1
          });
      };
   
   
              
              
              if(window.plus){
                  plusReady();
              }else{
                  document.addEventListener("plusready",plusReady,false);
              }
  </script>
</body>
<!-- <script>
//     $(function(){

// 　　　　$("#head_img_change").change(function() {
// 　　　　　　var $file = $(this);
// 　　　　　　var fileObj = $file[0];
// 　　　　　　var windowURL = window.URL || window.webkitURL;
// 　　　　　　var dataURL;
// 　　　　　　var $img = $("#headimg");
// 　　　　　　if(fileObj && fileObj.files && fileObj.files[0]){
// 　　　　　　　　dataURL = windowURL.createObjectURL(fileObj.files[0]);
// 　　　　　　　　$img.attr('src',dataURL);
// 　　　　　　}else{
// 　　　　　　　　dataURL = $file.val();
// 　　　　　　　　var imgObj = document.getElementById("headimg");
// 　　　　　　　　// 1、在设置filter属性时，元素必须已经存在在DOM树中，动态创建的Node，也需要在设置属性前加入到DOM中，先设置属性再加入，无效；
// 　　　　　　　　// 2、src属性需要像下面的方式添加，上面的两种方式添加，无效；
// 　　　　　　　　imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
// 　　　　　　　　imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
// 　　　　　　}
// 　　　　});

// 　　})
document.getElementById('headImage').addEventListener('tap', function() {
    if (mui.os.plus) {
        var buttonTit = [{
            title: "拍照"
        }, {
            title: "从手机相册选择"
        }];
        
        plus.nativeUI.actionSheet({
            title: "上传图片",
            cancel: "取消",
            buttons: buttonTit
        }, function(b) { /*actionSheet 按钮点击事件*/
            switch (b.index) {
                case 0:
                    break;
                case 1:
                    getImage(); /*拍照*/
                    break;
                case 2:
                    galleryImg();/*打开相册*/
                    break;
                default:
                    break;
            }
        })
    }        
}, false);

            mui.plusReady(function(){
        document.getElementById('userImg').addEventListener('tap',function(){
            if(mui.os.plus){
                var a=[{
                    title:'拍照'
                },{
                    title:'从手机相册选择'
                }];
                plus.nativeUI.actionSheet({
                    title:'修改头像',
                    cancel:'取消',
                    buttons:a
                },function(b){
                    switch(b.index){
                        case 0:
                            break;
                        case 1:
                            //拍照
                            getImages();
                            break;
                        case 2:
                            //打开相册
                            galleryImages();
                            break;
                        default:
                            break;
                    }
                },false);   
            }
        });

        //拍照
        function getImages(){
            var mobileCamera=plus.camera.getCamera();
            mobileCamera.captureImage(function(e){
                plus.io.resolveLocalFileSystemURL(e,function(entry){
                    var path=entry.toLocalURL()+'?version='+new Date().getTime();
                    uploadHeadImg(path);
                },function(err){
                    console.log("读取拍照文件错误");
                });
            },function(e){
                console.log("er",err);
            },function(){
                filename:'_doc/head.png';
            });
        }

        //从本地相册选择
        function galleryImages(){
            console.log("你选择了从相册选择");
            plus.gallery.pick(function(a){
                plus.io.resolveLocalFileSystemURL(a,function(entry){
                    plus.io.resolveLocalFileSystemURL('_doc/',function(root){
                        root.getFile('head.png',{},function(file){
                            //文件已经存在
                            file.remove(function(){
                                console.log("文件移除成功");
                                entry.copyTo(root,'head.png',function(e){
                                    var path=e.fullPath+'?version='+new Date().getTime();
                                    uploadHeadImg(path);
                                },function(err){
                                    console.log("copy image fail: ",err);
                                });
                            },function(err){
                                console.log("删除图片失败：（"+JSON.stringify(err)+")");
                            });
                        },function(err){
                            //打开文件失败
                            entry.copyTo(root,'head.png',function(e){
                                var path=e.fullPath+'?version='+new Date().getTime();
                                uploadHeadImg(path);
                            },function(err){

                                console.log("上传图片失败：（"+JSON.stringify(err)+")");
                            });
                        });
                    },function(e){
                        console.log("读取文件夹失败：（"+JSON.stringify(err)+")");
                    });
                });
            },function(err){
                console.log("读取拍照文件失败: ",err);
            },{
                filter:'image'
            });
        };

        //上传图片
        function uploadHeadImg(imgPath){
            //选中图片之后，头像当前的照片变为选择的照片
            var mainImg=document.getElementById('userImg');
            mainImg.src=imgPath;


            var images=new Image();
            images.src=imgPath;
            var imgData=getBase64Image(images);
            mui.ajax('http://127.0.0.1/uploadHeadImg',{
                data:{
                    'imgDatas':imgData
                },
                dataType:'json',//服务器返回json格式数据
                type:'post',//HTTP请求类型
                timeout:10000,//超时时间设置为10秒；
                success:function(data){
                    if(data.status=='1'){
                        mui.alert('上传成功！');
                    }
                },
                error:function(xhr,type,errorThrown){
                    if(type=='timeout'){
                        mui.alert('服务器连接超时，请稍后再试');
                    }   
                }
            });
        }


        //压缩图片转成base64
        function getBase64Image(img){
            var canvas=document.createElement("canvas");
            var width=img.width;
            var height=img.height;
            if(width>height){
                if(width>100){
                    height=Math.round(height*=100/width);
                    width=100;
                }
            }else{
                if(height>100){
                    width=Math.round(width*=100/height);
                }
                height=100;
            }

            canvas.width=width;
            canvas.height=height;
            var ctx=canvas.getContext('2d');
            ctx.drawImage(img,0,0,width,height);

            var dataUrl=canvas.toDataURL('image/png',0.8);
            return dataUrl.replace('data:image/png:base64,','');
        }   
    });


    //上传图片
    // //that是该input，imgName是图片要显示的src的位置
    // function uploadImg(that,imgName){
    //     var reads= new FileReader();
    //     var fileObj=that.files[0];
    //     var imageType = /^image\//;
    //     //是否是图片，如果input没加accept属性，这里也可以判断
    //     if (!imageType.test(fileObj.type)) {
    //         alert("请选择图片！");
    //         return;
    //     }
    //     //读取完成
    //     reads.readAsDataURL(fileObj);
    //     reads.onload = function(e) {
    //         //图片路径设置为读取的图片
    //         $("#"+imgName).attr('src',e.target.result) ;
    //     };
    // }
</script> -->



</html>