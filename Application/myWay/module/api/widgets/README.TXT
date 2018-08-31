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
