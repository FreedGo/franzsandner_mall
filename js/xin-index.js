/**
 * Created by Freed on 2017/2/8.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */
/**
 * 页面加载的时候,1.三级联动加载到地区,2.按排序加载琴行
 */
function getCountry(){
	var countryId;
	// 第一步,向高德API发送请求并获得访问者所在省份
	$.ajax({
		type: "get",
		//url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
		url:'http://www.franzsandner.com/zjk/ip/index.php',
		dataType: 'json',
		async:false,
		// contentType:'application/x-www-form-urlencoded;charset=UTF-8',
		success: function(data) {
			countryId =data.data.country_id;
			console.dir(countryId);
			if (countryId !== "CN"&&countryId !== "TW"){
				countryId = "EN"
			};
			switch (countryId){
				case 'CN':
//					window.location.herf = 'http://www.franzsandner.com/';
					break;
				case 'TW':
					window.location.href = 'http://tw.franzsandner.com/';
					break;
				case 'EN':
					window.location.href = 'http://en.franzsandner.com/';
					break;
				default:
					window.location.href = 'http://www.franzsandner.com/';

			}
		}
	});

}

getCountry();