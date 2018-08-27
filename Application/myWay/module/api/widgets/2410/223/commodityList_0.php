<?php 
use EFrame\Helper\T;
?>
<style>
    .recommondNews_0{
        border:1px solid;
    }
</style>
<section class="recommondNews_0" data-module_name="recommondNews_0">
这是commodifyShow_0.php

    <!--商品列表开始-->
    <div class="content">
        <ul class="list-loop common_news" id="contentArea">
            {eyou:list pagesize="10" titlelen="30"}
            <li class="loop news2"><a href="{$field.arcurl}" title="{$field.title}"><span style="font-weight:bold;color:#ff0000">{$field.title}</span><span>{$field.add_time|MyDate='Y/m/d',###}</span></a></li>
            {/eyou:list}
        </ul>
        <div class="page">{eyou:pagelist listitem="index,end,pre,next" listsize="2"/}</div>
    </div>
    <!--商品列表结束-->

    <?php
        T::print_pre($data);
    ?>
</section>
