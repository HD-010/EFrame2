<script type="text/javascript" src="//ps.faisys.com/js/faiEncrypt.min.js?v=201707031158"></script>

<script type="text/javascript" src="//ps.faisys.com/js/faiEncrypt1.min.js?v=201707031158"></script>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>找回密码 -- 凡科网</title>
<meta name="keywords" content="找回密码,凡科网">
<meta name="description" content="凡科提供企业邮箱、自助建站系统等多样化服务，努力打造成为最全面的服务平台。电脑网站、手机网站和微信网站三合一，助力企业营销，促进企业发展。">
<meta name="author" content="凡科互联网科技股份有限公司"/>
<meta name="copyright" content="凡科互联网科技股份有限公司版权所有"/>
<link href="//ps.faisys.com/css/passwordNew.min.css?v=201808311647" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="//ps.faisys.com/css/version2/faiComm.min.css?v=201808311647"/>
</head>
<body>




<?php 

echo $this->contents();

?>








</body>

<script type="text/javascript" src="//ps.faisys.com/js/comm/jquery/jquery-core.min.js?v=201707031158"></script>
<script type="text/javascript">  
(function() { 
var fs = document.createElement("script"); 
fs.src = "//fe.faisys.com/jssdk_1_0/js/hawkEye.min.js?v=201807231924";
window.FAI_HAWK_EYE = {}; 
window.FAI_HAWK_EYE.jssdk_report_url = "//report.fkw.com/js/report"; 
window.FAI_HAWK_EYE.jssdk_appid = 2000; 
window.FAI_HAWK_EYE.fai_aid = 0; 
window.FAI_HAWK_EYE.fai_bs_aid = 0; 
window.FAI_HAWK_EYE.fai_bs_id = 0; 
window.FAI_HAWK_EYE.fai_bs_wid = 0; 
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(fs, s);
})();</script>
<!---->
<script type="text/javascript" src="//ps.faisys.com/js/comm/jquery/jquery-ui-core.min.js?v=201707311628"></script>
<script type="text/javascript" src="//ps.faisys.com/js/comm/fai.min.js?v=201808151630"></script>
<script type="text/javascript" src="//ps.faisys.com/js/faiEncrypt.min.js?v=201707031158"></script>
<script type="text/javascript" src="//ps.faisys.com/js/util.min.js?v=201808151630"></script>
<script language="javascript" type="text/javascript">
var faiEncrypt_key = "MIGfMA0GCSqGSxx3DQEBAQUAA4GNADCBiQKBgQCBWNoG5LJ3u44Gs8PWs1MaNUQQ+mOmh+9zWdzSt3ORbmfCDvU+ssW/6QTTgXvWWx7+Wzq/a4fCCQp72zSqXeVhWkTVct9Hyp/iMo5K6qOEK76z9z+tP/u99X6qazeXGVMWKkPiyZT4mKAGd/U8Mph9Z1Z5kOluA7g7heq8PPlE9wIDAQAB";
var sendingVerCode = false;   //0:未发送验证码;  1:正在发验证码;
var resendTime = 60;//60s重新获取验证码
var getCodeTimer = '';//定时器
var returnEmail = "";
var returnPhone = "";
var needValidateCode = false;
var faiCard='';
var employeeCard='';
var checkImageCode=false

var mWave = (function(){
    var $dom = $('.m-wave');

    function init(){
        start($dom.find('.wave-item.item1'), 150000);
        start($dom.find('.wave-item.item2'), 140000);
        start($dom.find('.wave-item.item3'), 30000);
    }
    function start($target, speed){
        var halfWidth = parseInt($target.width() / 2);
        $target.animate({'marginLeft': - halfWidth + 'px'}, speed, 'linear', roll);
        function roll(){
            $target.css('marginLeft', 0);
            $target.animate({'marginLeft': - halfWidth + 'px'}, speed, 'linear', roll);
        }
    }
    return {
        init: init
    }
})();

$(function () {
    /*if(needValidateCode){
        $(".paper").css("height","580px");
	}*/
    initFun();
    mWave.init();
    $('#cacct').focus();
	
	$('#cacct').focus(function(){
		autoFocus();
	}).keydown(function(event){
		$(".placeholder_txt").hide();
	}).blur(function(){
		autoFocus();
	});
	
	function autoFocus(){
		if($("#cacct").val() != ""){
			$(".placeholder_txt").hide();
		}else{
			$(".placeholder_txt").show();
		}
	}
});




function placeholder_click(){
	$('#cacct').focus();
}

function initFun () {
	$("#validateCode").val("");
	/*refreshValidateCode();*/
	$("#cacct").bind("blur", function () {
		checkCacctNew(true);
	}).keydown(function(event){
		if(event.keyCode == 13 || event.which == 13){
			if(needValidateCode){
				$('#validateCode').focus();
			}else{
				$('#verificationCodeSend').focus();
			}
		}
	});

	$("#verificationCodeSend").bind("blur", function () {
		if(!sendingVerCode){
			//checkValidateSend();
        }
	}).keydown(function(event){
		if(event.keyCode == 13 || event.which == 13){
			next();
		}
	});
	
	$("#validateCode").bind("blur", function () {
		//checkValidate();
	}).keydown(function(event){
		if(event.keyCode == 13 || event.which == 13){
			$('#verificationCodeSend').focus();
		}
	});
	
	$("#pwd").live("keydown",function(event){
		if(event.keyCode == 13 || event.which == 13){
			$('#pwd2').focus();
		}
	});
};

function next (){
	var cacct = $.trim($("#cacct").val());
	var verificationCodeSend = $("#verificationCodeSend").val() ;
	
	var encrypt = new JSEncrypt();
	var acctType_s = checkCacctNewJs(true);
	checkValidateSend();
	if(typeof(verificationCodeSend) != "undefined" && faiEncrypt_key){
		encrypt.setPublicKey(faiEncrypt_key);
		verificationCodeSend = encrypt.encrypt(verificationCodeSend);
	}


	if (checkCacctNewJs(true) && checkValidateSend()) {
		$.ajax({
			type 	: "post",
			url 	: "/ajax/reg_h.jsp?cmd=checkPwdValidateCode&cacct=" + Fai.encodeUrl(cacct) + "&verificationCodeSend="+Fai.encodeUrl(verificationCodeSend)+ "&acctType="+acctType_s,
			error	: function (result) {
				showErr($('#cacct'), '系统繁忙');
			},
			success : function (result) {
				var data = jQuery.parseJSON(result);
				if (data.success) {
					pwdStepTwo(data.data,cacct);
					$("#pwd").focus();
				} else {
					if(data.rt == -3){ //验证码问题
						showErr($('#verificationCodeSend'), data.msg);
					}else if(data.rt == -301){
						if(!sendingVerCode){
			  				showErr($("#verificationCodeSend"), "验证码错误或已失效，请重新输入");
	        			}else{
	        				clearInterval(getCodeTimer);
	        				if($('#verificationCodeSend').val() == "" ){      					
				        		getCodeTimer = setInterval('GetComeDownTime("2",'+acctType_s+')', 1000);
	        				}else{
				        		getCodeTimer = setInterval('GetComeDownTime("1",'+acctType_s+')', 1000);
	        				}
	        			}
					}
				}
			}
		})
	}
};


/*
function refreshValidateCode () {
	$("#validateCode_img").attr("src", "/validateCode.jsp?" + (Math.random() * 1000));
};
*/

function checkCacctNew (isCheck) {
	var isSuccess = false;
	// 校验帐号名
	var cacct =  $.trim($("#cacct").val()); 
	if(!checkCacctNewJs (true)){
		return ;
	}
	var acctType_s = checkCacctNewJs(true);
	if (isCheck) {
		$.ajax({
			type 	: "post",
			url 	: "/ajax/reg_h.jsp?cmd=checkCacctForPwd&cacct=" + Fai.encodeUrl(cacct) + "&acctType=" + acctType_s ,
			error	: function (result) {
				isSuccess = false;
            	showErr($('#cacct'), '系统繁忙。');
			},
			success : function (result) {
				var data = jQuery.parseJSON(result);
				if(data.success){
					if (!data.existed) {
						isSuccess = false;
                        $(".correctAcct").hide();
						if(acctType_s == 1){
            				showErr($('#cacct'), '手机号码不存在，请重新填写或用帐号找回');
						}else if(acctType_s == 2){
            				showErr($('#cacct'), '邮箱帐号不存在，请重新填写或用帐号找回');
						}else if(acctType_s == 3){
							if(data.msg){
								showErr($('#cacct'), data.msg);
							}else{
								showErr($('#cacct'), '此帐号不存在！');
							}	
						}
						$(".correctAcct").hide();
					} else {
            			showErr($('#cacct'), '');
            			isSuccess = true;
						$(".correctAcct").show();
					}
				} else {
					isSuccess = false;
                    $(".correctAcct").hide();
            		showErr($('#cacct'), data.msg);
				}
			}
		});
	}
	return isSuccess;
};

function checkCacctNewJs (settle) {
	var acctType_s = 0;
	if(settle == true){
		var cacct = $('#cacct');
		var cacctValue = $.trim(cacct.val()); 
		
		if (cacctValue == "" || typeof cacct == "undefined"){
			showErr(cacct, '请输入已验证的手机/邮箱/凡科网帐号');
		}else{
			if(isMobile(cacctValue)){ //纯数字
				acctType_s = 1;
			}else if(Fai.isEmail(cacctValue)){
				acctType_s = 2;
			}else{
				acctType_s = 3;
			}
			showErr($('#cacct'), '');
		}
	}else{
		var cacct = settle;
		if(isMobile(cacct)){ //纯数字
			acctType_s = 1;
		}else if(Fai.isEmail(cacct)){
			acctType_s = 2;
		}else{
			acctType_s = 3;
		}
	}	
	return acctType_s;
};

function checkValidate () {
	var isSuccess = true;
	var validate = $("#validateCode").val();
	if (validate == "" || typeof validate == "undefined") {
		isSuccess = false;
		showErr($('#validateCode'), '请输入图片验证码');
	}else {
		showErr($('#validateCode'), '');
	}
	return isSuccess;
};

function checkValidateSend(){
	var isSuccess = true;
	var acctType_s = checkCacctNewJs(true);
	var validate = $("#verificationCodeSend").val();
	if (validate == "" || typeof validate == "undefined") {
		isSuccess = false;
		if(!sendingVerCode){
			showErr($('#verificationCodeSend'), '请输入验证码');
		}else{
        	clearInterval(getCodeTimer);
			getCodeTimer = setInterval('GetComeDownTime("2",'+acctType_s+')', 1000);
		}	
	}else {
		if(!sendingVerCode){
			showErr($('#verificationCodeSend'), '');
		}	
	}
	return isSuccess;
}

function pwdStepTwo(obj,cacctTmp) {
    var changePwdTwo = [];
    changePwdTwo.push('<div class="form-top"></div>');
    changePwdTwo.push('<div class="littleTitle">');
    changePwdTwo.push(' 	<div class="littleTitle_a"></div>');
    changePwdTwo.push(' 	<div class="littleTitle_b">找回密码</div>');
    changePwdTwo.push('</div>');
    changePwdTwo.push('<div class="progressBar">');
    changePwdTwo.push('		<div class=" progressOne"></div>');
    changePwdTwo.push(' 	<div class="schedule">');
    changePwdTwo.push(' 		<div class="numberOne">身份验证</div>');
    changePwdTwo.push('  		<div class="numberTwo">重置密码</div>');
    changePwdTwo.push(' 		<div class="numberThr">完成</div>');
    changePwdTwo.push(' 	</div>');
    changePwdTwo.push('</div>');


    changePwdTwo.push("<div id='pwdPanel' class='pwdPanel'>");
    //changePwdTwo.push("	<div class='progressBar'>");
    //changePwdTwo.push("		<div class='progressTwo'></div>");
    //changePwdTwo.push("	</div>");
    //changePwdTwo.push("	<div class='tipText'>");
    //changePwdTwo.push("		<p>请设置你的新密码！</p>");
    //changePwdTwo.push("	</div>");
    changePwdTwo.push("	<div class='pwdContent'>");
    changePwdTwo.push("		<div class='pwdContentPanel'>");
    changePwdTwo.push("			<div class='pwdItem'>");
    changePwdTwo.push("				<div class='pwdItemName'>");
    changePwdTwo.push("					<span  style='position: relative;top: 4px;;'>新密码</span>");
    changePwdTwo.push("				</div>");
    changePwdTwo.push("				<div class='pwdItemContent'>");
    changePwdTwo.push("					<input type='password' id='pwd' maxlength='20' autocomplete='new-password' onpaste='return false' onKeyUp='checkPwdStrength(this);'/>");
    changePwdTwo.push("					<div class='correctPwd'></div>");
    changePwdTwo.push("				</div>");
    changePwdTwo.push("				<div class='pwdItemTip pwdItemTip_j'>");
    changePwdTwo.push("					<span class='pwdItemTipIcon'>&nbsp;</span>");
    changePwdTwo.push("					<span class='pwdItemTipErr pwdItemTipErr_j'>不能为空！</span>");
    changePwdTwo.push("				</div>");
    changePwdTwo.push("			</div>");
    changePwdTwo.push("			<div class='pwdStrength'>");
    changePwdTwo.push("				<div style='width: 100px;height:18px;float:left;margin-right: 10px;'></div>");
    changePwdTwo.push("				<div id='diff' class='pwdStrengthItem'></div>");
    changePwdTwo.push("				<div id='weak' class='pwdStrengthItem_a' style='top: -4px;left: 116px;'>弱</div>");
    changePwdTwo.push("				<div id='medium' class='pwdStrengthItem_a' style='top: -4px;left: 270px;'>中</div>");
    changePwdTwo.push("				<div id='force' class='pwdStrengthItem_a' style='top: -4px; left: 423px;'>强</div>");
    changePwdTwo.push("			</div>");
    changePwdTwo.push("			<div class='pwdItem'>");
    changePwdTwo.push("				<div class='pwdItemName'>");
    changePwdTwo.push("					<span     style='position: relative;top: 15px;'>确认新密码</span>");
    changePwdTwo.push("				</div>");
    changePwdTwo.push("				<div class='pwdItemContent'>");
    changePwdTwo.push("					<input type='password' id='pwd2' style='margin-top: 11px;' onpaste='return false' autocomplete='new-password' maxlength='20' onKeyDown=\"if(event.keyCode==13){changePwdNext('" + obj.sign + "','" + obj.codeSign + "','" + obj.code + "','" + cacctTmp + "');}\" >");
    changePwdTwo.push("					<div class='correctPwd2'></div>");
    changePwdTwo.push("				</div>");
    changePwdTwo.push("				<div class='pwdItemTip pwdItemTip_j'>");
    changePwdTwo.push("					<span class='pwdItemTipIcon' style='top:11px'>&nbsp;</span>");
    changePwdTwo.push("					<span class='pwdItemTipErr pwdItemTipErr_j' style='top:22px'>不能为空！</span>");
    changePwdTwo.push("				</div>");
    changePwdTwo.push("			</div>");
    changePwdTwo.push("		</div>");
    changePwdTwo.push("		<div class='pwdTip'>");
    changePwdTwo.push("			<div class='pwdTipIcon'></div>");
    changePwdTwo.push("			<div class='pwdTipText'>");
    changePwdTwo.push("				<p>1.为保证您的安全，新密码必须与旧密码不同</p>");
    changePwdTwo.push("				<p>2.密码为6-20位字符( 字母、数字、符号 )的组合，区分大小写。</p>");
    changePwdTwo.push("				<p class='pwdFloatTip' style='color: #4E9BE9;'>( 怎样设置安全性高的密码？)</p>");
    changePwdTwo.push("			</div>");
    changePwdTwo.push("		</div>");
    changePwdTwo.push("	</div>");
    changePwdTwo.push("	<div class='btnLine' style='margin-left: 272px;position:relative;top: 27px'>");
    changePwdTwo.push("		<div class='showMsg'></div>")
    changePwdTwo.push("		<a id='nextBtn_j' style='margin-top: 73px;margin-left: -13px;' class='nextBtn_pwd' hidefocus='true' href=\"javascript:changePwdNext('" + obj.sign + "','" + obj.codeSign + "','" + obj.code + "','" + cacctTmp + "');\">下一步</a>");
    changePwdTwo.push("	</div>");
    //changePwdTwo.push("	<div class='foot' style='margin-top:70px;'>");
    //changePwdTwo.push("		<div class='copyright'>");
    //changePwdTwo.push("		Copyright <font style=''>&copy;</font> 2010 - 2018 凡科互联网科技股份有限公司");
    //changePwdTwo.push("		</div>");
    changePwdTwo.push("	</div>");
    changePwdTwo.push("</div>");
    $(".paper").html(changePwdTwo.join(""));
    $(".progressTwo_j").addClass("progressDone");
    $(".progressOne").css("backgroundPosition", "-322px -162px");
    $(".paper").css("height",'519px');
	$(".numberTwo").css("color","#0075ff");

	}
	function pwdStepThree(cacctTmp){
        var changePwdThree = [];
        changePwdThree.push("<div id='pwdPanel' class='pwdPanel'>");
        //changePwdThree.push("	<div class='progressBar'>");
        //changePwdThree.push("		<div class='progressThree'></div>");
       // changePwdThree.push("	</div>");
        changePwdThree.push("	<div id='pwdSucceContainer'>");
        changePwdThree.push("		<div class='pwdSucce'>");
        changePwdThree.push("			<span class='successIcon'></span>");
        changePwdThree.push("			<span class='reset'>您的密码已重置成功！</span>");
        changePwdThree.push("		</div>");
        changePwdThree.push("		<div class='feCard'>");
        changePwdThree.push("			<span class='faiCard' style='display: block'>帐号："+(faiCard!=''?faiCard:'-- -- --'))
        changePwdThree.push("           </span>");
        if(employeeCard!=''&&employeeCard!=null){
        	changePwdThree.push("			<span class='employeeCard' style='display: block'>帐号(创建者)："+(employeeCard!=''?employeeCard:'-- -- --'))
        	changePwdThree.push("           </span>");
        }
        //changePwdThree.push("			<span class='employeeCard' style='display: block'>员工帐号(创建者)：</span>");
        changePwdThree.push("		</div>");
        changePwdThree.push("		<a class='pwd_login' target='_Self' href=\"javascript:login('"+cacctTmp+"');\" style='margin-top:150px'>登&nbsp&nbsp&nbsp录</a>");
        changePwdThree.push("	</div>");
        //changePwdThree.push("	<div class='foot' style='margin-top:70px;'>");
        //changePwdThree.push("		<div class='copyright' style='text-align:center;margin:0px auto'>");
        //changePwdThree.push("		Copyright <font style=''>&copy;</font> 2010 - 2018 凡科互联网科技股份有限公司");
        //changePwdThree.push("		</div>");
        //changePwdThree.push("	</div>")
		changePwdThree.push("</div>");
		$(".paper").html(changePwdThree.join(""));
		$(".progressTwo_j").addClass("progressDone");
	}

//从这边改期，先不要验证码的走通先
function getverCode(){
	var valid = true; 	
	var cacct = $.trim($("#cacct").val());	// 校验帐号名
	var acctType_s = checkCacctNewJs(true);
	if(!checkCacctNewJs (true)){
		return ;
	}
	if (valid) {
		$.ajax({
			type 	: "post",
			url 	: "/ajax/reg_h.jsp?cmd=checkCacctForPwd&cacct=" + Fai.encodeUrl(cacct) + "&acctType=" + acctType_s,
			error	: function (result) {
            	showErr($('#cacct'), '系统繁忙');
			},
			success : function (result) {
				var data = jQuery.parseJSON(result);
				if(data.success){
				    //账号有问题
					if (!data.existed) {
						if(acctType_s == 1){
            				showErr($('#cacct'), '手机号码不存在，请重新填写或用凡科网帐号找回');
						}else if(acctType_s == 2){
            				showErr($('#cacct'), '邮箱帐号不存在，请重新填写或用凡科网帐号找回');
						}else if(acctType_s == 3){
							if(data.msg){
								showErr($('#cacct'), data.msg);
							}else{
								showErr($('#cacct'), '此凡科网帐号不存在');
							}	
						}
						$(".correctAcct").hide();
					} else {
            			showErr($('#cacct'), '');
            			//参数1.账号2.账号类型（1.手机号 2.邮箱 3.账号）
                        sendVerCode(cacct,acctType_s);
						$(".correctAcct").show();
					}
				} else {
            		showErr($('#cacct'), data.msg);
				}
			}
		});
	}
}



//定义弹框验证码
var showImage={
    	templateId : '#t-imgVerify',//模板
        $dom : null,
        validateCodeRegType: 3,	//默认为建站 =====(用于判断显验证码的类型)=====
        show: function(isMailAcct_mobile){
        showMsg('');
        $($(this.templateId).html()).appendTo($('body'));
        this.$dom = $(".m-imgVerify");
        this.$dom.css("display","block");
		showImage.refresh();
        Fai.bg();

        $(".m-imgVerify").find('.close').click(function(){
            showImage.close();
        });
        $(".m-imgVerify").find('.codeImg, .refreshBtn').click(showImage.refresh);
        $(".m-imgVerify").find('.confirmBtn').click(function(){
            var $this = $(this);
            if(showImage.checkCode()){
                var code = $.trim($(".m-imgVerify").find('.codeVal').val());
                $this.attr('disabled', 'disabled');
                showImage.sendValidateCode(code);
            }
        });
        this.$dom.find('.codeVal').keydown(function(event){
            if(event.keyCode == 13 || event.which == 13){
                $(".m-imgVerify").find('.confirmBtn').click();
                //IE9需要阻止enter键触发“获取验证码”按钮的点击，避免再次弹窗。（这里转移了focus都没用，很奇葩）
                event.preventDefault();
            }
        }).focus();
        //IE9需要异步触发focus()
    },
    close: function(){
        $(".m-imgVerify").remove();
        Fai.removeBg();					//解除样式
    },
    setMsg: function(msg){
        var $msg = $(".m-imgVerify").find('.msg').html(msg);
        if(msg){
            $msg.show();
            showImage.refresh();
        }else{
            $msg.hide();
        }
    },
    refresh:function(){
        $(".m-imgVerify").find('.confirmBtn').attr("disabled",false);
        $(".m-imgVerify").find('.codeImg').attr('src', 'validateCode.jsp?' + parseInt(Math.random() * 1000) + '&validateCodeRegType=3');
        $(".m-imgVerify").find('.codeVal').focus();
    },
    checkCode:function(){
        var code = $.trim($(".m-imgVerify").find('.codeVal').val());
        var msg = null;
        if(!code){
            msg = '请输入图片验证码';
        }else if(code.length != 4){
            msg = '请输入正确的图片验证码';
        }
        if(msg){
            showImage.setMsg(msg);
            $(".m-imgVerify").find('.codeVal').focus();
            return false;
        }else{
            return true;
        }
    },
    sendValidateCode:function(validateCode){
        $.ajax({
            type:"post",
            url:"/ajax/reg_h.jsp?cmd=checkImageCodeAndSendMobileCode&validateCode="+validateCode,
            success: function(result){
                var data=jQuery.parseJSON(result);
                if(data.success){
                    if(typeof($("#validateCode").val()) != "undefined"){
                        buildValidateCodeHtml();
					}
                    $("#validateCode").val($.trim($(".m-imgVerify").find('.codeVal').val()));;
                    showImage.close();
                    var cacct = $.trim($("#cacct").val());	// 校验帐号名
                    var acctType_s = checkCacctNewJs(true);
                    checkImageCode=true;
                    sendVerCode(cacct,acctType_s);
				}else{
                    showImage.setMsg(data.msg);
				}
            },
            error: function(){
                showImage.setMsg ("服务繁忙，请稍后重试！");
            },
        })
	}
}
//单纯检查图片验证码是否正确
function checkImageCode(validateCode){
    $.ajax({
        type:"post",
        url:"/ajax/reg_h.jsp?cmd=checkImageCodeAndSendMobileCode&validateCode="+validateCode,
        success: function(result){
            var data=jQuery.parseJSON(result);
			return data;
		},
		error: function(){
             return "{\"success\":false,\"rt\":-41,\"msg\":\"服务繁忙，请稍后重试！\"}";
		},
	})

}




function sendVerCode(cacctTmp, acctTypeTmp){

	resendTime = 60;
	returnEmail = "";
	returnPhone = "";
	var cacct = cacctTmp ;
	var acctType_s = acctTypeTmp;
    showErr($('#verificationCodeSend'), '');
    var validateCode = $("#validateCode").val() ;
	var encrypt = new JSEncrypt();
	//需要验证验证码的情况
	if(needValidateCode){
	    /*if(faiEncrypt_key){*/
	        if(checkImageCode){
	            //验证图形通过
			}else{
	           //验证图形不通过
                showImage.show(true);
                return;
			}
	}else{
	}

	$.ajax({
		type:"post",
		url:"/ajax/reg_h.jsp?cmd=checkAndSendPwdEmailNew&cacct="+cacct+"&acctType="+acctType_s+"&validateCode="+validateCode,
		success: function(result){
			var data = jQuery.parseJSON(result);
			if(data.success){
				//验证码发送成功，隐藏我们的点击按钮
                console.log(data);
				$(".item_code").attr("disabled",true);
                settime($(".item_code"))
				$("#verificationCodeSend").focus();
				if(data.acctType){
					acctType_s = data.acctType;
				}
				if(data.returnEmail != "null"){
					returnEmail = data.returnEmail;
					getCodeTimer = setInterval('GetComeDownTime("0",2)', 1000);
				}else if(data.returnPhone != "null"){
					getCodeTimer = setInterval('GetComeDownTime("0",1)', 1000);
					returnPhone = data.returnPhone;
				}else{
					getCodeTimer = setInterval('GetComeDownTime("0",'+acctType_s+')', 1000);
				}
				sendingVerCode = true ;
				if($('.item_code').hasClass('resendCode_Type')){
					if(acctType_s == 1){
				 		Portal.logDog(4000015,4); //找回密码-点击重新获取验证码
					}
				}else{
					if(acctType_s == 1){
				 		Portal.logDog(4000015,3);//找回密码-点击获取验证码
					}
				}

			}else{
                $(".item_code").attr("disabled",false);
                checkImageCode=false;
				if(data.rt == -401){
				    showImage.show(true);
					/*if(typeof(validateCodeBox) == "undefined"){
						buildValidateCodeHtml();
					}*/
                }else{
                    //$(".item_code").attr("disabled",true);
                    //settime($(".item_code"))
				    //其他错误需要关闭弹窗
					if(typeof ($(".m-imgVerify"))!="undefined"){
						showImage.close();
                    }
					showErr($('#verificationCodeSend'), data.msg);
				}
			}
		}
	})
}

//设置倒计时60s再发邮件
var countdown=60;
function settime(val) {
    if (countdown == 0) {
        val.attr("disabled",false);
        val.html("获取验证码");
        countdown=60;
        clearTimeOut(settime);
        return;
    } else {
        val.attr("disabled", true);
        val.html("重新发送(" + countdown + "s)");
        countdown--;
    }
    setTimeout(function() {
        settime(val)
    },1000)
}
function clearTimeOut(val){
    clearTimeout(val);
}

function GetComeDownTime(settle,acctTypeTmp){
	//acctTypeTmp : 1：手机找回密码；2：邮箱找回密码;666666
	var acctType_s = acctTypeTmp;
	var $resendCode = $('.item_code');
	if(resendTime>0){
	    if($resendCode.hasClass('resendCode_Type')){
	    	if(acctType_s==1){
        		$('#verificationCodeSend').parent().parent().find(".item4").addClass("sucMsg").show().html('<div class="sucIcon"></div>如果还是没收到，请联系客服<a class="consultQQ" target="_blank" href="/qq.jsp?s=209"></a>');
	      	}else{
        		$('#verificationCodeSend').parent().parent().find(".item4").addClass("sucMsg").show().html('<div class="sucIcon"></div>如果还是没收到，建议到垃圾箱查看');
	       	}	
        }else{
        	if(acctType_s==1){
        		$('#verificationCodeSend').parent().parent().find(".item4").addClass("sucMsg").show().html('<div class="sucIcon"></div>已发送到手机'+returnPhone);
	        
        	}else{
	        	$('#verificationCodeSend').parent().parent().find(".item4").addClass("sucMsg").show().html('<div class="sucIcon"></div>已发送到邮箱'+returnEmail);
        	}
        }
        if(settle == 1){
			$('#verificationCodeSend').parent().parent().find(".item4").removeClass("sucMsg");
	        showErr($('#verificationCodeSend'), '验证码错误或已失效');
        }
        if(settle == 2){
			$('#verificationCodeSend').parent().parent().find(".item4").removeClass("sucMsg");
	        showErr($('#verificationCodeSend'), '验证码不能为空' );
        }
	}else{
		$('#verificationCodeSend').parent().parent().find(".item4").removeClass("sucMsg");
        showErr($('#verificationCodeSend'), '');
        //$resendCode.addClass("resendCode_Type");
        //$(".item_code").show();
		//$(".item_code").html("重新获取验证码");
		clearInterval(getCodeTimer);
        sendingVerCode = false ;
	}
	resendTime--;
}

$("#pwd, #pwd2").live("blur", function () {
	checkValue();
});

$(".pwdFloatTip").live("mouseenter", function () {
	showPwdSafeTip();
}).live("mouseleave", function () {
	$(".floatSafeTip").hide();
});

function changePwdNext(data1, data2, data3,cacctTmp){
	var pwd = $("#pwd").val();
	var isNoPass = checkValue();
	$("#nextBtn_j").attr("disable","disabled");
	if (isNoPass) {
		$("#nextBtn_j").removeAttr("disable");
		return ;
	}
	var acctType_s = checkCacctNewJs(cacctTmp);
	var data = "&pwd=" + $.md5(pwd) +"&cacct="+cacctTmp+"&acctType="+acctType_s+"&sign="+data1+"&codeSign="+data2+"&code="+data3;
	$.ajax({
		type: "get",
		url: '/ajax/reg_h.jsp?cmd=setPwdNew'+data,
		error: function(){
			showMsg("服务繁忙，请稍后重试");
		},
		success: function(result){
			var result = jQuery.parseJSON(result);
			if (result) {
				if(result.success) {
					showMsg("");
					$("#pwdPanel").hide();
					$(".progressBar_j").show();
					$(".progressFour_j").addClass("progressDone");
					employeeCard=result.sacct;
                    faiCard=cacctTmp;
					pwdStepThree(cacctTmp);
				} else {
					if (result.rt == -1) {
						showMsg(result.msg);
					} else if(result.msg) {
						msg = result.msg;
					} else {
						msg = "系统错误";
					}
				}
			}else {
				showMsg("连接超时，请重试");
			}
		}
	});
};

function checkValue () {
	var pwd_Div = $("#pwd").parent().parent();
	var pwd_Val = $("#pwd").val();
	var pwd_Msg = "";
	var pwd2_Div = $("#pwd2").parent().parent();
	var pwd2_Val = $("#pwd2").val();
	var pwd2_Msg = "";
	var isShowTip = false;

	if (!pwd_Val) {
		$(".correctPwd").hide();
		isShowTip = true;
		pwd_Msg = "不能为空！";
	} else if (pwd_Val.length < 6 || pwd_Val.length > 20) {
		$(".correctPwd").hide();
		isShowTip = true;
		pwd_Msg = "密码由6-20个字符组成，区分大小写！";
	} else {
		$(pwd_Div).find(".pwdItemTip_j").hide();
		$(".correctPwd").show();
	}

	if (!pwd2_Val) {
		$(".correctPwd2").hide();
		isShowTip = true;
		pwd2_Msg = "不能为空！";
	} else if (pwd2_Val.length < 6 || pwd2_Val.length > 20) {
		$(".correctPwd2").hide();
		isShowTip = true;
		pwd2_Msg = "密码由6-20个字符组成，区分大小写！";
	} else {
		$(pwd2_Div).find(".pwdItemTip_j").hide();
		$(".correctPwd2").show();
	}

	if (!isShowTip) {
		if (pwd_Val != pwd2_Val) {
			$(".correctPwd2").hide();
			isShowTip = true;
			pwd2_Msg = "密码和确认密码不一致！";
		} else {
			var pwdStrength = $(".pwdStrength").find(".choice");
			if (pwdStrength.length == 1) {
				isShowTip = true;
				pwd_Msg = "密码强度过于简单，请重新设置！";
				$(".correctPwd,.correctPwd2").hide();
			}
		}
	}

	if (isShowTip) {
		$(".pwdTip").hide();
		if (pwd_Msg.length > 0) {
			var pwdItemTip = $(pwd_Div).addClass("pwdItemShowTip").find(".pwdItemTip_j");
			$(pwdItemTip).show().find(".pwdItemTipErr_j").text(pwd_Msg);
		}
		if (pwd2_Msg.length > 0) {
			var pwdItemTip = $(pwd2_Div).addClass("pwdItemShowTip").find(".pwdItemTip_j");
			$(pwdItemTip).show().find(".pwdItemTipErr_j").text(pwd2_Msg);
		}
	} else {
	    if($("#pwd").val()!=null||$("#pwd").val()!=""){
            $(pwd_Div).removeClass("pwdItemShowTip").find(".pwdItemTip_j").hide();
            $(pwd2_Div).removeClass("pwdItemShowTip").find(".pwdItemTip_j").hide();
		}else {
            $(".pwdTip").show();
            $(pwd_Div).removeClass("pwdItemShowTip").find(".pwdItemTip_j").hide();
            $(pwd2_Div).removeClass("pwdItemShowTip").find(".pwdItemTip_j").hide();
        }
	}

	return isShowTip;
};


function showPwdSafeTip () {
	var floatSafeTip = $(".floatSafeTip");
	if (floatSafeTip.length > 0) {
		$(floatSafeTip).show();
		return ;
	}

	var floatTop = $(".pwdFloatTip").offset().top + $(".pwdFloatTip").height() + 5;
	var floatLeft = $(".pwdFloatTip").offset().left;

	var safeTipHtml = [
		'<div class="floatSafeTip">',
			'<div class="floatSafeTipArrow"></div>',
			'<div class="floatSafeTipContent">',
				'<p>一、密码长度为6~20个字符。</p>',
				'<p>二、设置时使用英文字母、数字和符号的组合，如：cqmdt_042，<p>',
				'<p class="indent">尽量不要有规律。</p>',
				'<p>三、如果设置以下安全性过低的密码，系统会提醒您修改：</p>',
				//'<p class="indent">1、	密码与会员或电子邮件地址名相同。</p>',
				'<p class="indent">1、	全部由英文字母组成。</p>',
				'<p class="indent">2、	全部由数字组成。</p>',
				'<p>四、定期更改密码，并做好书面记录，以免忘记。</p>',
				'<p>五、凡科网帐号和注册邮箱中设置不同的密码，以免一个帐</p>',
				'<p class="indent">户被盗祸及其他帐户。</p>',
				'</p>',
			'</div>',
		'</div>',
	];
	$("body").append(safeTipHtml.join(""));
	$(".floatSafeTip").css("top", floatTop).css("left", floatLeft);
};

function login (cacctTmp) {
	var loginUrl = "//" + "i.fkw.com" + "?cacct=" + cacctTmp ;//+ "&sacct=" + sacct;
	/*$.openURL(loginUrl, "_blank");*/
	location.href=loginUrl;
};

function checkPwdStrength (obj) {
	var pwd = $(obj).val();
    if (pwd.length==0) {
        //$(".pwdStrength").find(".pwdStrengthItem").removeClass("choice")
        $("#diff").css("backgroundPosition","-852px 0px");
        $(".pwdStrengthItem_a").css("display","none");
        return ;
    }
	if (pwd.length < 6 || pwd.length > 20) {
		//$(".pwdStrength").find(".pwdStrengthItem").removeClass("choice")
		$("#diff").css("backgroundPosition","-852px 0px");
        $(".pwdStrengthItem_a").css("display","none");
        $("#weak").css("display","inline-block");
		return ;
	}
	var modes = 0;
	if ( /\d/.test(pwd) ) {
		modes++;
	}
	if ( (/[a-z]/.test(pwd)) || (/[A-Z]/.test(pwd)) ) {
		modes++;
	}
	if ( /\W/.test(pwd) || /[_]/.test(pwd) ) {
		modes++;
	}
    $(".pwdStrengthItem_a").css("display","none");
	if(modes==1){
        $("#diff").css("backgroundPosition","-852px 0px");
        $("#weak").css("display","inline-block");
	}else if(modes==2){
        $("#diff").css("backgroundPosition","-852px -61px");
        $("#medium").css("display","inline-block");
	}else{
        $("#diff").css("backgroundPosition","-852px -122px");
        $("#force").css("display","inline-block");
	}

	/*var pwdStrengthItems = $(".pwdStrength").find(".pwdStrengthItem").removeClass("choice");
	for (var i = 0; i < modes; i++) {
		var pwdStrengthItem = pwdStrengthItems[i];
		$(pwdStrengthItem).addClass("choice");
	}*/
};

function showErr(obj, str){
	if (str != '') {
	    /*alert(1);
	    if(obj.is("#cacct")){
            alert(2);
            obj.parent().parent().find(".item4").css("display","block");
            $('.cacct_image').text(str);
            alert(3)
		}else {*/
            obj.parent().parent().find(".item4").css("display", "block");
            obj.parent().parent().find(".item4").text(str);
        /*}*/
	} else {
		obj.parent().parent().find(".item4").css("display","none");
		obj.parent().parent().find(".item4").text(str);
	}
}

function showMsg(str){
	$(".showMsg").html(str);
}

function buildValidateCodeHtml(){
	var params = [];
		params.push("<div class='line' id='validateCodeBox' style='display:none'>");
		params.push("<div class='lineName' style='position: relative;top: -20px;'><span>图片验证码</span></div>");
		params.push(	" <div class='lineContent'><input type='text' class='validateCode' autocomplete='new-password' id='validateCode' value='' maxlength='4' />");
		/*params.push(	" <div class='validateCode_img'>");*/
		/*params.push(	"	<img id='validateCode_img' onClick='refreshValidateCode();return false;' title='看不清？换一张' style='width: 100px; height: 35px;' src='' alt='validateCode'/>");*/
		/*params.push(	"<a class='validateCoderefreshBtn' onClick='refreshValidateCode();return false;'  href='javascript:;'></a></div></div>");
		params.push("	 <div class='lineTip' style='position: absolute;top: 0;left: 590px;'>");
		params.push(	"<div class='item4'style='margin-top: 10px;'></div>");*/
		params.push(	"</div>");
		params.push("</div>");
	$(params.join('')).insertAfter("#validateCodeHtml");
	$("#validateCode").val("");
	/*refreshValidateCode();*/
}

function isMobile(mobile){
	var pattern = /^1[3456789]\d{9}$/ ;
	return pattern.test(mobile);
}
</script>
</html>