<?php 
use EFrame\Helper\T;
?>
<style>
.footer_0{
    border:1px solid;
}
</style>
<section class="footer_0" data-module_name="footer_0">
这是footer_0.php

    <!--搜索列表开始-->
    <div class="content">
        <ul class="list-loop common_news" id="contentArea">
            {eyou:list pagesize="6" titlelen="30"}
            <li class="loop news4"><a href="{$field.arcurl}" title="{$field.title}"><img  src="{$field.litpic}" alt="{$field.title}"><span>{$field.title}</span></a></li>
            {/eyou:list}
        </ul>
        <div class="page">{eyou:pagelist listitem="index,end,pre,next" listsize="2"/}</div>
    </div>
    <!--搜索列表结束-->

    <?php
    T::print_pre($data);
    ?>

</section>
