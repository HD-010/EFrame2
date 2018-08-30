<?php 
use EFrame\Helper\T;

//T::print_pre($data);
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
        	   for($i = 0; $i < count ($data) -1; $i ++):
                   $list = $data[$i];
        	?>
            <li><a title="<?=T::arrayValue('typename', $list) ?>" href="<?=T::arrayValue('param.tUrl',$data)?>"><?=T::arrayValue('typename', $list) ?></a></li>
            <?php endfor?>
        </ul>
        <div class="c"></div>
    </div>
    <!--首页导航结束-->

</section>
<!--导航结束-->