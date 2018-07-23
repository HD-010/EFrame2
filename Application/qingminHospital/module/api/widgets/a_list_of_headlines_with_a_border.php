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
    'themeimg' => '/images/q10.jpg',       //主题图片
    'list' => [
        [
            'title' => '两学一做学习教育',
            'href' => '/.......',
        ],
        [
            'title' => '民主考评',
            'href' => '/.......',
        ],
        [
            'title' => '创建无烟医院',
            'href' => '/.......',
        ],
    ],
];

$alistofheadlineswithaboorder = $data || [];
if($data === 'testdata') $alistofheadlineswithaboorder = $testdata;
if(empty($alistofheadlineswithaboorder)) return;
$webServer = App::params('@webServer');
?>

<div class="icos1" style="background-image:url(<?=$webServer.T::arrayValue('themeimg', $alistofheadlineswithaboorder) ?>)">
	<div class="spm">
		<ul>
			<?php 
			for($i = 0; $i < count($alistofheadlineswithaboorder['list']); $i ++):
			$list = $alistofheadlineswithaboorder['list'][$i];
			?>
			<li><a href='<?=$webServer.T::arrayValue('href', $list) ?>'><?=T::arrayValue('title', $list) ?></a></li>
			<?php endfor; ?>
		</ul>
		<div class="clear">&nbsp;</div>
	</div>
	<div class="lxwmen">
		<a href="articles606d.html?classid=75"></a>
	</div>
</div>