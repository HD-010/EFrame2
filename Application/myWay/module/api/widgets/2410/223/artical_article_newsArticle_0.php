<?php
use EFrame\Helper\T;

//T::print_pre($data);exit;

if(!$data['status']) return;

// $m = T::replaceToVal(T::arrayValue('param.m', $data));
// $v = T::replaceToVal(T::arrayValue('param.v', $data));
// $c = T::replaceToVal(T::arrayValue('param.c', $data));
// $aUrl = T::arrayValue('param.aUrl', $data);



$date = date('y-m-d',$data['data']['pubdate']);
$click = $data['data']['click'];
$title = $data['data']['title'];
$body = $data['data']['body'];
?>
<div class="content">
  <div class="about">
    <h1><?=$title?>
      <p class="hits">更新时间：<?=$date?>&nbsp;&nbsp;点击次数：<span id="hits"><?=$click?></span></p>
    </h1>
    <span class="picContent">
    <p><?=$body?></p>
</div>