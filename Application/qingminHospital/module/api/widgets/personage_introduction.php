<?php
use EFrame\Helper\T;
/**
 * 人物介绍
 * 调用说明：
 * 模块布局，左上角为人物图片。人物名字和职业描述围绕图片。底部是咨询和预约按钮
 * 调用时传入的数据格式如测试数据
 */
//测试数据
$testdata =[
    'typename' => '专家介绍',                   //类目名称
    'typehref' => '/experts.html',            //类目列表路由
    'personage' => [
        [
            'name' => '祝子明',
            'href' => '',
            'face' => '/uploads/image/20121217/20121217151763676367.jpg',  
            'jobdescription' => '主任药师，执业药师，药学部主任。毕业于安徽省中医学院药学专业，在职研究生学历。从事医院药学工作多年，擅长临床药学、药学服务和药事管理工作。发表学术论文多篇。...',
        ],
        [
            'name' => '江5桥',  
            'href' => '',
            'face' => '/uploads/image/20130107/20130107110136853685.jpg',  
            'jobdescription' => '副主任医师，康复科主任兼二十八病区主任。毕业于安徽医科大学临床医学专业，从事外科、骨科、康复科等临床工作多年。曾在安徽医科大学附属医院、中山医科大学附属医院、深圳市人民医院等进修深造，擅长颈肩腰腿疾病...',
        ],
    ],
        
];

$personageintroduction = $data || [];
if($data === 'testdata') $personageintroduction = $testdata;
if(empty($personageintroduction)) return;
$webServer = App::params('@webServer');
?>


<div class="zhuangjie">
		<div class="sbar">
			<span><?=T::arrayValue('typename',$personageintroduction) ?></span><em>&nbsp;</em><a href="<?=$webServer.T::arrayValue('typehref',$personageintroduction) ?>">更多>></a>
		</div>
		<div class="h226">
			<div>
				<ul id="foo3">
					<?php 
					for($i = 0; $i < count($personageintroduction['personage']); $i ++):
					   $list = $personageintroduction['personage'][$i];
					?>
					<li>
						<div class="jiaoshou">
							<a href='<?=$webServer.T::arrayValue('href', $list) ?>'><img
								src="<?=$webServer.T::arrayValue('face', $list) ?>" width="88"
								height="115" /></a>
							<div class="jiaoshoujieshao">
								<span><?=T::arrayValue('name', $list) ?></span><br />
								<?=T::arrayValue('jobdescription', $list) ?>
							</div>
						</div>
						<!-- 预约 -->
						<div class="woyaoyuyue2">
							<a target="_blank" href="reservation.html"><img
								src="/images/yuyue.jpg" /></a>
						</div>
					</li>
					<?php endfor; ?>

				</ul>
			</div>
		</div>
		<!-- 满意度调查 -->
		<div class="youshishangwu">
			<a href="vote-manyi.html"></a>
		</div>
	</div>