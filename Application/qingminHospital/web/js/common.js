$(function(){
	$(".nav a").each(function(index) {
        if($(this).html().indexOf("��Ѫ���ڿ�")>=0 || $(this).html().indexOf("�����")>=0 || $(this).html().indexOf("�������")>=0 || $(this).html().indexOf("�ǿ�")>=0 || $(this).html().indexOf("�����ڿ�")>=0 || $(this).html().indexOf("ҩѧ")>=0 || $(this).html().indexOf("������")>=0 || $(this).html().indexOf("�����ڿ�")>=0 || $(this).html().indexOf("����һ��")>=0 || $(this).html().indexOf("�������")>=0){
			$(this).css("color","#ffffff");	
			$(this).css("font-weight","bold");	
		}
    });
	$(".dmlist a").each(function(index) {
        if($(this).html().indexOf("��Ѫ���ڿ�")>=0 || $(this).html().indexOf("�����")>=0 || $(this).html().indexOf("�������")>=0 || $(this).html().indexOf("�ǿ�")>=0 || $(this).html().indexOf("�����ڿ�")>=0 || $(this).html().indexOf("ҩѧ")>=0 || $(this).html().indexOf("������")>=0 || $(this).html().indexOf("�����ڿ�")>=0 || $(this).html().indexOf("����һ��")>=0 || $(this).html().indexOf("�������")>=0){
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
			alert("�Բ��𣬲�֧�ִ������,��ͬʱ��סCTRL+D�������ղأ�");
			return true;
		}
	}
	catch(e){
			alert("�Բ��𣬲�֧�ִ������,��ͬʱ��סCTRL+D�������ղأ�");
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
			alert("�Բ��𣬲�֧�ִ������!");
			}
		}
		var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage',url);
	}
}
function frmchk(frm){
	var errtxt="�Բ�����������´�����Ϣ:\n----------------------------------------------------------------------\n";
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
					errtxt+=err + "����Ϊ��!" + "\n";	
					$(this).addClass("inputboxerr");
				}else{$(this).removeClass("inputboxerr");}
				if(eqto!=="undefined" && eqto!==""){
					if($(this).val()!==$("#" + eqto).val()){
						flag=false;
						errtxt+="�����������벻һ��!" + "\n";	
						$(this).addClass("inputboxerr");
					}else{$(this).removeClass("inputboxerr");}
				}	
				if(num!=="undefined" && eqto!==""){
					if($(this).val().length<parseInt(num)){
						flag=false;
						errtxt+=err + "�ַ����Ȳ�������"+num+"���ַ�!" + "\n";	
						$(this).addClass("inputboxerr");
					}else{$(this).removeClass("inputboxerr");}
				}	
			}
		}
	})
	if(flag){return flag}else{jsdialog(errtxt);return flag;};
}
function jsdialog(str){alert(str);	}