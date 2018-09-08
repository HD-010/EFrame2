<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/8
 * Time: 7:40
 */
?>


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
    <div class="cbtn-top"><a href="javascript:;"><img src="{eyou:global name='web_templets_m' /}/skin/images/goTop.png"></a></div>
