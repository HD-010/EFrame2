<?php 
use EFrame\Helper\T;

T::print_pre($data);exit;

$typeName = $data['data'][0]['typename'];
$description = T::limitStr(190, $data['data'][0]['description']);
$c =  $data['data'][0]['nid'];
$m = $data['param']['m'];
$v = T::getStrVal(-1, $data['data'][0]['typedir']);
$tid = $data['param']['tid'];
$tUrl = T::replaceToVal($data['param']['tUrl'],[
'c' => $c,
'm' => $m,
'v' => $v,
'tid' => $tid
]);

?>

<section class="video_list_met_m1156_1 lazy full" m-id="45" data-title="视频" data-background="../../static/images/sking/1519793505.jpg">
	<div class="container video-box">
		<div class="row">
			<div class="video-left active">
				<div class="video-content">
					<img class="lazy" data-src="/static/images/picture/1519826764.jpg" alt="什么是响应式？">
					<video loop controls src="http://www.metinfo.cn/templates/metinfo2016/min/video/met-index-mb.mp4"></video>
				</div>
				<div class="video-text">
					<h3>什么是响应式？</h3>
					<ul>
						<li>
							<b>语言</b>2017-08-01
						</li>
						<li>
							<b>来源</b>MP4视频
						</li>
						<li>
							<b>发布</b>ortotra
						</li>
						<li>
							<b>类型</b>英语（中文翻译）
						</li>
					</ul>
					<p>
						页面的布局方式应当根据用户所处的设备环境（系统平台，屏幕尺寸，屏幕方向）进行正确的响应布局调整，无论用户使用的是笔记本还是手机或者平板，我们的网站页面都能够自动切换分辨率，图片大小尺寸以及相关的脚本功能，响应式Web设计的目的就是为了：只需一个网站前台源码，却能兼容多个终端，而不是为了每个终端去单独设计网站前台。
					</p>
					<a class="click-box small" href="<?=$tUrl ?>" title="什么是响应式？" target=_self>
						<span>READ MORE</span>
					</a>
				</div>
			</div>
			<div class="video-right">
				<div class="video-list" data-autoplay="1">
					<ol class="video-ol">
						<li class="video-li active" title="什么是响应式？">
							<font data-video="&lt;video loop controls src=&quot;http://www.metinfo.cn/templates/metinfo2016/min/video/met-index-mb.mp4&quot;&gt;&lt;/video&gt;" data-type="" data-para="&lt;li&gt;&lt;b&gt;语言&lt;/b&gt;2017-08-01&lt;/li&gt;&lt;li&gt;&lt;b&gt;来源&lt;/b&gt;MP4视频&lt;/li&gt;&lt;li&gt;&lt;b&gt;发布&lt;/b&gt;ortotra&lt;/li&gt;&lt;li&gt;&lt;b&gt;类型&lt;/b&gt;英语（中文翻译）&lt;/li&gt;" data-desc="页面的布局方式应当根据用户所处的设备环境（系统平台，屏幕尺寸，屏幕方向）进行正确的响应布局调整，无论用户使用的是笔记本还是手机或者平板，我们的网站页面都能够自动切换分辨率，图片大小尺寸以及相关的脚本功能，响应式Web设计的目的就是为了：只需一个网站前台源码，却能兼容多个终端，而不是为了每个终端去单独设计网站前台。">
								<img class="video-lazy" data-src="../../static/images/picture/1519826764.jpg" alt="什么是响应式？">
							</font>
							<span>
							<a href="https://index.wuhao.vip/video/video41.html" title="什么是响应式？" target=_self>
								什么是响应式？
							</a></span>
						</li>
						<li class="video-li " title="教你开发应用！">
							<font data-video="" data-type="" data-para="&lt;li&gt;&lt;b&gt;语言&lt;/b&gt;2017-05-26&lt;/li&gt;&lt;li&gt;&lt;b&gt;来源&lt;/b&gt;MP4视频&lt;/li&gt;&lt;li&gt;&lt;b&gt;发布&lt;/b&gt;ortotra&lt;/li&gt;&lt;li&gt;&lt;b&gt;类型&lt;/b&gt;英文（中文翻译）&lt;/li&gt;" data-desc="不论是ios还是android的应用开发，其实都遵循着一定的开发流程，只有如此才能使开发过程有章可循而不是一团乱。开发App对于一些没有学过编程语言的人来说确实比较困难，但是现在有款软件可以帮助您快速进行App的开发。">
								<img class="video-lazy" data-src="../../static/images/picture/1519825566.jpg" alt="教你开发应用！">
							</font>
							<span>
							<a href="https://index.wuhao.vip/video/video42.html" title="教你开发应用！" target=_self>
								教你开发应用！
							</a></span>
						</li>
						<li class="video-li " title="做网站有什么用？">
							<font data-video="&lt;video loop controls src=&quot;http://show.metinfo.cn/muban/M1156004/305/upload/video/video.mp4&quot;&gt;&lt;/video&gt;" data-type="" data-para="&lt;li&gt;&lt;b&gt;语言&lt;/b&gt;2017-06-09&lt;/li&gt;&lt;li&gt;&lt;b&gt;来源&lt;/b&gt;MP4视频&lt;/li&gt;&lt;li&gt;&lt;b&gt;发布&lt;/b&gt;ortotra&lt;/li&gt;&lt;li&gt;&lt;b&gt;类型&lt;/b&gt;英文（中文字幕）&lt;/li&gt;" data-desc="拥有企业自己的域名，建立企业自己的网站，树立企业在科技信息时代的完美形象。作为第四媒体的互联网，其特点就是可以跨越时空，正常情况下，网站无时无刻不在工作通过企业的网站，用户可以跨越时空了解企业，利用多媒体技术，企业可以向用户展示产品、技术、经营理念、企业文化、企业形象，树立现代企业形象，增值企业无形资产。">
								<img class="video-lazy" data-src="../../static/images/picture/1519825663116547.jpg" alt="做网站有什么用？">
							</font>
							<span>
							<a href="https://index.wuhao.vip/video/video43.html" title="做网站有什么用？" target=_self>
								做网站有什么用？
							</a></span>
						</li>
						<li class="video-li" title="PS的技巧">
							<font data-video="&lt;video loop controls src=&quot;http://show.metinfo.cn/muban/M1601005/317/upload/video/201703/1489374489335131.mp4&quot;&gt;&lt;/video&gt;" data-type="" data-para="&lt;li&gt;&lt;b&gt;语言&lt;/b&gt;2017-05-22&lt;/li&gt;&lt;li&gt;&lt;b&gt;来源&lt;/b&gt;MP4视频&lt;/li&gt;&lt;li&gt;&lt;b&gt;发布&lt;/b&gt;ortotra&lt;/li&gt;&lt;li&gt;&lt;b&gt;类型&lt;/b&gt;英文（中文字幕）&lt;/li&gt;" data-desc="PS爱好者教程自学网提供Ps教程,PhotoShop教程,ps实例教程,PS抠图教程,ps调色教程,Ps基础入门教程,文字特效,Ps视频教程,让您轻松快乐的学会Adobe公司的Ps照片处理软件。">
								<img class="video-lazy" data-src="../../static/images/picture/1519826725557820.jpg" alt="PS的技巧">
							</font>
							<span>
							<a href="https://index.wuhao.vip/video/video44.html" title="PS的技巧" target=_self>
								PS的技巧
							</a></span>
						</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

