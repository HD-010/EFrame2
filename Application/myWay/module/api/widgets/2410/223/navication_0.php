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
这是navication_0.php
    <ul class="nav">
        <li><a href="{eyou:global name='web_cmsurl' /}/"><span class="iconfont">&#xe607;</span>首页</a></li>
        {eyou:channel type="top" row="10" id="field"}
        <li><a href="{$field.typeurl}" title="{$field.typename}">{$field.typename}</a></li>
        {/eyou:channel}
    </ul>
    <?php
    //T::print_pre($data);
    ?>
</section>
<!--导航结束-->