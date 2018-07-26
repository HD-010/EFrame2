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

<?php $this->renderWidget('header_banner','testdata');?>
<div class="wp flv"><script src="/js/_flv.html" language="javascript" type="text/javascript"></script></div>


<div class="wp">
<div class="lm">

<?php 
// 左则子栏目列表  
$this->renderWidget('son_arctype_left','testdata');

//左则服务项目列表
$this->renderWidget('service_nav_left','testdata');

//宣传专栏
$this->renderWidget('propaganda_column_left','testdata');

//左则新闻展示栏
$this->renderWidget('news_left','testdata');
?>
</div>
<?php 
//文章标题列表展示模块
$this->renderWidget("artical_list_title","testdata");
$this->renderWidget("artical_list_title","testdata");
$this->renderWidget("artical_list_title","testdata");
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