<?php
use EFrame\Helper\T;

//T::print_pre($data);exit;

if(!$data['status']) {
    echo "还没有数据...";
    return;
}

$m = T::replaceToVal(T::arrayValue('param.m', $data));
$v = T::replaceToVal(T::arrayValue('param.v', $data));
$c = T::replaceToVal(T::arrayValue('param.c', $data));
$aUrl = T::arrayValue('param.aUrl', $data);
?>
<style>
    .recommondNews_0{
        border:0;
    }
</style>
<section class="recommondNews_0" data-module_name="recommondNews_0">
    <div class="content">
      <ul class="list-loop common_news" id="contentArea">
        <?php 
            for($i = 0; $i < count($data['data']); $i ++):
            $list = $data['data'][$i];
            $title = T::limitStr(10, $list['title']);
            $aid = $list['id'];
            $pubdate = date('Y/m/d',$list['pubdate']);
            $aUrl = T::replaceToVal($aUrl,[
                'm' => $m,
                'v' => $v,
                'c' => $c,
                'aid' => $aid,
            ]);
        ?>
        
        <li class="loop news2"><a href="<?=$aUrl?>" title="<?=$title?>"><span style="font-weight:bold;color:#ff0000"><?=$title?></span><span><?=$pubdate?></span></a></li>
        
        <?php 
            endfor; 
        ?>
      </ul>
      <div class="page">上一页     下一页</div>
    </div>
</section>