<?php

return $modelConfig = [
    //model首字母+sn => 'industry首字母+行业代码+｜+子类行业代码
    'msn' => 'i_2781|372',         //i当前用户所属行业的模板编号，系统会根据编号加载当前用户可用的视图模块 
    //当前用户已配置好的页面模块名称
    'pageModel' => [
        //视图文件名称
        'index' => ['header_0','headerBanner_0','navication_0','NewsList_0','footer_0'],       //首页模块名称
        'news' => ['header_2','navication_0','newsList_0','footer_0'],                         //新闻栏目索引页模块名称
    ],

];