<?php
use EFrame\Helper\T;
?>

<div class="wp dfs">
	<a href="index.html">网站首页</a> 
	<?php 
    //$arctype = $data['arctype'];
    $arctype = $data;
    foreach($arctype as $k => $arctypeTop):
    ?>
	| <a href="<?=App::params('@webServer').T::arrayValue('typedir',$arctypeTop) ?>"><?=T::arrayValue('typename',$arctypeTop) ?></a> 
	<?php endforeach;?>
</div>