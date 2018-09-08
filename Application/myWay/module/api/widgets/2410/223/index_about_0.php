<?php
/**
 * Created by PhpStorm.
 * User: yx010
 * Date: 2018/9/8
 * Time: 7:36
 */

  <!--关于我们开始-->
  {eyou:channelartlist typeid='1'}
  <div class="new_i">
    <div class="common_title">
      <h2>{eyou:field name='typename'/}</h2>
      <span>{eyou:field name='englist_name'/}</span></div>
    <div class="about_i_c">
      <p>{eyou:type addtable='single_content'}{$field.content|html_msubstr=###,0,200,true}{/eyou:type}</p>
    </div>
  </div>
  <!--关于我们结束-->
  {/eyou:channelartlist}
