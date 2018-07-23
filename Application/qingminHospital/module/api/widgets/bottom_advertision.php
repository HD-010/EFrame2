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
            'src' => '/.....',
            'alt' => '飞利浦Allura Xper FD-20F平板数字血管造影系统',
            'href' => '/.......',
        ],
        [
            'src' => '',
            'alt' => '飞利浦Allura Xper FD-20F平板数字血管造影系统',
            'href' => '/.......',
        ],
        [
            'src' => '',
            'alt' => '飞利浦Allura Xper FD-20F平板数字血管造影系统',
            'href' => '/.......',
        ],
        
    ],
];

$bottomadvertision = $data || [];
if($data === 'testdata') $bottomadvertision = $testdata;
if(empty($bottomadvertision)) return;
$webServer = App::params('@webServer');
?>


<div class="wp shebei" style="background-image:url(<?=$webServer.T::arrayValue('themeimg', $bottomadvertision) ?>)">
	<div class="simlist" id="hottitle">
		<ul id="ulid">
			<?php 
			for($i = 0; $i < count($bottomadvertision['list']); $i ++):
			$list = $bottomadvertision['list'][$i];
			?>
			<li>
				<a href='<?=$webServer.T::arrayValue('href', $list) ?>'>
					<img src='<?=$webServer.T::arrayValue('src', $list) ?>'
						alt='<?=T::arrayValue('alt', $list) ?>' />
				</a>
			</li>
			<?php endfor;?>
		</ul>
	</div>
</div>