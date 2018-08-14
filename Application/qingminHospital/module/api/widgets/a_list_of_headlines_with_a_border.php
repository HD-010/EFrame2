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
            'name' => '两学一做学习教育',
            'id' => '/.......',
        ],
        [
            'name' => '民主考评',
            'id' => '/.......',
        ],
        [
            'name' => '创建无烟医院',
            'id' => '/.......',
        ],
    ],
];

$alistofheadlineswithaboorder = $data ? $data : [];
if($data === 'testdata') $alistofheadlineswithaboorder = $testdata;
if(empty($alistofheadlineswithaboorder)) return;
$url = App::params('@webServer')."/pai/artical/read?aid=";
?>

<div class="icos1" style="background-image:url(<?=$webServer.T::arrayValue('themeimg', $alistofheadlineswithaboorder) ?>)">
	<div class="spm">
		<ul>
			<?php 
			for($i = 0; $i < count($alistofheadlineswithaboorder['list']); $i ++):
			$list = $alistofheadlineswithaboorder['list'][$i];
			?>
			<li><a href='<?=$url.T::arrayValue('id', $list) ?>'><?=T::arrayValue('name', $list) ?></a></li>
			<?php endfor; ?>
		</ul>
		<div class="clear">&nbsp;</div>
	</div>
	<div class="lxwmen">
		<a href="articles606d.html?classid=75"></a>
	</div>
</div>