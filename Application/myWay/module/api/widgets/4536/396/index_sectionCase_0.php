<?php 
use EFrame\Helper\T;


//T::print_pre($data);exit;
if(!$data['status']) return;
$title = $data['data'][0]['title'];
$description = T::limitStr(190, $data['data'][0]['description']);
$c =  $data['arctypeInfor'][0]['nid'];
$m = $data['param']['m'];
$v = T::getStrVal(-1, $data['arctypeInfor'][0]['typedir']);
$tid = $data['param']['tid'];
$tUrl = T::replaceToVal($data['param']['tUrl'],[
    'c' => $c,
    'm' => $m,
    'v' => $v,
    'tid' => $tid
]);

?>

<section class="case_list_met_m1156_1 lazy full" m-id="6" data-title="案例" data-background="../../static/images/sking/1519793312.png">
	<div class="container case-box">
		<div class="row">
			<div class="case-left" style="position: relative;">
				<h3><u>案例欣赏</u>，优质开发！</h3>
				<p>
					凭借拔尖的团队、优秀的业务能力，星如雨迅速成长为国内SEO的领军者。我们专注网络营销业务，助力您的企业腾飞。同时，我们还拥有一支健全的建站团队，向外界承接APP应用开发/微网站/公众号策划营销等业务。
				</p>
				<a class="click-box" href="<?=$tUrl ?>" target=_self>
					<span>READ MORE</span>
				</a>
			</div>
			<div class="case-right     ">
				<div class="case-list">
					<ul class="case-ul">
						<li class="case-li case-null swiper-slide-active"></li>
						
						<?php  
						for($i = 0; $i < count($data['data']); $i ++): 
						
						?>
						<li class="case-li">
							<?php 
    						$list = $data['data'][$i];
    						$aid = T::arrayValue('id', $list);
    						$title = T::arrayValue('title', $list);
    						$img = T::arrayValue('litpic', $list);
							$aUrl = T::replaceToVal($data['param']['aUrl'],[
							    'c' => $c,
							    'm' => $m,
							    'v' => $v,
							    'aid' => $aid
							]);
							if($title):
							?>
							<span>
							<a href="<?=$aUrl?>" title="<?=$title ?>" target=_self>
								<img class="case-lazy" data-src="<?=$img ?>" alt="<?=$title ?>">
								<font><?=$title ?></font>
							</a>
							<p class="fa fa-search" data-imglist="<?=$title ?>*-=<?=$img ?>+|-"></p> </span>
							<?php 
							$i ++;
							endif;
							?>
							
							<?php 
							$list = T::arrayValue('data.'.$i, $data);
							if(is_array($list)):
							$aid = T::arrayValue('id', $list);
							$title = T::arrayValue('title', $list);
							$img = T::arrayValue('litpic', $list);
							$aUrl = T::replaceToVal($data['param']['aUrl'],[
							    'c' => $c,
							    'm' => $m,
							    'v' => $v,
							    'aid' => $aid
							]);
							
							?>
							<span>
							<a href="<?=$aUrl?>" title="<?=$title ?>" target=_self>
								<img class="case-lazy" data-src="<?=$img ?>" alt="<?=$title ?>">
								<font><?=$title ?></font>
							</a>
							<p class="fa fa-search" data-imglist="<?=$title ?>*-=<?=$img ?>+|-"></p> </span>
							<?php endif?>
						</li>
						
						<?php endfor?>
						
					</ul>
				</div>
			</div>
			<div class="case-ctrl">
				<div class="ctrl-left"></div>
				<div class="ctrl-right"></div>
			</div>
		</div>
	</div>
</section>