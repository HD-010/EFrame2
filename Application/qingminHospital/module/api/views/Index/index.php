<?php 
use EFrame\Helper\T;

//引用头部flash轮播广告
$this->renderWidget('header_banner','testdata');

//引用标题推荐
$this->renderWidget('recommend_headlines','testdata');
?>

<div class="wp h324">
	<div class="s1">
		<!-- 橱窗新闻推荐 -->
		<?php $this->renderWidget('window_newsrecommendation','testdata'); ?>
		
		<!-- 新闻推荐列表 -->
		<?php $this->renderWidget('news_recommendation_list','testdata'); ?>
		
		
	</div>
	
	<!-- 最新公告列表 -->
	<?php $this->renderWidget('late_stannouncement','testdata'); ?>
	
</div>

<div class="wp h355">
	<div class="w720">
		<div style="padding-bottom: 12px">
			<img src="/images/q8.jpg" />
		</div>
		
		<!-- 服务项目方阵 -->
		<?php $this->renderWidget('project_square','testdata'); ?>
		
		<!-- 带边框标题列表 -->
		<?php $this->renderWidget('a_list_of_headlines_with_a_border','testdata'); ?>
		
	</div>
	<!-- 专家介绍 -->
	<?php $this->renderWidget('personage_introduction','testdata'); ?>
	
</div>

<!-- 设备展示 -->
<?php $this->renderWidget('bottom_advertision','testdata'); ?>

<!-- 友情链接 -->
<?php $this->renderWidget('friend_link','testdata'); ?>


<?php 
//底部栏目展示
$this->renderWidget('footer_nave',$data['arctype']);
?>
