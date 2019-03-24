function userSave(){

    var forms=document.getElementById("forms");

    var ipts=document.getElementsByTagName('input')

    var arr = [];

    for(var i=0;i<ipts.length;i++){

      if(!ipts[i].value){

        alert("您有信息未填写")

        return false

      }else{

        var arr={};

        for(var i=0;i<ipts.length-1;i++){

           arr[i]=ipts[i].value

        }

      }

    } 

    console.log(arr)

   $.ajax({

        type : "POST",  //提交方式

        url : "table.php",//路径,www根目录下

        data: {

          "json":arr

        },

        DataType:"json",

        success : function() {

            alert("提交成功");

            console.log(this.data);



        }

    });

       for(var j=0;j<ipts.length-1;j++){

        ipts[j].value=""

      }

   return false

  }