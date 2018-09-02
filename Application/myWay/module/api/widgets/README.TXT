各个行业的视图小部件
各个行业分为两级，每个用户必须指定所制做的网站所属行业
如果没有指定行业分类，则默认以顶级0000，子级000行业模块生成网站初绐页面

页面名称的命名规则规则详见，modelconfig中readme.txt文件

小部件命名方式：

通用所有页面小部件命名有两类。
1、header_0.php
header:表示页面头部
0：表示小部件编号，是同一类型小部件的唯一识别码。可以是自然数
当在modelConfig配置文件中使用时，直接写'header_0'
2、footer_0.php
footer:表示页面底部
0：表示小部件编号，是同一类型小部件的唯一识别码。可以是自然数
当在modelConfig配置文件中使用时，直接写'footer_0'

首页小部件命名举例说明。
1、index_navication_0.php
index:表示页面类型为索引页，该小部件适用于首页
navication:表示该小部件的名称。用于描述该小部件的功能与作用，可以用多个单词以驼峰格式描述。
0：表示小部件编号，是同一类型小部件的唯一识别码。可以是自然数。如：
index_navication_1.php
index_articleList_0.php
index_articleList_1.php  等……
当在modelConfig配置文件中使用时，直接写'navication_0'、'articleList_1'等

列表页小部件命名举例说明。
1、list_article_newsList_0.php
list:表示页面类型为列表页，该小部件适用于栏目例表
article:表示资源类型为article,在数据表中与channeltype表的nid对应
newsList:示该小部件的名称。用于描述该小部件的功能与作用，可以用多个单词以驼峰格式描述。
0：表示小部件编号，是同一类型小部件的唯一识别码。可以是自然数。如：
list_image_newsList_0.php
list_article_newsList_0.php 等……
当在modelConfig配置文件中使用时，直接写'newsList_0'、'newsList_0'等

内容页小部件命名举例说明。
1、article_image_newsArticle_0.php
article:表示页面类型为内容页，该小部件适用于内容页
image:表示资源类型为image,在数据表中与channeltype表的nid对应
newsArticle:示该小部件的名称。用于描述该小部件的功能与作用，可以用多个单词以驼峰格式描述。
0：表示小部件编号，是同一类型小部件的唯一识别码。可以是自然数。如：
article_shop_commodityView_0.php
article_shop_commodityView_1.php 等……
当在modelConfig配置文件中使用时，直接写'commodityView_0'、'commodityView_1'等

小部件制作概述
小部件又为页面的功能模块，每个小部件都具有完整的功能性，以一个单独的文件存在。
在使用小部件时，在视图中用$this->renderWidgets($widgets,$widgetData)将小部件引入。
在小部件中使用$data变量，可以访问到由外部视图传到小部的数据。可以var_dump($data)输出数据结构。
如果在小部件中引入Eframe\Helper\T,也可以使用T::print_pre($data)输出格式化后的数据

小部件数据输出前的初始化过程
小部件数据在输出前需要对其进行预处理，使其数据内容输出需求
1、navication（导航栏）数据输出前的处理如下：
            <?php
        	   for($i = 0; $i < count ($data) -1; $i ++):
                   $list = $data[$i];

        	       //定义栏目连接
                   $typeUrl = T::replaceToVal(T::arrayValue('param.tUrl',$data),[
                       'm'=>T::arrayValue('param.m', $data),
                       'c'=>T::arrayValue('nid', $list),
                       'v'=>T::getStrVal(-1, $list['typedir']),
                       'tid'=>T::arrayValue('id', $list),
                   ]);

                   //定义栏目名称
                   $typeName = T::arrayValue('typename', $list);
        	?>
                   <li><a title="<?=$typeName?>" href="<?=$typeUrl?>"><?=$typeName?></a></li>
            <?php endfor?>

2、首页分类列表数据输出前的处理如下：
        <?php
            if(!$data['status']) return ;

            //栏目名称
            $typeName = T::arrayValue('arctypeInfor.0.typename',$data);
            $m = T::arrayValue('param.m', $data);
            $c = T::arrayValue('arctypeInfor.0.nid', $data);
            $v = T::getStrVal(-1, $data['arctypeInfor'][0]['typedir']);
            $tid = T::arrayValue('typeId', $data);

            //更多按钮指向的栏目链接
            $lUrl = T::replaceToVal(T::arrayValue('param.lUrl', $data),[
                'm' => $m,
                'c' => $c,
                'v' => $v,
                'tid' => $tid
            ]);

            for($i = 0; $i < count ($data['data']); $i ++):
            $list = $data['data'][$i];

            //文章地址
            $aUrl = T::replaceToVal(T::arrayValue('param.aUrl', $data),[
                'm' => $m,
                'c' => $c,
                'v' => $v,
                'aid' => T::arrayValue('id', $list)
            ]);

            //文章标题
            $title = T::arrayValue('title', $list);
        ?>



关于小部件模板功能的开发，模板调用格式如下： 待叙……
   {{typelist for:data}}
        <li><a title=typeName href=typeUrl>typeName</a></li>
        <ul>
        {{typelist for:data.sun}}
            <li><a title=typeName href=typeUrl>typeName</a></li>
        }}
        <ul>
   }}