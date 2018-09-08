<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/7
 * Time: 22:25
 */

?>
<ul class="nav">
  <li><a href="{eyou:global name='web_cmsurl' /}/"><span class="iconfont">&#xe607;</span>首页</a></li>
  {eyou:channel type="top" row="10" id="field"}
  <li><a href="{$field.typeurl}" title="{$field.typename}">{$field.typename}</a></li>
  {/eyou:channel}
</ul>



