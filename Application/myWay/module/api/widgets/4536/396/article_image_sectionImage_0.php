<?php 
use EFrame\Helper\T;


if(!$data['status']) return;
$article = $data['data'];

?>

<link rel="stylesheet" type="text/css" href="/static/css/message_index_cn.css">
<section class="ad_met_m1156_1 lazy" m-id="37" m-type="nocontent" data-background=""></section>

<section class="message_met_m1156_1 lazy met-show" m-id="27" data-background="../../static/images/picture/1519751847.jpg">
	<div class="container">
		<div class="row">
			<div class="contact-map" id="message_met_m1156_1_map" dark="0" level="14" coordinate="120.102116,30.300177">
			
			<div class="met-editor lazyload clearfix">
				<div class="contact-bin">
					<h3><?=$article['title'] ?></h3>
					<p>writer:<em><?=$article['writer'] ?></em>&nbsp;发布时间:<em><?=date('Y-m-d',$article['pubdate']) ?></em></p>
					<p>
						<?=$article['body'] ?>
					</p>
					
				</div>
			</div>
			
			
		</div>
	</div>
</section>




