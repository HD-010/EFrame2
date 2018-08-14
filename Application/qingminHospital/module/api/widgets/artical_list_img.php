<?php 
use EFrame\Helper\T;

$imageList = $data ? $data : [];
if($data === 'testdata') $imageList = $testdata;
if(empty($imageList)) return;
$webServer = App::params("@webServer");
$relImg = App::params("@relImg");
$url = App::params('@webServer').'/api/image/show?aid=';
?>


<div class="imglist1">
	<ul>
	<?php 
	for($i = 0 ;$i < count($imageList); $i ++):
	$list = $imageList[$i];
	?>
		<li><a target="_blank"
			href="<?=$url.$list['id'] ?>"><img
				src="http://<?=$relImg.$list['litpic'] ?>"></a><span><a
				href="<?=$url.$list['id'] ?>"><?=$list['name'] ?></a></span></li>
		
	<?php endfor;?>	
	</ul>
</div>
<div class="clear">&nbsp;</div>



