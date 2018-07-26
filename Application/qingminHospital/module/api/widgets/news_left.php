<?php
use EFrame\Helper\T;
/**
 * 左则新闻展示栏
 * 说明：
 * 左则新闻展示栏将新闻，动态展示到页面的左则
 * 传入的数据模式如测试数据
 */
// 测试数据
$testdata = [
    'serviceType' => [
        'typedir' => '/....',
        'typename' =>'医院动态'
    ],
    'list' => [
        [
            'href' => '/....',
            'name' =>'・医院举办党的十九大精神宣讲报告会',
        ],
        [
            'href' => '/....',
            'name' =>'・主题党日活动 弘扬铁军精神',
        ],
        [
            'href' => '/....',
            'name' =>'・巡回义诊（第139站），走进双桥社区',
        ],
        [
            'href' => '/....',
            'name' =>'・宣讲十九大精神进行时',
        ],
        [
            'href' => '/....',
            'name' =>'・巡回义诊（第138站），走进周王镇',
        ],
        [
            'href' => '/....',
            'name' =>'・医院召开统战工作会议',
        ],
        [
            'href' => '/....',
            'name' =>'・影像省级继教班开班',
        ],
        [
            'href' => '/....',
            'name' =>'・医院举办第五届歌手大赛',
        ],
        [
            'href' => '/....',
            'name' =>'・市委巡察反馈整改推进会召开',
        ],
    ],
];

$news = $data ? $data : [];
if ($data == 'testdata')
    $news = $testdata;
    if (empty($news['list']))return;
    
$webServer = App::params('@webServer');
?>


<div class="d1 mt10"><span><?=T::arrayValue('serviceType.typename', $news) ?></span></div>
<div class="bd3">
<ul>

	<?php 
	for($i = 0; $i < count($news['list']); $i ++):
	$list = $news['list'][$i];
	
	?>
	<li><a href='<?=$webServer.T::arrayValue('href', $list) ?>'><?=T::arrayValue('name', $list) ?></a></li>
	<?php endfor;?>

</ul>
</div>
