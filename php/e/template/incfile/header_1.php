<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<script type="text/javascript">
	$(function() {
// 1.0 首页nav子菜单显示与隐藏	
	var m2 = $('#m2'),
		m3 = $('#m3'),
		m4 = $('#m4'),
		m2Son = $('#m2-son'),
		m3Son = $('#m3-son'),
		m4Son = $('#m4-son'),
		mSonWarp = $('.head-nav-main'),
		timer1;
		// 1.0.1
		m2.hover(function() {
			mSonWarp.stop(true).slideDown(400);
			m2Son.stop(true).show().siblings('.sub').hide();
		}, function() {
			mSonWarp.stop(true).slideUp(400);
		});
		m2Son.hover(function() {
			mSonWarp.stop();
		}, function() {
			mSonWarp.stop(true).slideUp(400);
		});
		// 1.0.2
		m3.hover(function() {
			mSonWarp.stop(true).slideDown(400);
			m3Son.stop(true).show().siblings('.sub').hide();
		}, function() {
			mSonWarp.stop(true).slideUp(400);
		});
		m3Son.hover(function() {
			mSonWarp.stop();
		}, function() {
			mSonWarp.stop(true).slideUp(400);
		});
			
		// 1.0.3
		m4.hover(function() {
			mSonWarp.stop(true).slideDown(400);
			m4Son.stop(true).show().siblings('.sub').hide();
		}, function() {
			mSonWarp.stop(true).slideUp(400);
		});
		m4Son.hover(function() {
			mSonWarp.stop();
		}, function() {
			mSonWarp.stop(true).slideUp(400);
		});

		// 1.1首页的fullpage参数配置
                
});	
</script>
<script type="text/javascript">
		$(function() {
			$('#myModal').on('shown.bs.modal', function () {
  				$('#myInput').focus()
			})
		});	
	</script>
<!-- 登录弹框························································ -->
		<div class="modal fade login-content" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">会员登录</h4>
		      </div>
<script>
document.write('<script src="/e/member/login/loginjs.php?t='+Math.random()+'"><'+'/script>');
</script>
		      
		      <div class="modal-footer change-login clearfix">
		        	<div class="qq-login normal-login f-l-l">
		        		<a class="f-l-l"  href="">QQ账号登陆</a>
		        	</div>
		        	<div class="sina-login normal-login f-l-l">
		        		<a class="f-l-l" href="">微博账号登陆</a>
		        	</div>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- 登录弹框结束················································ -->
<!-- 第一屏······························································ -->
	<!-- 头部··························································· -->
	<header class="head-warp">
		
		<div class="head">
			<div class="head-top">
				<div class="head-nav-logo">
					<h1><a href="javascript:;">法兰山德官网方网站</a></h1>
					<!-- Button trigger modal -->
					<script>
					document.write('<script src="/e/member/login/loginjstwo.php?t='+Math.random()+'"><'+'/script>');
					</script>
					<span class="en-flsd f-l-r go-en"><a href="http://en.franzsandner.com/"></a></span>
					<span class="en-flsd f-l-r go-ft"><a href="http://tw.franzsandner.com/"></a></span>
					<!--新增搜索框17.1.3-->
					<div class="head-search-warp">
						<form action="">
							<input class="search-content" type="text" required placeholder="输入内容">
							<input class="search-sub"  type="submit" value=" ">
						</form>
					</div>
					<!--/新增搜索框17.1.3-->
				</div>
			</div>
		</div>
		<nav class="head-nav">
			<!-- 一级主菜单 -->
			<div class="navBar head-nav-menu">
				<ul class="nav clearfix">
						<li id="m1" class="m">
							<h3><a target="_blank" href="/">网站首页</a></h3>
							<!--<ul class="sub list-group">
								<li ><a  class="list-group-item" href="/">法兰山德</a></li>
								<li ><a  class="list-group-item" href="/">奥古斯特·福斯特</a></li>
								<li ><a  class="list-group-item" href="/">经营理念</a></li>
								<li ><a  class="list-group-item" href="/">重要成员</a></li>
								<li ><a  class="list-group-item" href="/">技术团队</a></li>
							</ul>-->
						</li>
						<li id="m2" class="m">
							<h3><a target="_blank" href="/gangqin/">钢琴<i></i></a></h3>
						</li>

						<li id="m3" class="m">
							<h3><a target="_blank" href="/tiqin/">提琴<i></i></a></h3>
						</li>

						<li id="m4" class="m">
							<h3><a target="_blank" href="/jita/">吉他<i></i></a></h3>
						</li>

						<li id="m5" class="m">
							<h3><a target="_blank" href="/peijian/">配件<i></i></a></h3>

						</li>

						<li id="m5" class="m">
							<h3><a target="_blank" href="/news/gangqin">乐器新闻</a></h3>
						</li>

						<li id="m5" class="m">
							<h3><a target="_blank" href="/xiaoshou">销售网络</a></h3>
						</li>
						<li id="m5" class="m">
							<h3><a target="_blank" href="/lianxi">联系我们</a></h3>
						</li>
						<li id="m5" class="m">
							<h3><a target="_blank" href="/chaxun">正品查询</a></h3>
						</li>
				</ul>
			</div>
			<script type="text/javascript">
				jQuery(".nav").slide({ 
						type:"menu", //效果类型
						titCell:".m", // 鼠标触发对象
						targetCell:".sub", // 效果对象，必须被titCell包含
						effect:"slideDown",//下拉效果
						delayTime:300, // 效果时间
						triggerTime:0, //鼠标延迟触发时间
						returnDefault:true  //返回默认状态
					});
			</script> 
		</nav>
	</header>
	<!-- 头部结束························································ -->