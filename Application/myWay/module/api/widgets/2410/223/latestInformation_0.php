<?php 
use EFrame\Helper\T;
?>
<style>
.footer_0{
    border:1px solid;
}
</style>
<section class="footer_0" data-module_name="footer_0">
这是latestInformation_0.php

    <!--最新资讯开始-->
    {eyou:channelartlist typeid='3'}
    <div class="commer_i">
        <div class="commer_i_c clear-fix">
            <h3><i>{eyou:field name='typename'/}</i><em>{eyou:field name='englist_name'/}</em></h3>
            <span><a href="{eyou:field name='typeurl'/}">查看更多>></a></span> </div>
        <ul class="new_c">
            {eyou:arclist row='5' titlelen='30' infolen='20'}
            <li><a href="{$field.arcurl}" title="{$field.title}" style="font-weight:bold;color:#ff0000">{$field.title}</a></li>
            {/eyou:arclist}
        </ul>
    </div>
    <!--最新资讯结束-->
    {/eyou:channelartlist}


</section>
