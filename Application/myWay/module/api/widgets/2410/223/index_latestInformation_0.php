<?php 
use EFrame\Helper\T;

if(!$data['status']) return;
//T::print_pre($data);
?>
<style>
.footer_0{
    border:1px solid;
}
</style>
<section class="footer_0" data-module_name="footer_0">

    <!--最新资讯开始-->
    <div class="commer_i">
        <div class="commer_i_c clear-fix">
            <h3><i><?=T::arrayValue('arctypeInfor.0.typename',$data) ?></i><em>englist_name</em></h3>
            <span><a href="?m=idk2584s&v=index&tid=<?=T::arrayValue('typeId',$data) ?>">查看更多>></a></span> </div>
        <ul class="new_c">
            <?php
            for($i=0; $i < count($data['data']); $i ++):
            $list = $data['data'][$i];
            ?>
            <li><a href="m=idk2584s&v=index&tid=<?=T::arrayValue('typeId',$data) ?>&aid=<?=T::arrayValue('id',$list) ?>" title="<?=T::limitStr(10,'title',$list) ?>" style="font-weight:bold;color:#ff0000"><?=T::limitStr(10,'title',$list) ?></a></li>
            <?php endfor?>

        </ul>
    </div>
    <!--最新资讯结束-->
</section>
