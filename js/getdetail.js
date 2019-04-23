function getdetail(){
    var isClick = true;
    $("tbody").on("tap", "button", function () {
        var city = $("#input-serach").val();
        $.ajax({
            type: "get",
            url: "http://api.map.baidu.com/telematics/v3/weather",
            data: {
                "ak": "zVo5SStav7IUiVON0kuCogecm87lonOj",
                "location": "渭南",
                "output": 'json',
            },
            dataType: 'jsonp',
            // 默认使用success
            success: function (result) {
                // console.log(result);
                var html1 = template("detailTemp", {
                    "item1": result.results[0].index,
                });
                document.querySelector("#detail-box").innerHTML = html1;
            }
        })

        if (isClick) {
            $(".show").css("display", "block");
            isClick = false;
        } else {
            $(".show").css("display", "none");
            isClick = true;
        }

    });
}