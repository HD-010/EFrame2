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
    'list' => [
        [
            'name' => '骨科',
            'id' => ''
        ],                              //标题组
        [
            'name' => '泌尿外科',
            'id' => ''
        ],                              //标题组
    ]
 ];

//$recommendheadlist = $data['recommendheadlist'];

 $recommendheadlist = $data ? $data : [];
if($data === 'testdata') $recommendheadlist = $testdata;
if(empty($recommendheadlist)) return;
$url = App::params('@webServer')."/api/artical/read?aid=";
?>
<div class="wp ssbgs">
	<span><strong><?=T::arrayValue('tyleNmae', $recommendheadlist)?></strong>：</span>
	<?php for($i = 0; $i < count($recommendheadlist['list']); $i ++):?>
	
    	<span><a href='<?=$url.T::arrayValue($i.'.id', $recommendheadlist['list'])?>'><?=T::arrayValue($i.'.name', $recommendheadlist['list'])?></a></span>
	
	<?php endfor;?>
	
</div>