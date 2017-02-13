/*
* @Author: Freed
* @Date:   2016-05-22 10:54:43
* @e-mail:flyxz@126.com
* @Last Modified by:   Freed
* @Last Modified time: 2016-05-22 16:08:25
*/

$(function(){
	$('#dowebok').fullpage({
		sectionsColor: ['#f1f1f1', '#f1f1f1','#f1f1f1'],
		anchors: ['page1', 'page2', 'page3'],
		menu: '#menu',
		navigation: true,
		afterLoad: function(anchorLink, index){//开屏动画
			if (index == 1) {
				$('.head-warp').slideDown(680)
			};
			if(index == 2){//第二屏开始动画
				$('.section2').find('.index-news-up').eq(0).animate({
					left: '0'
				}, 1500, 'easeOutExpo');
				$('.section2').find('.index-news-up').eq(1).delay(500).animate({
					left: '0'
				}, 1500, 'easeOutExpo');
				$('.section2').find('.index-news-up').eq(2).delay(1000).animate({
					left: '0'
				}, 1500, 'easeOutExpo');
				$('.section2').find('.index-news-up').eq(3).delay(1500).animate({
					left: '0'
				}, 1500, 'easeOutExpo');

			}
			if(index == 3){//第三屏开始动画
				$('.section3').find('.piano-bg-warp').stop(true).animate({
					left: '0'
				}, 1500, 'easeOutExpo');
				$('.section3').find('.index-pinao-price').stop(true).delay(500).animate({
					left: '0'
				}, 1500, 'easeOutExpo');
				$('.section3').find('.index-pinao-show-halfpage-warp').stop(true).delay(1000).slideDown(1000);
				$('.section3').find('.halfpage2').stop(true).delay(1000).animate({
					right: '0'
				}, 1500, 'easeOutExpo');
				$('.section3').find('.halfpage1').stop(true).delay(1000).animate({
					right: '0'
				}, 1500, 'easeOutExpo');
			}
			if(index == 4){
				$('.section4').find('.index-violin-show').fadeIn(1000).animate({'width': 1200}, 1000);
				$('.section4').find('.index-violin-show-right').delay(1000).animate({'width': 700}, 1000);
				$('.section4').find('.violin-list-lit').delay(2000).animate({'left': 0}, 1000);
				$('.section4').find('.violin-list-big').delay(3000).animate({'left': 0}, 1000);
			}
			if(index == 5){
				$('.section5').find('.index-jita-show').fadeIn(1000).animate({'width': 1200}, 1000);
				$('.section5').find('.index-jita-show-right').delay(1000).animate({'width': 700}, 1000);
				$('.section5').find('.jita-list-lit').delay(2000).animate({'right': 0}, 1000);
				$('.section5').find('.jita-list-big').delay(3000).animate({'right': 0}, 1000);
			}
		},
		onLeave: function(index, direction){//离屏动画
			if (index == '1') {$('.head-warp').slideUp(680)};
		}
	});
	setInterval(function(){
        $.fn.fullpage.moveSlideRight();
    }, 6000);

	/**
	 * 页面加载的时候,1.三级联动加载到地区,2.按排序加载琴行
	 */
	function getCurrentCity(){
		var subCity1,//省
		    subCity2;//市
		// 第一步,向高德API发送请求并获得访问者所在省份
		$.ajax({
			type: "get",
			//url: "http://webapi.amap.com/maps/ipLocation?key=4a84cf8078fb847fd4072da2dbc9b6b7",//自己申请的高德key，2000次每天
			url:'http://restapi.amap.com/v3/ip?key=7a178998b6550b21f6a2fb88d3285fcd',
			dataType: 'text',
			// contentType:'application/x-www-form-urlencoded;charset=UTF-8',
			success: function(data) {
				//转换为JSON对象
				var jsonObj = eval("(" + data.replace('(','').replace(')','').replace(';','') + ")");
				//当前城市
				// $("#shenfen>p").html('当前:'+jsonObj.province);
				console.log(jsonObj);
				subCity1=jsonObj.province;
				subCity2 = jsonObj.city;
				// 第二步，向好琴声后台发送当前地址并接受返回的信息
				$.ajax({
					url: '/jiaoshi/index-ajax/index.ajax.php',
					type: 'post',
					data:{'addres': subCity2},
					success:function(msg) {
					}
				});
			}
		});
		getCurrentCity();
		// 自定义函数结束
	}
});