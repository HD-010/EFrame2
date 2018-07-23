<?php
use EFrame\Helper\T;


/**
 * 项目方阵
 * 说明：
 * 项目方阵是以图标付标题的矩形阵列
 数据形式如测试数据：
 */
//测试数据(最多（佳）展示9个元素)

$testdata = [
    [
        'title' => '预约挂号',
        'href' => '/.....',
        'imgurl' => '/images/y1.jpg',
    ],
    [
        'title' => '门诊排班',
        'href' => '/.....',
        'imgurl' => '/images/y2.jpg',
    ],
    [
        'title' => '楼层分布',
        'href' => '/.....',
        'imgurl' => '/images/y3.jpg',
    ],
];
$projectsquare = $data || [];
if($data === 'testdata') $projectsquare = $testdata;
if(empty($projectsquare)) return;
?>

<div class="icos">
	<div class="spk">
		<ul>
			<?php 
			for($i = 0; $i < count($projectsquare); $i ++):
			$list = $projectsquare[$i];
			?>
			<li class="bs1" style="background-image:url(<?=App::params('@webServer').T::arrayValue('imgurl', $list) ?>)">
				<span>
					<a href="<?=App::params('@webServer').T::arrayValue('href', $list) ?>">&nbsp;</a>
				</span>
				<em>
					<a href="<?=App::params('@webServer').T::arrayValue('href', $list) ?>"><?=T::arrayValue('title', $list) ?></a>
				</em>
			</li>
			<?php endfor;?>
		</ul>
		<div class="clear">&nbsp;</div>
	</div>
</div>
