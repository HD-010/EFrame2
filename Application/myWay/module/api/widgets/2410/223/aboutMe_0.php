<?php 
use EFrame\Helper\T;

if(!T::arrayValue('status', $data)) return;
?>
<style>
.footer_0{
    border:1px solid;
}
</style>
<section class="footer_0" data-module_name="footer_0">


    <!--关于我们开始-->
    <div class="new_i">
        <div class="common_title">
            <h2><?=T::arrayValue('data.0.typename', $data) ?></h2>
            <span>{eyou:field name='englist_name'/}</span></div>
        <div class="about_i_c">
            <p><?=T::arrayValue('data.0.content', $data) ?></p>
        </div>
    </div>
    <!--关于我们结束-->


</section>
