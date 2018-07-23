<?php
use EFrame\Helper\T;
/**
 * 底部有情链接（图文形式）
 */
//测试数据(最多（佳）展示9个元素)
$testdata = [
    'typename' => '友情链接',       //主题图片
    'list' => [
        [
            'src' => '/.....',
            'alt' => '安徽省卫计委',
            'href' => '/.......',
        ],
        
        [
            'src' => '/.....',
            'alt' => '安徽省卫计委',
            'href' => '/.......',
        ],
    ],
];


$friendlink = $data || [];
if($data === 'testdata') $friendlink = $testdata;
if(empty($friendlink)) return;
$webServer = App::params('@webServer');

?>



<div class="wp mt10">
	<div class="youqing">
		<div class="ytb">
			<span class="cur" rel="1"><?=T::arrayValue('typename', $friendlink) ?></span>
		</div>
		<div class="stab">
			<ul>

				<?php 
				for($i = 0; $i < count($friendlink['list']); $i ++):
				    $list = $friendlink['list'][$i];
				?>
					<li><a href='<?=$webServer.T::arrayValue('href', $list) ?>' target='_blank'><img
						src='<?=$webServer.T::arrayValue('src', $list) ?>' alt='<?=T::arrayValue('alt', $list) ?>' /></a></li>
				<?php endfor;?>
			</ul>
		</div>
	</div>
</div>