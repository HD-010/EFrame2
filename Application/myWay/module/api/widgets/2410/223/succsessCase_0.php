<?php 
use EFrame\Helper\T;

T::print_pre($data);

?>
<style>
.footer_0{
    border:1px solid;
}
</style>
<section class="footer_0" data-module_name="footer_0">

    <!--成功案例开始-->
    <div class="commer_i">
        <div class="commer_i_c clear-fix">
            <h3><i><?=T::arrayValue('data.0.typename', $data) ?></i><em>{eyou:field name='englist_name'/}</em></h3>
            <span><a href="{eyou:field name='typeurl'/}">查看更多>></a></span></div>
        <dl class="cmmer_cs clear-fix">
            <?php 
            for($i = 0; $i < count($data['data']); $i ++):
            $list = $data['data'][$i];
            ?>
            <dt><a href="{$field.arcurl}" title="<?=T::arrayValue('title', $list) ?>"><img src="<?=T::arrayValue('litpic', $list) ?>" alt="<?=T::arrayValue('title', $list) ?>"></a></dt>
            <dd>
                <h3><a href="{$field.arcurl}" title="<?=T::arrayValue('title', $list) ?>"><?=T::arrayValue('title', $list) ?></a></h3>
                <p><?=T::arrayValue('description', $list) ?>...</p>
            </dd>
            <?php endfor?>
        </dl>
        {/eyou:arclist} </div>
    <!--成功案例结束-->


</section>
