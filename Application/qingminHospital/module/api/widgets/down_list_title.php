<?php
use EFrame\Helper\T;


/**
 * 栏目页面新闻列表
 * 说明：
 * 项目方阵是以图标付标题的矩形阵列
 数据形式如测试数据：
 */
//测试数据(最多（佳）展示9个元素)

$testdata = [
    'typename' => "职能科室",
    'list' => [
        [
            'title' => '动态血压监测（ABPM）及临床应',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
    ],
];
$downList = $data ? $data : [];
if($data === 'testdata') $downList = $testdata;
if(empty($downList)) return;
$webServer = App::params("@webServer");
$relDown = App::params("@relImg");
?>

<div class="artlists">
	<ul>
	<?php 
	if(empty($downList['list'])) echo "<font style='color:#5c5656;'>还没有数据……</font>";
	for($i = 0; $i < count($downList['list']); $i ++ ):
	$list = $downList['list'][$i];
	$hrefStart = strpos($list['softlinks'], '/uploads');
	$hrefEnd = strpos($list['softlinks'], ' {');
	$list['softlinks'] = substr($list['softlinks'], $hrefStart, $hrefEnd - $hrefStart);
	?>
		<li><span><a target='_blank' href='<?=$relDown.T::arrayValue('softlinks', $list)?>'><?=T::arrayValue('title', $list)?></a></span><em>[<?=date('m-d',T::arrayValue('pubdate', $list))?>]</em></li>
	<?php endfor;?>
	</ul>
</div>