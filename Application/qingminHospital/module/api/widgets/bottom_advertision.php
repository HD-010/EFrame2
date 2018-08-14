<?php
use EFrame\Helper\T;
/**
 * 底部广告
 */
//测试数据(最多（佳）展示9个元素)
$testdata = [
    'themeimg' => '/images/as.jpg',       //主题图片
    'list' => [
        [
            'id' => '',     //文章id
            'typeid' => 15, //栏目id
            'name' => '飞利浦Allura Xper FD-20F平板数字血管造影系统',
            'litpic' => '/.......',
        ],
    ],
];

$bottomadvertision = $data ? $data : [];
if($data === 'testdata') $bottomadvertision = $testdata;
if(empty($bottomadvertision)) return;
$rel = App::params('@relImg');
$url = App::params('@webServer').'/api/artical/read?aid=';
?>


<div class="wp shebei" style="background-image:url(<?=App::params('@webServer').T::arrayValue('themeimg', $bottomadvertision) ?>)">
	<div class="simlist" id="hottitle">
		<ul id="ulid">
			<?php 
			for($i = 0; $i < count($bottomadvertision['list']); $i ++):
			$list = $bottomadvertision['list'][$i];
			?>
			<li>
				<a href='<?=$url.T::arrayValue('id', $list) ?>'>
					<img src='http://<?=$rel.T::arrayValue('litpic', $list) ?>'
						alt='<?=T::arrayValue('name', $list) ?>' />
				</a>
			</li>
			<?php endfor;?>
		</ul>
	</div>
</div>