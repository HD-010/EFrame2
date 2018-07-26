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
$articalList = $data || [];
if($data === 'testdata') $articalList = $testdata;
if(empty($articalList)) return;
$webServer = App::params("@webServer");
?>


<div class="rm" style="margin-bottom:1.5em;">
<div class="ew"><div class="clasname"><?=T::arrayValue('typename', $articalList) ?></div></div>
<div class="mc">
<div class="dmlist">
<ul>

<?php for($i = 0; $i < count($testdata['list']); $i++):
$list = $testdata['list'][$i];
?>
<li><a href='<?=$webServer.T::arrayValue('href', $list) ?>' title='<?=T::arrayValue('title', $list) ?>'><?=T::arrayValue('title', $list) ?></a></li>
<?php endfor;?>

</ul>
<div class="clear">&nbsp;</div>
</div>
</div>
</div>

