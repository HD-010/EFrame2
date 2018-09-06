<?php 
use EFrame\Helper\T;

//T::print_pre($data);exit;
?>

<footer class="foot_info_met_m1156_1     lr" m-id="9" m-type="foot">
	<div class="foot-left">
		<div class="foot-nav" m-id="noset" m-type="foot_nav">
			
			<?php 
		       $m = T::arrayValue('param.m', $data);
        	   for($i = 0; $i < count ($data) -1; $i ++):
                   $list = $data[$i];
        	       
        	       //定义栏目连接
                   $typeUrl = T::replaceToVal(T::arrayValue('param.tUrl',$data),[
                       'm'=>$m,
                       'c'=>T::arrayValue('nid', $list),
                       'v'=>T::getStrVal(-1, $list['typedir']),
                       'tid'=>T::arrayValue('id', $list),
                   ]);
                   
                   //定义栏目名称
                   $typeName = T::arrayValue('typename', $list);
        	?>
			
			<a href="<?=$typeUrl ?>" target='_self' title="<?=$typeName ?>">
				<?=$typeName ?>
			</a>
			<?php endfor?>
		</div>
		<div class="foot-copyright"></div>
		<div class="foot-lang" m-type="lang" m-id="0"></div>
		<div class="powered_by_metinfo">
			Powered by
			<a href="index?m=idk2585s" target="_blank" title="MetInfo企业网站管理系统">
				朴艺科技
			</a>
			
		</div>
	</div>
	<div class="foot-right">
		<div class="foot-text" m-id="noset" m-type="head_seo">
			<p>
				— 努力创造优质作品，奉献更多精品佳作 —
			</p>
		</div>
		<div class="text-link" m-id="noset" m-type="link">
			<ul>
				<li>
					友情链接：
				</li>
				<!-- <li>
					<a href="https://www.wuhao.vip" title="品牌设计" target="_blank">
						<span>品牌设计</span>
					</a>
				</li> -->
				
			</ul>
		</div>
	</div>
</footer>
<script>
/* 
* url 目标url 
* arg 需要替换的参数名称 
* arg_val 替换后的参数的值 
* return url 参数替换后的url 
*/ 
function changeURLArg(url,arg,arg_val){ 
    var pattern=arg+'=([^&]*)'; 
    var replaceText=arg+'='+arg_val; 
    if(url.match(pattern)){ 
        var tmp='/('+ arg+'=)([^&]*)/gi'; 
        tmp=url.replace(eval(tmp),replaceText); 
        return tmp; 
    }else{ 
        if(url.match('[\?]')){ 
            return url+'&'+replaceText; 
        }else{ 
            return url+'?'+replaceText; 
        } 
    } 
    return url+'\n'+arg+'\n'+arg_val; 
} 

/**
 * 获取url听的参数值
 */
function getQueryString(name) {
    var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i');
    var r = window.location.search.substr(1).match(reg);
    if (r != null) {
        return unescape(r[2]);
    }
    return null;
}

function ScollPostion() {
    var t, l, w, h, y, vh;
    if (document.documentElement && document.documentElement.scrollTop) {
        t = document.documentElement.scrollTop;
        l = document.documentElement.scrollLeft;
        w = document.documentElement.scrollWidth;
        h = document.documentElement.scrollHeight;
        y = window.scrollY;
        vh = document.documentElement.clientHeight;
    } else if (document.body) {
        t = document.body.scrollTop;
        l = document.body.scrollLeft;
        w = document.body.scrollWidth;
        h = document.body.scrollHeight;
        y = window.scrollY;
        vh = window.innerHeight;
    }
    return {
        top: t,
        left: l,
        width: w,
        height: h,
        scrollY: y,
        viewheight: vh
    };
}


/**
 * 简易分页工具
 * 如果window.paging的值为1,表示当前页面需需要实现分页
 * 如果为－1，表示当前页面分页出错，返回上一页
 * 否则不需要分页
 */
window.onscroll= function(){
	if(window.paging == 1){
		
    	var scrollObj = ScollPostion();
    	var url;
    	var cp = getQueryString('cp');
    	if(cp == 'NaN') cp = 1;
    	cp = parseInt(cp);
    
    	if(cp > 1 && (scrollObj.top == 0)){
    		localStorage.paging = 1;
    		cp --;
    		url = changeURLArg(location.href,'cp',cp);
    		console.log(url);
    		document.location.href = url;
    		//window.location.assign(url);
    	}
    	
    	
    	if((localStorage.paging != -1) && (scrollObj.viewheight + scrollObj.scrollY) > (scrollObj.height - 300)){
    		cp ++;
    		url = changeURLArg(location.href,'cp',cp);
    		console.log(url)
    		document.location.href = url;
    	}
	}

}




if(window.paging == -1) {
	localStorage.paging = -1;
	history.back();
}


</script>
