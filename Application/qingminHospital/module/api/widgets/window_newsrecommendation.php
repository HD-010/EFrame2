<?php
use EFrame\Helper\T;
/**
 * 橱窗新闻推荐
 * 
 * 只能陈列三条带缩略图的新闻
 调用方式如：$this->renderWidget('windownewsrecommendation',$windownewsrecommendation);
  调用时传入的数据格式如测试数据，
  如果传入的数据  $windownewsrecommendation  === 'testdata'，测加载载测试数据
  * 
 */
//测试数据：
$testdata = [
    [
        'href' => '.....?id=2843',
        'title' => '为进一步深入学习贯彻习近平新时代中国特色社会主义思想和党的十九大精神，7月17日下午，医院邀请市委十九大精神宣讲团成员、市委党校理论研究室主任汪庆玲教授来院作习近平新时代中国特色社会主义思想宣讲报告。医院领导班子，全体党员及党外干部300余人参会。党委书记、院长王义文主持报告会。',
        'imgsrc' => '...xx.jpg',
    ],
    [
        'href' => '.....?id=2843',
        'title' => '为进一步深入学习贯彻习近平新时代中国特色社会主义思想和党的十九大精神，7月17日下午，医院邀请市委十九大精神宣讲团成员、市委党校理论研究室主任汪庆玲教授来院作习近平新时代中国特色社会主义思想宣讲报告。医院领导班子，全体党员及党外干部300余人参会。党委书记、院长王义文主持报告会。',
        'imgsrc' => '...xx.jpg',
    ],
    [
        'href' => '.....?id=2843',
        'title' => '为进一步深入学习贯彻习近平新时代中国特色社会主义思想和党的十九大精神，7月17日下午，医院邀请市委十九大精神宣讲团成员、市委党校理论研究室主任汪庆玲教授来院作习近平新时代中国特色社会主义思想宣讲报告。医院领导班子，全体党员及党外干部300余人参会。党委书记、院长王义文主持报告会。',
        'imgsrc' => '...xx.jpg',
    ],
];


//$windownewsrecommendation = $data['windownewsrecommendation'];

$windownewsrecommendation = $data || [];
if($data === 'testdata') $windownewsrecommendation = $testdata;
if(empty($windownewsrecommendation)) return;

?>

<div class="jsimg">
			<div class="jscontent">
				<div>
					<a href="#" id="jsaa"><img id="jsimg" src="/images/ad1.html" /></a>
				</div>
				<div id="imgcontent">加载中...</div>
				<div id="jsimglist">
					<ul>

						<?php for($i = 0; $i < count($windownewsrecommendation); $i ++):?>
						<li>
							<a target='_blank' href='<?=App::params('@webServer').T::arrayValue($i.'.href', $windownewsrecommendation)?>'><img
								alt='<?=T::arrayValue($i.'.title', $windownewsrecommendation)?>'
								src='<?=App::params('@webServer').T::arrayValue($i.'.imgsrc', $windownewsrecommendation)?>' />
							</a>
						</li>
						<?php endfor;?>

					</ul>
				</div>
			</div>
		</div>