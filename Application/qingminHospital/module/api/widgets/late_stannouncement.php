<?php
use EFrame\Helper\T;


/**
 * 项目方阵
 * 说明：
 * 该模块与新闻模块极度相似。区别在于公告没有发布时间，而新闻列表有新闻发布时间
 * 项目方阵是以图标付标题的矩形阵列
 数据形式如测试数据：
 */
//测试数据(最多（佳）展示11条新闻)

$testdata = [
    'typename' => '最新公告',       //类型所属分类名称
    'typehref' => 'articles5a33.html?classid=60', //指向所属栏目的路由
    'list' => [
        [
            'name' => '急诊外科大楼部分医用设备招标公告',
            'href' => '/article625b.html',
        ],
    ],
];
$latestannouncement = $data ? $data : [];
if($data === 'testdata') $latestannouncement = $testdata;
if(empty($latestannouncement)) return;
$url = App::params("@webServer")."/api/artical/read?aid=";
?>

<div class="s2">
	<div class="bar">
		<span><?=T::arrayValue('typename', $latestannouncement) ?></span><em>&nbsp;</em><a
			href="<?=App::params('@webServer').T::arrayValue('typehref', $latestannouncement) ?>">更多>></a>
	</div>
	<div class="lts2">
		<ul>
			<?php 
			for($i = 0; $i < count($latestannouncement['list']); $i ++ ):
			$list = $latestannouncement['list'][$i];
			?>
			<li><a href='<?=$url.T::arrayValue('id', $list) ?>'><?=T::arrayValue('name', $list) ?></a></li>
			<?php endfor;?>
		</ul>
	</div>
</div>
