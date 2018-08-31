<?php
use EFrame\Helper\T;

//T::print_pre($data);exit;

if(!$data['status']) return;

// $m = T::replaceToVal(T::arrayValue('param.m', $data));
// $v = T::replaceToVal(T::arrayValue('param.v', $data));
// $c = T::replaceToVal(T::arrayValue('param.c', $data));
// $aUrl = T::arrayValue('param.aUrl', $data);



$typename = $data['data'][0]['typename'];
$content = $data['data'][0]['content'];
?>

<div class="content">
  <div class="about">
    <h1><?=$typename?>
    </h1>
    <span class="picContent">
    <p><?=$content?></p>
</div>