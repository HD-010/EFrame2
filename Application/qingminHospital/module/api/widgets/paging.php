<?php
use EFrame\Helper\T;


/**
 * 分页工具
 * 说明：
 * 
 数据形式如测试数据：
 */
//测试数据(最多（佳）展示9个元素)

$testdata = [
    'homepage' => '/.....',
    'currentpage' => '1',
    'endpage' => '/.....',
];
$paging = $data || [];
if($data === 'testdata') $paging = $testdata;
if(empty($paging)) return;
$webServer = App::params("@webServer");
?>


<div class='clear'>&nbsp;</div>
<div class='clear'>&nbsp;</div>
<div class='mypage'>
	<a class='m' href='<?=$webServer.T::arrayValue('homepage', $paging) ?>'>首页</a>
	<a class='n'>上一页</a><strong>1</strong><a class='n'>下一页</a> 
	<a class='m' href='<?=$webServer.T::arrayValue('endpage', $paging) ?>'>尾页</a>
</div>