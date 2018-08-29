<?php 
use EFrame\Helper\T;
?>

<style>
    .navication_0{
        border:1px solid;
    }
</style>
<!--导航开始-->
<section class="navication_0" data-module_name="navication_0">
    <!--首页导航开始-->
    <div class="nav_new">
        <ul>
        	<?php 
        	   for($i = 0; $i < count ($data); $i ++):
        	?>
            <li><a title="<?=T::arrayValue($i.'.typename', $data) ?>" href="?m=idk2584s&v=index"><?=T::arrayValue($i.'.typename', $data) ?></a></li>
            <?php endfor?>
        </ul>
        <div class="c"></div>
    </div>
    <!--首页导航结束-->

</section>
<!--导航结束-->