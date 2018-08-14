<?php 
use EFrame\Helper\T;


$articalList = $data ? $data : [];
if ($data == 'testdata')
    $articalList = $testdata;
    if (empty($articalList))return;
    $webServer = App::params('@webServer');
    $url = App::params('@webServer').'/api/personage/show?aid=';
    $rel = App::params('@relImg');
?>


<div class="tuandui">
	<ul>
	<?php 
	for($i = 0; $i < count(count($articalList));$i ++):
	$list = $articalList[$i];
	?>
		<li><a target='_blank' href='<?=T::arrayValue('aid', $list)?>'><img
				src='http://<?=$rel.T::arrayValue('litpic', $list)?>' /></a>
		<div class='tdla'>
				<span>
					<a target='_blank' href='<?=$url.T::arrayValue('aid', $list)?>'><?=T::arrayValue('zh_name', $list,"人物名称")?></a>
				</span>
				<em>
					<a href='<?=$url.T::arrayValue('aid', $list)?>'><?=T::arrayValue('post', $list)?>></a>-<?=T::arrayValue('department', $list)?>
				</em>
				<p>
					<a href='<?=$url.T::arrayValue('aid', $list)?>'></a>
				</p>
			</div>
			<div class='tdlas'><?=T::arrayValue('introduce', $list)?></div></li>
	<?php endfor;?>	
	</ul>
</div>
<div class='clear'>&nbsp;</div>
<div class='clear'>&nbsp;</div>
