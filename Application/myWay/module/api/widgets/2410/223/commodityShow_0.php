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

    <!--商品展示开始-->
    <div class="content">
        <div class="about">
            <h1>{$eyou.field.title}
                <p class="hits">更新时间：{$eyou.field.add_time|MyDate='Y-m-d H:i:s',###}&nbsp;&nbsp;点击次数：<span id="hits">{eyou:arcclick /}</span></p>
            </h1>
            <span class="picContent">
    <p>{$eyou.field.content}</p>
    {eyou:prenext get="pre" empty="<a class='pagexxx'>上一篇：暂无</a>"} <a href="{$field.arcurl}" title="{$field.title}" class="pagexxx"> 上一篇 : {$field.title}</a> {/eyou:prenext}
    {eyou:prenext get="next" empty="<a class='pagexxx'>下一篇：暂无</a>"} <a href="{$field.arcurl}" title="{$field.title}" class="pagexxx"> 下一篇: {$field.title}</a> {/eyou:prenext} <a href="{$eyou.field.typeurl}"  class="back">返回列表</a> </div>
    </div>
    <!--商品展示结束-->

</section>
