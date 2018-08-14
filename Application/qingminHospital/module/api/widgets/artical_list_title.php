<?php
use EFrame\Helper\T;


/**
 * 栏目页面文章列表
 * 说明：
 * 项目方阵是以图标付标题的矩形阵列
 数据形式如测试数据：
 */
//测试数据(最多（佳）展示9个元素)

$testdata = [
    'typename' => "职能科室",
    'list' => [
        [
            'title' => '办公室',
            'href' => '/.....',
        ],
        [
            'title' => '医务部',
            'href' => '/.....',
        ],
        [
            'title' => '护理部',
            'href' => '/.....',
        ],
        [
            'title' => '门诊部',
            'href' => '/.....',
        ],
        [
            'title' => '医患关系办公室',
            'href' => '/.....',
        ],
        [
            'title' => '人力资源部',
            'href' => '/.....',
        ],
        [
            'title' => '招标采购中心',
            'href' => '/.....',
        ],
        
    ],
];
$articalList = $data ? $data : [];
if($data === 'testdata') $articalList = $testdata;
if(empty($articalList)) return;
$webServer = App::params('@webServer');
$url = App::params('@webServer').'/api/artical/read?aid=';
$rel = App::params('@relImg');
//T::print_pre($articalList);
?>

<?php 

for($j = 0;$j < count($articalList['clumns']);$j++ ):
$clum = $articalList['clumns'][$j];
$dlumid = $clum['id'];
?>
<div class="rm" style="margin-bottom: 1.5em;">
	<div class="ew">
		<div class="clasname"><?=T::arrayValue('typename', $clum) ?></div>
	</div>
	<div class="mc">
		<div class="dmlist">
			<ul>

<?php

for ($i = 0; $i < count($articalList['arclist']); $i ++) :
$list = $articalList['arclist'][$i];
if($list['typeid'] != $dlumid) continue;
    ?>
<li><a href='<?=$url.T::arrayValue('id', $list) ?>'
					title='<?=T::arrayValue('name', $list) ?>'><?=T::arrayValue('name', $list) ?></a></li>
<?php endfor;?>

</ul>
			<div class="clear">&nbsp;</div>
		</div>
	</div>
</div>
<?php 
unset($articalList['arclist'][$i]);
endfor;
?>
