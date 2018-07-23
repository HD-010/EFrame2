$(function(){
	$(".nav a").each(function(index) {
        if($(this).html().indexOf("心血管内科")>=0 || $(this).html().indexOf("神经外科")>=0 || $(this).html().indexOf("泌尿外科")>=0 || $(this).html().indexOf("骨科")>=0 || $(this).html().indexOf("呼吸内科")>=0 || $(this).html().indexOf("药学")>=0 || $(this).html().indexOf("肿瘤科")>=0 || $(this).html().indexOf("消化内科")>=0 || $(this).html().indexOf("普外一科")>=0 || $(this).html().indexOf("普外二科")>=0){
			$(this).css("color","#ffffff");	
			$(this).css("font-weight","bold");	
		}
    });
	$(".dmlist a").each(function(index) {
        if($(this).html().indexOf("心血管内科")>=0 || $(this).html().indexOf("神经外科")>=0 || $(this).html().indexOf("泌尿外科")>=0 || $(this).html().indexOf("骨科")>=0 || $(this).html().indexOf("呼吸内科")>=0 || $(this).html().indexOf("药学")>=0 || $(this).html().indexOf("肿瘤科")>=0 || $(this).html().indexOf("消化内科")>=0 || $(this).html().indexOf("普外一科")>=0 || $(this).html().indexOf("普外二科")>=0){
			$(this).css("color","#ff0000");	
			$(this).css("font-weight","bold");	
		}
    });
	$(".nav ul li").hover(function(){
		$(this).find("div").slideDown(50);
	},function(){
		$(this).find("div").slideUp(50);
	})
	if($("#jsimglist").val()!==undefined){
		var thisimg="";
		var thistxt="";
		var thisa="";
		$("#jsimglist ul li").each(function(index){
			thisimg=$(this).find("img").attr("src");
			thistxt=$(this).find("img").attr("alt");
			thisa=$(this).find("a").attr("href");
			if(index==0){
				$("#jsimg").attr("src",thisimg);
			    $("#jsaa").attr("href",thisa);
				$("#imgcontent").html(thistxt);
			}
		})
	}
	$("#jsimglist ul li").hover(function(){
		var thisimg="";
		var thistxt="";
		var thisa="";
		thisimg=$(this).find("img").attr("src");
		thistxt=$(this).find("img").attr("alt");
		thisa=$(this).find("a").attr("href");
		$("#jsaa").attr("href",thisa);
		$("#jsimg").attr("src",thisimg);
		$("#imgcontent").html(thistxt);
		$(this).addClass("cur");		
	},function(){$(this).removeClass("cur");})
})
function addAsFavorite(title,url){
	try{
		if (window.sidebar) { 
			window.sidebar.addPanel(title, url,"");
		} else if( document.all ) {
			window.external.AddFavorite( url, title);
		} else if( window.opera && window.print ) {
			alert("对不起，不支持此浏览器,清同时按住CTRL+D键加入收藏！");
			return true;
		}
	}
	catch(e){
			alert("对不起，不支持此浏览器,请同时按住CTRL+D键加入收藏！");
	}
}
function setHomepage(url)
{
	if (document.all)
	{
		try{
			document.body.style.behavior='url(#default#homepage)';
			document.body.setHomePage(url);
		}catch(e){
		}
	}
	else if (window.sidebar)
	{
		if(window.netscape)
		{
			try
			{ 
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
			} 
			catch (e) 
			{ 
			alert("对不起，不支持此浏览器!");
			}
		}
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage',url);
	}
}
function frmchk(frm){
	var errtxt="对不起，请更正以下错误信息:\n----------------------------------------------------------------------\n";
	var flag=true;
	$("#" + frm + " input").each(function(index){
		var type=$(this).attr("type")+"";
		var ms=$(this).attr("ms")+"";
		var err=$(this).attr("err")+"";
		var eqto=$(this).attr("eqto")+"";
		var num=$(this).attr("num")+"";
		if(type=="text"){
			if(ms=="1"){
				if($(this).val()==""){
					flag=false;
					errtxt+=err + "不能为空!" + "\n";	
					$(this).addClass("inputboxerr");
				}else{$(this).removeClass("inputboxerr");}
				if(eqto!=="undefined" && eqto!==""){
					if($(this).val()!==$("#" + eqto).val()){
						flag=false;
						errtxt+="两次密码输入不一致!" + "\n";	
						$(this).addClass("inputboxerr");
					}else{$(this).removeClass("inputboxerr");}
				}	
				if(num!=="undefined" && eqto!==""){
					if($(this).val().length<parseInt(num)){
						flag=false;
						errtxt+=err + "字符长度不能少于"+num+"个字符!" + "\n";	
						$(this).addClass("inputboxerr");
					}else{$(this).removeClass("inputboxerr");}
				}	
			}
		}
	})
	if(flag){return flag}else{jsdialog(errtxt);return flag;};
}
function jsdialog(str){alert(str);	}