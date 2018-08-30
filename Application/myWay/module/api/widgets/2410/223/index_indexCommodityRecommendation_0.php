<?php 
use EFrame\Helper\T;

if(!$data['status']) return;
//T::print_pre($data);
?>
<style>
    .recommondNews_0{
        border:1px solid;
    }
</style>
<section class="recommondNews_0" data-module_name="recommondNews_0">

    <!--产品展示开始-->
    <div class="common_title">
        <h2><?=T::arrayValue('arctypeInfor.0.typename',$data) ?></h2>
        <span>commodity recommendation</span></div>
    <div class="icon_nav">
        <ul class="clear-fix">

            <?php
            if(!$data['status']) return ;
            for($i = 0; $i < count ($data['data']); $i ++):
            $list = $data['data'][$i];
            ?>
            <li><a href="<?=T::arrayValue('param.cUrl',$data).$list['id']?>" title="<?=T::arrayValue('title', $list) ?>"><img src="{$field.litpic}" alt="<?=T::arrayValue('title', $list) ?>"></a> <span><a href="<?=T::arrayValue('param.cUrl',$data).$list['id']?>" title="<?=T::arrayValue('title', $list) ?>"><?=T::arrayValue('title', $list) ?></a></span></li>
			<?php endfor?>
        </ul>
        <div class="c"></div>
    </div>
    <div class="more_i"><a href="<?=T::arrayValue('param.lUrl',$data)?>">查看更多></a></div>
    <!--产品展示结束-->

</section>
