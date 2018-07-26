<?php
use EFrame\Helper\T;
/**
 * 宣传专栏
 * 说明：
 * 左则宣传标题展示栏
 * 传入的数据模式如测试数据
 */
// 测试数据
$testdata = [
    'serviceType' => [
        'typedir' => '/....',
        'typename' =>'医院专栏'
    ],
    'list' => [
        [
            'href' => '/....',
            'name' =>'两学一做学习教育',
        ],
        [
            'href' => '/....',
            'name' =>'民主考评',
        ],
        [
            'href' => '/....',
            'name' =>'创建无烟医院',
        ],
        [
            'href' => '/....',
            'name' =>'创建文明（卫生）城市',
        ],
        [
            'href' => '/....',
            'name' =>'公立医院改革',
        ],
        [
            'href' => '/....',
            'name' =>'三好一满意',
        ],
        [
            'href' => '/....',
            'name' =>'党务公开',
        ],
        [
            'href' => '/....',
            'name' =>'医疗服务信息公开',
        ],
        [
            'href' => '/....',
            'name' =>'“满意度调查”',
        ],
    ],
];

$propaganda = $data ? $data : [];
if ($data == 'testdata')
    $propaganda = $testdata;
    if (empty($propaganda['list']))return;
    
$webServer = App::params('@webServer');
?>


<div class="d1 mt10"><span><?=T::arrayValue('serviceType.typename', $propaganda) ?></span></div>
<div class="bd2">
<ul>

<?php 
for($i = 0; $i < count($propaganda['list']); $i ++ ): 
$list = $propaganda['list'][$i];
?>
<li><a href='<?=$webServer.T::arrayValue('href', $list) ?>'><?=T::arrayValue('name', $list) ?></a></li>

<?php endfor;?>
</ul>
</div>