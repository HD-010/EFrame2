<?php
use EFrame\Helper\T;
/**
 * 根况列表
 * 说明：
 * 左边向左小箭头，右边标题加下横线
 * 传入的数据模式如测试数据
 */
// 测试数据
$testdata = [
    'arctypeCurrent' => [
        'typedir' => '/....',
        'typename' =>'医院概况'
    ],
    'arctypeSon' => [
        [
            'typedir' => '/....',
            'typename' =>'医院简介'
        ],
        [
            'typedir' => '/....',
            'typename' =>'领导团队'
        ],
        [
            'typedir' => '/....',
            'typename' =>'专家介绍'
        ],
        [
            'typedir' => '/....',
            'typename' =>'医院风采'
        ],
        [
            'typedir' => '/....',
            'typename' =>'环境设备'
        ],
    ],
];

$arctype = $data ? $data : [];
if ($data == 'testdata')
    $arctype = $testdata;
    if (empty($arctype))
    return;
$webServer = App::params('@webServer');
?>


<div class="d1"><span><?=T::arrayValue('arctypeCurrent.typename', $arctype) ?></span></div>
<div class="bd">
<ul>

<?php 
for($i = 0; $i < count($arctype['arctypeSon']); $i ++):
$list = $arctype['arctypeSon'][$i];
?>
<li><a href='<?=$webServer.T::arrayValue('typedir', $list) ?>' rel=''><?=T::arrayValue('typename', $list) ?></a></li>
<?php endfor; ?>

</ul>
</div>