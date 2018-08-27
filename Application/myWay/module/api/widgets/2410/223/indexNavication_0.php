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
这是indexNavication_0.php
    <!--首页导航开始-->
    <div class="nav_new">
        <ul>
            {eyou:channel type="top" row="8" id="field"}
            <li><a title="{$field.typename}" href="{$field.typeurl}">{$field.typename}</a></li>
            {/eyou:channel}
        </ul>
        <div class="c"></div>
    </div>
    <!--首页导航结束-->

    <?php
    //T::print_pre($data);
    ?>
</section>
<!--导航结束-->