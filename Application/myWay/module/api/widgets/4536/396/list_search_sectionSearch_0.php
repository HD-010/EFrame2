<?php
use EFrame\Helper\T;

$this->usePaging();
if(!$data['status']) return;
?>
<link rel="stylesheet" type="text/css" href="../../static/css/news_cn.css">
<section class="news_list_page_met_m1156_1 lazy" m-id="36"data-background="../../static/images/picture/1519794022.png">
	<div class="met-news animsition type-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 met-news-body">
					<div class="row">
						<div class="met-news-list">
							<ul class="met-page-ajax met-pager-ajax" data-scale="390x543">
                                <?php
                                if(!$data['status']):
                                ?>
                                <li class="news-li">没有找到相关信息...</li>

                                <?php
                                endif;
                                //return;
                                if($data['status']):
                                ?>
                                    <li class="news-li">搜索结果如下：</li>
							    <?php
                                    $m = T::replaceToVal(T::arrayValue('param.m', $data));
                                    $aUrl = T::arrayValue('param.aUrl', $data);

                                    for($i = 0; $i < count($data['data']); $i ++):
                                    $list = $data['data'][$i];
                                    $title = T::limitStr(10, $list['title']);
                                    $click = $list['click'];
                                        $v = T::replaceToVal(T::getStrVal(-1, $list['typedir']));
                                        $c = T::replaceToVal( $list['nid']);
                                    $aid = $list['id'];
                                    $description = $list['description'];
                                    $pubDate = date('Y/m/d',$list['pubdate']);
                                    $href = T::replaceToVal($aUrl,[
                                        'm' => $m,
                                        'v' => $v,
                                        'c' => $c,
                                        'aid' => $aid,
                                    ]);
                                ?>
                                
								<li class="news-li">
									<div class="news-img">
										<a href="<?=$href ?>" title="<?=$title ?>" target=_self>
											<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/390_543/1519808044.jpg">
										</a>
									</div>
									<div class="news-text">
										<h3>
										<a href="<?=$href ?>" title="<?=$title ?>">
											<?=$title ?>
										</a></h3>
										<ul>
											<li>
												<i class="fa fa-clock-o"></i><b><?=$pubDate ?></b>
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
										<!-- <em> <b>标签：</b>
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
										</a> </em> -->
										<a class="click-box" href="<?=$href ?>" target=_self>
											<span>READ MORE</span>
										</a>
									</div>
								</li>
								
								<?php 
                                    endfor; endif;
                                ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="met-pager-ajax-link hidden-md-up" m-type="nosysdata">
					<button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn"  data-page="1">
					<i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
					</button>
				</div>
				<div class="col-lg-4">
					<div class="row">
						<div class="met-news-bar">
							<div class="sidenews-lists">
								<h3><span>为您推荐</span></h3>
								<ul>
								
									
									<?php
                                    if($data['status']):
                                    for($i = 0; $i < count($data['data']); $i ++):
                                        $list = $data['data'][$i];
                                        $title = T::limitStr(10, $list['title']);
                                        $flag = $list['flag'];
                                        
                                        if(preg_match('/c/',$flag)) continue;
                                        
                                        $click = $list['click'];
                                        $v = T::replaceToVal(T::getStrVal(-1, $list['typedir']));
                                        $c = T::replaceToVal( $list['nid']);
                                        $aid = $list['id'];
                                        $description = $list['description'];
                                        $pubDate = date('Y/m/d',$list['pubdate']);
                                        $href = T::replaceToVal($aUrl,[
                                            'm' => $m,
                                            'v' => $v,
                                            'c' => $c,
                                            'aid' => $aid,
                                        ]);
                                    ?>
									<li>
										<a href="<?=$href ?>" title="<?=$title ?>" target=_self>
											<img class="imgloading" data-original="http://qn.wuhao.vip/upload/thumb_src/145_123/1519808044.jpg">
											<b><?=$title ?></b>
											<p>
												<?=$pubDate ?>
											</p>
										</a>
									</li>
									<?php 
									   endfor;endif;
									?>
									
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>