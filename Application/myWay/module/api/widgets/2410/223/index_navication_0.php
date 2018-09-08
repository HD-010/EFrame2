<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/8
 * Time: 7:32
 */
?>


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

