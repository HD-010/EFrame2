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
    "content" => "宣城市人民医院是集医教研和预防保健等于一体的三级甲等综合医院。是省辖宣城市最大的公立医院，皖南医学院、蚌埠医学院教学医院。曾获全国文明单位、国家爱婴医院、省级诚信医院、省级医德医风示范医院、省先进基层党组织、省卫生系统先进集体、省三八红旗集体、省卫生先进单位、市民主考评先进单位、市人才工作先进集体等称号。",
];
$contents = is_array($data) ?  $data : [];

if ($data == 'testdata')  $contents = $testdata;
if (empty($contents)) return;
$webServer = App::params('@webServer');
?>

<div class='contents'>
<?=T::arrayValue('content', $contents); ?>
</div>


</div>
</div>

