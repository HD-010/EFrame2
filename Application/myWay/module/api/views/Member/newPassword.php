<div class="webPassword">
	<div class="header-new">
		<div class="fkw-topbar-box">
			<a class="fkw-logo" target="_blank"  title='点击可打开凡科网' href='/api/home/index'></a>
			<div class="f-topbar-right">
				<a class="slogan"  style="display:inline-block" biz="none" target="_blank"  title='点击可打开凡科网' href='http://" +www.fkw.com+"'>
					<i></i><font>凡科上市“新三板”股票代码：832828</font>
				</a>
				<a class="slogan" biz="site" target="_blank" title='点击可打开凡科建站官网' href='http://" +jz.fkw.com+"'>
					<i></i><font>一次注册=电脑网站+手机网站+微信网站</font>
				</a>
				<a class="slogan" biz="flyer" target="_blank" title='点击可打开微传单官网' href='http://" + wcd.im+"'>
					<i></i><font>高逼格H5、邀请函、招聘贴</font>
				</a>
				<a class="slogan" biz="hd" target="_blank" title='点击可打开凡科互动官网' href='http://" +hd.fkw.com +"'>
					<i></i><font>吸粉/抽奖/互动/引流，一步到位</font>
				</a>
				<a class="slogan" biz="wxast" target="_blank" title="点击可打开公众号助手官网" href="http://mp.faisco.com">
					<i></i><font>微网站/微商城/微传单，一应俱全</font>
				</a>
				<a class="slogan" biz="program" target="_blank" title='点击可打开凡科小程序官网' href='http://qz.fkw.com'>
					<i></i><font>拖拽式，3分钟制作专属小程序</font>
				</a>
				<a class="slogan" biz="ktu" target="_blank" title='点击可打开凡科快图官网' href='http://" + kt.fkw.com +"'>
					<i></i><font>不用PS在线做图片</font>
				</a>
			</div>
		</div>
	</div>
    <!--content-->
    <div class="content">
		<div style="height: 23px;width: 100%"></div>
		<div class="headLink">
			<a href="//www.fkw.com/reg.html" target="_blank">免费注册</a>
			<span class="sep"></span>
			<a href="//www.fkw.com/alliance.html" target="_blank" onClick="Portal.logDog(4000023, 432)">代理加盟</a>
			<span class="sep"></span>
			<a href="//www.fkw.com/ts.html" target="_blank">投诉建议</a>
		</div>
		<div class="blueLine"></div>
		<div class="paper">
			<div class="form-top"></div>
			<div class="littleTitle">
				<div class="littleTitle_a"></div>
				<div class="littleTitle_b">找回密码</div>
			</div>
			<div class="progressBar">
				<div class=" progressOne"></div>
				<div class="schedule">
					<div class="numberOne">身份验证</div>
					<div class="numberTwo">重置密码</div>
					<div class="numberThr">完成</div>
				</div>
			</div>
			<div class="line acctLine">
				<div class="lineName"><span>手机号码/邮箱/帐号</span></div>
				<div class="lineContent">
					<input type="text" class="cacctName" id="cacct" name="cacct" autocomplete="new-password" maxlength="50" value="" />
					<div class="correctAcct"></div>
					<div class="placeholder_txt" onClick="placeholder_click();">未验证邮箱/手机号码的，请输入帐号</div>
				</div>
				<div class="lineTip" id="acctTip">
					<div class="item4">
						
					</div>
				</div>
			</div>

			

			<div class="line">
				<div class="lineName" style="position: relative;top: -20px;" ><span style="position:relative;top: 4px"  >验证码</span></div>
				<div class="lineContent">
					<input type="text" style="text-indent: 0" placeholder="请输入短信码" class="verificationCodeSend" autocomplete="new-password" id="verificationCodeSend" value="" maxlength="4" />
					<button class="item_code" onClick="getverCode();">获取验证码</button>
				</div>
				<div class="lineTip" style="position: absolute;top: 0;left: 590px;">
					<div class="item4" style="margin-top:9px" ><!--666-->
					</div>
				</div>
			</div>

			<div class="btnLine" style="margin-left:272px;">
				<a  class="nextBtn"  hidefocus="true" href="javascript:next();" style="text-decoration:none;">下一步</a>
			</div>
		</div>
	</div>

	
	<div class="m-wave">
		<ul class="wave-item item1">
			<li class="wave-bg wave-bg1"></li>
			<li class="wave-bg wave-bg1"></li>
		</ul>
		<ul class="wave-item item2">
			<li class="wave-bg wave-bg2"></li>
			<li class="wave-bg wave-bg2"></li>
		</ul>
		<ul class="wave-item item3">
			<li class="wave-bg wave-bg3"></li>
			<li class="wave-bg wave-bg3"></li>
		</ul>
		<div class="footer-new">
			<img src="//ps.faisys.com/image/beianIcon.png" width="20" height="20" style="margin-left:0px;">
			粤公网安备 44010502000715号 | Copyright &copy; 2010-2018 广州凡科互联网科技股份有限公司 粤ICP备10235580号
			<a target="_blank" hidefocus="true" href="http://www.itrust.org.cn/Home/Index/itrust_certifi?wm=1639937559" class="fk-trustLink1"></a>
			<a class="fk-trustLink2" href='https://credit.szfw.org/CX20180326037663800199.html' target='_blank'></a>
			<a href="https://ss.knet.cn/verifyseal.dll?sn=e17030244010066816266j000000&pa=111332 " tabindex="-1" class="fk-trustLink3" target="_blank"></a>
		</div>
	</div>
</div>




<script type="text/x-template" id="t-imgVerify">
	<div class="m-imgVerify">
		<span class="close"></span>
		<div class="title">请先完成下方验证</div>
		<div class="inputLine">
			<input type="text" maxlength="4" class="codeVal" placeholder="请输入右侧验证码"><!--
			--><img class="codeImg">
			<span class="refreshBtn">换一张</span>
		</div>
		<div class="msg"></div>
		<button class="u-bigBtn confirmBtn">确定</button>
	</div>
</script>

