<?php 
use EFrame\Helper\T;

// //测试数据
// $testdata = [
    
//     'contents' => '这是文章内dhfghfgfghdfgh容'
// ];

// $arcticle= $data || [];
// if($data == 'testdata') $arcticle = $testdata;
// if(empty($arcticle)) return;
// $webServer = App::params('@webServer');
?>


<?php $this->renderWidget('header_banner',$data['banner']);?>

<div class="wp">
<div class="lm">

<?php 
// 左则子栏目列表  
$this->renderWidget('son_arctype_left',$data['arctypeSon']);

//左则服务项目列表
$this->renderWidget('service_nav_left');

//宣传专栏
$this->renderWidget('propaganda_column_left',$data['propagandaColumn']);

//左则新闻展示栏
$this->renderWidget('news_left',$data['newsLeft']);
?>
</div>
<?php 
//面包削
$this->renderWidget("page_map");

//文章内容展示模块
$this->renderWidget("artical_contents_addon_title", $data['artical'] );
?>

</div>

<!--RIGHT-->

</div>
<div class="clear">&nbsp;</div>
</div>


<?php 
//底部栏目展示
$this->renderWidget('footer_nave',$data['arctype']);
?>

