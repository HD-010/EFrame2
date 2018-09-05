<?php 
use EFrame\Helper\T;

//T::print_pre($data);exit;

if(!$data['status']) return;
$m = $data['param']['m'];
$tid = $data['param']['tid'];
?>

<section class="news_list_met_m1156_1 lazy full" m-id="7" data-title="资讯" data-background="../../static/images/sking/1519794022.png">
	<div class="container info-box">
		<div class="row">
			<div class="info-left     ">
				
				<?php 
				for($i = 0; $i < count($data['data']); $i ++):
				$list = $data['data'][$i];
				$title = T::arrayValue('title', $list);
				$click = T::arrayValue('click', $list);
				$description = T::arrayValue('description', $list);
				$c = T::lookAbout([
				    'channeltype',
				    $list['channel'],
				    'nid',
				    $data['arctypeInfor'],
				]);
				
				$v = T::getStrVal(-1, T::arrayValue('arctypeInfor.'.($i+1).'.typedir', $data));
				$aid = T::arrayValue('id', $list);
				$tid = T::arrayValue('typeid', $list);
				$pubdate = date('Y-m-d',T::arrayValue('pubdate', $list));

				$aUrl = T::replaceToVal($data['param']['aUrl'],[
				    'm' => $m,
				    'v' => $v,
				    'c' => $c,
				    'aid' => $aid
				]);
				$tUrl = T::replaceToVal($data['param']['tUrl'],[
				    'm' => $m,
				    'v' => $v,
				    'c' => $c,
				    'tid' => $tid,
				]);
				
				//默认显示第一条
				$active = ($i === 0) ? 'active' : ''; 
				?>
				<div data-id="<?=$i ?>" class="info-first info-ease <?=$active ?>">
					<div class="info-img">
						<a href="<?=$aUrl ?>" title="<?=$title ?>" target=_self>
							<img class="lazy" data-src="../../static/images/picture/1519808044.jpg" alt="">
						</a>
					</div>
					<div class="info-text">
						<h3>
						<a href="<?=$aUrl ?>" title="<?=$title ?>">
							<?=$title ?>
						</a></h3>
						<ul>
							<li>
								<i class="fa fa-clock-o"></i><b><?=$pubdate ?></b>
							</li>
							<li>
								<i class="fa fa-user-plus"></i><b>ortotra</b>
							</li>
							<li>
								<i class="fa fa-eye"></i><b><?=$click ?></b>
							</li>
						</ul>
						<p>
							<?=$description ?>
						</p>
						<em> <b>标签：</b>
						<a href="search/?searchword= 微服务" title=" 微服务" target=_self>
							微服务
						</a>
						<a href="search/?searchword=请求和响应" title="请求和响应" target=_self>
							请求和响应
						</a>
						<a href="search/?searchword=事件流" title="事件流" target=_self>
							事件流
						</a>
						<a href="search/?searchword=异步机制" title="异步机制" target=_self>
							异步机制
						</a> </em>
						<a class="click-box" href="<?=$tUrl ?>" target=_self>
							<span>READ MORE</span>
						</a>
					</div>
				</div>
				
				<?php 
				if($i > 1) break;
				endfor;
				?>
				
				
				
				
				
				
			</div>
			<div class="info-right">
				<h3><u>新闻资讯</u> · 让营销变得简单</h3>
				<div class="info-nav">
					<p>
						
						<?php 
						for($i = 0; $i < count($data['arctypeInfor']); $i ++):
						$list = $data['arctypeInfor'][$i]; 
						$c = T::arrayValue('nid',$list);
						$v = T::getStrVal(-1, T::arrayValue('typedir', $list));
						$tid = T::arrayValue('id',$list);
						$typeName = T::arrayValue('typename',$list);
						$tUrl = T::replaceToVal($data['param']['tUrl'],[
						    'c' => $c,
						    'm' => $m,
						    'v' => $v,
						    'tid' => $tid
						]); 
						?>
						<?php if($i == 0){?>
						<b data-href="<?=$tUrl ?>" data-id="<?=$i ?>" title="<?=$typeName ?>" class="active"> <span>&radic;</span> <span>全部</span> </b>
 						<?php }else{ ?>
 						<b data-href="<?=$tUrl ?>" data-id="<?=$i ?>" title="<?=$typeName ?>"> <span>&radic;</span> <span><?=$typeName ?></span> </b>
						<?php 
						}
						endfor;
						?>
					</p>
				</div>
				
				<div class="info-cut">
				
					<div data-id="0" class="info-list info-ease active">
						<ul class="info-ul">
							<li class="info-li swiper-slide-active"></li>
							
            				<?php 
            				if($data['status']):
            				for($i = 0; $i < count($data['data']); $i ++):
            				?>
							<li class="info-li">
								<?php 
								$list = $data['data'][$i];
								$title = T::arrayValue('title', $list);
								$c = T::lookAbout([
								    'channeltype',
								    $list['channel'],
								    'nid',
								    $data['arctypeInfor'],
								]);
								
								$v = T::getStrVal(-1, T::arrayValue('arctypeInfor.'.($i+1).'.typedir', $data));
								$aid = T::arrayValue('id', $list);
								$pubdate = date('Y-m-d',T::arrayValue('pubdate', $list));
								$aUrl = T::replaceToVal($data['param']['aUrl'],[
								    'm' => $m,
								    'v' => $v,
								    'c' => $c,
								    'aid' => $aid
								]);
								
								$i ++;
								
								?>
								<p>
									<img class="info-lazy" data-src="../../static/images/picture/1519808183.jpg" alt="">
									<a href="<?=$aUrl ?>" title="<?=$title ?>" target=_self>
										<?=$title ?>
									</a>
									<b><?=$pubdate ?></b>
								</p>
								
								
								<?php 
								$list = $data['data'][$i];
								$title = T::arrayValue('title', $list);
								$c = T::lookAbout([
								    'channeltype',
								    $list['channel'],
								    'nid',
								    $data['arctypeInfor'],
								]);
								
								$v = T::getStrVal(-1, T::arrayValue('arctypeInfor.'.($i+1).'.typedir', $data));
								$aid = T::arrayValue('id', $list);
								$pubdate = date('Y-m-d',T::arrayValue('pubdate', $list));
								$aUrl = T::replaceToVal($data['param']['aUrl'],[
								    'm' => $m,
								    'v' => $v,
								    'c' => $c,
								    'aid' => $aid
								]);
								
								?>
								<p>
									<img class="info-lazy" data-src="../../static/images/picture/1519808829.jpg" alt="">
									<a href="<?=$aUrl ?>" title="<?=$title ?>" target=_self>
										<?=$title ?>
									</a>
									<b><?=$pubdate ?></b>
								</p>
							</li>
							<?php 
							endfor;
							endif;
							?>
							
						</ul>
					</div>
					
					<?php 
					
					$typeid;
					$i = 0;
					$flag = 0;
					$dataId = 1;
					
					while($data['status'] && $i < count($data['data'])):
					?>
					
					<div data-id="<?=$dataId ?>" class="info-list info-ease">
						<ul class="info-ul">
							<li class="info-li"></li>
							<li class="info-li">
								<?php 
                				for($i; $i < count($data['data']); $i ++):
                				
                    				$list = $data['data'][$i];
                				    //一个栏目开始时，设置栏目id
                    				if($flag == 0) {
                    				    $typeid = $list['typeid'];
                    				    $flag = 1;
                    				}
                    				
                    				
                    				$title = T::arrayValue('title', $list);
                    				$c = T::lookAbout([
                    				    'channeltype',
                    				    $list['channel'],
                    				    'nid',
                    				    $data['arctypeInfor'],
                    				]);
                    				
                    				$v = T::getStrVal(-1, T::arrayValue('arctypeInfor.'.($i+1).'.typedir', $data));
                    				$aid = T::arrayValue('id', $list);
                    				$pubdate = date('Y-m-d',T::arrayValue('pubdate', $list));
                    				$aUrl = T::replaceToVal($data['param']['aUrl'],[
                    				    'm' => $m,
                    				    'v' => $v,
                    				    'c' => $c,
                    				    'aid' => $aid
                    				]);
                    				
                				
                				?>
								<p>
									<img class="info-lazy" data-src="../../static/images/picture/1519808943.jpg" alt="">
									<a href="<?=$aUrl ?>" title="<?=$title ?>" target=_self>
										<?=$title ?>
									</a>
									<b><?=$pubdate ?></b>
								</p>
								<?php 
								
								
                				//判断下一数据是否还属于当前栏目
                				$nextList = T::arrayValue('data.'.($i+1), $data,false);
                				if(!$nextList) break 2;
                				if($nextList && ($typeid != $nextList['typeid'])) {
                				    $flag = 0;
                				    $i++;
                				    break;
                				}
                				
                				$list = $nextList;
                				
								$title = T::arrayValue('title', $list);
								$c = T::lookAbout([
								    'channeltype',
								    $list['channel'],
								    'nid',
								    $data['arctypeInfor'],
								]);
								
								$v = T::getStrVal(-1, T::arrayValue('arctypeInfor.'.($i+1).'.typedir', $data));
								$aid = T::arrayValue('id', $list);
								$pubdate = date('Y-m-d',T::arrayValue('pubdate', $list));
								$aUrl = T::replaceToVal($data['param']['aUrl'],[
								    'm' => $m,
								    'v' => $v,
								    'c' => $c,
								    'aid' => $aid
								]);
								?>
								<p>
									<img class="info-lazy" data-src="../../static/images/picture/1519809402.jpg" alt="">
									<a href="<?=$aUrl ?>" title="<?=$title ?>" target=_self>
										<?=$title ?>
									</a>
									<b><?=$pubdate ?></b>
								</p>
								<?php 
								$i++;
								endfor;
								?>
								
							</li>

						</ul>
					</div>
					<?php 
					$dataId ++;
					endwhile;
					?>
					
					
					
					
					
				</div>
			</div>
		</div>
	</div>
</section>