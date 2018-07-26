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
    [
        'title' => '动态血压监测（ABPM）及临床应',
        'href' => '/.....',
        'content' => '为进一步深入学习宣传贯彻党的十八大精神，把党员干部职工的思想和行动统一到党的十八大精神上来，推进医院科学发展，努力为人民群众提供“安全、有效、方便、价廉”的医疗服务。12月28日，医院学习贯彻党十八大精神专题辅导报告会在新门诊楼四楼会议厅举行。党委书记王义文作辅导报告，党委委员、副院长张平主持会议，院党委委员及全体党员参加了会议',
        'pubdate' => '2012/12/18',
        'author' => 'admin',
        'click' => '1565',
     ],
    [
        'title' => '动态血压监测（ABPM）及临床应',
        'href' => '/.....',
        'content' => '',
        'pubdate' => '2012/12/18',
        'author' => '',
        'click' => '1565',
    ],
];
$articles = $data || [];
if($data === 'testdata') $articles = $testdata;
if(empty($articles)) return;
$webServer = App::params("@webServer");
?>

<div class="mc">
	<h1><?=T::arrayValue('1.title', $articles)  ?></h1>
	<div class="info">发布时间：<?=T::arrayValue('1.pubdate', $articles)  ?>&nbsp;&nbsp;&nbsp;&nbsp;浏览：<?=T::arrayValue('1.click', $articles)  ?>次&nbsp;&nbsp;&nbsp;&nbsp;来源：<?=T::arrayValue('1.author', $articles)  ?></div>

	<!--<div class="artimg"><img src="/uploads/image/20121229/20121229090754195419.jpg" /></div>-->

	<div class="contents">
	<?=T::arrayValue('1.content', $articles)  ?>
	</div>
	<div class="pon">
		<span>上一篇：</span><a href='<?=T::arrayValue('0.href', $articles)  ?>'><?=T::arrayValue('0.title', $articles)  ?></a><br />
		<span>下一篇：</span><a href='<?=T::arrayValue('2.href', $articles)  ?>'><?=T::arrayValue('2.title', $articles)  ?></a>
	</div>
</div>