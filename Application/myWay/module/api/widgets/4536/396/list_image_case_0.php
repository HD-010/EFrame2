<?php 
use EFrame\Helper\T;

$usePaging = ($data['status']) ? "<script> window.paging = 1 </script>" : "<script> window.paging = -1 </script>";
echo $usePaging;
if(!$data['status']) return;

$m = T::replaceToVal(T::arrayValue('param.m', $data));
$v = T::replaceToVal(T::arrayValue('param.v', $data));
$c = T::replaceToVal(T::arrayValue('param.c', $data));
$aUrl = T::arrayValue('param.aUrl', $data);

?>

<link rel="stylesheet" type="text/css" href="/static/css/img_cn.css">
<section class="banner_met_m1156_1     " data-title="" m-id="20" m-type="banner">
	<div class="banner-box">
		<div class="banner-wrapper">
			<div class="banner-slide">
				<ul>
					<li class="pc  height">
						<img     src="/static/images/picture/1519800571.jpg"     height="80" alt="">
					</li>
					<li class="pad height">
						<img data-src="/static/images/picture/1519800571.jpg"     height="80" alt="">
					</li>
					<li class="phone height">
						<img data-src="/static/images/picture/1519800571.jpg"     height="60" alt="">
					</li>
				</ul>

			</div>
		</div>
	</div>
</section>

<section class="ad_met_m1156_1 lazy" m-id="37" m-type="nocontent" data-background="    "></section>

<section class="img_list_page_met_m1156_1 lazy" m-id="24"
data-background="/static/images/picture/1519793312.png">
	<div class="met-img animsition     imgs0">
		<div class="container">
			<div class="row">
				<ul class="blocks-2 blocks-md-2 blocks-lg-4 blocks-xxl-4  met-pager-ajax" data-scale="390x540">
					
					
					<?php 
					for($i = 0; $i < count($data['data']); $i ++):
					$list = $data['data'][$i];
					$title = T::limitStr(10, $list['title']);
					$click = $list['click'];
					$aid = $list['id'];
					$description = $list['description'];
					$pubDate = date('Y/m/d',$list['pubdate']);
					$href = T::replaceToVal($aUrl,[
					    'm' => $m,
					    'v' => $v,
					    'c' => $c,
					    'aid' => $aid,
					]);
					?>
					<li class="img-li">
						<span>
						<a href="<?=$href ?>" title="<?=$title ?>" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519806454.jpg" alt="<?=$title ?>">
							<font><?=$title ?></font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        <?=$title ?>*-=http://qn.wuhao.vip/upload/201802/1519806454.jpg+|-"></p> </span>
					</li>
					
					<?php endfor?>
					
					
					
					<!-- <li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case30.html" title="超级音乐播放器" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519805780.png" alt="超级音乐播放器">
							<font>超级音乐播放器</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        超级音乐播放器*-=http://qn.wuhao.vip/upload/201802/1519805780.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case31.html" title="万能日历" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807243.png" alt="万能日历">
							<font>万能日历</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        万能日历*-=http://qn.wuhao.vip/upload/201802/1519807243.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case32.html" title="数据监控应用" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807632.png" alt="数据监控应用">
							<font>数据监控应用</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        数据监控应用*-=http://qn.wuhao.vip/upload/201802/1519807632.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case33.html" title="网速检查器" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807680.png" alt="网速检查器">
							<font>网速检查器</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        网速检查器*-=http://qn.wuhao.vip/upload/201802/1519807680.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case34.html" title="人肉搜索" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807535.png" alt="人肉搜索">
							<font>人肉搜索</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        人肉搜索*-=http://qn.wuhao.vip/upload/201802/1519807535.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case35.html" title="定时提醒应用" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807438.png" alt="定时提醒应用">
							<font>定时提醒应用</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        定时提醒应用*-=http://qn.wuhao.vip/upload/201802/1519807438.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case24.html" title="远程聊天工具" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807666.png" alt="远程聊天工具">
							<font>远程聊天工具</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        远程聊天工具*-=http://qn.wuhao.vip/upload/201802/1519807666.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case37.html" title="用户界面设计" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807946.png" alt="用户界面设计">
							<font>用户界面设计</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        用户界面设计*-=http://qn.wuhao.vip/upload/201802/1519807946.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case38.html" title="画册封面" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519807508.png" alt="画册封面">
							<font>画册封面</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        画册封面*-=http://qn.wuhao.vip/upload/201802/1519807508.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case27.html" title="时间轴介绍" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519808047.png" alt="时间轴介绍">
							<font>时间轴介绍</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        时间轴介绍*-=http://qn.wuhao.vip/upload/201802/1519808047.png+|-"></p> </span>
					</li>
					<li class="img-li">
						<span>
						<a href="http://index.wuhao.vip/case/case28.html" title="音乐播放器" target=_self>
							<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/540_390/1519808435.png" alt="音乐播放器">
							<font>音乐播放器</font>
						</a>
						<p class="fa fa-search met-img-showbtn" data-imglist="        音乐播放器*-=http://qn.wuhao.vip/upload/201802/1519808435.png+|-"></p> </span>
					</li> -->
				</ul>
			</div>
		</div>
		<div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
			<button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
			<i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
			</button>
		</div>
	</div>
</section>