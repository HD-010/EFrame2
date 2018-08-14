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
    [
        'title' => '动态血压监测（ABPM）及临床应',
        'href' => '/.....',
        'content' => '',
        'pubdate' => '2012/12/18',
        'author' => '',
        'click' => '1565',  
    ],
];
$articles = $data ? $data : [];
if($data === 'testdata') $articles = $testdata;
if(empty($articles)) return;
$webServer = App::params("@webServer");
$relImg = App::params("@relImg");
?>

<div class="mc">
	<h1><?=T::arrayValue('0.title', $articles)  ?></h1>
	<div class="info">发布时间：<?=T::arrayValue('0.pubdate', $articles)  ?>&nbsp;&nbsp;&nbsp;&nbsp;浏览：<?=T::arrayValue('0.click', $articles)  ?>次&nbsp;&nbsp;&nbsp;&nbsp;来源：<?=T::arrayValue('0.writer', $articles)  ?></div>

	<!-- <div class="artimg"><img src="http://<?=$relImg.T::arrayValue('0.litpic', $articles)  ?>>" /></div> -->

	<div class="contents">
	<?=T::arrayValue('0.body', $articles)  ?>
	</div>
</div>