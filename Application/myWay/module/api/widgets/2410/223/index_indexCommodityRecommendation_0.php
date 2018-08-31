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
            
            //文章地址
            $aUrl = T::replaceToVal(T::arrayValue('param.aUrl', $data),[
                'm' => T::arrayValue('param.m', $data),
                'c' => T::arrayValue('arctypeInfor.0.nid', $data),
                'v' => T::arrayValue('param.v', $data),
                'aid' => T::arrayValue('id', $list)
            ]);
            
            //更多的按钮指向的栏目链接
            $lUrl = T::replaceToVal(T::arrayValue('param.lUrl', $data),[
            'm' => T::arrayValue('param.m', $data),
            'c' => T::arrayValue('arctypeInfor.0.nid', $data),
            'v' => T::arrayValue('param.v', $data),
            'tid' => T::arrayValue('typeId', $data)
            ]);
            
            //文章标题
            $title = T::arrayValue('title', $list);
            
            ?>
            
            <li><a href="<?=$aUrl?>" title="<?=$title?>"><img src="{$field.litpic}" alt="<?=$title ?>"></a> <span><a href="<?=$aUrl?>" title="<?=$title?>"><?=$title?></a></span></li>
			
			<?php endfor?>
        </ul>
        <div class="c"></div>
    </div>
    <div class="more_i"><a href="<?=$lUrl?>">查看更多></a></div>
    <!--产品展示结束-->

</section>
