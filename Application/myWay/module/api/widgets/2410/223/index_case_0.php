<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/8
 * Time: 7:37
 */
?>



    <!--成功案例开始-->
    {eyou:channelartlist typeid='5'}
    <div class="commer_i">
        <div class="commer_i_c clear-fix">
            <h3><i>{eyou:field name='typename'/}</i><em>{eyou:field name='englist_name'/}</em></h3>
            <span><a href="{eyou:field name='typeurl'/}">查看更多>></a></span></div>
        {eyou:arclist row='4' titlelen='30' infolen='20'}
        <dl class="cmmer_cs clear-fix">
            <dt><a href="{$field.arcurl}" title="{$field.title}"><img src="{$field.litpic}" alt="{$field.title}"></a></dt>
            <dd>
                <h3><a href="{$field.arcurl}" title="{$field.title}">{$field.title}</a></h3>
                <p>{$field.seo_description}...</p>
            </dd>
        </dl>
        {/eyou:arclist} </div>
    <!--成功案例结束-->
    {/eyou:channelartlist}
