<?php 
use EFrame\Helper\T;

//T::print_pre($data);exit;
?>

<footer class="foot_info_met_m1156_1     lr" m-id="9" m-type="foot">
	<div class="foot-left">
		<div class="foot-nav" m-id="noset" m-type="foot_nav">
			
			<?php 
		       $m = T::arrayValue('param.m', $data);
        	   for($i = 0; $i < count ($data) -1; $i ++):
                   $list = $data[$i];
        	       
        	       //定义栏目连接
                   $typeUrl = T::replaceToVal(T::arrayValue('param.tUrl',$data),[
                       'm'=>$m,
                       'c'=>T::arrayValue('nid', $list),
                       'v'=>T::getStrVal(-1, $list['typedir']),
                       'tid'=>T::arrayValue('id', $list),
                   ]);
                   
                   //定义栏目名称
                   $typeName = T::arrayValue('typename', $list);
        	?>
			
			<a href="<?=$typeUrl ?>" target='_self' title="<?=$typeName ?>">
				<?=$typeName ?>
			</a>
			<?php endfor?>
		</div>
		<div class="foot-copyright"></div>
		<div class="foot-lang" m-type="lang" m-id="0"></div>
		<div class="powered_by_metinfo">
			Powered by
			<a href="index?m=idk2585s" target="_blank" title="MetInfo企业网站管理系统">
				朴艺科技
			</a>
			
		</div>
	</div>
	<div class="foot-right">
		<div class="foot-text" m-id="noset" m-type="head_seo">
			<p>
				— 努力创造优质作品，奉献更多精品佳作 —
			</p>
		</div>
		<div class="text-link" m-id="noset" m-type="link">
			<ul>
				<li>
					友情链接：
				</li>
				<!-- <li>
					<a href="https://www.wuhao.vip" title="品牌设计" target="_blank">
						<span>品牌设计</span>
					</a>
				</li> -->
				
			</ul>
		</div>
	</div>
</footer>
<?php
//调用自动分页器
$this->autoPaging();
?>
