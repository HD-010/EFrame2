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
        	       
        	       //定义栏目连接
                   $typeUrl = T::replaceToVal(T::arrayValue('param.tUrl',$data),[
                       'm'=>T::arrayValue('param.m', $data),
                       'c'=>T::arrayValue('nid', $list),
                       'v'=>T::getStrVal(-1, $list['typedir']),
                       'tid'=>T::arrayValue('id', $list),
                   ]);
                   
                   //定义栏目名称
                   $typeName = T::arrayValue('typename', $list);
        	?>

                   <li><a title="<?=$typeName?>" href="<?=$typeUrl?>"><?=$typeName?></a></li>
            
            <?php endfor?>
        </ul>
        <div class="c"></div>
    </div>
    <!--首页导航结束-->

</section>
<!--导航结束-->