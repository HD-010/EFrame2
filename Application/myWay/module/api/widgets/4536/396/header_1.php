<?php 
use EFrame\Helper\T;

//T::print_pre($data);
?>

<header class="head_nav_met_m1156_1 swiper-header
scroll
" m-id="38" m-type="nocontent">
	<div class="side-open">
		<hr>
		<hr>
		<hr>
		<hr>
	</div>
	<div class="side-box">
		<div class="side-cut">
			<div class="side-shadow"></div>
			<div class="side-bin">
				<div class="side-search">
					<form method="get" action="    ../search/">
						<input type="hidden" name="lang" value="cn" />
						<input type="hidden" name="class1" value="76" />
						<div class="form-group">
							<div class="input-search">
								<button type="submit" class="input-search-btn">
								<i class="icon wb-search" aria-hidden="true"></i>
								</button>
								<input class="form-control none-border" name="searchword" placeholder="Search title ...">
							</div>
						</div>
					</form>
				</div>
				<!--
                	作者：offline
                	时间：2018-09-01
                	描述：nav右边导航栏
                -->
				
				
				<nav class="side-nav" m-id="noset" m-type="head_nav" role="heading">
                	<ul>
                		<?php 
                		      $m = T::arrayValue('param.m', $data);
                		      $hUrl = T::replaceToVal(T::arrayValue('param.hUrl',$data),[
                		          'm'=>$m,
                		      ]);
                		?>
                	
                		<li class="nav-first">
                    		<a href="<?=$hUrl ?>" title="网站首页">
                    		<i class="icon fa-home"></i>
                    		<b>网站首页</b>
                    		</a>
            		    </li>
            		    
                		<?php 
                		
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
        				
							<li class="nav-first has">
                			<a href="<?=$typeUrl ?>" target=_self title="<?=$typeName ?>">
                				<i class="fa-camera"></i>
                				<b><?=$typeName ?></b>
                			</a>
                			<u>&nbsp;</u><i>&nbsp;</i>
                			<?php 
                			if(T::arrayValue('sun', $list, false)):
                			     for($j = 0; $j < count($list['sun']); $j ++):
                			     $listSun = $list['sun'][$j];
                			     //定义栏目连接
                			     $typeUrl = T::replaceToVal(T::arrayValue('param.tUrl',$data),[
                			         'm'=>$m,
                			         'c'=>T::arrayValue('nid', $listSun),
                			         'v'=>T::getStrVal(-1, $listSun['typedir']),
                			         'tid'=>T::arrayValue('id', $listSun),
                			     ]);
                			     //定义栏目名称
                			     $typeName = T::arrayValue('typename', $listSun);
                			?>
                			<ul>
                				<li class="nav-second     ">
                					<a href="<?=$typeUrl ?>" target='_self' title="<?=$typeName ?>">
                						<b><?=$typeName ?></b>
                					</a>
                				</li>
                			</ul>
                				<?php endfor?>
                			<?php endif?>
                		</li>
                               
                        
                        <?php endfor?>
                	</ul>
                </nav>
				
				
				
				
					
				<div class="side-foot">
					<div class="side-phone">
						<p>
							<b>Call me :</b>
							<a href="tel:156-6999-2657" title="156-6999-2657">
								156-6999-2657
							</a>
						</p>
						<i class="icon fa-qrcode" data-toggle="modal" data-target="#met-ewm-modal"></i>
					</div>
					<div class="side-text">
						Copyright © 2018 朴艺科技
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="side-head     ">
		<div class="side-logo">
			<a href="index?m=idk2585s" title="APP应用开发|网站建设|平面设计">
				<img data-original="/static/images/sking/1535191906.png" alt="APP应用开发|网站建设|平面设计">
			</a>
		</div>
		<div class="sign-box">
			<ul class="sign-ul swiper-nav">
				<li class="sign-li     active">
					<a href="index?m=idk2585s&c=article&v=guanyuwomen&tid=25" target='_self' title="关于我们">
						<b>关于我们</b>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="modal fade modal-3d-flip-vertical" id="met-ewm-modal" aria-hidden="true" role="dialog" tabindex="-1">
		<div class="modal-ewmlog modal-center">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					<img data-original="/static/images/sking/1535193571.jpg" alt="APP应用开发|网站建设|平面设计">
				</div>
			</div>
		</div>
	</div>
</header>