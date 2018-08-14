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
            'logo' => '/.....',
            'msg' => '安徽省卫计委',
            'url' => '/.......',
        ],
        
        [
            'src' => '/.....',
            'msg' => '安徽省卫计委',
            'href' => '/.......',
        ],
    ],
];


$friendlink = $data ? $data : [];
if($data === 'testdata') $friendlink = $testdata;
if(empty($friendlink)) return;
$rel = App::params('@relImg');

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
					<li><a href='<?=T::arrayValue('url', $list) ?>' target='_blank'><img
						src='http://<?=$rel.T::arrayValue('logo', $list) ?>' alt='<?=T::arrayValue('msg', $list) ?>' /></a></li>
				<?php endfor;?>
			</ul>
		</div>
	</div>
</div>