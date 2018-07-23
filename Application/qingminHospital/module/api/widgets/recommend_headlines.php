<?php
use EFrame\Helper\T;


/**
 * 标题推荐
 * 说明：
 * 标题推荐是将需要推荐的内容以标题的形式列举到分类后
 数据形式如测试数据：
 
 */
//测试数据
 $testdata = [
    'tyleNmae' => '市级（院级）重点学科（特色专科）',   //分类名称
    'lines' => [
        [
            'title' => '骨科',
            'href' => ''
        ],                              //标题组
        [
            'title' => '泌尿外科',
            'href' => ''
        ],                              //标题组
    ]
 ];

//$recommendheadlines = $data['recommendheadlines'];

$recommendheadlines = $data || [];
if($data === 'testdata') $recommendheadlines = $testdata;
if(empty($recommendheadlines)) return;
?>
<div class="wp ssbgs">
	<span><strong><?=T::arrayValue('tyleNmae', $recommendheadlines)?></strong>：</span>
	<?php for($i = 0; $i < count($recommendheadlines['lines']); $i ++):?>
	
    	<span><a href='<?=App::params('@webServer').T::arrayValue($i.'.href', $recommendheadlines['lines'])?>'><?=T::arrayValue($i.'.title', $recommendheadlines['lines'])?></a></span>
	
	<?php endfor;?>
	
</div>