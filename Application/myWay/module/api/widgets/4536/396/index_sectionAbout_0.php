<?php 
use EFrame\Helper\T;

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

//T::print_pre($data);exit;
?>
<section class="show_list_met_m1156_1 lazy full" m-id="3" data-title="关于" data-background="/static/images/sking/1519827535.png">
	<div class="container about-box" m-id="3">
		<div class="row">
			<div class="about-left">
			
				<h3><font>Internet service technology, Limited by Share Ltd</font><span><u>朴艺科技</u>有限公司</span></h3>
				<ul>
					<li>
						<strong>
						<hr class="n5">
						<hr class="n7">
						</strong>
						<font>位</font>
						<span>投资服务商</span>
					</li>
					<li>
						<strong>
						<hr class="n4">
						<hr class="n9">
						<hr class="n2">
						<hr class="n1">
						</strong>
						<font>套</font>
						<span>精品案例数</span>
					</li>
					<li>
						<strong>
						<hr class="n9">
						</strong>
						<font>万</font>
						<span>总承诺资金</span>
					</li>
					<li>
						<strong>
						<hr class="n4">
						<hr class="n3">
						</strong>
						<font>个</font>
						<span>全国分销商</span>
					</li>
				</ul>
				<p>
					<?=$description ?>
				</p>
				<a class="click-box" href="<?=$tUrl ?>" target=_self>
					<span>READ MORE</span>
				</a>
			</div>
			<div class="about-right     ">
				<div class="about-list">
					<ul class="about-ul">
						<li class="about-li">
							<img class="about-lazy" data-src="/static/images/picture/1519788735.jpg">
						</li>
						<li class="about-li">
							<img class="about-lazy" data-src="/static/images/picture/1519788597.jpg">
						</li>
						<li class="about-li">
							<img class="about-lazy" data-src="/static/images/picture/1519788666.jpg">
						</li>

					</ul>
				</div>
			</div>
			<div class="about-click">
				<a class="click-box" href="<?=$tUrl?>" target=_self>
					<span>READ MORE</span>
				</a>
			</div>
		</div>
	</div>
</section>