<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/8
 * Time: 7:35
 */
?>



    <!--产品展示开始-->
    {eyou:channelartlist typeid='2'}
    <div class="common_title">
        <h2>{eyou:field name='typename'/}</h2>
        <span>{eyou:field name='englist_name'/}</span></div>
    <div class="icon_nav">
        <ul class="clear-fix">
            {eyou:arclist row='4' titlelen='30' infolen='20'}
            <li><a href="{$field.arcurl}" title="{$field.title}"><img src="{$field.litpic}" alt="{$field.title}"></a> <span><a href="{$field.arcurl}" title="{$field.title}">{$field.title}</a></span></li>
            {/eyou:arclist}
        </ul>
        <div class="c"></div>
    </div>
    <div class="more_i"><a href="{eyou:field name='typeurl'/}">查看更多></a></div>
    <!--产品展示结束-->
    {/eyou:channelartlist}

