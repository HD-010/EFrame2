<?php 
use EFrame\Helper\T;
?>

<div class="wp top">
<div class="toplink"><a href="javascript:addAsFavorite('网站名称','index-2.html')" class="a2">加入收藏</a><a href="javascript:setHomepage('index-2.html')" class="a1">设为首页</a></div>
<div class="clear">&nbsp;</div>
<div class="tops">
	<form id="sfm" name="sfm" method="get" action="http://www.xcsyy.com/search.asp">
    	<input type="text" name="k" id="k" class="ipt" />
    	<input type="image" src="/images/q3.jpg" name="button" id="button" value="提交" />
	</form>
</div>
</div>
<!-- 导航 -->
<div class="wp nav">
<ul>
<li class="cur"><a href="index.html">网站首页</a></li>

<?php 

    //$arctype = $data['arctype'];
    $arctype = $data;
    foreach($arctype as $k => $arctypeTop):
?>
<li>
	<a href="<?=App::params('@webServer').T::arrayValue('typedir',$arctypeTop) ?>"><?=T::arrayValue('typename',$arctypeTop) ?></a>
	<?php 
	if($arctypeSun = T::arrayValue('sun', $arctypeTop,false)): 
	?>
	<div class="sty">
		<ul>
		<?php 
		foreach($arctypeSun as $sun):
	    ?>
			<li>
				<a href='<?=App::params('@webServer').T::arrayValue('typedir',$sun) ?>'><?=T::arrayValue('typename',$sun) ?></a>
			</li>
		<?php endforeach;?>	
		</ul>
	</div>
	<?php endif; ?>
</li>
<?php endforeach;?>
</ul>
</div>