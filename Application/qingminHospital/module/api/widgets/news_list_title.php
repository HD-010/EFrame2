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
        [
            'title' => '动态心电图及其临床应用',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
        [
            'title' => '体外震波碎石术',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
        [
            'title' => '吸烟会增加年龄相关性黄斑变性的发',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
        [
            'title' => '动态心电图及其临床应用',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
        [
            'title' => '体外震波碎石术',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
        [
            'title' => '吸烟会增加年龄相关性黄斑变性的发',
            'href' => '/.....',
            'pubdate' => '2012/12/18',
        ],
        
        
    ],
];
$newsList = $data || [];
if($data === 'testdata') $newsList = $testdata;
if(empty($newsList)) return;
$webServer = App::params("@webServer");
?>

<div class="artlists">
	<ul>
	<?php 
	for($i = 0; $i < count($newsList['list']); $i ++ ):
	$list = $newsList['list'][$i];
	?>
		<li><span><a target='_blank' href='<?=$webServer.T::arrayValue('href', $list)?>'><?=T::arrayValue('title', $list)?></a></span><em>[<?=T::arrayValue('pubdate', $list)?>]</em></li>
	<?php endfor;?>
	</ul>
</div>