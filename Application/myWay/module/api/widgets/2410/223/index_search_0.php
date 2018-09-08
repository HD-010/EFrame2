<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/8
 * Time: 6:59
 */
?>

<div class="allpage">
    <div class="black-fixed iconfont">&#xe60f;</div>
    <!--页头开始-->
    <div class="header">
        <div class="head"> <a href="{eyou:global name='web_cmsurl' /}/"  title="{eyou:global name="web_name"/}" class="logo"> <img src="{eyou:global name="web_logo"/}"/> </a>
            <div class="nav-btn commonfont">&#xe60b;</div>
            <div class="search_hl iconfont">&#xe600;</div>
            <div class="search" style="display: block;">
                <form action="{eyou:searchurl /}" method="get" onSubmit="return checksearch(this)">
                    <input type="hidden" name="channel" value="" />
                    <input type="hidden" name="typeid" value="" />
                    <a class="xbtn iconfont" href="javascript:;">&#xe60f;</a>
                    <input type="text" name="keywords" class="search-input" placeholder="请输入关键词" onFocus="if(this.value==defaultValue)this.value=''" onBlur="if(this.value=='')this.value=defaultValue">
                    <input type="submit" class="search-btn iconfont" value="&#xe600;">
                </form>
            </div>
        </div>
    </div>