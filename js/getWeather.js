function getdata(){
    $.ajax({
        // 跨域只能通过get来请求
        type: "post",
        // url: "http://api.map.baidu.com/telematics/v3/weather?location=" + city,
        url: "http://api.map.baidu.com/telematics/v3/weather",
        data: {
            "ak": "zVo5SStav7IUiVON0kuCogecm87lonOj",
            "location": "渭南",
            "output": 'json'
        },
        dataType: 'jsonp',
        // 默认使用success
        success: function (result) {
            console.log(result);
            // console.log(result.results[0].index)
          
                var html = template("weatherTemp", {
                    "items": result.results[0].weather_data,
                });
                document.querySelector("tbody").innerHTML = html;
          
        }

    })
}
