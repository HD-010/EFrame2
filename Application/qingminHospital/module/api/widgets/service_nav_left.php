<?php
use EFrame\Helper\T;
/**
 * 左则服务项目列表
 * 说明：
 * 左边小图标，中间项目标题，右边向右指引图标
 * 条目实线外边框
 * 传入的数据模式如测试数据
 */
// 测试数据
$testdata = [
    'servicetype' => [
        'typedir' => '/....',
        'typename' =>'医院导航'
    ],
    'list' => [
        [
            'href' => '/....',
            'name' =>'交通地图',
            'imgurl' => '/images/e1.jpg',
        ],
        [
            'href' => '/....',
            'name' =>'楼层分布',
            'imgurl' => '/images/e2.jpg',
        ],
        [
            'href' => '/....',
            'name' =>'预约挂号',
            'imgurl' => '/images/e3.jpg',
        ],
        [
            'href' => '/....',
            'name' =>'就医流程',
            'imgurl' => '/images/e4.jpg',
        ],
        [
            'href' => '/....',
            'name' =>'医保专栏',
            'imgurl' => '/images/e5.jpg',
        ],
        [
            'href' => '/....',
            'name' =>'住院需知',
            'imgurl' => '/images/e6.jpg',
        ],
    ],
];

$service = $data || [];
if ($data == 'testdata')
    $service = $testdata;
    if (empty($service))
    return;
$webServer = App::params('@webServer');
?>


<div class="d1 mt10"><span><?=T::arrayValue('servicetype.typename', $service) ?></span></div>

<div class="bd1">
<ul>
    <?php 
    for($i = 0; $i < count($service['list']); $i ++ ): 
    $list = $service['list'][$i];
    ?>
    <li class="k1" style="background-image:url(<?=$webServer.T::arrayValue('imgurl', $list) ?>)">
    	<a href="<?=$webServer.T::arrayValue('name', $list) ?>"><?=T::arrayValue('name', $list) ?></a>
    </li>
    <?php endfor ?> 
</ul>
</div>
