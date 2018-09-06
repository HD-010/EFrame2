<?php 
use EFrame\Helper\T;

//T::print_pre($data);

$hUrl = T::replaceToVal(T::arrayValue('param.hUrl',$data),[
        'm' => T::arrayValue('param.m',$data),
]);
?>

<style>
    .header_0{
        border:0;
    }
</style>
<!--导航部分-->
<section class="header_0" data-module_name="header_0">
<div class="allpage">
<div class="black-fixed iconfont">&#xe60f;</div>
    <!--页头开始-->
    <div class="black-fixed iconfont">&#xe60f;</div>
    <div class="header">
        <div class="head"> <a href="<?=$hUrl?>" class="logo"> <img src="<?=T::arrayValue('siteInfor.logo', App::$global)?>"/> </a>
            <div class="nav-btn commonfont">&#xe60b;</div>
            <div class="search_hl iconfont">&#xe600;</div>
            <div class="search" style="display: block;">
                <form action="?" method="get" onSubmit="return checksearch(this)">
                    <input type="hidden" name="m" value="<?=T::arrayValue('siteInfor.idk', App::$global)?>" />
                    <input type="hidden" name="v" value="search" />
                    <a class="xbtn iconfont" href="javascript:;">&#xe60f;</a>
                    <input type="text" name="keywords" class="search-input" placeholder="请输入关键词" onFocus="if(this.value==defaultValue)this.value=''" onBlur="if(this.value=='')this.value=defaultValue">
                    <input type="submit" class="search-btn iconfont" value="&#xe600;">
                </form>
            </div>
        </div>
    </div>
    <!--页头结束-->
</div>
</section>

