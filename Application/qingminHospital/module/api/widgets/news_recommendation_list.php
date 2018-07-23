<?php
use EFrame\Helper\T;


/**
 * 新闻推荐列表
 * 说明：
 * 该模块与公告模块极度相似。区别在于新闻列表有新闻发布时间，而公告没有发布时间
 * 新闻推荐列表是将需要推荐新闻的标题以无序列表一行一条陈列出来
 数据形式如测试数据：
 */
//测试数据(最多（佳）展示11条新闻)
$testdata = [
    'typename' => '医院新闻',       //类型所属分类名称
    'typehref' => 'articles5a33.html?classid=60', //指向所属栏目的路由
    'list' => [
        [
            'title' => '医院举办党的十九大精神宣讲报告会',
            'href' => '/article625b.html',
            'pubtime' => '2018-07-18',
        ],
        
    ],
];


//$recommendheadlines = $data['recommendheadlines'];

$newsrecommendationlist = $data || [];
if($data === 'testdata') $newsrecommendationlist = $testdata;
if(empty($newsrecommendationlist)) return;

?>

<div class="w416">
	<div class="h24">
		<span class="cur"><a target="_blank"
			href="<?=App::params('@webServer').T::arrayValue('typehref', $newsrecommendationlist) ?>"><?=T::arrayValue('typename', $newsrecommendationlist); ?></a></span><span
			class="sp1"><a href="<?=App::params('@webServer').T::arrayValue('typehref', $newsrecommendationlist) ?>">更多>></a></span>
	</div>
	<div class="lts1">
		<ul>
			<?php 
			for($i = 0; $i < count($newsrecommendationlist['list']); $i ++):
			$list = $newsrecommendationlist['list'][$i];
			?>
    			<li>
    			<span>
    			<a href='<?=App::params('@webServer').T::arrayValue('href', $list) ?>'><?=T::arrayValue('title', $list) ?></a>
    			</span>
    			<em><?=T::arrayValue('pubtime', $list); ?></em>
    			</li>
			<?php endfor; ?>
		</ul>
	</div>
</div>